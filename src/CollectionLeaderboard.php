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
        $start = microtime(true);
        $html = $this->client->fetch('/sync/leaderboard/collection/');
        printf("%d seconds\n\n", microtime(true)-$start);

        $crawler = new Crawler($html);
        $pagesElement = $crawler->filter('.pagination a');
        $pages = str_replace('Page 1 of ', '', $pagesElement->text());
        $pages = 10;

        $leaderboardPages = [];
        for ($page = 1; $page <= $pages; $page++) {
            $leaderboardPages[] = '/sync/leaderboard/collection/?page=' . $page;
        }

        printf("Leaderboard Pages: %d\n\n", count($leaderboardPages));

        $leaderboardPagesHtml = $this->client->fetchAll($leaderboardPages);

        foreach ($leaderboardPagesHtml as $html) {
            $crawler = new Crawler($html);
            foreach ($crawler->filter('tbody > tr') as $playerData) {
                $elements = $playerData->getElementsByTagName('td');

                $gear8 = (int)$elements[8]->nodeValue;
                $gear9 = (int)$elements[7]->nodeValue;
                $gear10 = (int)$elements[6]->nodeValue;
                $gear11 = (int)$elements[5]->nodeValue;

                $highGearToons = $gear8 + $gear9 + $gear10 + $gear11;

                if ($highGearToons > 0) {
                    $url = $elements[1]->getElementsByTagName('a')[0]->getAttribute('href');
                    $playerUrls[] = $url . 'collection/';
                }
            }
        }

        return $playerUrls;
    }
}
