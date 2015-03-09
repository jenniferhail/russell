<?php
/**
* Single post template
*
* @package Russell
*/

get_header(); ?>

<section id="primary">

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', 'single' ); ?>

		<nav id="nav-below">
			<div class="nav-previous"><h3><?php next_post_link( '%link' ); ?></h3></div>
			<div class="nav-next"><h3><?php previous_post_link( '%link' ); ?></h3></div>
		</nav><!-- #nav-above -->

	<?php endwhile; // end of the loop. ?>

</section><!-- #primary -->
<?php get_footer(); ?>