<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<meta charset="<?php bloginfo('charset'); ?>" />
<meta name="description" content="<?php bloginfo('description');  ?>" />
<link rel="shortcut icon" href="<?php echo stripslashes(get_option('bg_favicon')); ?>" type="image/x-icon"/>

<title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>


<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" media="screen" />
<link href="<?php bloginfo('template_url'); ?>/css/flexslider.css" rel="stylesheet" type="text/css" media="screen" />

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>



	<style type="text/css">
	
		<?php		
			if(get_option('bg_custom_css')):

				echo stripslashes(get_option('bg_custom_css')); 
			endif;

		?>


		.logo {
			background: url('<?php echo get_option('bg_logo'); ?>') 50% 0 no-repeat;
			background-size: 286px 158px;
			width: 286px;
			height: 158px;
			position: absolute;
			top: -45px;
			left: 325px;
		}
			
	</style>



<?php wp_head(); ?>


<script type="text/javascript">
jQuery(window).load(function(){
    var $container = jQuery('.portfolioContainer');
    $container.isotope({
        filter: '*',
        animationOptions: {
            duration: 750,
            easing: 'linear',
            queue: false
        }
    });
 
    jQuery('.portfolioFilter a').click(function(){
        jQuery('.portfolioFilter .current').removeClass('current');
        jQuery(this).addClass('current');
 
        var selector = jQuery(this).attr('data-filter');
        $container.isotope({
            filter: selector,
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            }
         });
         return false;
    }); 
});
</script>


<?php  if(get_option('bg_ga_code')): ?>

	<script type="text/javascript">
	
		<?php		

		echo stripslashes(get_option('bg_ga_code')); 

		?>
			
	</script>

<?php endif; ?>

</head>

<body <?php body_class(); ?>>


	<div class="container">
		<!--Header & Navigation Begin-->
		<div class="top-header">
			<div class="half">
				<a href="<?php echo stripslashes(get_option('bg_returnex_link')); ?>" id="return">RETURNS & EXCHANGES</a>
				<a href="<?php echo stripslashes(get_option('bg_contactus_link')); ?>">CONTACT US</a>
			</div>
			<div class="half" align="right">
				<ul id="login">
					<li><a href="<?php echo wp_logout_url( get_permalink( woocommerce_get_page_id( 'myaccount' ) ) ); ?>">Login</a></li>
					<li><a href="<?php echo wp_logout_url( get_permalink( woocommerce_get_page_id( 'myaccount' ) ) ); ?>">Register</a></li>
				</ul>
				
				<?php show_cart(); ?>
				
			</div>
		</div>
		<div class="clear"></div>
		<div class="navigation">
			<div class="logo"></div>
			<ul id="nav">
				<?php
				$main = array(
					'theme_location'  => 'main_menu',
					'menu'            => '',
					'container'       => '',
					'container_class' => '',
					'container_id'    => '',
					'menu_class'      => 'menu',
					'menu_id'         => '',
					'echo'            => true,
					'fallback_cb'     => 'wp_page_menu',
					'before'          => '',
					'after'           => '',
					'link_before'     => '',
					'link_after'      => '',
					'items_wrap'      => '%3$s',
					'depth'           => 0,
					'walker'          => ''
				); 
			
			
				wp_nav_menu($main); ?>
			</ul>
			<div id="search-box">
				<form role="search" method="get" id="searchform" action="<?php echo site_url(); ?>">
					<input type="text" name="s" placeholder="SEARCH..." />
					<input type="image" id="searchsubmit" src="<?php bloginfo('template_url'); ?>/images/search-btn.png" />
				</form>
			</div>
		</div>
		<!--Header & Navigation End-->
		<div class="clear"></div>