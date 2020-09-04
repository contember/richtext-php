<?php declare(strict_types = 1);

namespace Contember\RichText;

use Contember\RichText\Renderers\AnchorRenderer;
use Contember\RichText\Renderers\HeadingRenderer;
use Contember\RichText\Renderers\ScrollTargetRenderer;
use Contember\RichText\Renderers\TagContentElementRenderer;
use Contember\RichText\Renderers\TagContentLeafRenderer;

class DefaultContentRendererFactory
{
	public function create(): ContentRenderer
	{
		$renderer = new ContentRenderer();
		$renderer->registerElementRenderer('anchor', new AnchorRenderer());
		$renderer->registerElementRenderer('heading', new HeadingRenderer());
		$renderer->registerElementRenderer('horizontalRule', new TagContentElementRenderer('hr'));
		$renderer->registerElementRenderer('listItem', new TagContentElementRenderer('li'));
		$renderer->registerElementRenderer('orderedList', new TagContentElementRenderer('ol'));
		$renderer->registerElementRenderer('unorderedList', new TagContentElementRenderer('ul'));
		$renderer->registerElementRenderer('paragraph', new TagContentElementRenderer('p'));
		$renderer->registerElementRenderer('scrollTarget', new ScrollTargetRenderer());

		$renderer->registerLeafRenderer('isCode', new TagContentLeafRenderer('code'));
		$renderer->registerLeafRenderer('isStruckThrough', new TagContentLeafRenderer('s'));
		$renderer->registerLeafRenderer('isHighlighted', new TagContentLeafRenderer('em'));
		$renderer->registerLeafRenderer('isUnderlined', new TagContentLeafRenderer('u'));
		$renderer->registerLeafRenderer('isItalic', new TagContentLeafRenderer('i'));
		$renderer->registerLeafRenderer('isBold', new TagContentLeafRenderer('b'));

		return $renderer;
	}
}
