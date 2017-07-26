<div class="row">
    <div class="large-12 columns">
        <div class="author-info">
            <h2 class="author-heading"><?php _e('Published by', 'codingsimply'); ?></h2>
            <div class="author-avatar">
                <?php
                $author_bio_avatar_size = apply_filters('codingsimply_author_bio_avatar_size', 56);
                echo get_avatar(get_the_author_meta('user_email'), $author_bio_avatar_size);
                ?>
            </div>
            <div class="author-description">
                <h3 class="author-title"><?php echo get_the_author(); ?></h3>
                <p class="author-bio">
                    <?php the_author_meta('description'); ?>
                    <a class="author-link"
                       href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"
                       rel="author">
                        <?php printf(__('View all posts by %s', 'codingsimply'), get_the_author()); ?>
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>