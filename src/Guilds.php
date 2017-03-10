<?php
declare(strict_types=1);

namespace SWGoH;

use Symfony\Component\DomCrawler\Crawler;

class Guilds
{
	public function __construct(Client $client)
	{
		$this->client = $client;
	}

	public function fetch()
	{
		$guilds = [];
		$html = $this->client->fetch('/g/');

		$crawler = new Crawler($html);
		$guildsList = $crawler->filter('.character-list a');

		$guildUris = [];
		foreach ($guildsList as $guildNode) {
			$href = $guildNode->getAttribute('href');

			if (preg_match('/^\/g\/\d+\/.*/', $href)) {
		    	$guildUris[] = $href;
			}
		}

		$guildHtmlData = $this->client->fetchAll($guildUris);

		foreach ($guildHtmlData as $index => $guildHtml) {
			$crawler = new Crawler($guildHtml);
			$title = $crawler->filter('.character-list h1');

			$guildName = preg_replace('/^(.*)\ \(.*\\)/', '$1', $title->text());

			$guilds[$index] = [
				'name' => $guildName,
				'uri' => $guildUris[$index],
				'member' => [],
			];
		}

		return $guilds;
	}
}
