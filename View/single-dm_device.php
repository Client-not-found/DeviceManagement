<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>
    <!-- START Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
            crossorigin="anonymous"></script>
    <!-- ENDE Bootstrap -->

    <!-- START eigenes CSS -->
    <link rel="stylesheet" href="<?php echo(plugin_dir_path(__File__) . 'style.css') ?>">
    <!-- ENDE eigenes CSS -->

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <!-- START Inhalt -->
            <div class="container">
                <h1><?php echo(get_the_title(get_the_ID())) ?></h1>
                <p><?php echo(get_the_content(get_the_ID())); ?></p>

                <!-- START Details zum Gerät -->
                <?php if (user_can(wp_get_current_user(), 'show_details')) { ?>
                    <hr>
                    <h2>Details</h2>
                    <p><?php echo(dm_display_worth(null)); ?></p>
                <?php } ?>

                <!-- ENDE Details zum Gerät -->
                <?php if (user_can(wp_get_current_user(), 'show_history')) { ?>
                    <hr>

                    <!-- START Geräte History -->
                    <h2>Geräte History</h2>
                    <div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <form onsubmit="dm_save_devicehistory()">
                                        <div class="md-6">
                                            <label for="eintrag" class="form-label">Neuer Eintrag</label>
                                            <textarea class="form-control" id="eintrag"
                                                      rows="3" required></textarea>
                                            <button type="submit" class="btn btn-primary">Neuer Eintrag erfassen
                                            </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <?php echo(dm_display_devicehistory(null)); ?>
                    </div>
                <?php } ?>
                <!-- ENDE Geräte History -->
            </div>

            <!-- ENDE Inhalt -->
            <?php

            // Start the loop.
            while (have_posts()) : the_post();

                /*
                 * Include the post format-specific template for the content. If you want to
                 * use this in a child theme, then include a file called called content-___.php
                 * (where ___ is the post format) and that will be used instead.
                 */
                get_template_part('content', get_post_format());

                // If comments are open or we have at least one comment, load up the comment template.
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;


                // Previous/next post navigation.
                the_post_navigation(array(
                    'next_text' => '<span class="meta-nav" aria-hidden="true">' . __('Next', 'twentyfifteen') . '</span> ' .
                        '<span class="screen-reader-text">' . __('Next post:', 'twentyfifteen') . '</span> ' .
                        '<span class="post-title">%title</span>',
                    'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __('Previous', 'twentyfifteen') . '</span> ' .
                        '<span class="screen-reader-text">' . __('Previous post:', 'twentyfifteen') . '</span> ' .
                        '<span class="post-title">%title</span>',
                ));

                // End the loop.
            endwhile;
            ?>

        </main><!-- .site-main -->
    </div><!-- .content-area -->

<?php get_footer(); ?>