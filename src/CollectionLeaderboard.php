<?php
declare(strict_types=1);

namespace SWGoH;

use Symfony\Component\DomCrawler\Crawler;

class CollectionLeaderboard
{
    private $client;

	public function __construct(Client $client)
	{
		$this->client = $client;
	}

    public function getPlayers()
    {
        $playerUrls = [];
        $html = $this->client->fetch('/sync/leaderboard/collection/');

        $crawler = new Crawler($html);
        $pagesElement = $crawler->filter('.pagination a');
        $pages = str_replace('Page 1 of ', '', $pagesElement->text());
        $pages = 20;

        $leaderboardPages = [];
        for ($page = 1; $page <= $pages; $page++) {
            $leaderboardPages[] = '/sync/leaderboard/collection/?page=' . $page;
        }

        printf("Leaderboard Pages: %d\n\n", count($leaderboardPages));

        $leaderboardPagesHtml = $this->client->fetchAll($leaderboardPages);

        foreach ($leaderboardPagesHtml as $html) {
            $crawler = new Crawler($html);
            foreach ($crawler->filter('tbody > tr') as $playerData) {
                $url = $playerData->getElementsByTagName('td')[0]->getElementsByTagName('a')[0]->getAttribute('href');
                $playerUrls[] = $url . 'collection/';
            }
        }

        return $playerUrls;
    }
}
