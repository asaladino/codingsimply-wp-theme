<?php
get_header(); ?>

<div class="row">
    <div class="large-8 columns">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
                <?php
                while (have_posts()) : the_post();
                    get_template_part('content', get_post_format());
                    echo '<hr/>';
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                    /*the_post_navigation([
                        'next_text' => '<span class="meta-nav" aria-hidden="true">' . __('Next', 'codingsimply') . '</span> ' .
                            '<span class="screen-reader-text">' . __('Next post:', 'codingsimply') . '</span> ' .
                            '<span class="post-title">%title</span>',
                        'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __('Previous', 'codingsimply') . '</span> ' .
                            '<span class="screen-reader-text">' . __('Previous post:', 'codingsimply') . '</span> ' .
                            '<span class="post-title">%title</span>',
                    ]);*/
                endwhile;?>
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