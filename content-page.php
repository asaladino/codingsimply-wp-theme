<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php codingsimply_post_thumbnail(); ?>
    <header class="entry-header">
        <?php the_title('<h2 class="entry-title">', '</h2>'); ?>
        <hr/>
    </header>
    <div class="entry-content">
        <?php the_content(); ?>
        <?php
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
    <?php edit_post_link(__('Edit', 'codingsimply'), '<footer class="entry-footer"><span class="edit-link">', '</span></footer>'); ?>
</article>