<?php
if (!defined('__TYPECHO_ADMIN__')) {
    exit;
}

$header = '<link rel="stylesheet" href="' . $options->adminStaticUrl('css', 'normalize.css', true) . '">
<link rel="stylesheet" href="' . $options->adminStaticUrl('css', 'grid.css', true) . '">
<link rel="stylesheet" href="' . $options->adminStaticUrl('css', 'style.css', true) . '">
<link href="https://cdn.jsdelivr.net/gh/wordpress-premium/font-awesome-pro@7ab451a50c28f3a7b9f3fa425ef7570f3bf345bc/css/all.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/gh/wordpress-premium/font-awesome-pro@7ab451a50c28f3a7b9f3fa425ef7570f3bf345bc/css/all.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/wordpress-premium/font-awesome-pro@7ab451a50c28f3a7b9f3fa425ef7570f3bf345bc/js/all.js"></script>
<script src="https://cdn.jsdelivr.net/gh/wordpress-premium/font-awesome-pro@7ab451a50c28f3a7b9f3fa425ef7570f3bf345bc/js/all.min.js"></script>';

/** Đăng ký khởi tạo plugin */
$header = \Typecho\Plugin::factory('admin/header.php')->header($header);

?><!DOCTYPE HTML>
<html lang="vi">
    <head>
        <meta charset="<?php $options->charset(); ?>">
        <meta name="renderer" content="webkit">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title><?php _e('%s - %s', $menu->title, $options->title); ?></title>
        <meta name="robots" content="noindex, nofollow">
        <link rel="shortcut icon" href="/images/favicon.ico" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
        <?php echo $header; ?>
    </head>
    <body<?php if (isset($bodyClass)) {echo ' class="' . $bodyClass . '"';} ?>>
