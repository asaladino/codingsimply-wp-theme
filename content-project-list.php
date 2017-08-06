<?php

use CodingSimplyProjects\Model\Project;

$post    = get_post();
$project = Project::init( $post );
?>
<div class="large-4 columns post-entry end">
    <div class="callout text-center" data-equalizer-watch>
        <a href="<?php the_permalink() ?>">
			<?php if ( ! empty( $project->icon_url ) ): ?>
                <img src="<?= $project->icon_url ?>"/>
			<?php endif; ?>
            <strong><?php the_title() ?></strong>
        </a>
    </div>
</div>