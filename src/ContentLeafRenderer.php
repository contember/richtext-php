<?php declare(strict_types = 1);

namespace Contember\RichText;

use Contember\RichText\Model\ContentLeaf;
use Nette\Utils\Html;

interface ContentLeafRenderer
{
	/**
	 * @param mixed $value
	 */
	public function render(ContentLeaf $leaf, $value, Html $children, array $rendererOptions): Html;
}
