
 <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Staff <small>	</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="form" action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
					
                    <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                <label for="name">Staff Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
                              </div>
                      </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="email">Staff Email</label>
                            <input type="email" name="email_address" class="form-control" id="email" placeholder="Enter Email">
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Username</label>
                                <input type="text" name="username" class="form-control" id="username" placeholder="Enter user Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Confirm password</label>
                                <input type="password" name="cpassword" class="form-control" id="cpassword" placeholder="Enter confirm password">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Type of employee</label>
                                <select class="form-control" name="employee_type">
                                    <option value="">Select Type of employee</option>
                                    <option value="1">Sales Team</option>
                                    <option value="2">trainer</option>
                                    <option value="3">Management</option>
                                    <option value="4">Others</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="dob">DOB</label>
                                <input type="date" name="dob" class="form-control" id="dob" placeholder="Enter date of birth">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="dob">Gender</label>
                                <div class="form-check">
                                    <label class="form-check-label" for="radio1">
                                        <input type="radio" class="form-check-input" id="gender_radio" name="gender" value="1">Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label" for="radio2">
                                        <input type="radio" class="form-check-input" id="gender_radio" name="gender" value="2">Female
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter Phone">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address_line1">Address Line 1</label>
                                <input type="text" name="address_line1" class="form-control" id="address_line1" placeholder="Enter Address Line 1">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address_line2">Address Line 2</label>
                                <input type="text" name="address_line2" class="form-control" id="address_line1" placeholder="Enter Address Line 2">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" name="city" class="form-control" id="city" placeholder="Enter City">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="monthly_salary">Monthly Salary</label>
                                <input type="text" name="monthly_salary" class="form-control" id="monthly_salary" placeholder="Enter monthly salary">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="sales_target">Annual Sales Target</label>
                                <input type="text" name="sales_target" class="form-control" id="sales_target" placeholder="Enter sales target">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="monthly_target">Monthly target</label>
                                <input type="text" name="monthly_target" class="form-control" id="monthly_target" placeholder="Enter monthly target">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="daily_target">Daily target</label>
                                <input type="password" name="daily_target" class="form-control" id="daily_target" placeholder="Enter daily target">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="discount">Max. discount %</label>
                                <input type="text" name="discount" class="form-control" id="discount" placeholder="Enter discount">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputFile">Picture</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile" name="picture">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
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
                  <button type="submit" class="btn btn-primary ripple">Add New Staff</button>
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
      },
       employee_type: {
        required: true,
      },
       password: {
        required: true,
        minlength : 5
      },
      cpassword : {
        minlength : 5,
        equalTo : "#password"
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
       document: {
        required: true,
      },
       monthly_salary: {
        required: true,
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
      picture: {
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
    
});


</script>


EOD;

   
$this->template->customJS = $js;
