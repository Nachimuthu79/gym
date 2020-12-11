var camera_on = 0;
$('.profile_picture_up_but').click(function(){
	
	$('#profile_image').trigger('click');
	
});


function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.profile_picture').attr('src', e.target.result);
            $('#profile_image_base64').val(e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
    else
    {
	  $('.profile_picture').attr('src', base_url+'images/profile_picture/default.png');	
	  $('#profile_image_base64').val('');
	}
}

$("#profile_image").change(function(){
	
	 var ext = this.value.match(/\.(.+)$/)[1];
	if(ext == "jpg" || ext == "png" || ext=="jpeg") {
		
    readURL(this);
    return true;
	}
	
		  $('.profile_picture').attr('src', base_url+'images/profile_picture/default.png');	
		  $('#profile_image_base64').val('');

			alert('Selected file is not the image');
            this.value='';
});

$('.profile_picture_ca_but').click(function() {
	
	
	
	if(camera_on == 0) {
		
		Webcam.set({
			width: 300,
			height: 225,
			image_format: 'jpeg',
			jpeg_quality: 1200
		});
		Webcam.attach( '#my_camera' );
		
		$('.camara_window').show();
		camera_on = 1;
	} else
	{
		$('.camara_window').hide(); 
		camera_on =0 ;
	}
	
	
	
	});



		
		
$('.profile_picture_snpsh_but').click(function() {
			Webcam.snap( function(data_uri) {
				$('#profile_image_base64').val(data_uri);
$('.profile_picture').attr('src', data_uri);
			} );
		});
		
		
