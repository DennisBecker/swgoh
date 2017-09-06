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
		ini_set("memory_limit","-1");

		$begin = microtime(true);
		$this->client = new Client();
		$fileManager = new FileManager();

		$this->load();
		// $this->data = $fileManager->read(dirname(__DIR__) . '/data/characters.json');

		ksort($this->data);

		foreach ($this->data as &$data) {
			foreach ($data['mods'] as &$mods) {
				usort($mods, function($a, $b) {
					return $b['count'] <=> $a['count'];
				});
			}
		}

		foreach ($this->data as &$data) {
			foreach ($data['mods'] as $slot => $mods) {
				$data['mods'][$slot] = array_slice($mods, 0, 5);
			}
		}

		$fileManager->write(dirname(__DIR__) . '/data/characters.json', $this->data);

		printf("\n\nTime: %d\n", microtime(true)-$begin);
		printf("Memory Usage: %d\n\n", memory_get_peak_usage(true)/1024/1024);
	}

	private function load()
	{
		$collectionLeaderboard = new CollectionLeaderboard($this->client);
		$playerUrls = $collectionLeaderboard->getPlayers();

		$collection = new Collection($this->client);
		$characterUrls = $collection->getCharacterUrls($playerUrls);

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

	private function addMod(&$storedMods, $mod)
	{
		if (!array_key_exists('name', $mod)) {
			return;
		}

		$found = false;
		foreach ($storedMods as &$storedMod) {
			if ($storedMod['name'] === $mod['name'] && $storedMod['primary'] === $mod['primary']) {
				++$storedMod['count'];
				$found = true;
				break;
			}
		}

		if (!$found) {
			$storedMods[] = array_merge($mod, ['count' => 1]);
		}
	}

	public function output(string $message)
	{
		echo "$message\n";
	}
}
