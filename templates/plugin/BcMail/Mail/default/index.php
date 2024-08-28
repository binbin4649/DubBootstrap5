<?php
/*
フォームコントロールのテンプレート：baser-core/config/bc_form.php
@todo checkbox未対応
グルーピング未対応
*/

$this->BcBaser->setTableToUpload('BcMail.MailMessages');
$this->Mail->token();
$this->BcBaser->js('BcMail.form-submit', true, ['defer'])
?>
<h3 class="fs-6 text-secondary border-bottom mb-3 mb-md-4"><?php $this->BcBaser->contentsTitle() ?></h3>
<?php if (!$error): ?>
    <?php if ($this->BcBaser->mailFormDescriptionExists()): ?>
        <p class="m-3"><?php $this->BcBaser->mailFormDescription() ?></p>
    <?php endif ?>
<?php endif; ?>

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
            if ($field->type == 'radio') {
                echo '<article class="row mb-2 py-2">';
                echo '<div class="col-lg-3 text-lg-end pb-2">';
                echo $field->head;
                echo '</div>';
                echo '<div class="col-lg-9">';
                echo $this->BcBaser->mailFormControl(
                    $field->field_name,
                    array_merge($this->Mailfield->getAttributes($field), [
                        'type' => 'radio',
                        'options' => $this->Mailfield->getOptions($field)
                    ], ['class' => 'form-check-input', 'label' => ['class' => ['form-check-label']]])
                );
            } else {
                echo '<article class="row mb-3">';
                echo '<label for="' . "MailMessage." . $field->field_name . "" . '" class="col-lg-3 col-form-label text-lg-end">';
                echo $field->head;
                if ($field->not_empty) {
                    echo '<small class="text-danger ms-1">（必須）</small>';
                }
                echo '</label>';
                echo '<div class="col-lg-9">';
                echo $this->BcBaser->mailFormControl(
                    $field->field_name,
                    array_merge($this->Mailfield->getAttributes($field), [
                        'type' => $field->type,
                        'options' => $this->Mailfield->getOptions($field)
                    ], ['class' => 'form-control'])
                );
            }
            if (!empty($field->description)) {
                echo '<small class="text-muted">' . $field->description . '</small>';
            }
            echo $this->BcBaser->mailFormError($field->field_name);
            echo '</div>';
            echo '</article>';
        }
    }
    ?>

</section>
<section class="text-center mb-5">
    <?php echo $this->BcBaser->mailFormSubmit('確認', ['div' => false, 'class' => 'btn btn-lg btn-primary px-4', 'id' => 'BtnMessageConfirm']) ?>
</section>
<?php echo $this->BcBaser->endMailForm() ?>