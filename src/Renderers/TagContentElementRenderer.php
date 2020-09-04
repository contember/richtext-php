<?php declare(strict_types = 1);

namespace Contember\RichText\Renderers;

use Contember\RichText\ContentElementRenderer;
use Contember\RichText\Model\ContentElement;
use Nette\Utils\Html;

class TagContentElementRenderer implements ContentElementRenderer
{
	/** @var string */
	private $htmlTag;

	/** @var array */
	private $attributes;


	public function __construct(string $htmlTag, array $attributes = [])
	{
		$this->htmlTag = $htmlTag;
		$this->attributes = $attributes;
	}


	public function render(ContentElement $element, Html $children, array $rendererOptions): Html
	{
		return Html::el($this->htmlTag, ($rendererOptions['attributes'] ?? []) + $this->attributes)->setHtml($children);
	}
}
