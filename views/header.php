<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/default.css"/>
    <script src="<?php echo URL; ?>public/js/jquery.js" type="text/javascript"></script>
    <script src="<?php echo URL; ?>public/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo URL; ?>public/js/custom.js" type="text/javascript"></script>
    <?php
    if (isset($this->js)) {
        foreach ($this->js as $js) {
            echo '<script src="'. URL .'views/'. $js .'" type="text/javascript"></script>';
        }
    }
    ?>
</head>
<body>

<?php Session::init(); ?>

<header id="header">
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mvc-navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo URL; ?>index">MVC</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="mvc-navbar-collapse">
          <ul class="nav navbar-nav">
            <?php if (Session::get('loggedIn') == false):?>
            <li class=""><a href="<?php echo URL; ?>index">Index <span class="sr-only">(current)</span></a></li>
            <li><a href="<?php echo URL; ?>help">Help</a></li>
            <?php endif; ?>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <?php if (Session::get('loggedIn') == true):?>
                <li><a href="<?php echo URL; ?>dashboard">Dashboard</a></li>
                
                <?php if (Session::get('role') == 'owner'):?>
                    <li><a href="<?php echo URL; ?>user">Users</a></li>
                <?php endif; ?>

                <li><a href="<?php echo URL; ?>dashboard/logout">Logout</a></li>
            <?php else: ?>
                <li><a href="<?php echo URL; ?>login">Login</a></li>
            <?php endif; ?>
        </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
</header>