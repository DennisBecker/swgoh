<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use SWGoH\Client,
	SWGoH\Collection,
	SWGoH\FileManager,
	SWGoH\Guild;

$guildUri = '/g/6884/fireworld/';

$client = new Client();
$fileManager = new FileManager();
$guild = new Guild($client);
$collection = new Collection($client);

$playerUris = $guild->fetch($guildUri);

$playerCharacters = $collection->getCharacterData($playerUris);

$fileManager->write(__DIR__ . '/data/fireworld.json', $playerCharacters);
