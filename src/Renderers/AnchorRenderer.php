<?php declare(strict_types = 1);

namespace Contember\RichText\Renderers;

use Contember\RichText\ContentElementRenderer;
use Contember\RichText\Model\ContentElement;
use Nette\Utils\Html;

class AnchorRenderer implements ContentElementRenderer
{
	public function render(ContentElement $element, Html $children, array $rendererOptions): Html
	{
		return Html::el('a', ['href' => $element->options['href']])->setHtml($children);
	}
}
