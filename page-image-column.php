<?php
/**
 * Template Name: Image Column
 *
 * This is a custom template with a separate image column.
 *
 * @package Russell
 */

get_header(); ?>

<section id="primary" role="main">

    <?php while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <h1 class="entry-title"><?php the_title(); ?></h1>
            </header><!-- .entry-header -->

            <div class="entry-content">
                <div class="col col-left">
                    <?php the_post_thumbnail('medium'); ?>
                </div>
                <div class="col col-right">
                    <?php the_content(); ?>
                </div>
            </div><!-- .entry-content -->
        </article><!-- #post-<?php the_ID(); ?> -->

    <?php endwhile; // end of the loop. ?>

</section><!-- #primary -->

<?php get_footer(); ?>