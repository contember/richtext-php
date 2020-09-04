<?php declare(strict_types = 1);

namespace Contember\RichText\Model;

class ContentLeaf implements ContentNode
{
	/** @var string */
	public $text;

	/** @var array */
	public $options;


	public function __construct(string $text, array $options)
	{
		$this->text = $text;
		$this->options = $options;
	}
}
