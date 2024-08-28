<?php

/**
 * baserCMS :  Based Website Development Project <https://basercms.net>
 * Copyright (c) NPO baser foundation <https://baserfoundation.org/>
 *
 * @copyright     Copyright (c) NPO baser foundation
 * @link          https://basercms.net baserCMS Project
 * @since         5.0.0
 * @license       https://basercms.net/license/index.html MIT License
 */

/**
 * メールフォーム送信完了ページ
 *
 * 呼出箇所：メールフォーム
 *
 * @var \BcMail\View\MailFrontAppView $this
 * @var array $mailContent メールコンテンツデータ
 * 
 * @var mailContent $mailContent 
 */

use Cake\Core\Configure;

if (Configure::read('debug') == 0 && $mailContent->redirect_url) {
    $this->BcBaser->meta(['http-equiv' => 'Refresh'], null, ['content' => '5;url=' . $mailContent->redirect_url, 'block' => true]);
}
?>

<h3 class="fs-6 text-secondary border-bottom mb-3 mb-md-4"><?php $this->BcBaser->contentsTitle() ?></h3>

<p class="m-3">
    [メール送信完了]<br>
    お問い合わせ頂きありがとうございました。
    確認次第、ご連絡させて頂きます。
</p>

<?php if (!$this->BcBaser->isDebug() && $mailContent->redirect_url): ?>
    <p>※<?php echo __d('baser_core', '{0} 秒後にトップページへ自動的に移動します。', 5) ?></p>
    <p><a href="<?php echo $mailContent->redirect_url; ?>"><?php echo __d('baser_core', '移動しない場合はコチラをクリックしてください。') ?></a></p>
<?php endif; ?>