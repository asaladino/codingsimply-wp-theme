<?php

use CodingSimplyProjects\Model\Project;
use CodingSimplyProjects\View\Helper\ProjectHelper;


/** @var Project $project */
$project       = Project::init( get_post() );
$projectHelper = new ProjectHelper( $project );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="row">
        <a href="<?= $project->git_url ?>" target="_parent">
            <img style="position: absolute; right: 0; border: 0;"
                 src="https://camo.githubusercontent.com/e7bbb0521b397edbd5fe43e7f760759336b5e05f/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f677265656e5f3030373230302e706e67"
                 alt="Fork me on GitHub"
                 data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_green_007200.png"/>
        </a>
        <div class="large-3 medium-4 small-6 columns">
			<?= $projectHelper->getIcon( 'cs;' ) ?>
        </div>
        <div class="large-9 medium-8 small-6 columns">
            <header class="entry-header">
                <h2 class="entry-title"><?php the_title(); ?></h2>
            </header>
        </div>
    </div>
    <hr/>
    <div class="entry-content">
		<?php the_content(); ?>
        <div class="row">
            <div class="large-8 large-push-2 columns">
                <div class="orbit" role="region" aria-label="Screen Shots" data-orbit>
                    <div class="orbit-wrapper">
                        <div class="orbit-controls">
                            <button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;
                            </button>
                            <button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;
                            </button>
                        </div>
                        <ul class="orbit-container">
							<?php while ( $project->loop( 'screenshot_url' ) ): ?>
								<?php if ( $project->hasValue( 'screenshot_url' ) ): ?>
                                    <li class="is-active orbit-slide">
                                        <figure class="orbit-figure">
											<?= $projectHelper->getScreenShot( 'orbit-image' ); ?>
                                        </figure>
                                    </li>
								<?php endif ?>
							<?php endwhile; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>