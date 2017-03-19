<?php
declare(strict_types=1);

namespace SWGoH;
use SWGoH\FileManager;

class App
{
	private $client;
	private $data = [];

	public function run()
	{
		$begin = microtime();
		$this->client = new Client;

		$this->load();

		ksort($this->data);

		foreach ($this->data as &$data) {
			usort($data, function($a, $b) {
				return $a['count'] <=> $b['count'];
			});
		}

		$fileManager = new FileManager();
		$fileManager->write(dirname(__DIR__) . '/data/characters.json', $this->data);

		printf("Time: %d", microtime()-$begin);
		printf("Memory Usage: %d", memory_get_peak_usage(true)/1024/1024);
	}

	private function load()
	{
		$collectionLeaderboard = new CollectionLeaderboard($this->client);
		$playerUrls = $collectionLeaderboard->getPlayers();
		
		$collection = new Collection($this->client);
		$characterUrls = $collection->getCharacters($playerUrls);

		$characters = new Characters($this->client);
		$charData = $characters->fetch($characterUrls);

		foreach ($charData as $char)
		{
			if (!array_key_exists($char['name'], $this->data)) {
				$this->data[$char['name']] = [
					'mods' => [
						'slot1' => [],
						'slot2' => [],
						'slot3' => [],
						'slot4' => [],
						'slot5' => [],
						'slot6' => [],
					]
				];
			}

			$this->addMod($this->data[$char['name']]['mods']['slot1'], $char['mods']['slot1']);
			$this->addMod($this->data[$char['name']]['mods']['slot2'], $char['mods']['slot2']);
			$this->addMod($this->data[$char['name']]['mods']['slot3'], $char['mods']['slot3']);
			$this->addMod($this->data[$char['name']]['mods']['slot4'], $char['mods']['slot4']);
			$this->addMod($this->data[$char['name']]['mods']['slot5'], $char['mods']['slot5']);
			$this->addMod($this->data[$char['name']]['mods']['slot6'], $char['mods']['slot6']);
		}
	}

	private function addMod(&$storedMods, $newMod)
	{
		if (!array_key_exists('name', $mod)) {
			return;
		}

		$found = false;
		foreach ($storedMods as &$mod) {
			if ($mod == $newMod) {
				++$mod['count'];
				$found = true;
			}
		}

		if (!$found) {
			$storedMods[] = array_merge($newMod, ['count' => 1]);
		}
	}

	public function output(string $message)
	{
		echo "$message\n";
	}
}
