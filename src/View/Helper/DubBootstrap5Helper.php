<?php

namespace DubBootstrap5\View\Helper;

use Cake\View\Helper;
use BcCustomContent\Service\CustomContentsServiceInterface;
use BcCustomContent\Service\CustomEntriesServiceInterface;
use BaserCore\Utility\BcContainerTrait;
use BcCustomContent\Model\Entity\CustomEntry;

/**
 * DubThemeBootstrap5Helper
 *
 * テーマで利用したヘルパー（表示用関数）を記載したい場合にはここに記載します。
 * クラス名は任意です。Helperフォルダに配置したヘルパーが利用できます。
 *
 * 利用例：<?php $this->DubBootstrap5->show() ?>
 */


class DubBootstrap5Helper extends Helper
{
	use BcContainerTrait;

	public $helpers = [
		'BaserCore.BcBaser',
		'BcBlog.Blog'
	];

	// [DubBootstrap5.topPage]
	public function topPage()
	{
		return $this->_View->element('DubBootstrap5.top_page');
	}

	// custom_content file(img)にパスを付けてimgタグを返す
	// @oaram CustomEntry $entry
	// @param array $options
	public function customImg(CustomEntry $entry, array $options = [])
	{
		if (empty($entry->img)) {
			return '';
		}
		$path = '/files/bc_custom_content/' . $entry->custom_table_id . '/custom_entries/' . $entry->img;
		$params = array_merge([
			'alt' => $entry->title
		], $options);
		return $this->BcBaser->img($path, $params);
	}

	// $customContent = カスタムコンテンツの実体id
	// @param mixed $customContent
	public function getCustomUnlimited($customContent)
	{
		if (is_integer($customContent)) {
			$customContent = $this->getService(CustomContentsServiceInterface::class)->get($customContent);
		}
		$this->entriesService = $this->getService(CustomEntriesServiceInterface::class);
		$this->entriesService->setup($customContent->custom_table_id);
		$params = [
			'contain' => ['CustomTables' => ['CustomContents' => ['Contents']]],
			'order' => $customContent->list_order,
			'direction' => $customContent->list_direction
		];
		return $this->entriesService->getIndex($params)->toList();
	}

	// @param int $custom_table_id
	public function getCustomTable(int $custom_table_id)
	{
		$this->entriesService = $this->getService(CustomEntriesServiceInterface::class);
		$this->entriesService->setup($custom_table_id);
		$params = [
			// 'contain' => ['CustomTables' => ['CustomContents' => ['Contents']]],
			'order' => 'id',
			'direction' => 'ASC'
		];
		return $this->entriesService->getIndex($params)->toList();
	}

	public function getSidePost()
	{
		return $this->Blog->getPosts('news', 5);
	}

	public function getSideCategory()
	{
		$return = [];
		$categories = $this->BcBaser->getBlogCategories(['blogContentId' => 1]); //blogContentId = 実体ID
		foreach ($categories as $category) {
			$return[$category->title] = $this->Blog->getCategoryUrl($category->id);
		}
		return $return;
	}

	/**
	 * カスタムエントリーの一覧を取得する
	 *
	 * @param entity or int $customContent
	 * @param int $num
	 * @param array $options
	 * @return mixed
	 *
	 * @checked
	 * @noTodo
	 * @unitTest
	 * 
	 * $customContent = カスタムコンテンツの実体id
	 * $entries = $this->DubBootstrap5->getCustomEntries(3, 100);
	 */
	public function getCustomEntries($customContent, int $num = 5, array $options = [])
	{
		// $customContentが entityId だった場合
		if (is_integer($customContent)) {
			$customContent = $this->getService(CustomContentsServiceInterface::class)->get($customContent, [
				'status' => 'publish'
			]);
		}
		$this->entriesService = $this->getService(CustomEntriesServiceInterface::class);
		$this->entriesService->setup($customContent->custom_table_id);
		$params = array_merge([
			'contain' => ['CustomTables' => ['CustomContents' => ['Contents']]],
			'status' => 'publish',
			'order' => $customContent->list_order,
			'direction' => $customContent->list_direction,
			'limit' => $num
		], $options);
		return $this->entriesService->getIndex($params)->toList();
	}
}
