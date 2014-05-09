<?php
/*
Template Name: Contact Us

*/

get_header(); ?>

<div class="clear"></div>
<!--Content Begin-->

<div class="clear"></div>
<!--Content Begin-->
<div class="container">
	<div class="wrapper description">
		<div class="half">
			<div class="contact_content">
			  <?php if (have_posts()) : while (have_posts()) : the_post();?>
					
					<h4 id="post-<?php the_ID(); ?>"><?php the_title();?></h4>
					
					<?php the_content(); ?>
					
			  <?php endwhile; endif; 
			  
			
					if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
							the_post_thumbnail('full');
					} 
			
				?>
			</div>
		</div>
		<div class="half" align="center">
			<?php if ( ! dynamic_sidebar('on_contact_us') ) : ?>
				<ul id="sponser">
					<li><img src="<?php bloginfo('template_url'); ?>/images/sponser01.png" /></li>
					<li><img src="<?php bloginfo('template_url'); ?>/images/sponser02.png" /></li>
					<li><img src="<?php bloginfo('template_url'); ?>/images/sponser03.png" /></li>
				</ul>
			<?php endif; ?>
		</div>
		<div class="clear"></div>
			<div class="page_bottom_content">
				<h6><?php
					$value = get_post_meta( $post->ID, '_page_description', true );
					
					if($value){
						echo $value;
					}else{
							echo "Test One Source for In-Home & Community Based Rehabilitation";
					}
					?>	
					</h6>
			</div>
	</div>
</div>	
<!--Content End-->
			
<?php get_footer(); ?>