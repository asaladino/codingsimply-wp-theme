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
    <div class="off-canvas-wrapper">
        <div class="off-canvas position-left" id="offCanvas" data-off-canvas>
            <div class="row">
                <div class="large-12 columns">
                    <p>
                        <h3>Options</h3>
                    </p>
                    <ul class="menu vertical">
                        <?php
                        wp_nav_menu([
                            'container' => false,
                            'theme_location' => 'primary',
                            'items_wrap' => '%3$s'
                        ]); ?>
                        <li><a data-open="search-modal">Search</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="off-canvas-content" data-off-canvas-content>
            <header id="masthead" class="site-header">
                <div data-sticky-container>
                    <div class="top-bar" id="main-menu" data-sticky data-sticky-on="small" data-options="marginTop:0;"
                         data-top-anchor="1"  style="width:100%">
                        <div class="top-bar-left">
                            <ul class="menu" data-dropdown-menu>
                                <li class="show-for-small-only">
                                    <a data-toggle="offCanvas">
                                        <i class="fa fa-bars"></i>
                                    </a>
                                </li>
                                <li class="menu-text">
                                    <?php //codingsimply_the_custom_logo(); ?>
                                    <?php bloginfo('name'); ?>
                                </li>
                            </ul>
                        </div>
                        <div class="top-bar-right">
                            <ul class="menu hide-for-small-only">
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
	                <?= codingsimply_search_form_modify( '' ) ?>
                </label>
                <button class="close-button" data-close aria-label="Close modal" type="button">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="content" class="site-content">