

<style>
    #customRadio1 {
        padding: 0px 10px 0px 20px;
    }

</style>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- jquery validation -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create Staff<small>	</small></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" id="form" action="" method="post" enctype="multipart/form-data">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Staff Name</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                               value="<?php echo $staff_details['name']; ?>" placeholder="Enter Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Staff Email</label>
                                        <input type="email" name="email_address" class="form-control" id="email"
                                               value="<?php echo $staff_details['email_address']; ?>" placeholder="Enter Email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Username</label>
                                        <input type="text" name="username" class="form-control" id="username"
                                               value="<?php  echo $staff_details['username']; ?>" placeholder="Enter user Name" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="dob">DOB</label>
                                        <input type="text" name="dob" class="form-control" id="datepicker"
                                               value="<?php  echo $staff_details['dob']; ?>" placeholder="Enter date of birth">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Password</label>
                                        <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Type of employee</label>
                                        <select class="form-control" name="employee_type">
                                            <option value="1" <?php  echo $staff_details['employee_type'] ==1 ? 'selected' : ''; ?>>Sales Team</option>
                                            <option value="2" <?php  echo $staff_details['employee_type'] ==2 ? 'selected' : ''; ?>>trainer</option>
                                            <option value="3" <?php  echo $staff_details['employee_type'] ==3 ? 'selected' : ''; ?>>Management</option>
                                            <option value="4" <?php  echo $staff_details['employee_type'] ==4 ? 'selected' : ''; ?>>Others</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="dob">Gender</label>
                                        <div class="form-check">
                                            <label class="form-check-label" for="radio2">
                                                <input type="radio" class="form-check-input" id="gender_radio" name="gender" value="1" <?php  echo $staff_details['gender'] ==1 ? 'checked': ''; ?>>Male
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label" for="radio2">
                                                <input type="radio" class="form-check-input" id="gender_radio" name="gender" value="2" <?php  echo $staff_details['gender'] ==2 ? 'checked': ''; ?>>Female
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Phone Number</label>
                                        <input type="text" name="phone" class="form-control" id="phone"
                                               value="<?php  echo $staff_details['phone']; ?>" placeholder="Enter Phone">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address_line1">Address Line 1</label>
                                        <input type="text" name="address_line1" class="form-control" id="address_line1"
                                               value="<?php  echo $staff_details['address_line1']; ?>" placeholder="Enter Address Line 1">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address_line2">Address Line 2</label>
                                        <input type="text" name="address_line2" class="form-control" id="address_line1"
                                               value="<?php  echo $staff_details['address_line2']; ?>" placeholder="Enter Address Line 2">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <input type="text" name="city" class="form-control" id="city"
                                               value="<?php  echo $staff_details['city']; ?>" placeholder="Enter City">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Document</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile" name="document">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Document</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <?php
                                                $extenstion = (explode(".",$staff_details['document']));
                                                if(($extenstion[1] == 'png') or ($extenstion[1] == 'jpg') or ($extenstion[1] == 'jpeg')){ ?>
                                                    <img src="<?php echo base_url('images/document/'.$staff_details['document']);?>"
                                                         style="height:50px;width:70px;">
                                                <?php } else { ?>
                                                    <a href="<?php echo base_url('images/document/'.$staff_details['document']);?>"><?php echo $staff_details['document'];?></a>
                                                <?php } ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="monthly_salary">Monthly Salary</label>
                                        <input type="text" name="monthly_salary" class="form-control" id="monthly_salary"
                                               value="<?php  echo $staff_details['monthly_salary']; ?>" placeholder="Enter monthly salary">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="sales_target">Annual Sales Target</label>
                                        <input type="text" name="sales_target" class="form-control" id="sales_target"
                                               value="<?php  echo $staff_details['sales_target']; ?>" placeholder="Enter sales target">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="monthly_target">Monthly target</label>
                                        <input type="text" name="monthly_target" class="form-control" id="monthly_target"
                                               value="<?php  echo $staff_details['monthly_target']; ?>" placeholder="Enter monthly target">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="daily_target">Daily target</label>
                                        <input type="text" name="daily_target" class="form-control"
                                               value="<?php  echo $staff_details['daily_target']; ?>" id="daily_target" placeholder="Enter daily target">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="discount">Max. discount %</label>
                                        <input type="text" name="discount" class="form-control" id="discount"
                                               value="<?php  echo $staff_details['discount']; ?>" placeholder="Enter daily target">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Document</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile" name="picture">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Picture</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <img src="<?php echo base_url('images/profile_picture/'.$staff_details['profile_pic']);?>" style="height:50px;width:70px;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <br>
                                        <label for="status">Status</label><br>
                                        <input type="checkbox" name="status" value="1" checked data-bootstrap-switch data-off-color="danger" data-on-color="success" data-off-text="Deactive" data-on-text="Active" >
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary ripple"><?php echo ($staff_details['staff_id']) ? 'Update Staff' : 'Add New Staff'; ?></button>
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
      email: {
        required: true,
        email: true,
      },
      name: {
        required: true,
      },
       email_address: {
        required: true,
      },
       username: {
        required: true,
        minlength : 5
      },
       employee_type: {
        required: true,
      },
       password: {
        minlength : 5
      },
       dob: {
        required: true,
      },
       gender: {
        required: true,
      },
       phone: {
        required: true,
      },
       monthly_salary: {
        required: true,
        number:true
      },    
       sales_target: {
        required: true,
      },
       monthly_target: {
        required: true,
      },
       daily_target: {
        required: true,
      },
      discount: {
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
      }
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      },
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
