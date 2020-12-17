
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- jquery validation -->
                <div class="card card-primary card-tabs">
                    <div class="card-header p-0 pt-1">

                        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active"  id="custom-tabs-one-home-tab"  aria-selected="true">Details</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link"  href="<?php echo site_url('trainers/settings/'.$trainer_details['trainer_id']); ?>"   id="custom-tabs-one-home-tab" >Settings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"  href="<?php echo site_url('trainers/documents/'.$trainer_details['trainer_id']); ?>"   id="custom-tabs-one-home-tab" >Documents</a>
                            </li>
                        </ul>
                    </div>
                <div class="card card-primary">
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" id="form" action="" method="post" enctype="multipart/form-data" autocomplete="off">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Trainer Name</label>
                                        <input type="text" name="name" class="form-control" id="name" value="<?php  echo $trainer_details['name']; ?>"placeholder="Enter Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Trainer Email</label>
                                        <input type="email" name="email_address" class="form-control" id="email" value="<?php  echo $trainer_details['email_address']; ?>" placeholder="Enter Email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Username</label>
                                        <input type="text" name="username" class="form-control" id="username" value="<?php  echo $trainer_details['username']; ?>" placeholder="Enter user Name" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Password</label>
                                        <input type="password" name="password" class="form-control" id="password"  placeholder="Enter password">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="dob">DOB</label>
                                        <input type="text" name="dob" class="form-control" id="datepicker" placeholder="Enter date of birth" value="<?php  echo $trainer_details['dob']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email_address">Gender</label>
                                        <br>
                                        <div class="icheck-primary  d-inline">
                                            <input type="radio"  id="gender_male"  <?php echo ($trainer_details['gender'] == "male" ) ? 'checked' : ''; ?> value="male" name="gender">
                                            <label for="gender_male">Male</label>
                                        </div>
                                        <div class="icheck-primary  d-inline">
                                            <input type="radio"  id="gender_female" <?php echo ($trainer_details['gender'] == "female" ) ? 'checked' : ''; ?> value="female" name="gender">
                                            <label for="gender_female">Female</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Phone Number</label>
                                        <input type="text" name="phone" class="form-control" id="phone" value="<?php  echo $trainer_details['phone']; ?>" placeholder="Enter Phone">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address_line1">Address Line 1</label>
                                        <input type="text" name="address_line1" class="form-control" id="address_line1" value="<?php  echo $trainer_details['address_line1']; ?>" placeholder="Enter Address Line 1">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address_line2">Address Line 2</label>
                                        <input type="text" name="address_line2" class="form-control" id="address_line2" value="<?php  echo $trainer_details['address_line2']; ?>" placeholder="Enter Address Line 2">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="monthly_salary">Monthly Salary</label>
                                        <input type="text" name="monthly_salary" class="form-control" id="monthly_salary"
                                               value="<?php  echo $trainer_details['monthly_salary']; ?>" placeholder="Enter monthly salary">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="training_commision">Personal training commision</label>
                                        <input type="text" name="training_commision" class="form-control" id="training_commision"
                                               value="<?php  echo $trainer_details['training_commision']; ?>" placeholder="Enter training commision">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="sales_target">Annual Sales Target</label>
                                        <input type="text" name="sales_target" class="form-control" id="sales_target"
                                               value="<?php  echo $trainer_details['sales_target']; ?>"placeholder="Enter sales target">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="monthly_target">Monthly target</label>
                                        <input type="text" name="monthly_target" class="form-control" id="monthly_target"
                                               value="<?php  echo $trainer_details['monthly_target']; ?>" placeholder="Enter monthly target">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="daily_target">Daily target</label>
                                        <input type="text" name="daily_target" class="form-control" id="daily_target"
                                               value="<?php  echo $trainer_details['daily_target']; ?>" placeholder="Enter daily target">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <br>
                                        <label for="status">Status</label> <br>
                                        <input type="checkbox" name="status" value="1" <?php echo ($trainer_details['status'] ==1) ? 'checked' : ''; ?> data-bootstrap-switch data-off-color="danger" data-on-color="success" data-off-text="Deactive" data-on-text="Active" >
                                    </div>
                                </div>
                            </div>
                            <br>
                            <h4>Profile Picture</h4>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="profile_imager"><img class="profile_picture" src="<?php
                                        if(!$trainer_details['profile_pic']) { $trainer_details['profile_pic'] = 'default.png'; }
                                        echo base_url('images/profile_picture/'.$trainer_details['profile_pic']); ?>">

                                        <button type="button" class="btn btn-block profile_picture_up_but btn-info btn-sm">Upload</button>
                                        <button type="button" class="btn btn-block profile_picture_ca_but btn-secondary btn-sm">Camara</button>	<input type="file" name="profile_image" accept="image/png,image/gif,image/jpeg"  id="profile_image">
                                        <input type="hidden" name="profile_image_base64" id="profile_image_base64">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="camara_window" style="display:none">
                                        <div id="my_camera"></div>
                                        <br>
                                        <button type="button" class="btn btn-danger profile_picture_snpsh_but btn-info btn-sm">Take Snapshot</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary ripple"><?php echo ($trainer_details['trainer_id']) ? 'Update Trainer' : 'Add New Trainer'; ?></button>
                </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">

        </div>
        <!--/.col (right) -->
    </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>


<?php

$js = <<<EOD

<script type="text/javascript">
$(document).ready(function () {


  $.validator.setDefaults({
    submitHandler: function () {
    
    return true;
    }
  });
  
  $('#form').validate({
    rules: {
      email_address: {
        required: true,
        email: true,
      },
      name: {
        required: true,
      },
       dob: {
        required: true,
      },
      gender: {
        required: true,
      },
       phone: {
        required: true,
        number:true
      },
       password: {
        minlength : 5
      },
       training_commision: {
        required: true,
      },
      sales_target: {
        required: true,
      },
       daily_target: {
        required: true,
      },
      monthly_target: {
        required: true,
      },
      address_line1: {
        required: true,
      },
      address_line2: {
        required: true,
      },  
      city: {
        required: true,
      },
       monthly_salary: {
        required: true,
        number:true
      },
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      },
      password: {
        required: "Please enter a name",
      }
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
  
  $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });
    
  //Date picker
    $('#datepicker').datepicker({
        endDate: '+0d',
        autoclose: true
    })
});


</script>


EOD;


$this->template->customJS = $js;
