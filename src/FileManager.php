<?php
declare(strict_types=1);

namespace SWGoH;

class FileManager
{
	private static $DATA_DIR;

	public function __construct()
	{
		FileManager::$DATA_DIR = dirname(__DIR__) . '/data';
	}

	public function read(string $filePath) : array
	{
		if (strncmp($filePath, FileManager::$DATA_DIR, strlen(FileManager::$DATA_DIR)) !== 0) {
			throw new \InvalidArgumentException(sprintf('File lookup %s does not match %s', $filePath, FileManager::$DATA_DIR));
		}

		if (!file_exists($filePath)) {
			throw new \UnexpectedValueException(sprintf('File %s does not exist', basename($filePath)));
		}

		$content = file_get_contents($filePath);

		if (empty($content)) {
			return [];
		}

		return json_decode(file_get_contents($filePath), true);
	}

	public function write(string $filePath, array $data)
	{
		if (strncmp($filePath, FileManager::$DATA_DIR, strlen(FileManager::$DATA_DIR)) !== 0) {
			throw new \InvalidArgumentException(sprintf('File lookup %s does not match %s', $filePath, FileManager::$DATA_DIR));
		}

		file_put_contents($filePath, json_encode($data, JSON_PRETTY_PRINT));
	}
}
