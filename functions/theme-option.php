<?php

$themename = "Bella Gemmelli";
$shortname = "bg";


$options = array (
 
	array( 
		"name" 		=> $themename." Options",
		"type" 		=> "title"
	),
 
	array( 
		"name" 		=> "General",
		"type" 		=> "section"
	),
	
	array( 
		"type" 		=> "open"
	),
 

	
	array( 
		"name" 		=> "Logo URL",
		"desc"		=> "Enter the link to your logo image",
		"id" 		=> $shortname."_logo",
		"type" 		=> "upload",
		"std" 		=> ""
	),
	
	array( 
		"name" 		=> "Custom Favicon",
		"desc" 		=> "A favicon is a 16x16 pixel icon that represents your site; paste the URL to a .ico image that you want to use as the image",
		"id" 		=> $shortname."_favicon",
		"type" 		=> "upload",
		"std" 		=> get_bloginfo('url') ."/favicon.ico"
	),
	
	array( 
		"name" 		=> "Custom CSS",
		"desc" 		=> "Want to add any custom CSS code? Put in here, and the rest is taken care of. This overrides any other stylesheets. eg: a.button{color:green}",
		"id" 		=> $shortname."_custom_css",
		"type" 		=> "textarea",
		"std" 		=> ""
	),
	
	array( 
	
		"name" 		=> "Google Analytics Code",
		"desc" 		=> "You can paste your Google Analytics or other tracking code in this box. This will be automatically added to the footer.",
		"id" 		=> $shortname."_ga_code",
		"type" 		=> "textarea",
		"std" 		=> ""
	),	
	
	array( 
		"type" 		=> "close"
	),


	array( 
		"name" 		=> "Home Page",
		"type" 		=> "section"
	),
	
	array( 
		"type" 		=> "open"
	),

	array( 
		"name" 		=> "Returns & Exchanges Link",
		"desc"		=> "Enter Returns & Exchanges Link",
		"id" 		=> $shortname."_returnex_link",
		"type" 		=> "text",
		"std" 		=> ""
	),

	array( 
		"name" 		=> "Contact Us Link",
		"desc"		=> "Enter Contact us Link",
		"id" 		=> $shortname."_contactus_link",
		"type" 		=> "text",
		"std" 		=> ""
	),
	

	array( 
		"name" 		=> "Shop Abby Style Link",
		"desc"		=> "Enter Shop Abby Style Link",
		"id" 		=> $shortname."_shop_abby_link",
		"type" 		=> "text",
		"std" 		=> ""
	),


	array( 
		"name" 		=> "Shop Gabby Style Link",
		"desc"		=> "Enter Shop Gabby Style Link",
		"id" 		=> $shortname."_shop_gabby_link",
		"type" 		=> "text",
		"std" 		=> ""
	),
	

	array( 
		"type" 		=> "close"
	),




	array( 
		"name" 		=> "Home Social Media",
		"type" 		=> "section"
	),
	
	array( 
		"type" 		=> "open"
	),

	array( 
		"name" 		=> "Facebook Link",
		"desc"		=> "Enter Facebook Link",
		"id" 		=> $shortname."_facebook_link",
		"type" 		=> "text",
		"std" 		=> ""
	),
	
	array( 
		"name" 		=> "Twitter Link",
		"desc"		=> "Enter Twitter Link",
		"id" 		=> $shortname."_twitter_link",
		"type" 		=> "text",
		"std" 		=> ""
	),

	array( 
		"name" 		=> "Pinterest Link",
		"desc"		=> "Enter Pinterest Link",
		"id" 		=> $shortname."_pinterest_link",
		"type" 		=> "text",
		"std" 		=> ""
	),

	array( 
		"name" 		=> "Instagram Link",
		"desc"		=> "Enter Instagram Link",
		"id" 		=> $shortname."_instagram_link",
		"type" 		=> "text",
		"std" 		=> ""
	),

	array( 
		"name" 		=> "Tumblr Link",
		"desc"		=> "Enter Tumblr Link",
		"id" 		=> $shortname."_tumblr_link",
		"type" 		=> "text",
		"std" 		=> ""
	),

	array( 
		"type" 		=> "close"
	),


	
	array( 
		"name" 		=> "Footer",
		"type" 		=> "section"
	),
	
	array( 
		"type" 		=> "open"
	),
	
	array( 
		"name" 		=> "Footer Copyright Text",
		"desc" 		=> "Enter text used in the copy right area i.e top of the footer. It can be HTML",
		"id" 		=> $shortname."_footer_copy",
		"type" 		=> "text",
		"std" 		=> ""
	),
	
	array( 
		"type" 		=> "close"
	)
 
);


function on_add_admin() {
 
	global $themename, $shortname, $options;
	
	if(isset($_GET['page'])){
	 
		if ($_GET['page'] == basename(__FILE__)) {
		
			if(isset($_REQUEST['action'])){
		 
				if ($_REQUEST['action'] == 'save') {
			 
					foreach ($options as $value) {
						if(isset($value['id'])){
							update_option( $value['id'], $_REQUEST[ $value['id'] ] ); 
						}
					}
			 
					foreach ($options as $value) {
						if( isset( $_REQUEST[ $value['id'] ] ) ) { 
							update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); 
						} else { 
							delete_option( $value['id'] ); 
						} 
					}
			 
				header("Location: admin.php?page=theme-option.php&saved=true");
				
				die;
				
			}
		 
			} else if(isset($_REQUEST['action'])){
			
				if('reset' == $_REQUEST['action']) {
		 
					foreach ($options as $value) {
						delete_option( $value['id'] ); 
					}
				 
					header("Location: admin.php?page=theme-option.php&reset=true");
					die;
				
				}
		 
			
			}
		}
	}

	add_menu_page($themename, $themename, 'administrator', basename(__FILE__), 'on_admin', get_template_directory_uri().'/images/option_panel.png');
}


function on_add_init() {

	$file_dir=get_bloginfo('template_directory');
	wp_enqueue_style("functions", $file_dir."/functions/functions.css", false, "1.0", "all");
	wp_enqueue_script("on_script", $file_dir."/functions/on_script.js", false, "1.0");

}

function on_admin() {
 
	global $themename, $shortname, $options;
	$i=0;
	
	if(isset($_REQUEST['action'])){
	
		if ( $_REQUEST['saved'] ) {
			echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
		}
	}
	
	if(isset($_REQUEST['action'])){
	
		if ( $_REQUEST['reset'] ) {
			echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
		}
	
	}
	 
	?>
	
	<div class="wrap rm_wrap">
	<h2><?php echo $themename; ?> Settings</h2>
	 
	<div class="rm_opts">
	<form method="post">
	<?php foreach ($options as $value) {
	
		switch ( $value['type'] ) {
		 
		case "open":
		?>
		 
		<?php break;
		 
		case "close":
		?>
		 
		</div>
		</div>
		<br />

		 
		<?php break;
		 
		case "title":
		?>
		<p>To easily use the <?php echo $themename;?> theme, you can use the menu below.</p>

		 
		<?php break;
		 
		case 'text':
		?>

		<div class="rm_input rm_text">
			<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
			<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>" />
		 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
		 
		 </div>
		<?php
		break;
		
		
		case 'upload':
		?>
		<script type="text/javascript">
		
		jQuery(document).ready(function($){
 
 
			var custom_uploader;
			var idValue = "";
		 
		 
			$('#<?php echo $value['id']; ?>_button').click(function(e) {
		 
				e.preventDefault();

				
			idValue = $('#<?php echo $value['id']; ?>');
				
				
				//If the uploader object has already been created, reopen the dialog
				if (custom_uploader) {
					custom_uploader.open();
					idValue = $('#<?php echo $value['id']; ?>');
					return;
				}
		 
				//Extend the wp.media object
				custom_uploader = wp.media.frames.file_frame = wp.media({
					title: 'Choose Image',
					button: {
						text: 'Choose Image'
					},
					multiple: false
				});
		 
				//When a file is selected, grab the URL and set it as the text field's value
				custom_uploader.on('select', function() {
					attachment = custom_uploader.state().get('selection').first().toJSON();
					$(idValue).val(attachment.url);
				});
		 
				//Open the uploader dialog
				custom_uploader.open();
		 
			});
		 
		 
		});
		
		
		</script>

		<div class="rm_input rm_upload">
			<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
			<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>" />
			<input id="<?php echo $value['id']; ?>_button" name="<?php echo $value['id']; ?>_button" class="upload_image_button button" type="button" value="Upload" />
		 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
		 
		 </div>
		<?php
		break;
		 
		case 'textarea':
		?>

		<div class="rm_input rm_textarea">
			<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
			<textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id']) ); } else { echo $value['std']; } ?></textarea>
		 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
		 
		 </div>
		  
		<?php
		break;
		 
		case 'select':
		?>

		<div class="rm_input rm_select">
			<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
			
		<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
		<?php foreach ($value['options'] as $option) { ?>
				<option <?php if (get_option( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?>
		</select>

			<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
		</div>
		<?php
		break;
		 
		case "checkbox":
		?>

		<div class="rm_input rm_checkbox">
			<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
			
		<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
		<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />


			<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
		 </div>
		<?php break; 
		case "section":

		$i++;

		?>

		<div class="rm_section">
		<div class="rm_title"><h3><img src="<?php bloginfo('template_directory')?>/functions/images/trans.png" class="inactive" alt=""><?php echo $value['name']; ?></h3><span class="submit"><input name="save<?php echo $i; ?>" type="submit" value="Save changes" />
		</span><div class="clearfix"></div></div>
		<div class="rm_options">

		 
		<?php break;
		 
		}
	}
	?>
	 
	<input type="hidden" name="action" value="save" />
	</form>
	<form method="post">
	<p class="submit">
	<input name="reset" type="submit" value="Reset" />
	<input type="hidden" name="action" value="reset" />
	</p>
	</form>
	</div> 
 

<?php
}

add_action('admin_init', 'on_add_init');
add_action('admin_menu', 'on_add_admin');