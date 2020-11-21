<style>
	html , body {
		
		       background: #ffffff !important;
	}
	
	.login-layout .widget-box .widget-main {
    padding: 16px 36px 36px;
    background: #1984ec;
    box-shadow: 1px 4px 30px #716c6c;
}
input ,input:focus
{
	    outline: none !important;
	    border: none;

}
.header.blue {
    border-bottom: 3px solid yellow;
    font-size: 25px;
    color: white !important;
    font-weight: 600;
    text-align: left !important;
    padding-bottom: 5px;
}
.av {
	
	    color: white;
    font-weight: 600;
    padding: 0px 2px;
}
.btn-primary
{
	    border: none;
    background: #ffffff !important;
    color: #0e0e0e !important;
    text-shadow: none;
    font-size: 14px;
    font-weight: 600;
    box-shadow: 1px 4px 30px gray !important;
        transition: 0.3s ease;

}
.btn-primary:hover ,.btn-primary:focus
{
	    color: white !important;
}

.form-control.err
{
      background: #ffbaba;
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

	<body class="login-layout">
		<div class="main-container" >
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									
								</h1>
							
							</div>

						<div  style="text-align:center">
								</div>
							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border" style="    background: transparent;">
							
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger" style="text-align:center">
												Account Login
											</h4>

											<div class="space-6"></div>

											<form action="" method="post">
											<?php if(isset($error)){  ?><div class="error"> <?php echo $error; ?></div> <?php } ?>
												<fieldset>
													<label class="block clearfix">
														<span class="av">Username</span>
														<span class="block input-icon input-icon-right">
															<input type="text"  value="<?php echo $this->input->post('username'); ?>"class="form-control inp rqd"  name="username" />
														</span> 
													</label>

													<label class="block clearfix">
														<span class="av">Password</span>
														<span class="block input-icon input-icon-right rqd">
															<input type="password" class="form-control inp rqd" name="password" />
														</span>
													</label>

													<div class="space"></div>

													<div class="clearfix">
													

														<button type="submit"  name="submit" value="submit"class="width-35 pull-left btn btn-sm btn-primary submit-bg">
															<span class="bigger-110">Login</span>
														</button>
													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>

											
										</div><!-- /.widget-main -->

										
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->

							<div class="dowarning"></div>
							
									</div><!-- /.widget-body -->
								</div><!-- /.signup-box -->
							</div><!-- /.position-relative -->

							
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

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





