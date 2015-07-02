<?php
/**
 * Main Template File
 * 
 * This file is used to display a page when nothing more specific matches a query.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Russell
 */

get_header(); ?>

<section id="primary" role="main">

    <?php if ( have_posts() ) : ?>
        <!-- there IS content for this query -->

        <?php /* Start the Loop */ ?>
        <?php while ( have_posts() ) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <?php if ( has_post_thumbnail() ) {

                    echo '<div class="feat-image">';

                    the_post_thumbnail( 'medium' );

                    echo '</div>';

                }
                ?>

                <div class="image-post">

                    <?php the_category(); ?>

                    <header class="entry-header">
                        <a href="<?php the_permalink(); ?>"><h1><?php the_title(); ?></h1></a>
                        <?php the_date(); ?> 
                    </header><!-- .entry-header -->


                    <?php the_content('Read more...'); ?>

                </div>

            </article><!-- #post-<?php the_ID(); ?> -->

        <?php endwhile; ?>

            <?php get_template_part( 'inc/pagination' ); ?>

    <?php else : ?>
        <!-- there IS NOT content for this query -->

        <article id="post-0" class="hentry post no-results not-found">
            <header class="entry-header">
                <h1><?php _e( "Oops!", "starter-theme" ); ?></h1>
            </header><!-- .entry-header -->

            <p><?php _e( "We can&#039;t find content for this page!", "starter-theme" ); ?></p>
        </article><!-- #post-0 -->

    <?php endif; ?>

</section><!-- #primary -->

<?php get_footer(); ?>