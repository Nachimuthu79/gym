<style>
	

.form-control.err
{
      background: #fff0f0;
    border: 1px solid #ea6f6f;
}

.dowarning
{
    padding: 11px 14px;
    background: #f94e4e;
    color: white;
    font-size: 18px;
    box-shadow: 2px 5px 17px #d00707;
    display:none;
}
</style> 

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
   Account Login
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" placeholder="Username" value="<?php echo $this->input->post('username'); ?>"class="form-control inp rqd"  name="username"  >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password"placeholder="Password"   class="form-control inp rqd" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
     
      <div class="social-auth-links text-center mb-3">
      
        <button type="submit"  class="btn btn-block btn-primary">
			Sign in
        </button>
       
      </div>
        
      </form>


    </div>
    <!-- /.login-card-body -->

  </div>
      							<div class="dowarning"></div>

</div>


<?php

$this->template->customJS = "<script>
$('form').submit(function(){

 $('.dowarning').hide();
 $('.dowarning').html('');

 $('form .inp').each(function(){
 
 err = 0; 
  if(!$(this).val().trim()) 
  {
	  $(this).addClass('err');
	  err = 1;
	}
	else
	{
		$(this).removeClass('err');
	} 
	
	



});

if(err == 1) { return false; }



	$('form .submit-bg').attr('disabled',true);


var fd = new FormData($('form')[0]);    

$.ajax({
  url: '',
  data: fd,
  processData: false,
  contentType: false,
  type: 'POST',
  success: function(data){
    	 
    req = JSON.parse(data);
    console.log(req)
    if(req.status == 0 ) { 
		dowarning('Invalid Username or Passowrd');
			$('form .submit-bg').attr('disabled',false);

    
	} else {
	 
		window.location.replace('".site_url('login/loginProcess')."');

	}
    
    
  }
});
 



 
return false; 
 
});

 $('form .inp').focus(function(){
		$(this).removeClass('err');

});



function dowarning(msg) {

$('.dowarning').html(msg);
$('.dowarning').slideDown();

setTimeout(
  function() 
  {
$('.dowarning').slideUp();
  }, 8000);
  
  

}

</script>"; 






