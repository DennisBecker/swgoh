<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use SWGoH\FileManager;

$fileManager = new FileManager();
$playerCharcters = $fileManager->read(__DIR__ . '/data/fireworld.json');

$guildName = 'Fireworld';
$sortedCharacters = [];

foreach ($playerCharcters as $player => $characters) {
	foreach ($characters as $characterName => $data) {

		if ($data['stars'] === 0) {
			continue;
		}

		$sortedCharacters[$characterName][] = [
			'player' => $player,
			'stars' => $data['stars'],
			'level' => $data['level'],
			'gear' => $data['gear'],
		];
	}
}

ksort($sortedCharacters);

foreach($sortedCharacters as &$character) {
	usort($character, function($a, $b) {
		$starDiff = $b['stars'] - $a['stars'];
		if ($starDiff === 0) {
			$levelDiff = $b['level'] - $a['level'];

			if ($levelDiff === 0) {
				return $b['gear'] - $a['gear'];
			}

			return $levelDiff;
		}
		return $starDiff;
	});
}

ob_start();
include './template/guild.phtml';
$html = ob_get_contents();
ob_end_clean();

file_put_contents('./fireworld.html', $html);
