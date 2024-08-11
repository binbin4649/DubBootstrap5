<?php

namespace DubBootstrap5\View\Helper;

use Cake\View\Helper;

/**
 * DubThemeBootstrap5Helper
 *
 * テーマで利用したヘルパー（表示用関数）を記載したい場合にはここに記載します。
 * クラス名は任意です。Helperフォルダに配置したヘルパーが利用できます。
 *
 * 利用例：<?php $this->DubThemeBootstrap5->show() ?>
 */

// [DubBootstrap5.topPage]
class DubBootstrap5Helper extends Helper
{
	public function topPage()
	{
		return $this->_View->element('DubBootstrap5.top_page');
	}
}
