<?php

/**
 * ブログトップ
 * @var object $posts
 */
$this->BcBaser->setDescription($this->Blog->getDescription());
?>

<h3 class="fs-6 text-secondary border-bottom mb-5"><?php $this->BcBaser->contentsTitle() ?></h3>

<?php if ($posts->count()): ?>
    <?php foreach ($posts as $post): ?>
        <section class="row mb-4 mx-0 mx-md-3">
            <div class="col-4">
                <a href="<?php echo $this->BcBaser->getBlogPostLinkUrl($post) ?>">
                    <?php $this->BcBaser->blogPostEyeCatch($post, ['class' => 'img-fluid mx-auto', 'link' => false]) ?>
                </a>
            </div>
            <div class="col-8">
                <small class="text-muted">
                    <?php $this->BcBaser->blogPostDate($post, 'Y.m.d') ?>
                    <?php $this->BcBaser->blogPostCategory($post, ['class' => 'ms-1']) ?>
                </small>
                <p>
                    <?php $this->BcBaser->blogPostTitle($post) ?>
                </p>
            </div>
        </section>
    <?php endforeach; ?>
<?php else: ?>
    <section class="row mb-4 mx-0 mx-md-3">
        <p>記事がありません。</p>
    </section>
<?php endif; ?>

<?php $this->BcBaser->pagination('simple'); ?>