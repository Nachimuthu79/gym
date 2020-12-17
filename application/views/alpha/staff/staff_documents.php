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
                    <a class="nav-link "  href="<?php echo site_url('staff/edit/'.$staff_details['staff_id']); ?>"  id="custom-tabs-one-home-tab"  aria-selected="true">Details</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('staff/settings/'.$staff_details['staff_id']); ?>"id="custom-tabs-one-home-tab" >Settings</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link active"  id="custom-tabs-one-home-tab" >documents</a>
                  </li>

                </ul>
			</div>
            <form role="form" id="form" action="" method="post" enctype="multipart/form-data" class="document_page" onsubmit="return checkFIleValidation()">
             <div class="card-body">
                 <div class="col-md-12 documents">
                     <div class="row">
                         <div class="col-md-3">
                             <div class="form-group">
                                 <label for="name">Type of documents</label>
                                 <select class="form-control" name="document_type" required>
                                     <option value="">Select Documents</option>
                                     <option value="1">Aadhar card</option>
                                     <option value="2">Voter id</option>
                                     <option value="3">Driving licence</option>
                                     <option value="4">Others</option>
                                 </select>
                             </div>
                         </div>
                         <div class="col-md-3">
                             <div class="form-group">
                                 <label for="name">Document Name</label>
                                 <input type="text" name="document_name"  id="name" class="form-control" required>
                             </div>
                         </div>
                         <div class="col-md-3">
                             <div class="form-group">
                                 <label for="name">Documents</label>
                                 <div class="file-hidden-list"></div>
                                 <input type="button" name="documents"  id="addFile" class="form-control addFile0" value="upload documents">
                             </div>
                         </div>
                         <div class="col-md-3 append_tag">
                             <div class="append_tag" id="document_tag">
                                 <?php foreach($documents as $document) { ?>
                                     <a href="<?php echo base_url('images/document/'.$staff_details['user_id'].'/'.$document['document_url']);?>">
                                         <?php echo $document['document_url'];?></a>
                                     <a href="<?php echo site_url('staff/delete_documents/'.$staff_details['staff_id'].'/'.$document['id'])?>"
                                        onclick="return confirm('Are you sure you want to delete this document?');"><span style="color:red;padding-left:22px;title:remove">
                                             <i class="nav-icon fas fa-times"></i></span></span></a><br><br>
                                 <?php } ?>
                                 <div class="file-list" id="file-list">
                                 </div>
                             </div>

                         </div>
                         <div class="col-md-3">
<!--                             <input type="file" name="file[]" id="addFile" class="addFile0 form-control">-->
                         </div>
<!--                         <button id="addFile" class="add-button">Add File</button>-->
                     </div>
                 </div>

                 </div>
                <!-- /.card-body -->
                <div class="card-footer text-left">
                  <button type="submit" class="btn btn-primary ripple">Save documents</button>
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

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function checkFIleValidation() {
        if(($('.thumbnail').length) == 0){
            alert("Please upload File");
            return false;
        }
        }

    function hiddenFile(o){
        let file = '';
        file += '<input type="file" name="file" id="'+o.id+'"/>';
        return file;
    }

    function file(o){
        let type = '';
		if(o.ext === 'pdf') {
            type = 'pdf';
        }
        else if(o.ext === 'docx'){
                type = 'alt';
            }
		else{
			alert("Only Allowed Pdf or docx allowed");
			return false;
		}
        let fileThumbnail = '';
        fileThumbnail += '<div class="thumbnail">';
        fileThumbnail += '  <i class="far fa-file-'+type+'"></i>';
        fileThumbnail += '  <p class="name">'+o.name+'</p>';
        fileThumbnail += '  <a href="#'+o.id+'" class="delete"><i class="far fa-minus-square"></i></a>';
        fileThumbnail += '</div>';
        return fileThumbnail;
    }

    function addFile(o)
    {
        $('.file-hidden-list').append(hiddenFile(o));
        $('#' + o.id).click();
        $('#' + o.id).on('change', function(e){
            const arr1 = e.target.value.split('\\');
            const name = arr1[arr1.length-1];
            o.name = name;

            const arr2 = e.target.value.split('.');
            const ext = arr2[arr2.length-1];
            o.ext = ext;
            $('.file-list').append(file(o));
        });
    }

    function makeid(length) {
        var result           = '';
        var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var charactersLength = characters.length;
        for ( var i = 0; i < length; i++ ) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
        }
        return result;
    }

    $(document).on('click', '#addFile', function(){
        if(($('.thumbnail').length) == 0){
            addFile({id:makeid(10)});
        }
        else{
            alert("Only one file allowed");
        }

    });
    $(document).on('click', '.delete', function(){
        const id = $(this).attr('href');
        $(id).remove();
        $(this).parent().remove();
    });
</script>
    
   
