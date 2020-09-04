<?php declare(strict_types = 1);

namespace Contember\RichText\Model;

class ContentElement implements ContentNode
{
	/** @var ContentNode[] */
	public $children;

	/** @var string */
	public $type;

	/** @var array */
	public $options;


	/**
	 * @param ContentNode[] $children
	 */
	public function __construct(array $children, string $type, array $options)
	{
		$this->children = $children;
		$this->type = $type;
		$this->options = $options;
	}
}
