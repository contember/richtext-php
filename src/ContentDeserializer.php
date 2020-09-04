<?php declare(strict_types = 1);

namespace Contember\RichText;

use Contember\RichText\Model\ContentElement;
use Contember\RichText\Model\ContentLeaf;
use Contember\RichText\Model\ContentNode;
use Contember\RichText\Model\ContentRoot;

class ContentDeserializer
{
	/**
	 * @param mixed[] $json
	 */
	public static function deserializeRoot(array $json): ContentRoot
	{
		return new ContentRoot($json['formatVersion'], self::deserializeChildren($json['children']));
	}


	/**
	 * @return ContentNode[
	 * @return ContentNode[]
	 */
	public static function deserializeChildren(array $children): array
	{
		$nodes = [];
		foreach ($children as $child) {
			if (isset($child['text'])) {
				$text = $child['text'];
				$options = $child;
				unset($options['text']);
				$nodes[] = new ContentLeaf($text, $options);
			} elseif (isset($child['type'])) {
				$subChildren = self::deserializeChildren($child['children'] ?? []);
				$options = $child;
				unset($options['children'], $options['type']);
				$nodes[] = new ContentElement($subChildren, $child['type'], $options);
			} else {
				throw new ContentException("Invalid child type");
			}
		}
		return $nodes;
	}
}
