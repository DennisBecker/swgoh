<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use SWGoH\FileManager;

/**
 * @covers FileManager
 */
final class FileManagerTest extends TestCase
{
	/**
	 * string
	 */
	private $dataDir;

	/**
	 * FileManager
	 */
	private $fileManager;

	public function setUp()
	{
		$this->dataDir = dirname(__DIR__) . '/data';
		$this->fileManager = new FileManager();
	}

	public function testReadVerifiesDataStorageDirectory()
	{
		$this->expectException(\InvalidArgumentException::class);
		$this->expectExceptionMessage(sprintf('File lookup /etc/passwd does not match %s', $this->dataDir));

		$this->fileManager->read('/etc/passwd');
	}

	public function testReadVerifiesIfFileExists()
	{
		$fileName = 'sdkjfbwaeoifuhawefliajsbvaoeriufharwifjnawref.json';

		$this->expectException(\InvalidArgumentException::class);
		$this->expectExceptionMessage(sprintf('File %s does not exist', $fileName));

		$this->fileManager->read($this->dataDir . '/' . $fileName);
	}
}
