<!DOCTYPE html>
<!-- wwwko CTRL-A Club Management System -->
<html lang="en">
<head>
    <title><?php echo $page_title ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <?php echo $meta_content ?>

    <link rel="stylesheet" href="<?php echo URL::base() ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo URL::base() ?>css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="<?php echo URL::base() ?>css/wwwko.css">
    <?php echo $css_content ?>

    <?php echo $head_content ?>
</head>
<body>
<div id="wrap">
    <?php echo $header ?>
    <?php echo $header_content ?>

    <?php echo $body_content ?>
</div>
    <?php echo $footer_content ?>
    <?php echo $footer ?>
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="<?php echo URL::base() ?>js/bootstrap.min.js"></script>
    <?php echo $script_content ?>
</body>
</html>
