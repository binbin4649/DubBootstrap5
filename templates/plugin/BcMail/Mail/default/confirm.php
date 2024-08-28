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
 * メールフォーム確認ページ
 *
 * 呼出箇所：メールフォーム
 *
 * @var \BaserCore\View\BcFrontAppView $this
 * @var bool $freezed 確認画面かどうか
 */
$this->BcBaser->freezeMailForm();
$this->BcBaser->setTableToUpload('BcMail.MailMessages');
$this->Mail->token();
$this->BcBaser->js('BcMail.form-submit', true, ['defer'])
?>
<h3 class="fs-6 text-secondary border-bottom mb-3 mb-md-4"><?php $this->BcBaser->contentsTitle() ?></h3>

<p class="m-3">
    [入力内容の確認]<br>
    入力した内容に間違いがなければ「送信する」ボタンをクリックしてください。
</p>

<?php if (!$freezed): ?>
    <?php echo $this->BcBaser->createMailForm($mailMessage, ['url' => $this->BcBaser->getContentsUrl(null, false, null, false) . 'confirm', 'type' => 'file', 'valueSources' => ['context']]) ?>
<?php else: ?>
    <?php echo $this->BcBaser->createMailForm($mailMessage, ['url' => $this->BcBaser->getContentsUrl(null, false, null, false)  . 'submit', 'valueSources' => ['context']]) ?>
<?php endif; ?>

<?php $this->BcBaser->unlockMailFormField('mode') ?>
<?php echo $this->BcBaser->mailFormHidden('mode', ['id' => 'MailMessageMode']) ?>

<section class="mb-5 mx-1 mx-md-5 px-1 px-md-5 small">
    <?php
    if (!empty($mailFields)) {
        foreach ($mailFields as $key => $field) {
            echo '<article class="row m-3">';
            echo '<div class="col-lg-3 text-lg-end text-muted">';
            echo $field->head;
            echo '</div>';
            echo '<div class="col-lg-9">';
            echo $this->BcBaser->mailFormControl(
                $field->field_name,
                array_merge($this->Mailfield->getAttributes($field), [
                    'type' => $field->type,
                    'options' => $this->Mailfield->getOptions($field)
                ])
            ) . (($freezed) ? '&nbsp;' : '');
            echo '</div>';
            echo '</article>';
        }
    }
    ?>
</section>

<section class="text-center mb-5">
    <?php echo $this->BcBaser->mailFormSubmit('戻る', ['div' => false, 'class' => 'form-submit btn btn btn-secondary me-3', 'id' => 'BtnMessageBack']) ?>
    <?php echo $this->BcBaser->mailFormSubmit('送信', ['div' => false, 'class' => 'form-submit btn btn-lg btn-primary px-4', 'id' => 'BtnMessageSubmit']) ?>
</section>
<?php echo $this->BcBaser->endMailForm() ?>