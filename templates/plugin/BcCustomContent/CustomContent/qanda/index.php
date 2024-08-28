<?php
$categories = $this->DubBootstrap5->getCustomTable(5); // 5 = custom_table_id
$qa_category = null;
$params = $this->BcBaser->getParams();
if (isset($params['?']['qa_category']) && !empty($params['?']['qa_category'])) {
    $qa_category = $params['?']['qa_category'];
}
?>

<h3 class="fs-6 text-secondary border-bottom mb-3 mb-md-4"><?php $this->BcBaser->contentsTitle() ?></h3>

<p class="m-3">
    <?php $this->BcBaser->customContentDescription($customContent) ?>
</p>

<?php if (is_null($qa_category)): ?>
    <section class="mb-4 mb-md-5 mx-3">
        <ul>
            <?php foreach ($categories as $category): ?>
                <li class="mb-2"><a href="/qanda/?qa_category=<?= $category->id ?>"><?= $category->title ?></a></li>
            <?php endforeach; ?>
        </ul>
    </section>
<?php else: ?>
    <section class="mb-4 mb-md-5 mx-3">
        <ul>
            <?php foreach ($categories as $category): ?>
                <?php if ($category->id == $qa_category): ?>
                    <li class="mb-2"><?= $category->title ?></li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </section>
<?php endif; ?>

<section class="mb-5 mx-3">
    <div class="accordion" id="accordion">
        <?php foreach ($customEntries as $key => $entry): ?>

            <article class="accordion-item">
                <h2 class="accordion-header" id="heading<?= $key ?>">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $key ?>" aria-expanded="false" aria-controls="collapse<?= $key ?>">
                        <?= $entry->title ?>
                    </button>
                </h2>
                <div id="collapse<?= $key ?>" class="accordion-collapse collapse" aria-labelledby="heading<?= $key ?>" data-bs-parent="#accordion">
                    <div class="accordion-body">
                        <p><?= nl2br($entry->textarea_large) ?></p>
                    </div>
                </div>
            </article>

        <?php endforeach; ?>
    </div>
</section>

<?php if (!is_null($qa_category)): ?>
    <section class="mb-4 mb-md-5 mx-3">
        <ul>
            <?php foreach ($categories as $category): ?>
                <li class="mb-2"><a href="/qanda/?qa_category=<?= $category->id ?>"><?= $category->title ?></a></li>
            <?php endforeach; ?>
        </ul>
    </section>
<?php endif; ?>

<section class="mb-5 mx-3">
    <h4 class="fs-6 text-secondary border-bottom mb-3 mb-md-4">お問い合わせ</h4>
    <p class="small">ご質問、ご意見等、お問い合わせはこちらから、お気軽にどうぞ。</p>
    <a href="#" type="button" class="btn btn-outline-primary">お問い合わせ</a>
</section>