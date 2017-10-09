<?php
declare(strict_types=1);

namespace SWGoH;

use Symfony\Component\DomCrawler\Crawler;

class Collection
{
	/**
	 * @var Client
	 */
	private $client;

	public function __construct($client)
	{
		$this->client = $client;
	}

	public function getCharacterUrls($playerUrls)
	{
		$characterUrls = [];

		$countPlayers = count($playerUrls);
		printf("\n\nCollections: %d\n\n", $countPlayers);

		$collectionPagesHtml = $this->client->fetchAll($playerUrls);

		 foreach ($collectionPagesHtml as $html) {
            $crawler = new Crawler($html);

			foreach ($crawler->filter('.char-portrait-full-link') as $toon) {
				$divs = $toon->getElementsByTagName('div');

				$starLevel = 0;
				foreach ($divs as $div) {
					$classes = $div->getAttribute('class');
					if (strpos($classes, 'star') === 0 && strpos($classes, 'star-inactive') === false) {
						++$starLevel;
					}
				}

				$level = (int)$divs->item(8)->nodeValue;
				$gear = $this->getNormalizedRomanianNumber($divs->item(9)->nodeValue);

				if ($level >= 85 && $gear >= 10) {
					$characterUrls[] = $toon->getAttribute('href');
				}
			}
		}

		return $characterUrls;
	}

	public function getCharacterData($playerUrls)
	{
		$playerCharacters = [];

		$countPlayers = count($playerUrls);
		printf("\n\nCollections: %d\n\n", $countPlayers);

		$collectionPagesHtml = $this->client->fetchAll($playerUrls);

		 foreach ($collectionPagesHtml as $html) {
            $crawler = new Crawler($html);
			$playerName = '';

			foreach ($crawler->filter('.char-name') as $playerData) {
				$playerName = $playerData->nodeValue;
				break;
			}

			foreach ($crawler->filter('.collection-char') as $toon) {
				$starLevel = 0;
				$level = 0;
				$gear = 0;

				$node = new Crawler();
				$node->addNode($toon);

				$charName = $node->filter('.collection-char-name')->text();

				$stars = $node->filter('.star');
				if (isset($stars) && count($stars) > 0) {
					$stars->each(function(Crawler $toonStars) use (&$starLevel) {
						$classes = $toonStars->extract('class')[0];
						if (strpos($classes, 'star') === 0 && strpos($classes, 'star-inactive') === false) {
							++$starLevel;
						}
					});

					$level = (int)$node->filter('.char-portrait-full-level')->text();
					$gearLevel = $node->filter('.char-portrait-full-gear-level')->text();

					$gear = $this->getNormalizedRomanianNumber($gearLevel);
				}

				$playerCharacters[$playerName][$charName] = [
					'stars' => $starLevel,
					'level' => $level,
					'gear' => $gear,
				];
			}
		}

		return $playerCharacters;
	}

	private function getNormalizedRomanianNumber($value)
	{
		$gearLevels = [
			'I' => 1,
			'II' => 2,
			'III' => 3,
			'IV' => 4,
			'V' => 5,
			'VI' => 6,
			'VII' => 7,
			'VIII' => 8,
			'IX' => 9,
			'X' => 10,
			'XI' => 11,
			'XII' => 12,
		];

		return $gearLevels[$value];
	}

	public function fetch($member)
	{
		$html = $this->client->fetch($member);

		$crawler = new Crawler($html);
		$chars = $crawler->filter('.current-rank-team .team-listing-member a');

		$charUris = [];
		foreach ($chars as $char) {
			$charUris[] = $char->getAttribute('href');
		}

		return $charUris;
	}
}
