<?php
/*
Template Name: Collection Template

*/

get_header(); ?>


<?php
			$attachments = get_post_meta( get_the_ID(), '_wp_custom_bg', true ); 

?>

<div class="slider">
		<img src="<?php if($attachments) echo $attachments;  ?>" />
	</div>

<!--Upper Row Begin-->

<div class="collection-content">
		<?php if (have_posts()) : while (have_posts()) : the_post();?>
			<div class="collection-content">
				<?php the_content(); ?>
				<h1><?php the_title(); ?></h1>
			</div>
		<?php endwhile; endif; ?>
	</div>


<div class="clear"></div>
	<div class="collection">
		<div class="portfolioFilter">


			<a href="#" data-filter=".abby">Abby Style</a>
			<a href="#" data-filter="*" class="current">All</a>
			<a href="#" data-filter=".gabby">Gabby Style</a>


		</div>
		<div class="portfolioContainer">

			<?php 
				$args = array(

					'post_type' 	=> 'product',
					'posts_per_page' => -1,
					'tax_query' => array(
										array(
											'taxonomy' => 'product_cat',
											'field' => 'slug',
											// 'terms' => array( 'Abby', 'Gabby', 'Collection')
											'terms' => array('Collection')
										)
									)
				);

				$query = new WP_Query( $args );
			?>



			<?php if ($query->have_posts()) : $query->the_post();

				foreach ($query->posts as $product) { 

				$taxonomy = 'product_cat';

				$thumb_id = get_post_thumbnail_id($product->ID);

				
				$thumb_url = wp_get_attachment_image_src($thumb_id,'large', true);

				$terms = get_the_terms( $product->ID, $taxonomy );

					if($terms){

						$category = array();

						foreach ( $terms as $term ) {
							if($term->slug == 'abby' || $term->slug == 'gabby'){
								$category[] = $term->slug;
							}
						}

						$cat = join( " ", $category );

					}

					?>

					<div id="columns" class="<?php echo $cat;  ?> columns_5">

						<div class="figure">
							<a href="<?php echo $product->guid;  ?>"><img src="<?php echo $thumb_url[0]; ?>" /></a>
						</div>

						<div style="opacity: 0;" class="fdw-background">
							<h4><a href="<?php echo $product->guid;  ?>" style="color:#fff;"><?php echo $product->post_title;  ?></a></h4>
							<div class="fdw-subtitle a-center" style="margin:10px 0">by <a href="#"><?php echo ucwords($cat);  ?></a></div>
							<p class="fdw-port">
								<a href="<?php echo $product->guid;  ?>">Details<span class="vg-icon">→</span></a>
							</p>
						</div>

						

					</div>
					
				<?php
				}

			?>


				

			<?php endif; 

				wp_reset_postdata();

			?>


		</div>
	</div>
	<div class="clear"></div>
	<div class="collection">
		<ul id="prod-list">

			<?php 
				$args = array(

					'post_type' 	=> 'product',
					'posts_per_page' => 12,
					/*'tax_query' => array(
										array(
											'taxonomy' => 'product_cat',
											'field' => 'slug',
											'terms' => array( 'Abby', 'Gabby', 'Collection')
										)
									)*/
				);

				$WP_query = new WP_Query( $args );

				if ($WP_query->have_posts()) :  $WP_query->the_post();

				foreach ($WP_query->posts as $product) {

				$thumb_id = get_post_thumbnail_id($product->ID);

				
				$thumb_url = wp_get_attachment_image_src($thumb_id,'large', true);

				$terms = get_the_terms( $product->ID, $taxonomy ); 

			?>

			<li id="columns" class="columns_5">
				<figure>
					<img src="<?php echo $thumb_url[0]; ?>" />
					<a href="<?php echo $product->guid;  ?>">buy now</a>
				</figure>
			</li>


			<?php 

				}

				 endif; 

				//wp_reset_postdata();

			?>
		</ul>
	</div>
	<!--Content End-->
	<div class="clear"></div>


			
<?php get_footer(); ?>