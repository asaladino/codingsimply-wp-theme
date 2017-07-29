<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php codingsimply_post_thumbnail(); ?>
    <header class="entry-header">
        <?php
        if (is_single()) :
            the_title('<h2 class="entry-title">', '</h2>');
            echo '<hr/>';
        else :
            the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>');
        endif;
        ?>
    </header>
    <?php codingsimply_entry_meta(); ?>
    <hr/>
    <div class="entry-content">
        <?php
        the_content(sprintf(
            __('Continue reading %s', 'codingsimply'),
            the_title('<span class="screen-reader-text">', '</span>', false)
        ));
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
    <?php
    if (is_single() && get_the_author_meta('description')) :
        get_template_part('author-bio');
    endif;
    ?>
</article>