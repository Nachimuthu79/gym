
$('.profile_picture_up_but').click(function(){
	
	$('#profile_image').trigger('click');
	
});

function readSettingIconURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.site_logo').attr('src', e.target.result);
            $('#site_logo_base64').val(e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
    else
    {
	  $('.site_logo').attr('src', base_url+'images/profile_picture/default.png');
	  $('#site_logo_base64').val('');
	}
}

$("#profile_image").change(function(){
	
	 var ext = this.value.match(/\.(.+)$/)[1];
	if(ext == "jpg" || ext == "png" || ext=="jpeg") {

	readSettingIconURL(this);
    return true;
	}
	
		  $('.site_logo').attr('src', base_url+'images/profile_picture/default.png');
		  $('#site_logo_base64').val('');

			alert('Selected file is not the image');
            this.value='';
});


// ===================================================================
// site icon

$('.site_icon_up_but').click(function(){

	$('#site_icon_image').trigger('click');

});

function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			$('.site_icon').attr('src', e.target.result);
			$('#site_icon_base64').val(e.target.result);
		}

		reader.readAsDataURL(input.files[0]);
	}
	else
	{
		$('.site_icon').attr('src', base_url+'images/profile_picture/default.png');
		$('#site_icon_base64').val('');
	}
}

$("#site_icon_image").change(function(){

	var ext = this.value.match(/\.(.+)$/)[1];
	if(ext == "jpg" || ext == "png" || ext=="jpeg") {

		readURL(this);
		return true;
	}

	$('.site_icon').attr('src', base_url+'images/profile_picture/default.png');
	$('#site_icon_base64').val('');

	alert('Selected file is not the image');
	this.value='';
});

		
		
