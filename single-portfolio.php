<?php
/**
 * The Single Portfolio Piece template
 *
 * This is the template that displays a single portfolio piece.
 *
 * @package Russell
 */

get_header(); ?>

<section id="primary" role="main">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <header class="entry-header">
                    <h1><?php the_title(); ?></h1>
                </header><!-- .entry-header -->

                <?php the_content(); ?>

                <?php the_terms( $post->ID, 'portfolio_category', 'Categories: ', ' / ' ); ?>

            </article><!-- #post-<?php the_ID(); ?> -->

    <?php endwhile; ?>

		<nav id="nav-below">
			<div class="nav-previous"><h3><?php next_post_link( '%link', 'Previous' ); ?></h3></div>
			<div class="nav-next"><h3><?php previous_post_link( '%link', 'Next' ); ?></h3></div>
		</nav><!-- #nav-above -->

<?php else: endif; ?>


</section><!-- #primary -->

<?php get_footer(); ?>