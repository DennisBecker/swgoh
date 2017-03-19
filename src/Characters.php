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
		$charsHtmlData = $this->client->fetchAll($charUris);

		printf("\n\nCharacters: %d\n\n", count($charsHtmlData));

		$chars = [];
		foreach($charsHtmlData as $index => $html) {
			$crawler = new Crawler($html);

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
		}

		return $chars;
	}

	private function getModInfo($crawler, $slot)
	{
		try {
			return [
				'name' => $crawler->filter(".pc-statmod-slot$slot .statmod-title")->text(),
				'primary' => $crawler->filter(".pc-statmod-slot$slot .statmod-stats-1 .statmod-stat-label")->text(),
			];
		} catch (\Exception $e) {
			return [];
		}
	}
}
