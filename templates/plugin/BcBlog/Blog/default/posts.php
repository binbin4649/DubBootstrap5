<?php

/**
 * トップページ記事一覧
 * 
 * @var object $posts
 * 
 * $viewVars = $this->getVars();
 */
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