<?php

use CodingSimplyProjects\Model\Project;
use CodingSimplyProjects\View\Helper\ProjectHelper;

$post          = get_post();
$project       = Project::init( $post );
$projectHelper = new ProjectHelper( $project );
?>
<div class="large-4 columns post-entry end">
    <div class="callout text-center no-border" data-equalizer-watch>
        <a href="<?php the_permalink() ?>">
			<?php if ( ! empty( $project->icon_url ) ): ?>
                <img class="shadow" src="<?= $project->icon_url ?>"/>
			<?php else: ?>
                <div class="project-icon shadow">
                    <div class="project-initials">
						<?= $projectHelper->getTitleInitials() ?>
                    </div>
                    <div class="project-owner">
                        cs;
                    </div>
                </div>
			<?php endif; ?>
            <strong><?php the_title() ?></strong>
        </a>
    </div>
</div>