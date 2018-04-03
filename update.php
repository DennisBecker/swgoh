<?php
declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use GuzzleHttp\Client as GuzzleClient;

$client = new GuzzleClient([
	'base_uri' => 'https://swgoh.gg',
]);

$guilds = [
	'501st Bataillon' => '/api/guilds/15066/units/',
	'Imperial Bataillon' => '/api/guilds/21878/units/',
	'104th Bataillon' => '/api/guilds/18908/units/',
	'41st Bataillon' => '/api/guilds/3233/units/',
	'B2TF Bataillon' => '/api/guilds/25014/units/',
	'Outerrim10 Bataillon' => '/api/guilds/25118/units/',
	'313th Bataillon' => '/api/guilds/31673/units/',
	'43rd Bataillon' => '/api/guilds/32210/units/',
	'442nd Bataillon' => '/api/guilds/16040/units/',
	'18th Bataillon' => '/api/guilds/32283/units/',
];

function get($client, $uri) {
	return (string)$client->request('GET', $uri)->getBody());
}

$characters = get($client,'/api/characters');
file_put_contents('bataillon/characters.json', $characters);


$units = get($client,'/api/guilds/18908/units/');
var_dump($units);