<?php get_header(); ?>

    <div class="project-slide-show">
        <div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit>
            <div class="orbit-wrapper">
                <div class="orbit-controls">
                    <button class="orbit-previous">
                        <span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;
                    </button>
                    <button class="orbit-next">
                        <span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;
                    </button>
                </div>
                <ul class="orbit-container">
                    <li class="is-active orbit-slide">
                        <div class="orbit-slide-content">
                            <div class="row  small-collapse medium-uncollapse large-uncollapse">
                                <div class="large-12 columns show-for-small-only text-center">
                                    <h2>Group Password Decrypter</h2>
                                </div>
                                <div class="small-12 medium-5 medium-push-2 large-5 large-push-2 columns text-center">
                                    <img class="large-12"
                                         src="https://raw.githubusercontent.com/asaladino/group-password-decrypter/master/notes/empty.png"/>
                                </div>
                                <div class="medium-3 medium-pull-2 large-3 large-pull-2 columns hide-for-small-only">
                                    <h3>Group Password Decrypter</h3>
                                    <p class="hide-for-medium-only">
                                        A little java utility for decrypting Cisco group passwords in pcf files. Most
                                        of the work was done by ptoomey3, I just packaged it in with javaFx.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="is-active orbit-slide">
                        <div class="orbit-slide-content">
                            <div class="row  small-collapse medium-uncollapse large-uncollapse">
                                <div class="large-12 columns show-for-small-only text-center">
                                    <h2>PongP</h2>
                                </div>
                                <div class="small-12 medium-5 medium-push-2 large-5 large-push-2 columns text-center">
                                    <img class="large-12"
                                         src="https://raw.githubusercontent.com/asaladino/pong-p/master/notes/pong.png"/>
                                </div>
                                <div class="medium-3 medium-pull-2 large-3 large-pull-2 columns hide-for-small-only">
                                    <h3>PongP</h3>
                                    <p class="hide-for-medium-only">
                                        Pong for python using pygame and hopefully tensorflow. This game is based on
                                        Siraj's pong neural network and video.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <nav class="orbit-bullets">
                <button class="is-active" data-slide="0">
                    <span class="show-for-sr">First slide details.</span>
                    <span class="show-for-sr">Current Slide</span>
                </button>
                <button data-slide="1"><span class="show-for-sr">Second slide details.</span></button>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="large-8 large-push-2 columns">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
					<?php if ( have_posts() ) : ?>
						<?php if ( is_home() && ! is_front_page() ) : ?>

						<?php endif; ?>

						<?php while ( have_posts() ) :
							the_post();
							get_template_part( 'content', 'search' ); ?>
						<?php endwhile; ?>
						<?php
						the_posts_pagination( array(
							'prev_text'          => __( 'Previous page', 'codingsimply' ),
							'next_text'          => __( 'Next page', 'codingsimply' ),
							'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'codingsimply' ) . ' </span>',
						) );
					else :
						get_template_part( 'content', 'none' );
					endif; ?>
                </main>
            </div>
        </div>
    </div>
<?php get_footer(); ?>