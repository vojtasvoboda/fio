<?php declare(strict_types=1);

namespace h4kuna\Fio\Request\Log;

use h4kuna\Fio\Exceptions\InvalidState;

class Request
{

	/** @var string */
	public $url;

	/** @var string */
	public $token;

	/** @var array */
	public $post;

	/** @var string */
	public $filename;


	public function __construct(string $url, string $token, array $post, string $filename)
	{
		$this->url = $url;
		$this->token = $token;
		$this->post = $post;
		$this->filename = $filename;
	}


	public function getContent(): string
	{
		$content = @file_get_contents($this->filename);
		if ($content === false) {
			throw new InvalidState(sprintf('File "%s" is not readable or missing.', $this->filename));
		}
		return $content;
	}

}
