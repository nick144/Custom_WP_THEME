jQuery(document).ready(function($){
 
 
    var custom_uploader;
	var idValue = "";
 
 
    $('.upload_image_button').click(function(e) {
 
        e.preventDefault();

		
	idValue = $('#wp_custom_bg');
		
		
        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader) {
            custom_uploader.open();
			idValue = $('#wp_custom_bg');
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