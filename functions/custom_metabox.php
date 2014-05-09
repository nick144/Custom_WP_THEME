<?php


function one_source_metaClass() {
    new Metaboxclass();
}

if ( is_admin() ) {
    add_action( 'load-post.php', 'one_source_metaClass' );
    add_action( 'load-post-new.php', 'one_source_metaClass' );
}

class Metaboxclass {

	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
		add_action( 'save_post', array( $this, 'save' ) );
	}

	public function add_meta_box( $post_type ) {
	
            $post_types = array('page');
           
		   if ( in_array( $post_type, $post_types )) {
				add_meta_box(
					'one_source_sectionid'
					,__('Page Details', 'onesource')
					,array( $this, 'render_meta_box_content' )
					,$post_type
					,'advanced'
					,'high'
				);
            }
	}

	
	public function save( $post_id ) {
	
	
		if ( ! isset( $_POST['one_source_inner_custom_box_nonce'] ) )
			return $post_id;

		$nonce = $_POST['one_source_inner_custom_box_nonce'];
		$upload_nonce = $_POST['wp_image_uploader_nonce'];
		
		if ( ! wp_verify_nonce( $upload_nonce, 'wp_image_uploader' ) )
			return $post_id;
		
		if ( ! wp_verify_nonce( $nonce, 'one_source_inner_custom_box' ) )
			return $post_id;

		
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
			return $post_id;

		
		if ( 'page' == $_POST['post_type'] ) {

			if ( ! current_user_can( 'edit_page', $post_id ) )
				return $post_id;
		  
		  } else {

			if ( ! current_user_can( 'edit_post', $post_id ) )
				return $post_id;
		  }
		  
		  if(! empty($_POST['wp_custom_bg'])){
		  
							 $filename = $_POST['wp_custom_bg'];
							
							 $uploaddata = $_POST['wp_custom_bg'];
							 $oldupload  = get_post_meta( $post_id, '_wp_custom_bg', true );
							  
				 if ($uploaddata && $uploaddata != $oldupload) {
							  
							  $attach_id = wp_insert_attachment( $attachment, $filename, $post_id );
							  
							  require_once( ABSPATH . 'wp-admin/includes/image.php' );
							  $attach_data = wp_generate_attachment_metadata( $attach_id, $filename );
							  wp_update_attachment_metadata( $attach_id, $attach_data );

							  							 
							update_post_meta($post_id, '_wp_custom_bg', $uploaddata);
							
				 } 
			  

			}elseif(empty($_POST['wp_custom_bg']) || $_POST['wp_custom_bg'] == "") {
				
							delete_post_meta($post_id, '_wp_custom_bg', $oldupload);
							
			}
		  
		
		$new = sanitize_text_field( $_POST['page_description'] );
		$old = get_post_meta( $post_id, '_page_description', true );
		
		if ($new && $new != $old) {
				update_post_meta($post_id, '_page_description', $new);
		} elseif ('' == $new && $old && $field['type'] != 'file' && $field['type'] != 'image') {
				delete_post_meta($post_id, '_page_description', $old);
		}
		
	}


	public function render_meta_box_content( $post ) {
	
		wp_nonce_field( 'one_source_inner_custom_box', 'one_source_inner_custom_box_nonce' );

		  $content = get_post_meta( $post->ID, '_page_description', true );
		  
		  echo '<div class="onesource_meta_box">';
		  echo '<label for="page_description">';
			   _e( "Page Description", 'onesource' );
		  echo '</label> ';

		  $settings = array( 'textarea_name' => 'page_description', 'media_buttons' => false, 'textarea_rows' => 5, 'wpautop' => false, 'teeny' => true );
		  $editor_id = 'mycustomeditor';

		  wp_editor( $content, $editor_id, $settings );

		  /*echo '<textarea id="page_description" name="page_description">' . esc_attr( $value ) . '</textarea>';*/
		  echo '</div>';
		
		  $this->wp_image_uploader($post);
	}
	
	public function wp_image_uploader( $post ) {
	
		wp_nonce_field( 'wp_image_uploader', 'wp_image_uploader_nonce' );

		  $value = get_post_meta( $post->ID, '_wp_custom_bg', true );
		  ?>
		  <script type="text/javascript" src="<?php echo get_template_directory_uri() . '/functions/uploader.js' ?>"></script>
		  
		  <div class="onesource_meta_box">
		  	 <label for="description"><?php _e( "Header Image", 'onesource' ); ?></label>
			 <input type="text" id="wp_custom_bg" name="wp_custom_bg" value="<?php echo $value; ?>" size="25">
			 <input id="wp_custom_bg_button" name="wp_custom_bg_button" class="upload_image_button" class="button" type="button" value="Upload" />
			 <?php
			 	if(!empty($value)){ ?>
					 <div class="img_container"><img class="meta_bg_img" src="<?php echo $value; ?>" alt="page background image" /></div>
			 <?php } ?>
		  </div>
		  
		<?php
	}
}