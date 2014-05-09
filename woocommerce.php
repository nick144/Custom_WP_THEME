<?php
/*
Template Name: Woocommerce

*/

get_header(); ?>


<?php
			$attachments = get_post_meta( get_the_ID(), '_wp_custom_bg', true ); 

?>

<div class="slider">
		<img src="<?php if($attachments) echo $attachments;  ?>" />
	</div>

<!--Upper Row Begin-->

<div class="post-content">

	
				<div class="inner_content woocommerce">
					<div class="welcome-note">
						<h3><?php the_title(); ?></h3>
					</div>

						<?php woocommerce_content(); ?>

						<div style="clear:both;"></div>
				</div>
	

</div>

			
<?php get_footer(); ?>