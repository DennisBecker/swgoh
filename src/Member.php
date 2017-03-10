<?php
declare(strict_types=1);

namespace SWGoH;

use Symfony\Component\DomCrawler\Crawler;

class Member
{
	public function __construct($client)
	{
		$this->client = $client;
	}

	public function fetch($guild)
	{
		$memberUris = [];
		$html = $this->client->fetch($guild['uri']);

		$crawler = new Crawler($html);
		$memberList = $crawler->filterXPath('//table/tbody/tr/td/a');

		foreach ($memberList as $member) {

			$memberUris[] = $member->getAttribute('href');
		}

		return $memberUris;
	}
}
