<?php
/*
Template Name: About Template

*/

get_header(); ?>


<?php
			$attachments = get_post_meta( get_the_ID(), '_wp_custom_bg', true ); 

?>

<div class="slider">
		<img src="<?php if($attachments) echo $attachments;  ?>" />
	</div>

<!--Upper Row Begin-->

<div class="club-content">

	<div class="about-content">

			<?php if (have_posts()) : while (have_posts()) : the_post();?>
					<div class="page-content">
					
					<h1><?php //the_title(); ?></h1>
					
					<?php the_content(); ?>

					</div>
			  <?php endwhile; endif; ?>

	</div>

	<div class="clear"></div>
	<div class="shop">

		<?php 
				$args = array(
					'orderby' => 'rand',
					'post_type' 	=> 'product',
					'posts_per_page' => 1,
					'tax_query' => array(
										array(
											'taxonomy' => 'product_cat',
											'field' => 'slug',
											'terms' => 'abby',
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

				

		?>

			<a href="<?php echo $product->guid;  ?>"><img class="shop-pic" src="<?php echo $thumb_url[0]; ?>" /></a>

		<?php
		
			}
		
		endif; 

		wp_reset_postdata();

	?>

	  <div class="shop-details">
	    <h4><a href="<?php echo site_url('/gabby-style/'); ?>">SHOP ABBY STYLE ►</a></h4>
	    <p>“Abby style” is the perfect combination of bo-ho-chic with a touch of frill. You will find so much you love if you are looking for clothing with a little extra kick such as rips in a pair of jeans, fringe on a shirt, or a rockin’ graphic tee. Try shopping this style if you love earth tones, printed shirts, and of course who could forget about unique accessories to stack on that will complete your look! </p>
	  </div>

	  <div class="shop-gallery">

			<ul class="gallery">
			    <?php 
				$args = array(
					'orderby' => 'rand',
					'post_type' 	=> 'product',
					'posts_per_page' => 4,
					'tax_query' => array(
										array(
											'taxonomy' => 'product_cat',
											'field' => 'slug',
											'terms' => 'abby',
										)
									)
				);

				$query = new WP_Query( $args );
			?>



			<?php if ($query->have_posts()) : $query->the_post();

				foreach ($query->posts as $product) { 

				$taxonomy = 'product_cat';

				$thumb_id = get_post_thumbnail_id($product->ID);

				
				$thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail', true);

				

		?>

			<li><a href="<?php echo $product->guid;  ?>"><img src="<?php echo $thumb_url[0]; ?>" /></a></li>

		<?php
		
			}
		
		endif; 

		wp_reset_postdata();

	?>
		   </ul>


	  </div>

	</div>

	<div class="shop">
		
		<?php 
				$args = array(
					'orderby' => 'rand',
					'post_type' 	=> 'product',
					'posts_per_page' => 1,
					'tax_query' => array(
										array(
											'taxonomy' => 'product_cat',
											'field' => 'slug',
											'terms' => 'gabby',
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

				

		?>

			<a href="<?php echo $product->guid;  ?>"><img class="shop-pic" src="<?php echo $thumb_url[0]; ?>" /></a>

		<?php
		
			}
		
		endif; 

		wp_reset_postdata();

	?>

	  <div class="shop-details">
	    <h4><a href="<?php echo site_url('/gabby-style/'); ?>">SHOP GABBY STYLE ►</a></h4>
	    <p>Do you love all things funky, colorful, and ruffled? Try shopping “Gabby style!” Bring out your inner fashion princess by viewing soft pastel colors or bright colors with chunky jewelry, and of course an added touch of bling! If you love elegant patterns and more out-going prints, you will be sure to love what the “Gabby Style” section has to offer! </p>
	  </div>

	  <div class="shop-gallery">
	  	<ul class="gallery">
		    <?php 
				$args = array(
					'orderby' => 'rand',
					'post_type' 	=> 'product',
					'posts_per_page' => 4,
					'tax_query' => array(
										array(
											'taxonomy' => 'product_cat',
											'field' => 'slug',
											'terms' => 'gabby',
										)
									)
				);

				$query = new WP_Query( $args );
			?>



			<?php if ($query->have_posts()) : $query->the_post();

				foreach ($query->posts as $product) { 

				$taxonomy = 'product_cat';

				$thumb_id = get_post_thumbnail_id($product->ID);

				
				$thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail', true);

				

		?>

			<li><a href="<?php echo $product->guid;  ?>"><img src="<?php echo $thumb_url[0]; ?>" /></a></li>

		<?php
		
			}
		
		endif; 

		wp_reset_postdata();

	?>
	   </ul>
	  </div>

	</div>





</div>

			
<?php get_footer(); ?>