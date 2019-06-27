<?php declare(strict_types=1);

namespace h4kuna\Fio\Request\Log;

use h4kuna\Fio\Response\Pay\IResponse;

class Response implements IResponse
{

	/** @var Request */
	private $request;


	public function getRequest(): Request
	{
		return $this->request;
	}


	public function setRequest(Request $request): void
	{
		$this->request = $request;
	}


	public function isOk(): bool
	{
		return true;
	}


	public function status(): string
	{
		return 'ok';
	}


	public function code(): int
	{
		return 200;
	}


	public function errorMessages(): array
	{
		return [];
	}


	public function __toString()
	{
		return '';
	}

}
