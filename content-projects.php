<?php

use CodingSimplyProjects\Model\Project;
use CodingSimplyProjects\View\Helper\ProjectHelper;


/** @var Project $project */
$project       = Project::init( get_post() );
$projectHelper = new ProjectHelper( $project );
?>
<article id="post-<?php the_ID() ?>" <?php post_class() ?>>
    <div class="row">
        <div class="large-3 medium-4 small-6 columns">
			<?= $projectHelper->getIcon( 'cs;' ) ?>
        </div>
        <div class="large-9 medium-8 small-6 columns">
            <header class="entry-header">
                <h2 class="entry-title"><?php the_title() ?></h2>
                <div class="row">
                    <div class="small-12 columns text-right">
                        <br/><br/>
						<?php if ( ! empty( $project->git_url ) ): ?>
                            <a class="button secondary" href="<?= $project->git_url ?>" target="_blank">
                                <i class="fa fa-github" aria-hidden="true"></i>
                                Fork on Github
                            </a>
						<?php endif ?>
                    </div>
                </div>
            </header>
        </div>
    </div>
    <hr/>
    <div class="entry-content">
		<?php the_content() ?>
        <div class="row">
            <div class="large-8 large-push-2 columns">
                <div class="orbit" role="region" aria-label="Screen Shots" data-orbit>
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
							<?php while ( $project->loop( 'screenshot_url' ) ): ?>
								<?php if ( $project->hasValue( 'screenshot_url' ) ): ?>
                                    <li class="is-active orbit-slide">
                                        <figure class="orbit-figure">
											<?= $projectHelper->getScreenShot( 'orbit-image' ) ?>
                                        </figure>
                                    </li>
								<?php endif ?>
							<?php endwhile ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>