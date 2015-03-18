<html>
    <head>
        <title>title</title>
        <link rel="stylesheet" href="<?php echo URL; ?>public/css/default.css"/>
        <script src="<?php echo URL; ?>public/js/jquery.js" type="text/javascript"></script>
        <script src="<?php echo URL; ?>public/js/custom.js" type="text/javascript"></script>
    </head>
    <body>
    
    <?php Session::init(); ?>
        
        <div id="header">
            Header
            <br />
            <a href="<?php echo URL; ?>index">Index</a>
            <a href="<?php echo URL; ?>help">Help</a>
            <?php if (Session::get('loggedIn') == true):?>
            <a href="<?php echo URL; ?>dashboard/logout">Logout</a>
            <?php else: ?>
            <a href="<?php echo URL; ?>login">Login</a>
            <?php endif; ?>
        </div>
        
        <div id="content">