<?php
/**
 * Template Name: Portfolio Test
 *
 * This is the template that displays all portfolio pieces at either full width or half width.
 *
 * @package Russell
 */

get_header(); ?>

<section id="primary" role="main">

<ul class="load-portfolio">

    <li class="active"><a href="#" class="all">All</a></li>
    <?php
        $args = array( 'taxonomy' => 'portfolio_category' );
        $terms = get_terms( 'portfolio_category', $args );
        $count = count( $terms );
        if ( $count > 0 ) :
            foreach ( $terms as $term ) :
                $term_list .= '<li><a href="#" class="'. $term->slug .'">' . $term->name . '</a></li>';
            endforeach;
            echo $term_list;
        endif;
    ?>
</ul>

<ul class="portfolio-grid">

<?php $args = array( 
    'post_type' => 'portfolio',
    'nopaging' => true 
    );

    $pfportfolio = new WP_Query( $args );

    while ( $pfportfolio->have_posts() ) : $pfportfolio->the_post(); ?>

        <li class="pfpiece" data-id="post-<?php the_id(); ?>" data-type="<?php echo custom_taxonomy_terms_slugs( 'portfolio_category' ); ?>">
        
        <a href="<?php the_permalink(); ?>">

        <?php the_post_thumbnail( 'portfolio-thumbnail' ); ?>
        
        <span class="portfolio-title"><h3><?php the_title(); ?></h3></span>

        </a>

        </li> 
    
    <?php endwhile;

wp_reset_postdata(); ?>

        <li class="clear"></li>

</ul>

</section><!-- #primary -->

<?php get_footer(); ?>