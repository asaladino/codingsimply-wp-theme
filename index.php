<?php get_header(); ?>
    <div class="row">
        <div class="large-8 large-push-2 columns">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
					<?php if ( have_posts() ) : ?>
						<?php while ( have_posts() ) :
							the_post();
							get_template_part( 'content', 'search' ); ?>
						<?php endwhile; ?>
						<?php
						the_posts_pagination( array(
							'prev_text'          => __( 'Previous page', 'codingsimply' ),
							'next_text'          => __( 'Next page', 'codingsimply' ),
							'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'codingsimply' ) . '</span>',
						) );
					else :
						get_template_part( 'content', 'none' );
					endif; ?>
                </main>
            </div>
        </div>
    </div>
<?php get_footer(); ?>