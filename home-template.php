<?php 
/*
Template Name: Home Template

*/

get_header(); ?>


	<!--Slider Begin-->
	<div class="flexslider">
		
			<a href="<?php echo get_option('bg_shop_abby_link'); ?>" class="abby-link">Shop Abby Style &#9658</a>
			<a href="<?php echo get_option('bg_shop_gabby_link'); ?>" class="gabby-link">Shop Gabby Style &#9658</a>
			<?php
				$args = array(
					'post_type' => 'slider'
				);

				$query = new WP_Query( $args );

				if ( $query->have_posts() ) {
					
					echo '<ul class="slides">';

				
					while ( $query->have_posts() ) {
						$query->the_post();

						if ( has_post_thumbnail()) : ?>
						   <li>
						   	<?php the_post_thumbnail('full'); ?>
						   </li>
						<?php endif;

					}
					
					echo '</ul>';
				}
			?>

		
	</div>
	<!--Slider End-->
	<div class="clear"></div>
	

<?php get_footer(); ?>