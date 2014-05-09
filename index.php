<?php 

get_header(); ?>


<!--Content Begin-->
	<div class="blog-content">
		<div class="blog-post">
			<?php if (have_posts()) : while (have_posts()) : the_post();

			$id = get_the_ID();

			$thumb_id = get_post_thumbnail_id($id);
	
			$thumb_url = wp_get_attachment_image_src($thumb_id,'large', true);

			?>

				<div class="blog">
					<?php if($thumb_url[0]) {?>
						<img src="<?PHP echo $thumb_url[0]; ?>" align="left" />
					<?php }else{ ?>
						<img src="<?php bloginfo('template_url') ?>/images/blog-image.jpg" align="left" />
					<?php } ?>
					<h3><?php the_title(); ?></h3>
					<p><?php the_excerpt(); ?></p>
					<a href="<?php the_permalink() ?>" class="read-more">Read More</a>
				</div>
				<div class="blog-seperator"></div>

			<?php endwhile; endif; ?>

		</div>

		<div class="blog-sidebar">

			<?php if ( ! dynamic_sidebar('right_sidebar') ) : ?>
				
				<div class="widget">
					<h5>Recent Post</h5>
					<ul class="widget-list">
						<li><a href="#">Lorem Ipsum Dolar</a></li>
						<li><a href="#">Lorem Ipsum Dolar</a></li>
						<li><a href="#">Lorem Ipsum Dolar</a></li>
						<li><a href="#">Lorem Ipsum Dolar</a></li>
						<li><a href="#">Lorem Ipsum Dolar</a></li>
					</ul>
				</div>
				<div class="widget">
					<h5>Archives</h5>
					<ul class="widget-list">
						<li><a href="#">Lorem Ipsum Dolar</a></li>
						<li><a href="#">Lorem Ipsum Dolar</a></li>
						<li><a href="#">Lorem Ipsum Dolar</a></li>
						<li><a href="#">Lorem Ipsum Dolar</a></li>
						<li><a href="#">Lorem Ipsum Dolar</a></li>
					</ul>
				</div>
				<div class="widget">
					<h5>Categories</h5>
					<ul class="widget-list">
						<li><a href="#">Lorem Ipsum Dolar</a></li>
						<li><a href="#">Lorem Ipsum Dolar</a></li>
						<li><a href="#">Lorem Ipsum Dolar</a></li>
						<li><a href="#">Lorem Ipsum Dolar</a></li>
						<li><a href="#">Lorem Ipsum Dolar</a></li>
					</ul>
				</div>

			<?php endif; ?>
		</div>

	</div>


	<div class="clear"></div>
	
			
<?php get_footer(); ?>