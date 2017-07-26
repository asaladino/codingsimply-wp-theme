<?php get_header(); ?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <nav id="image-navigation" class="navigation image-navigation">
                    <div class="nav-links">
                        <div class="nav-previous"><?php previous_image_link(false, __('Previous Image', 'codingsimply')); ?></div>
                        <div class="nav-next"><?php next_image_link(false, __('Next Image', 'codingsimply')); ?></div>
                    </div>
                </nav>

                <header class="entry-header">
                    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                </header>

                <div class="entry-content">
                    <div class="entry-attachment">
                        <?php
                        $image_size = apply_filters('codingsimply_attachment_size', 'large');
                        echo wp_get_attachment_image(get_the_ID(), $image_size);
                        ?>
                        <?php if (has_excerpt()) : ?>
                            <div class="entry-caption">
                                <?php the_excerpt(); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php
                    the_content();
                    wp_link_pages(array(
                        'before' => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'codingsimply') . '</span>',
                        'after' => '</div>',
                        'link_before' => '<span>',
                        'link_after' => '</span>',
                        'pagelink' => '<span class="screen-reader-text">' . __('Page', 'codingsimply') . ' </span>%',
                        'separator' => '<span class="screen-reader-text">, </span>',
                    ));
                    ?>
                </div>
                <footer class="entry-footer">
                    <?php codingsimply_entry_meta(); ?>
                    <?php edit_post_link(__('Edit', 'codingsimply'), '<span class="edit-link">', '</span>'); ?>
                </footer>
            </article>

            <?php
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;
            the_post_navigation(array(
                'prev_text' => _x('<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'codingsimply'),
            ));
        endwhile; ?>
    </main>
</div>
<?php get_footer(); ?>