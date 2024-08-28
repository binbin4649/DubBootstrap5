<?php

$posts = $this->DubBootstrap5->getSidePost();
$categories = $this->DubBootstrap5->getSideCategory();

?>
<h6 class="text-secondary border-bottom">Latest</h6>
<?php if ($posts): ?>
    <?php foreach ($posts as $post): ?>
        <p class="mx-2">
            <small class="text-muted"><?php $this->BcBaser->blogPostDate($post, 'Y.m.d') ?></small><br>
            <?php $this->BcBaser->blogPostTitle($post) ?>
        </p>
    <?php endforeach; ?>
<?php else: ?>
    <p class="mx-2 small text-muted">記事がありません。</p>
<?php endif ?>

<?php if ($categories): ?>
    <h6 class="text-secondary border-bottom mt-3 mt-md-4 mb-3">Category</h6>
    <ul class="mx-2">
        <?php foreach ($categories as $title => $url): ?>
            <li class="mb-2">
                <a href="<?= $url ?>" class="link-secondary"><?= $title ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif ?>