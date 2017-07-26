<?php get_header(); ?>
    <div class="row">
        <div class="large-12 columns">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">
                    <section class="error-404 not-found">
                        <header class="page-header">
                            <h1 class="page-title"><?php _e('Oops! That page can&rsquo;t be found.', 'codingsimply'); ?></h1>
                        </header>
                        <div class="page-content">
                            <p><?php _e('It looks like nothing was found at this location. Maybe try a search?', 'codingsimply'); ?></p>
                        </div>
                    </section>
                </main>
            </div>
        </div>
    </div>
<?php get_footer(); ?>