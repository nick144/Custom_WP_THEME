<?php
/*
Template Name: Product Template

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

	<?php if (have_posts()) : while (have_posts()) : the_post();?>
				<div class="page-content">
				
				<h1><?php the_title(); ?></h1>
				
				<?php the_content(); ?>

				</div>
		  <?php endwhile; endif; ?>

</div>

			
<?php get_footer(); ?>