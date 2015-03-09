<?php
/**
 * Template Name: Portfolio
 *
 * This is the template that displays all portfolio pieces at either full width or half width.
 *
 * @package Russell
 */

get_header(); ?>

<section id="primary" role="main">

<?php $args = array( 
    'post_type' => 'portfolio', 
    'nopaging' => true 
    );

    $loop = new WP_Query( $args );

if ( $loop->have_posts() ) :
    while ( $loop->have_posts() ) : $loop->the_post(); ?>

    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'portfolio-thumbnail' ); ?></a>

    <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>

    <?php the_terms( $post->ID, 'portfolio_category', 'Categories: ', ' / ' ); ?>

    <div class="entry-content"><?php the_content( 'Read more...' ); ?></div>

    <?php endwhile;

else :

    // nothing found

endif;

wp_reset_postdata(); ?>


</section><!-- #primary -->

<?php get_footer(); ?>