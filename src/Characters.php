<?php
declare(strict_types=1);

namespace SWGoH;

use Symfony\Component\DomCrawler\Crawler;

class Characters
{
	private $client;

	public function __construct($client)
	{
		$this->client = $client;
	}

	public function fetch(array $charUris)
	{
		printf("\n\nCharacters: %d\n\n", count($charUris));

		$charsHtmlData = $this->client->fetchAll($charUris);

		$countAllChars = count($charsHtmlData);

		printf("\n\nFetched data of %d Characters\n\n", $countAllChars);

		$chars = [];
		$counter = 0;
		foreach($charsHtmlData as $index => $html) {
			$crawler = new Crawler($html);

			try {

				$chars[] = [
					'name' => $crawler->filter('.pc-char-overview-name')->text(),
				 	'level' => (int)$crawler->filter('.char-portrait-full-level')->text(),
				 	'mods' => [
						'slot1' => $this->getModInfo($crawler, 1),
						'slot2' => $this->getModInfo($crawler, 2),
						'slot3' => $this->getModInfo($crawler, 3),
						'slot4' => $this->getModInfo($crawler, 4),
						'slot5' => $this->getModInfo($crawler, 5),
						'slot6' => $this->getModInfo($crawler, 6),
					],
				];

			} catch (InvalidArgumentException $e) {
				print($html);
				print($e . "\n");
				die();
			}

			++$counter;
			if ($counter % 100 === 0) {
				echo ".";
			}

			if ($counter % 6000 === 0) {
				printf("  %10d / %d\n", $counter, $countAllChars);
			}
		}

		return $chars;
	}

	private function getModInfo($crawler, $slot)
	{
		try {
			$name = $crawler->filter(".pc-statmod-slot$slot .statmod-title")->text();

			$pattern = '/(?:Critical Chance|Critical Damage|Defense|Health|Offense|Potency|Speed|Tenacity)/';
			$result = preg_match($pattern, $name, $matches);

			if ($result === 0 || $result === false) {
				throw new \UnexpectedValueException("no mod found");
			}

			return [
				'name' => $matches[0],
				'primary' => $crawler->filter(".pc-statmod-slot$slot .statmod-stats-1 .statmod-stat-label")->text(),
			];
		} catch (\Exception $e) {
			return [];
		}
	}
}
