<?php get_header(); ?>
    <div class="row">
        <div class="large-8 large-push-2 columns">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <?php
                    while (have_posts()) : the_post();
                        get_template_part('content', 'projects');
                        if (comments_open() || get_comments_number()) :
                            comments_template();
                        endif;
                    endwhile; ?>
                </main>
            </div>
        </div>
    </div>
<?php get_footer(); ?>