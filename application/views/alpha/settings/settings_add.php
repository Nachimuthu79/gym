<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Settings <small>	</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="form" action="" method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="card-body">
                    <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                            <label for="name">Setting Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name" required>
                          </div>
                      </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="email">Setting Currency</label>
                              <select class="form-control" name="currency" class="currency select" id="select_currency" required>
                                  <option value="">Select currency</option>
                                  <?php
                                   foreach($currency as $currency_data) { ?>
                                    <option value=<?php echo $currency_data['currency_code']?>><?php echo $currency_data['currency_code']?></option>
                                  <?php } ?>
                              </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email">Timezone</label>
                                <select class="form-control" name="timezone" class="timezone select" id="select_timezone" required>
                                    <option value="">Select timezone</option>
                                    <?php
                                    foreach($timezones as $timezone) { ?>
                                        <option value=<?php echo $timezone?>><?php echo $timezone?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <h5>Setting logo</h5>
                            <div class="profile_imager"><img class="site_logo" src="<?php echo base_url('images/site_logo/default.png') ?>">
                                <button type="button" class="btn btn-block profile_picture_up_but btn-info btn-sm">Upload</button>
                                <input type="file" name="site_logo" accept="image/x-png,image/gif,image/jpeg"  id="profile_image">
                                <input type="hidden" name="site_logo_base64" id="site_logo_base64">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h5>Setting Icon</h5>
                            <div class="profile_imager"><img class="site_icon" src="<?php echo base_url('images/site_logo/default_icon.png') ?>">
                                <button type="button" class="btn btn-block site_icon_up_but btn-info btn-sm">Upload</button>
                                <input type="file" name="site_icon" accept="image/x-png,image/gif,image/jpeg"  id="site_icon_image">
                                <input type="hidden" name="site_icon_base64" id="site_icon_base64">
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-right">
                  <button type="submit" class="btn btn-primary ripple">Add Settings</button>
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
 $('#form').validate({
    rules: {
      name: {
        required: true,
      },
      currency: {
        required: true,
      },
       timezone: {
        required: true,
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
   $("#select_currency").select2();
   $("#select_timezone").select2();
});

</script>


EOD;


$this->template->customJS = $js;
