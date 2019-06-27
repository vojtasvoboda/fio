<?php declare(strict_types=1);

namespace h4kuna\Fio\Utils;

use h4kuna\Fio\Request\Log\Request;
use h4kuna\Fio\Request\Log\Response;

class Log
{

	public const MODE_DISABLE = 0;
	public const MODE_LOG = 1;
	public const MODE_DRY = 2;

	/** @var int */
	private $mode;


	public function __construct(int $mode = self::MODE_DRY | self::MODE_LOG)
	{
		$this->setMode($mode);
	}


	public function enableAll(): void
	{
		$this->setMode(self::MODE_DRY | self::MODE_LOG);
	}


	public function enableLogging(): void
	{
		$this->setMode(self::MODE_LOG);
	}


	public function enableDry(): void
	{
		$this->setMode(self::MODE_DRY);
	}


	public function disableLog(): void
	{
		$this->setMode(self::MODE_DISABLE);
	}


	private function setMode(int $mode): void
	{
		$this->mode = $mode;
	}


	public function isLogMode(): bool
	{
		return ($this->mode & self::MODE_LOG) === self::MODE_LOG;
	}


	public function isDry(): bool
	{
		return ($this->mode & self::MODE_DRY) === self::MODE_DRY;
	}


	final public function createRequest(string $url, string $token, array $post, string $filename): Request
	{
		return new Request($url, substr($token, 0, 10), $post, $filename);
	}


	final public function createResponse(): Response
	{
		return new Response;
	}

}
