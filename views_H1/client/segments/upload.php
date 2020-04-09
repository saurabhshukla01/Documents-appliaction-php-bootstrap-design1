<div class="wrapper">
   <div class="container-fluid">
      <!-- Page-Title -->
      <div class="row">
         <div class="col-sm-12">
            <div class="page-title-box">
               <h4 class="page-title">Import from CSV file</h4>
               <div class="btn-group mt-2">
                  <ol class="breadcrumb hide-phone p-0 m-0">
                     <?php echo $breadcrumbs; ?>
                  </ol>
               </div>
            </div>
         </div>
      </div>
      <!-- end page title end breadcrumb -->
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-body">
                 <?php if($this->session->flashdata('message')){?>
                <div class="alert alert-success">
                    <?php echo $this->session->flashdata('message')?>
                </div>
                <?php } ?>
            <?php if (validation_errors()!=''){ ?> 
            <div class="alert alert-danger">
              <?php echo validation_errors();  ?>
            </div>
            <?php } ?>
                 
                  <form action="" id=myForm" method="post" enctype="multipart/form-data">
                     <div class="row">
                       <?php if(isset($list)){ ?>
                            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                                <div class="form-group">
                                    <h6 class="align-center m-t-20"><b>List Upload For: <?php echo $list->name; ?></b></h6>
                                    <input type="hidden" value="<?php echo $list->list_id; ?>" id="existing_data_source" name="existing_data_source">
                                </div>
                            </div>
                            <?php }else{ ?>
                            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                                <div class="form-group">
                                    <label for="data_source">New List<span class="text-danger">*</span></label>
                                    <input class="form-control" name="data_source" value="" id="data_source" parsley-trigger="change" placeholder="New List" data-parsley-pattern="/^((?!(TESTMAIL|TRANSACTIONALMAIL)).)*$/img" data-parsley-error-message="TESTMAIL and TRANSACTIONALMAIL can not be used as List Name" data-parsley-id="6" type="text" required>
                                </div>
                            </div>
                            <?php } ?>
                        <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                                <div class="form-group">
									<label for="data_source">Upload your .CSV file here<span class="text-danger">*</span></label>
                                    <div class="custom-file">
                                        <input id="uploadBtn" name="uploadBtn" class="form-control" required="" parsley-filemaxsize="uploadBtn|1.5" data-parsley-fileextension="csv" parsley-error-message="This field is required" parsley-trigger="change" data-parsley-errors-container="#file_error" data-parsley-id="8" type="file">
                                        <span class="custom-file-control fileVal" data-content-value="Choose file..."></span>
                                    </div>
                                    <div id="file_error"></div>
                                </div>
                            </div>
                        <div class="col-md-6"></div>
                        <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12">
                           <div class="form-group" style="float:right;">
                              <button type="submit" class="btn btn-primary waves-effect waves-light" name="save" id="save">Submit</button>
                              <button type="button" class="btn btn-secondary waves-effect m-l-5" name="cancel" id="cancel">Cancel</button>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
         <!-- end col -->
      </div>
      <!-- end row -->
   </div>
   <!-- end container -->
</div>
<!-- end wrapper -->  
<script type="text/javascript">
   $('#cancel').click(function() {
        $(location).attr('href', '<?php base_url();?>/client/lists');
     });

   $('input[type="file"]').on('change', function() {
       $('.fileVal').attr('data-content-value', $(this)[0].files[0].name);
   });
   
   $(document).ready(function() {
       window.ParsleyValidator
       .addValidator('fileextension', function (value, requirement) {
           var fileExtension = value.split('.').pop();
           if(fileExtension != 'csv')
           {
               setTimeout(function(){
               $('.parsley-fileextension').addClass('parsley-required');
               },1);
           }
           return fileExtension === requirement;
       }, 32)
       .addMessage('en', 'fileextension', 'The extension doesn\'t match the required');
   
       window.ParsleyValidator
       .addValidator('filemaxsize', function (val, req) {
           var reqs = req.split('|');
           var input = $('input[type="file"][name="'+reqs[0]+'"]');
           var maxsize = reqs[1];
           alert(input);alert(maxsize);return false;
           var max_bytes = maxsize * 1000000, file = input.files[0];
           return file.size <= max_bytes;
   
           }, 32)
       .addMessage('en', 'filemaxsize', 'The File size is too big.')
       $("#myForm").parsley();
   
   }); 
</script>
