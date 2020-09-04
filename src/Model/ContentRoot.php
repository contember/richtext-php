<?php declare(strict_types = 1);

namespace Contember\RichText\Model;

class ContentRoot
{
	/** @var int */
	public $formatVersion;

	/** @var ContentNode[] */
	public $children;


	/**
	 * @param ContentNode[] $children
	 */
	public function __construct(int $formatVersion, array $children)
	{
		$this->formatVersion = $formatVersion;
		$this->children = $children;
	}
}
