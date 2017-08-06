<?php get_header(); ?>
<div class="row">
    <div class="large-8 large-push-2 columns">
        <section id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
				<?php if ( have_posts() ) : ?>
                    <div class="row" data-equalizer data-equalize-on="large">
						<?php
						while ( have_posts() ) : the_post();
							get_template_part( 'content', 'project-list' );
						endwhile; ?>
                    </div>
					<?php
					the_posts_pagination( array(
						'prev_text'          => __( 'Previous page', 'codingsimply' ),
						'next_text'          => __( 'Next page', 'codingsimply' ),
						'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'codingsimply' ) . ' </span>',
					) );
				else :
					get_template_part( 'content', 'none' );

				endif;
				?>
            </main>
        </section>
    </div>
</div>

<script>
    $(document).ready(function(){
        function resizeIcons() {
            $('.project-icon').each(function(){
                $(this).height($(this).width());
            });
            $('.project-initials').each(function(){
                $(this).css('font-size', ($(this).parent().height() * .5));
            });
            $('.project-owner').each(function(){
                $(this).css('font-size', ($(this).parent().height() * .2));
            });
        }
        resizeIcons();
        $(window).resize(resizeIcons);
    });
</script>

<?php get_footer(); ?>
