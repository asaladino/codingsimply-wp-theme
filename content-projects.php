<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <h2 class="entry-title"><?php the_title(); ?></h2>
        <hr/>
    </header>
    <div class="entry-content">
		<?php
		the_content( sprintf(
			__( 'Continue reading %s', 'codingsimply' ),
			the_title( '<span class="screen-reader-text">', '</span>', false )
		) );
		?>
    </div>
</article>