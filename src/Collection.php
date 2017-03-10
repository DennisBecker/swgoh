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
