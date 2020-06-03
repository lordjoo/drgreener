<!doctype html>
<html <?php language_attributes(); ?> >
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php bloginfo('name'); ?><?php wp_title('|'); ?></title>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php wp_head(); ?>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light text-white">
    <div class="container">
        <a class="navbar-brand" href="<?php echo get_home_url() ?>">
            <img src="<?php echo  get_template_directory_uri(); ?>/assets/logo.png" height="50" alt="mdb logo">
        </a>
        <button class="navbar-toggler text-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <form role="search" method="get" id="searchform" action="" class="form-inline">
            <div class="md-form my-0">
                <input class="form-control mr-sm-2" type="text" placeholder="<?php echo (get_bloginfo('language') == 'ar') ? 'البحث':'Search'; ?>"" value="" name="s" id="s" aria-label="Search">
            </div>
        </form>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php menu_html(); ?>
       </div>
    </div>
</nav>
