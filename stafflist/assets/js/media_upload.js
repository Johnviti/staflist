jQuery(document).ready( function($) {
  var image_placeholder_src = jQuery('#image-preview').attr('src');

    jQuery('#stafflist_media_manager').on( "click", {is_update: false}, image_frame );
    jQuery('#edit-stafflist_media_manager').on( "click", {is_update: true}, image_frame );
      
    function image_frame(e) {
           e.preventDefault();
           var is_update = e.data.is_update;
           var selector = is_update ? 'edit-' : '';
           var image_frame;
           if(image_frame){
               image_frame.open();
           }
           // Define image_frame as wp.media object
           image_frame = wp.media({
                title: 'Select Media',
                multiple : false,
                library : {
                    type : 'image',
                }
            });

            image_frame.on('close',function() {
              // On close, get selections and save to the hidden input
              // plus other AJAX stuff to refresh the image preview
              var selection =  image_frame.state().get('selection');
              var gallery_ids = new Array();
              var my_index = 0;
              selection.each(function(attachment) {
                  gallery_ids[my_index] = attachment['id'];
                  my_index++;
              });
              var ids = gallery_ids.join(",");
              if(ids.length === 0) return true;//if closed withput selecting an image
              jQuery('input#' + selector + 'staff-image').val(ids);
              Refresh_Image(ids, selector);
              $('#btn-' + selector + 'remove-image').css('visibility', 'visible');
            });

          image_frame.on('open',function() {
            // On open, get the id from the hidden input
            // and select the appropiate images in the media manager
            var selection =  image_frame.state().get('selection');
            var ids = jQuery('input#' + selector + 'staff-image').val().split(',');
            ids.forEach(function(id) {
              var attachment = wp.media.attachment(id);
              attachment.fetch();
              selection.add( attachment ? [ attachment ] : [] );
            });

          });
        
        image_frame.open();
   }

  // DELETE IMAGE LINK
  $('#btn-remove-image').on( "click", {is_update: false}, remove_preview );
  $('#btn-edit-remove-image').on( "click", {is_update: true}, remove_preview );

  function remove_preview(event) {
    var is_update = event.data.is_update;
    var selector = is_update ? 'edit-' : '';
    event.preventDefault();

    // Clear out the preview image
    jQuery('#' + selector + 'image-preview').attr('src', image_placeholder_src);

    // Hide the delete image link
    jQuery('#btn-' + selector + 'remove-image').css('visibility', 'hidden');

    // Delete the image id from the hidden input
    jQuery('#' + selector + 'staff-image').val( '' );

  };


// Ajax request to refresh the image preview
function Refresh_Image(the_id, selector){
  var data = {
      action: 'stafflist_get_image',
      id: the_id,
      selector: selector
  };

  jQuery.get(ajaxurl, data, function(response) {
      if(response.success === true) {
          jQuery('#' + selector + 'image-preview').attr('src', response.data.image );
      }
  });
}

});

