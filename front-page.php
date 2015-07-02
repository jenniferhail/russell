<?php
/**
 * Home Page
 *
 * @package Russell
 */

get_header(); ?>

<section id="primary" role="main">

<?php while ( have_posts() ) : the_post(); ?>

	<div id="rg-container">
	
		<div class="featured-image">
			
			<?php 
			if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
  				the_post_thumbnail( array(200,200) );
			} 
			?>

		</div>

		<div class="entry-content intro-text">

			<h2><?php the_field( 'intro_text' ); ?></h2>
		
		</div><!-- .entry-content -->

		<div class="clear"></div>

	</div>

<?php endwhile; // end of the loop. ?>

</section><!-- #primary -->

</div>
</div>

<?php get_footer(); ?>