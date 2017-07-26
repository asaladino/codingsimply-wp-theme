<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
    <header id="masthead" class="site-header" role="banner">
        <div class="title-bar" data-responsive-toggle="main-menu" data-hide-for="medium">
            <button class="menu-icon" type="button" data-toggle="example-menu"></button>
            <div class="title-bar-title"><?php bloginfo('name'); ?></div>
        </div>

        <div class="top-bar" id="main-menu" data-animate="hinge-in-from-top spin-out">
            <div class="top-bar-left">
                <ul class="dropdown menu" data-dropdown-menu>
                    <li class="menu-text hide-for-small-only">
                        <?php codingsimply_the_custom_logo(); ?>
                        <h3 class="site-title">
                            <a href="<?php echo esc_url(home_url('/')); ?>"
                               rel="home"><?php bloginfo('name'); ?></a>
                        </h3>
                        <?php
                        $description = get_bloginfo('description', 'display');
                        if (($description || is_customize_preview()) && false) : ?>
                            <strong class="subheader"><?php echo $description; ?></strong>
                        <?php endif; ?>
                    </li>
                    <?php
                    wp_nav_menu([
                        'container' => false,
                        'theme_location' => 'primary',
                        'items_wrap' => '%3$s'
                    ]); ?>
                </ul>
            </div>
            <div class="top-bar-right">
                </form>
            </div>
        </div>
    </header>
    <div id="content" class="site-content">