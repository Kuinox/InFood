<?php session_start(); ?>
<head>
    <meta charset="UTF-8">
    <title>In'Food</title>
    <?php $path = "/".explode("/", $_SERVER['REQUEST_URI'])[1]."/"; ?>
    <link rel="stylesheet" href="<?php echo $path ?>ressources/styles.css">
    <script src="<?php echo $path ?>js/formsDisplay.js"></script>
    <script src="<?php echo $path ?>js/formSender.js"></script>
    <script src="<?php echo $path ?>js/profilBar.js"></script>
    <script src="<?php echo $path ?>js/filter.js"></script>
    <script src="<?php echo $path ?>js/imageLoader.js"></script>
</head>
