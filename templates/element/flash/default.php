<?php

/**
 * フラッシュメッセージ
 *
 * @var \BaserCore\View\BcFrontAppView $this
 * @var string $key
 * @var string $message
 */

switch ($params['class']) {
    case 'notice-message':
        $class = 'alert-primary';
        break;
    case 'alert-message':
        $class = 'alert-danger';
        break;
    case 'warning-message':
        $class = 'alert-warning';
        break;
    case 'info-message':
        $class = 'alert-info';
        break;
    default:
        $class = 'alert-dark';
}

// $class = 'alert-dark';
// if (!empty($params['class'])) {
//     $class = $params['class'];
// }

?>

<div id="<?php echo h($key) ?>Message" class="alert m-3 <?php echo h($class) ?>" role="alert">
    <?php echo str_replace("\n", '<br>', h($message)) ?>
</div>