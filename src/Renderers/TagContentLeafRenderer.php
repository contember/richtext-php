<?php declare(strict_types = 1);

namespace Contember\RichText\Renderers;

use Contember\RichText\ContentLeafRenderer;
use Contember\RichText\Model\ContentLeaf;
use Nette\Utils\Html;

class TagContentLeafRenderer implements ContentLeafRenderer
{
	/** @var string */
	private $htmlTag;


	public function __construct(string $htmlTag)
	{
		$this->htmlTag = $htmlTag;
	}


	public function render(ContentLeaf $leaf, $value, Html $children, array $rendererOptions): Html
	{
		if ($value === true) {
			return Html::el($this->htmlTag)->setHtml($children);
		}
		return $children;
	}
}
