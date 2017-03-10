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
		$this->client = new Client;

		$this->load();
	}

	private function load()
	{
		$guilds = new Guilds($this->client);
		$guildData = $guilds->fetch();

		$this->output(sprintf('Guilds: %d', count($this->data)));

		foreach ($guildData as $guild) {
			$this->output(sprintf("\nNAME: %s", $guild['name']));

			$this->loadMember($guild);
		}

		$fileManager = new FileManager();
		$fileManager->write(dirname(__DIR__) . '/data/characters.json', $this->data);
	}

	private function loadMember($guild)
	{
		$member = new Member($this->client);
		$members = $member->fetch($guild);

		$this->output(sprintf('MEMBER: %d', count($members)));

		$guild['members'] = $members;

		foreach ($guild['members'] as $member) {

			$this->loadCollection($member);
		}
	}

	private function loadCollection(&$member)
	{
		$collection = new Collection($this->client);
		$charUris = $collection->fetch($member);

		$charData = $this->loadCharacters($charUris);

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

			$this->data[$char['name']]['mods']['slot1'][] = $char['mods']['slot1'];
			$this->data[$char['name']]['mods']['slot2'][] = $char['mods']['slot2'];
			$this->data[$char['name']]['mods']['slot3'][] = $char['mods']['slot3'];
			$this->data[$char['name']]['mods']['slot4'][] = $char['mods']['slot4'];
			$this->data[$char['name']]['mods']['slot5'][] = $char['mods']['slot5'];
			$this->data[$char['name']]['mods']['slot6'][] = $char['mods']['slot6'];
		}
	}

	private function loadCharacters($charUris)
	{
		$characters = new Characters($this->client);
		return $characters->fetch($charUris);
	}

	public function output(string $message)
	{
		echo "$message\n";
	}
}
