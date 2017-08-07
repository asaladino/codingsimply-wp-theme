<?php

use CodingSimplyProjects\Model\Project;
use CodingSimplyProjects\View\Helper\ProjectHelper;

$project       = Project::init( get_post() );
$projectHelper = new ProjectHelper( $project );
?>
<div class="large-3 medium-3 small-3 columns post-entry end">
    <div class="callout text-center no-border" data-equalizer-watch>
        <a href="<?php the_permalink() ?>">
			<?= $projectHelper->getIcon( 'cs;' ) ?>
            <strong><?php the_title() ?></strong>
        </a>
    </div>
</div>