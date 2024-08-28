<?php
// $this->helpers()->unload('BcForm');
// $this->loadHelper('BaserCore.BcForm', ['templates' => 'DubBootstrap5.bc_form']);
// 
?>
<!doctype html>
<html lang="ja">

<head>
    <?php $this->BcBaser->title() ?>
    <?php $this->BcBaser->metaDescription() ?>
    <?php $this->BcBaser->metaKeywords() ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <?php $this->BcBaser->css('custom.css') ?>
    <?php $this->BcBaser->scripts() ?>
</head>

<body>
    <?php $this->BcBaser->func() ?>
    <?php $this->BcBaser->header() ?>
    <?php $this->BcBaser->element('status_header') ?>

    <?php if ($this->BcBaser->isHome()) : ?>
        <?php $this->BcBaser->element('jumbotron') ?>
    <?php endif ?>

    <div class="container mt-5">
        <div class="row">
            <main class="col-lg-9 mb-5">
                <?php $this->BcBaser->flash() ?>
                <?php $this->BcBaser->content() ?>
            </main>
            <aside class="col-lg-3 mt-5 mt-md-0 mb-5">
                <?php $this->BcBaser->element('sidebar') ?>
            </aside>
        </div>
    </div>
    <?php $this->BcBaser->footer() ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>