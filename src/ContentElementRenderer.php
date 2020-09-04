<?php declare(strict_types = 1);

namespace Contember\RichText;

use Contember\RichText\Model\ContentElement;
use Nette\Utils\Html;

interface ContentElementRenderer
{
	/**
	 * @param array[] $rendererOptions
	 */
	public function render(ContentElement $element, Html $children, array $rendererOptions): Html;
}
