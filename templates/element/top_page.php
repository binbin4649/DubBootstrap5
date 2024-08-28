<!-- [DubBootstrap5.topPage] -->
<?php

?>
<section class="mb-5 mx-3">
    <h1 class="fs-4">それも昔たしかその試験顔</h1>
    <p>
        それも昔たしかその試験顔という事の他をもっですたい。ようやく十月に自覚家はよほどそのお話しますうかもに装うてつけますがも仕事云っだないから、当然とは聴いませませなた。自己でよっないはずはいくら時分をひょろひょろなますまし。
    </p>
    <a href="#" class="btn btn-primary">Primary</a>
</section>
<section class="row mb-5 mx-3">
    <?php
    $cards = $this->DubBootstrap5->getCustomEntries(2, 99); //トップカード
    foreach ($cards as $card):
    ?>
        <div class="col-md-4 mb-3">
            <div class="card">
                <?php $this->DubBootstrap5->customImg($card, ['class' => 'card-img-top']); ?>
                <div class="card-body">
                    <h5 class="card-title"><?= $card->title ?></h5>
                    <p class="card-text"><?= $card->text_60 ?></p>
                    <a href="<?= $card->text_normal ?>" class="btn btn-primary"><?= $card->text_10 ?></a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</section>
<section class="mb-3 mx-3">
    <h4 class="fs-6 text-muted border-bottom mb-3 mb-md-4">Publication</h4>
    <?php
    // $publications = $this->DubBootstrap5->getCustomUnlimited(1); //パブリケーション
    $publications = $this->DubBootstrap5->getCustomEntries(1, 99);
    $counter = 0; //内側、3回ワンセット。外側、6回ワンセット
    foreach ($publications as $pub) {
        if ($counter === 0) {
            echo '<article class="row"><div class="col-md mb-3"><div class="row flex-nowrap">';
        }
        if ($counter === 3) {
            echo '<div class="col-md mb-3"><div class="row flex-nowrap">';
        }

        echo '<div class="col"><a href="' . $pub->url . '" target="_blank">';
        $this->DubBootstrap5->customImg($pub, ['class' => 'img-fluid rounded mx-auto d-block']);
        echo '</a></div>';

        $counter++;
        if ($counter === 3) {
            echo '</div></div>';
        }
        if ($counter === 6) {
            echo '</div></div></article>';
            $counter = 0;
        }
    }
    if ($counter > 0) { //6回まわっていなければ足りない分を足す
        for ($i = $counter; $i < 6; $i++) {
            if ($counter === 3) {
                echo '<div class="col-md mb-3"><div class="row flex-nowrap">';
            } elseif ($counter < 3 && $i === 3) {
                echo '</div></div><div class="col-md mb-3"><div class="row flex-nowrap">';
            }
            echo '<div class="col"></div>';
        }
        echo '</div></div></article>';
    }
    ?>
</section>