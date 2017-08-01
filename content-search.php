<div class="row">
    <?php $post = get_post(); ?>
    <div class="large-12 columns post-entry">
        <h2><a href="<?= $post->guid ?>"><?= $post->post_title ?></a></h2>
        <time class="post-date"><?= date('m.d.Y', strtotime($post->post_modified)) ?></time>
        <?php
        $description = get_post_custom_values('_genesis_description');
        if (isset($description[0])) {
            echo '<p>' . $description[0] . '</p>';
        }
        ?>
    </div>
</div>
<hr/>