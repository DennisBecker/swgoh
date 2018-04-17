<?php
declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

$guilds = [
	'501st Bataillon',
	'Imperial Bataillon',
	'104th Bataillon',
	'41st Bataillon',
	'B2TF Bataillon',
	'Outerrim10 Bataillon',
	'313th Bataillon',
	'43rd Bataillon',
	'442nd Bataillon',
	'18th Bataillon',
];

$charactersRaw = json_decode(file_get_contents('bataillon/characters.json'), true);
$shipsRaw = json_decode(file_get_contents('bataillon/ships.json'), true);

$characters = [];
foreach ($charactersRaw as $value) {
	$characters[$value['base_id']] = $value;
}

$ships = [];
foreach ($shipsRaw as $value) {
	$ships[$value['base_id']] = $value;
}

$players = [];

foreach ($guilds as $name) {
	$units = json_decode(file_get_contents('bataillon/' . preg_replace('/ /', '', $name) . '.json'), true);

	foreach ($units as $unitId => $data) {

		foreach ($data as $playerData) {

			$players[$playerData['player']]['guild'] = $name;

			$unitName = $playerData['combat_type'] === 1 ? $characters[$unitId]['name'] : $ships[$unitId]['name'];

			if ($playerData['combat_type'] === 1) {
				$players[$playerData['player']]['characters'][$unitName] = [
					'rarity' => $playerData['rarity'],
					'level' => $playerData['level'],
					'gear_level' => $playerData['gear_level'],
				];
			}

			if ($playerData['combat_type'] === 2) {
				$players[$playerData['player']]['ships'][$unitName] = [
					'rarity' => $playerData['rarity'],
					'level' => $playerData['level'],
				];
			}
		}
	};
}

function isCharReady($name, $characters) {
	$output = '%s: %s';

	$icon = '<span class="oi oi-x red"></span>';

	if (isset($characters[$name]) && $characters[$name]['level'] === 85 && $characters[$name]['gear_level'] >= 8 && $characters[$name]['rarity'] === 7) {
		$icon = '<span class="oi oi-check green"></span>';
	}

	return sprintf($output, $name, $icon);
}

$overviewHeader = '<tr>
<th>Name</th>
<th>RJT</th>
<th>Vet Han</th>
<th>Vet Chewie</th>
<th>BB-8</th>
<th>R2-D2</th>
<th>RT</th>
<th>CLS</th>
<th>Han</th>
<th>CHS</th>
<th>HRSc</th>
<th>HRSo</th>
<th>Pao</th>
<th>Veers</th>
<th>Starck</th>
<th>Shore</th>
<th>DT</th>
<th>Snowtrooper</th>
<th>Thrawn</th>
<th>Chirrut</th>
<th>Baze</th>
<th>Asajj</th>
<th>Talzin</th>
<th>Daka</th>
<th>Talia</th>
<th>Acolyte</th>
<th>Zombie</th>
<th>&nbsp</th>
<th>Home One</th>
<th>Endurance</th>
<th>Executrix</th>
<th>Chimaera</th>
</tr>';

$html = '';
$sithRaid = '';
$overview = $overviewHeader;

$count = 0;
foreach ($players as $playerName => $playerData) {
	$count++;

	$guild = $playerData['guild'];
	$characters = $playerData['characters'];
	$ships = $playerData['ships'];

	ob_start();
	include 'bataillon/templates/player.php';
	$playerHtml = ob_get_clean();
	$html .= $playerHtml;

	ob_start();
	include 'bataillon/templates/heroicSithRaid.php';
	$playerHtml = ob_get_clean();
	$sithRaid .= $playerHtml;

	if ($count % 10 === 0) {
		$overview .= $overviewHeader;
	}

	ob_start();
	include 'bataillon/templates/overviewPlayer.php';
	$playerHtml = ob_get_clean();
	$overview .= $playerHtml;
}

ob_start();
include 'bataillon/templates/index.php';
file_put_contents('bataillon/index.html', ob_get_clean());

$html = $sithRaid;
ob_start();
include 'bataillon/templates/index.php';
file_put_contents('bataillon/sith.html', ob_get_clean());

$html = $overview;
ob_start();
include 'bataillon/templates/overview.php';
file_put_contents('bataillon/overview.html', ob_get_clean());

function hasChar($name, $charArray) {
	if (isset($charArray[$name])) {
		return 'L' . $charArray[$name]['level'] . '<br>' . $charArray[$name]['rarity'] . '*<br>G' . $charArray[$name]['gear_level'];
	}

	return '<span class="oi oi-x red"></span>';
}

function hasShip($name, $charArray) {
	if (isset($charArray[$name])) {
		return 'L' . $charArray[$name]['level'] . '<br>' . $charArray[$name]['rarity'] . '*';
	}

	return '<span class="oi oi-x red"></span>';
}


function character($name, $charArray) {
	$rarityClass = '';

	$char = [
		'rarity' => 0,
		'level' => 0,
		'gear_level' => 0,
	];

	if (isset($charArray[$name])) {
		$char = $charArray[$name];
	}

	if ($char['rarity'] == 7) {
		$rarityClass = 'ready';
	} elseif ($char['rarity'] < 5) {
		$rarityClass = 'notReady';
	} else {
		$rarityClass = 'usable';
	}

	if ($char['level'] > 80) {
		$levelClass = 'ready';
	} elseif ($char['level'] < 60) {
		$levelClass = 'notReady';
	} else {
		$levelClass = 'usable';
	}

	if ($char['gear_level'] > 8) {
		$gearClass = 'ready';
	} elseif ($char['gear_level'] < 7) {
		$gearClass = 'notReady';
	} else {
		$gearClass = 'usable';
	}

	$readyClass = in_array('notReady', [$rarityClass, $levelClass, $gearClass]) ? 'notReady' : 'usable';
	if ($rarityClass === 'ready' && $levelClass === 'ready' && $gearClass === 'ready') {
		$readyClass = 'ready';
	}

	return '<tr><td class="">' . $name .'</td><td class="'.$rarityClass.'">' . $char['rarity'] .'</td><td class="'.$levelClass.'">' . $char['level'] .'</td><td class="'.$gearClass.'">' . $char['gear_level'] .'</td><td class="'.$readyClass.'">'.($readyClass === 'ready' ? 'yes' : 'no').'</td></tr>'."\n";
}

function heroicCharacter($name, $charArray) {
	$rarityClass = '';

	$char = [
		'rarity' => 0,
		'level' => 0,
		'gear_level' => 0,
	];

	if (isset($charArray[$name])) {
		$char = $charArray[$name];
	}

	if ($char['rarity'] == 7) {
		$rarityClass = 'ready';
	} else {
		$rarityClass = 'notReady';
	}

	if ($char['level'] == 85) {
		$levelClass = 'ready';
	} else {
		$levelClass = 'notReady';
	}

	if ($char['gear_level'] > 10) {
		$gearClass = 'ready';
	} else {
		$gearClass = 'notReady';
	}

	$readyClass = in_array('notReady', [$rarityClass, $levelClass, $gearClass]) ? 'notReady' : 'usable';
	if ($rarityClass === 'ready' && $levelClass === 'ready' && $gearClass === 'ready') {
		$readyClass = 'ready';
	}

	return '<tr><td class="">' . $name .'</td><td class="'.$rarityClass.'">' . $char['rarity'] .'</td><td class="'.$levelClass.'">' . $char['level'] .'</td><td class="'.$gearClass.'">' . $char['gear_level'] .'</td><td class="'.$readyClass.'">'.($readyClass === 'ready' ? 'yes' : 'no').'</td></tr>'."\n";
}

function ship($name, $shipArray) {
	$rarityClass = '';

	$char = [
		'rarity' => 0,
		'level' => 0,
		'gear_level' => 0,
	];

	if (isset($shipArray[$name])) {
		$char = $shipArray[$name];
	}

	if ($char['rarity'] == 7) {
		$rarityClass = 'ready';
	} elseif ($char['rarity'] < 5) {
		$rarityClass = 'notReady';
	} else {
		$rarityClass = 'usable';
	}

	if ($char['level'] > 80) {
		$levelClass = 'ready';
	} elseif ($char['level'] < 60) {
		$levelClass = 'notReady';
	} else {
		$levelClass = 'usable';
	}

	$readyClass = in_array('notReady', [$rarityClass, $levelClass]) ? 'notReady' : 'usable';
	if ($rarityClass === 'ready' && $levelClass === 'ready') {
		$readyClass = 'ready';
	}

	return '<tr><td class="">' . $name .'</td><td class="'.$rarityClass.'">' . $char['rarity'] .'</td><td class="'.$levelClass.'">' . $char['level'] .'</td><td class="'.$readyClass.'">'.($readyClass === 'ready' ? 'yes' : 'no').'</td></tr>'."\n";
}