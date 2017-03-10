<?php
declare(strict_types=1);

namespace SWGoH;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Pool;

class Client
{
	public function __construct()
	{
		$this->client = new GuzzleClient(['base_uri' => 'https://swgoh.gg']);
	}

	public function fetch($uri)
	{
		$res = $this->client->request('GET', $uri);

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
		$pool = new Pool($this->client, $requestPromises, [
		    'concurrency' => 5,
		    'fulfilled' => function ($response, $index) use (&$data) {
		        $data[] = (string)$response->getBody();
		    },
		]);

		$promise = $pool->promise();
		$promise->wait();

		return $data;
	}
}
