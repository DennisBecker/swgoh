<?php
declare(strict_types=1);

namespace SWGoH;

use Symfony\Component\DomCrawler\Crawler;

class Guild
{
	public function __construct(Client $client)
	{
		$this->client = $client;
	}

	public function fetch($guildUri)
	{
		$html = $this->client->fetch($guildUri);

		$crawler = new Crawler($html);
		$memberList = $crawler->filter('.character-list td a');

		$memberUris = [];
		foreach ($memberList as $memberNode) {
			$href = $memberNode->getAttribute('href');

	    	$memberUris[] = $href . 'collection/';
		}

		return $memberUris;
	}
}
