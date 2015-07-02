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

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <?php if ( has_post_thumbnail() ): ?>

                    <div class="feat-image">
                    
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>

                    </div>

                    <div class="feat-image-post">

                        <header class="entry-header">
                            <a href="<?php the_permalink(); ?>"><h1 class="entry-title"><?php the_title(); ?></h1></a>
                            <p class="entry-date"><?php the_date(); ?></p>
                        </header><!-- .entry-header -->

                        <?php the_content('Read more...'); ?>

                        <p class="post-categories">Categories: <?php the_category(', '); ?></p>

                    </div>

                <?php else: ?>

                    <div class="">

                        <header class="entry-header">
                            <a href="<?php the_permalink(); ?>"><h1 class="entry-title"><?php the_title(); ?></h1></a>
                            <p class="entry-date"><?php the_date(); ?></p>
                        </header><!-- .entry-header -->

                        <?php the_content('Read more...'); ?>

                        <p class="post-categories">Categories: <?php the_category(', '); ?></p>


                    </div>

                <?php endif; ?>

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