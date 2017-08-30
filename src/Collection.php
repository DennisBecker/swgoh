<?php
declare(strict_types=1);

namespace SWGoH;

use Symfony\Component\DomCrawler\Crawler;

class Collection
{
	private $client;

	public function __construct($client)
	{
		$this->client = $client;
	}

	public function getCharacters($playerUrls)
	{
		$characterUrls = [];

		$countPlayers = count($playerUrls);
		printf("\n\nCollections: %d\n\n", $countPlayers);

		$collectionPagesHtml = $this->client->fetchAll($playerUrls);

		 foreach ($collectionPagesHtml as $html) {
            $crawler = new Crawler($html);

			foreach ($crawler->filter('.char-portrait-full-link') as $toon) {
				$divs = $toon->getElementsByTagName('div');
				$level = (int)$divs->item(8)->nodeValue;
				$gear = $this->getNormalizedRomanianNumber($divs->item(9)->nodeValue);

				if ($level >= 85 && $gear >= 10) {
					$characterUrls[] = $toon->getAttribute('href');
				}
			}
		}

		return $characterUrls;
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
