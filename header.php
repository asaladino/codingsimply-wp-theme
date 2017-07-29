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
<div id="page" class="site">
    <header id="masthead" class="site-header">
        <div data-sticky-container>
            <div class="top-bar" id="main-menu" data-sticky data-options="marginTop:0;" style="width:100%">
                <div class="top-bar-left">
                    <ul class="menu hide-for-small-only" data-dropdown-menu>
                        <li class="menu-text">
                            <?php //codingsimply_the_custom_logo(); ?>

                            <?php bloginfo('name'); ?>
                            <?php
                            $description = get_bloginfo('description', 'display');
                            if (($description || is_customize_preview()) && false) : ?>
                                <strong class="subheader"><?php echo $description; ?></strong>
                            <?php endif; ?>
                        </li>
                    </ul>
                </div>
                <div class="top-bar-right">
                    <ul class="menu">
                        <?php
                        wp_nav_menu([
                            'container' => false,
                            'theme_location' => 'primary',
                            'items_wrap' => '%3$s'
                        ]); ?>
                        <li><a data-open="search-modal"><i class="fa fa-search"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <div class="tiny reveal" id="search-modal" data-reveal data-animation-in="slide-in-down fast"
         data-animation-out="slide-out-up fast">
        <label>Search
            <?= codingsimply_search_form_modify('') ?>
        </label>
    </div>
    <div id="content" class="site-content">