<?php declare(strict_types = 1);

namespace Contember\RichText;

use Contember\RichText\Model\ContentElement;
use Contember\RichText\Model\ContentLeaf;
use Contember\RichText\Model\ContentRoot;
use Nette\Utils\Html;

class ContentRenderer
{
	/** @var array<string, ContentElementRenderer> */
	private $elementRenderers = [];

	/** @var array<string, ContentLeafRenderer> */
	private $leafRenderers = [];


	public function registerElementRenderer(string $type, ContentElementRenderer $renderer): void
	{
		$this->elementRenderers[$type] = $renderer;
	}


	public function registerLeafRenderer(string $option, ContentLeafRenderer $renderer): void
	{
		$this->leafRenderers[$option] = $renderer;
	}


	public function render(ContentRoot $root, array $rendererOptions = []): Html
	{
		return $this->renderChildren($root->children, $rendererOptions);
	}


	public function renderChildren(array $children, array $rendererOptions): Html
	{
		$content = Html::el();
		foreach ($children as $child) {
			if ($child instanceof ContentElement) {
				$content->addHtml($this->renderElement($child, $rendererOptions));
			} elseif ($child instanceof ContentLeaf) {
				$content->addHtml($this->renderLeaf($child, $rendererOptions));
			}
		}
		return $content;
	}


	public function renderElement(ContentElement $element, array $rendererOptions): Html
	{
		if (!isset($this->elementRenderers[$element->type])) {
			throw new ContentException(sprintf('Renderer for element %s not found', $element->type));
		}
		$renderer = $this->elementRenderers[$element->type];
		assert($renderer instanceof ContentElementRenderer);
		return $renderer->render($element, $this->renderChildren($element->children, $rendererOptions), $rendererOptions['element'][$element->type] ?? []);
	}


	public function renderLeaf(ContentLeaf $leaf, array $rendererOptions): Html
	{
		$html = Html::el()->setText($leaf->text);

		foreach ($leaf->options as $key => $value) {
			if ($value === null) {
				continue;
			}
			if (!isset($this->leafRenderers[$key])) {
				throw new ContentException(sprintf('Renderer for leaf option %s not found', $key));
			}
			$renderer = $this->leafRenderers[$key];
			assert($renderer instanceof ContentLeafRenderer);
			$html = $renderer->render($leaf, $value, $html, $rendererOptions['leaf'][$key] ?? []);
		}

		return $html;
	}
}
