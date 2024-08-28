<?php

/**
 * ブログ詳細ページ
 */
$this->BcBaser->setDescription($this->Blog->getTitle() . '｜' . $this->Blog->getPostContent($post, false, false, 50));
$eyecatch = $this->Blog->getEyeCatch($post, ['link' => false, 'class' => 'img-fluid rounded mx-auto d-block', 'alt' => $this->Blog->getPostTitle($post, false, [])]);

$prevPost = $this->Blog->getPrevPost($post);
$nextPost = $this->Blog->getNextPost($post);
if ($prevPost) {
    $prevPostTtile = "＜ " . $this->Blog->getPostTitle($prevPost, false);
    $prevPostLink = $this->Blog->getPostLink($prevPost, $prevPostTtile);
} else {
    $prevPostLink = '<span class="text-muted mx-3">＜ </span>';
}
if ($nextPost) {
    $nextPostTitle = $this->Blog->getPostTitle($nextPost, false) . " ＞";
    $nextPostLink = $this->Blog->getPostLink($nextPost, $nextPostTitle);
} else {
    $nextPostLink = '<span class=" text-muted mx-3"> ＞</span>';
}

?>

<h3 class="fs-6 text-secondary border-bottom mb-4"><?php $this->BcBaser->blogPostCategory($post, ['link' => false]) ?></h3>
<h1 class="fs-4 mb-3"><?= $this->Blog->getPostTitle($post, false, []) ?></h1>
<nav class="mb-3 mb-md-4">
    <span class="text-muted small">
        <?php $this->Blog->postDate($post) ?>
        <?php $this->BcBaser->blogPostCategory($post, ['class' => 'ms-1']) ?>
    </span>
    <span class="fs-5 ms-4">
        <a href="" target="_blank" class="me-2"><i class="bi bi-facebook facebook-dub"></i></a>
        <a href="" target="_blank" class="me-2"><i class="bi bi-twitter-x twitter-dub"></i></a>
        <a href="" target="_blank" class="me-2"><i class="bi bi-line line-dub"></i></a>
    </span>
</nav>
<?php if ($eyecatch): ?>
    <figure class="mb-3 mb-md-4"><?= $eyecatch ?></figure>
<?php endif; ?>
<section class="mb-3 mb-md-4 border-bottom">
    <?php $this->Blog->postContent($post) ?>
</section>

<nav class="text-center mb-3 mb-md-4">
    <?= $prevPostLink ?>
    <span class="mx-3">|</span>
    <?= $nextPostLink ?>
</nav>