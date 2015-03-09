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

<section class="sketchbook">

	<header class="entry-header">
		<h1 class="entry-title page-title"><?php the_field( 'subtitle', 1405 ); ?></h1>
	</header>
		
	<div class="sketches">		

		<ul class="bxslider">
		
		<?php $rgsketches = new WP_Query( 'post_type=sketch' );

		if ( $rgsketches->have_posts() ) : while ( $rgsketches->have_posts() ) : $rgsketches->the_post(); ?>

    	    <li class="rgsketch" data-id="post-<?php the_id(); ?>" data-type="">
        
        	    <?php 
 
					$image = get_field('sketch-image');
 
					if( !empty($image) ): ?>
 
					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
 
				<?php endif; ?>
                        
        	</li>

    	<?php endwhile; endif; wp_reset_postdata(); ?>

        </ul>

	</div>

</section><!-- #home-sketches -->

<?php get_footer(); ?>