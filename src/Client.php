<?php
declare(strict_types=1);

namespace SWGoH;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Pool;

class Client
{
	private $sleepTimer = 0;

	public function __construct()
	{
		$this->client = new GuzzleClient([
			'base_uri' => 'https://swgoh.gg',
		]);
	}

	public function fetch($uri)
	{
		$res = $this->client->request('GET', $uri);

		sleep($this->sleepTimer);

		return (string)$res->getBody();
	}

	public function fetchAll(array $uris)
	{
		$requestPromises = (function () use ($uris) {
		    foreach ($uris as $uri) {
				yield function() use ($uri) {
		            return $this->client->getAsync($uri);
		        };
		    }
		})();

		$data = [];
		$counter = 0;
		$pool = new Pool($this->client, $requestPromises, [
		    'concurrency' => 20,
		    'fulfilled' => function ($response, $index) use (&$data, &$counter) {
				sleep($this->sleepTimer);

				echo ".";
				++$counter;

                if ($counter % 60 === 0) {
                    printf("  %10d\n", $counter);
                }

		        $data[] = (string)$response->getBody();
		    },
		]);

		$promise = $pool->promise();
		$promise->wait();

		return $data;
	}
}
