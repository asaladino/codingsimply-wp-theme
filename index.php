<?php get_header(); ?>
    <div class="row">
        <div class="large-12 columns">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <?php if (have_posts()) : ?>
                        <?php if (is_home() && !is_front_page()) : ?>

                        <?php endif; ?>

                        <?php while (have_posts()) :
                            the_post(); ?>
                            <div class="row">
                                <?php $post = get_post(); ?>
                                <div class="large-8 large-push-2 columns">
                                    <h3><a href="<?= $post->guid ?>"><?= $post->post_title ?></a></h3>
                                    <?php
                                    $description = get_post_custom_values('_genesis_description');
                                    if (isset($description[0])) {
                                        echo '<p>' . $description[0] . '</p>';
                                    }
                                    ?>
                                    <small>Updated
                                        <time><?= $post->post_modified ?></time>
                                    </small>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        <?php
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