<?php get_header(); ?>
<div class="row">
    <div class="large-8 columns">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
                <?php
                while (have_posts()) : the_post();
                    get_template_part('content', 'page');
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                endwhile; ?>
            </main>
        </div>
    </div>
    <div class="large-4 columns">
        <div id="sidebar" class="sidebar">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
