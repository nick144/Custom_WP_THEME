<?php

/**************** Theme support *********************/

add_theme_support( 'post-thumbnails' );

add_theme_support('woocommerce');


/*************** Theme Menu ************************/


register_nav_menus( 
	array(
		'main_menu' 	=> 'Main Menu',
		'footer_nav'	=> 'Footer Nav'
	) 	
);


/*************** Script Enqueue ************************/

function bell_gemmelli_scripts() {

	wp_register_style( 'responsive', get_template_directory_uri() . '/css/responsive.css', false, '1.0.0' );
	wp_enqueue_style( 'responsive' );
    
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js', array(), '1.0.0', true );
	wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', array(), '2.1.0', true );
	wp_enqueue_script( 'tinynav', get_template_directory_uri() . '/js/tinynav.js', array(), '1.1.0', true );
	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/jquery.isotope.js', array(), '1.5.25', true );
	wp_enqueue_script( 'mobile', get_template_directory_uri() . '/js/jquery.mobile.js', array(), '1.0.0', true );
	
}

add_action( 'wp_enqueue_scripts', 'bell_gemmelli_scripts' );


function customScript(){ ?>

<script type="text/javascript">
	if(jQuery.browser.mobile)
	{
		
	   jQuery('.figure').removeClass("figure").addClass("mobile-figure");
	   console.log('You are using a mobile device!');
	}
	else
	{
	   console.log('You are not using a mobile device!');
	}
</script>

<?php 
}

add_action( 'wp_head', 'customScript' );

/*************** Theme Sidebar ************************/


function bg_sidebars() {

	$sidebarsarray = array(

						array(
							'class' => 'left_sidebar',
							'name' => __('Left','bellagemmelli')
						),array(
							'class' => 'right_sidebar',
							'name' => __('Right Sidebar','bellagemmelli')
						)
						
	);
						
	
		foreach($sidebarsarray as $val) {		
			register_sidebar( array(
				'name' => $val['name'],
				'id' => $val['class'],
				'before_widget' => '<div class="widget"><ul class="widget-list">',
				'after_widget' => '</ul></div>',
				'before_title' => '<h5 class="widget-title">',
				'after_title' => '</h5>',
				) 
			);
		}

				
}

add_action( 'widgets_init', 'bg_sidebars' );

/*************** Theme Option *********************/

include('functions/theme-option.php');

/**************Admin Enqueue Style **************/
		

add_action( 'admin_init', 'dom_theme_admin_init' );
   
   
function dom_theme_admin_init() {
    wp_register_style( 'dom_theme_metabox', get_template_directory_uri() . '/css/admin_style.css', false, '1.0.0'  );
	wp_enqueue_style( 'dom_theme_metabox' );
}


add_action('admin_enqueue_scripts', 'upload_admin_scripts');
 
function upload_admin_scripts() {
    if (isset($_GET['page']) && $_GET['page'] == 'theme-option.php') {
        if(function_exists( 'wp_enqueue_media' )){
			wp_enqueue_media();
		}else{
			wp_enqueue_style('thickbox');
			wp_enqueue_script('media-upload');
			wp_enqueue_script('thickbox');
		}
    }
}


/********************** Meta Box ****************************/

//include('functions/custom_metabox.php');


/********************** Custom Post type ****************************/

include('functions/post-type.php');


/********************** Woo Commerce ********************************/


remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);


add_filter( 'add_to_cart_text', 'woo_custom_cart_button_text' );                               
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text' );    
 
function woo_custom_cart_button_text() {
 
        return __( '<span class="red" style="font-size: 19px;">♥</span> ADD TO CART', 'woocommerce' );
 
}

function show_cart(){
	global $woocommerce, $pmc_data, $sitepress,$product; ?>
		<div class="cartWrapper">
			<div class="cart-bubble-load"></div>
            
            <div id="theCartInfo" class="cart_info">
			<?php 
			$check_out = '';
			if($woocommerce->cart->get_cart_url() != ''){ 
			if (function_exists('icl_object_id')) {
				$cart= get_permalink(icl_object_id(woocommerce_get_page_id( 'cart' ), 'page', false));
				$check_out = get_permalink(icl_object_id(woocommerce_get_page_id( 'checkout' ), 'page', false));
				}
			else {
				$cart=$woocommerce->cart->get_cart_url();
				$check_out = $woocommerce->cart->get_checkout_url(); 
			}
			}
			else {$cart = home_url().'cart/';};
			?>
			
			<div id="cart">CART [ <span><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?></span> ] <a href="<?php echo $cart; ?>">check out</a></div>
            
			<div class="cartTopDetails">
				<div class="cart_list product_list_widget">
					<div class="widget_shopping_cart_top widget_shopping_cart_content">	

						<?php get_template_part('woocommerce/cart/mini-cart') ?>

					</div>	
				</div>	
			</div>	
            </div>
		</div>	

		<script type="text/javascript">
			jQuery('#cart').click(function(){
				jQuery('.cartTopDetails').slideToggle("slow");
			});
		</script>
	
	<?php
	}



/*********** Short Code *************************/

add_shortcode( 'product_cat', 'productByCategory' );

function productByCategory($atts){ 

	ob_start();

	extract( shortcode_atts( array(
		'per_page' => -1,
		'category' => ''
	), $atts ) );

?>

<div class="collection">
		<div class="portfolioContainer">

			<?php 
				$args = array(

					'post_type' 	=> 'product',
					'posts_per_page' => $per_page,
					'tax_query' => array(
										array(
											'taxonomy' => 'product_cat',
											'field' => 'slug',
											'terms' => $category
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

	<?php

	return ob_get_clean();

}