<?php declare(strict_types=1);

namespace h4kuna\Fio\Response\Pay;

use h4kuna\Fio\Request\Log\Request;

interface IResponse
{

	function isOk(): bool;


	function status(): string;


	function code(): int;


	function errorMessages(): array;


	function setRequest(Request $request): void;


	function getRequest(): Request;


	function __toString();

}
