<?php
declare(strict_types=1);

namespace SWGoH;

require dirname(__DIR__) . '/vendor/autoload.php';

$fileManager = new FileManager();

$data = $fileManager->read(dirname(__DIR__) . "/data/characters-2071-03-19.json");

foreach ($data as &$character) {
    foreach ($character as &$slot) {
        foreach ($slot as &$mods) {
            $newMods = [];
            $count = 0;
            foreach ($mods as $mod) {
                
                if (!array_key_exists('name', $mod)) {
                    continue;
                }

                unset($mod['count']);

                ++$count;

                $found = false;
                foreach ($newMods as &$newMod) {                                                
                    if ($newMod['name'] === $mod['name'] && $newMod['primary'] === $mod['primary']) {
                        ++$newMod['count'];
                        $found = true;
                        break;
                    }
                }

                if (!$found) {
                    $newMods[] = array_merge($mod, ['count' => 1]);
                }
            }
            
            usort($newMods, function($a, $b) {
				return $b['count'] <=> $a['count'];
			});

            $mods = $newMods;
        }
    }
}

$fileManager->write(dirname(__DIR__) . "/data/characters-2071-03-19.json", $data);