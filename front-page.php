<?php

namespace CodingSimplyThemes;

use CodingSimplyProjects\Core\Repository\ProjectsRepository;

get_header();

$projects = ProjectsRepository::find();
if ( count( $projects ) > 0 ) :?>
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
					<?php foreach ( $projects as $project ): ?>
						<?php setup_postdata( $project->post ); ?>
                        <li class="is-active orbit-slide">
                            <div class="orbit-slide-content">
                                <div class="row  small-collapse medium-uncollapse large-uncollapse">
                                    <div class="large-12 columns show-for-small-only text-center">
                                        <h2>
                                            <a href="<?= $project->git_url ?>" target="_blank">
												<?php the_title(); ?>
                                            </a>
                                        </h2>
                                    </div>
                                    <div class="small-12 medium-5 medium-push-2 large-5 large-push-2 columns text-center">
                                        <a href="<?= $project->git_url ?>" target="_blank">
                                            <img class="large-12" src="<?= $project->screenshot_url ?>"/>
                                        </a>
                                    </div>
                                    <div class="medium-3 medium-pull-2 large-3 large-pull-2 columns hide-for-small-only">
                                        <h3>
                                            <a href="<?= $project->git_url ?>" target="_blank">
												<?= $project->post->post_title ?>
                                            </a>
                                        </h3>
                                        <p class="hide-for-medium-only">
											<?php the_excerpt() ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
					<?php endforeach; ?>
                </ul>
            </div>
            <nav class="orbit-bullets">
				<?php foreach ( $projects as $key => $project ): ?>
					<?php
					setup_postdata( $project->post );
					if ( $key === 0 ): ?>
                        <button class="is-active" data-slide="<?= $key ?>">
                            <span class="show-for-sr"><?php the_title(); ?></span>
                            <span class="show-for-sr">Current Slide</span>
                        </button>
					<?php else: ?>
                        <button data-slide="<?= $key ?>">
                            <span class="show-for-sr"><?php the_title(); ?></span>
                        </button>
					<?php endif; ?>
				<?php endforeach; ?>
            </nav>
        </div>
    </div>

<?php endif; ?>

    <div class="row">
        <div class="large-8 large-push-2 columns">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
					<?php
					$posts = get_posts( [ 'posts_per_page' => 5 ] );
					if ( $posts ) {
						foreach ( $posts as $post ) {
							setup_postdata( $post );
							get_template_part( 'content', 'search' );
						}
						the_posts_pagination( array(
							'prev_text'          => __( 'Previous page', 'codingsimply' ),
							'next_text'          => __( 'Next page', 'codingsimply' ),
							'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'codingsimply' ) . ' </span>',
						) );
					} else {
						get_template_part( 'content', 'none' );

					}
					?>
                </main>
            </div>
        </div>
    </div>
<?php get_footer(); ?>