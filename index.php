<?php get_header(); ?>
    <div class="row">
        <div class="large-12 columns">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">
                    <?php if (have_posts()) : ?>
                        <?php if (is_home() && !is_front_page()) : ?>
                            <header>
                                <h2 class="page-title screen-reader-text"><?php single_post_title(); ?></h2>
                            </header>
                        <?php endif; ?>

                        <?php
                        $i = 0;
                        while (have_posts()) : the_post();
                            if($i % 2 == 0) {
                                echo '<div class="row">';
                            }
                            $post = get_post();
                            echo '<div class="large-6 columns" ><div class="callout no-border">';
                            $image_url = get_the_post_thumbnail_url();
                            if ($image_url !== false) {
                                echo '<a href="' . $post->guid . '"><img class="thumbnail" src="' . $image_url . '"/></a>';
                            }
                            echo '<h3><a href="' . $post->guid . '">' . $post->post_title . '</a></h3>';
                            $description = get_post_custom_values('_genesis_description');
                            if (isset($description[0])) {
                                echo '<p>' . $description[0] . '</p>';
                            }
                            echo "<small>Updated <time>$post->post_modified</time></small>";
                            echo '</div></div>';
                            if($i % 2 == 1) {
                                echo '</div>';
                            }
                            $i++;
                        endwhile;
                        if($i % 2 == 1) {
                            echo '</div>';
                        }
                        the_posts_pagination(array(
                            'prev_text' => __('Previous page', 'codingsimply'),
                            'next_text' => __('Next page', 'codingsimply'),
                            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('Page', 'codingsimply') . ' </span>',
                        ));
                    else :
                        get_template_part('content', 'none');
                    endif; ?>

                </main>
            </div>
        </div>
    </div>
<?php get_footer(); ?>