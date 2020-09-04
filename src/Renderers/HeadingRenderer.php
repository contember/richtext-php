<?php declare(strict_types = 1);

namespace Contember\RichText\Renderers;

use Contember\RichText\ContentElementRenderer;
use Contember\RichText\Model\ContentElement;
use Nette\Utils\Html;

class HeadingRenderer implements ContentElementRenderer
{
	/** @var array */
	private $attributes;


	public function __construct(array $attributes = [])
	{
		$this->attributes = $attributes;
	}


	public function render(ContentElement $element, Html $children, array $rendererOptions): Html
	{
		return Html::el('h' . $element->options['level'], ($rendererOptions['attributes'] ?? []) + $this->attributes)->setHtml($children);
	}
}
