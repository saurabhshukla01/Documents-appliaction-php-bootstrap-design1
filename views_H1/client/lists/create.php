<div class="wrapper">
            <div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <h4 class="page-title">List Create</h4>
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
                                <?php if (validation_errors()!=''){ ?>
                            <div class="alert alert-danger">
                                <?php echo validation_errors(); ?>
                            </div>
                            <?php } echo form_open('/client/lists/create', ['enctype'=>'multipart/form-data']); ?>
                                <div class="row">
                                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name<span class="text-danger">*</span></label>
                            <input type="name" class="form-control <?php if(form_error('name')!=''){ echo "parsley-error"; } ?>" name="name" value="<?php echo isset($name)?$name:''?>" id="name" required placeholder="Name" tabindex="1"  maxlength="50"  data-parsley-error-message="Please enter valid name.">
                        </div>
                    </div>
					<div class="col-md-6">
                        <div class="form-group">
                           <label for="client_logo">Upload your .CSV file here</label>
                             <div class="custom-file">
								<input id="uploadBtn" name="uploadBtn" class="form-control" required="" parsley-filemaxsize="uploadBtn|1.5" data-parsley-fileextension="csv" parsley-error-message="This field is required" data-parsley-errors-container="#file_error" data-parsley-id="8" type="file">
                             </div>
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
                            <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->  
<script type="text/javascript">
    $('#cancel').click(function() {
         $(location).attr('href', '<?php base_url();?>/client/lists');
      });
	$('#uploadBtn').click(function() {
        $('.parsley-required').remove();
        $("input[name=uploadBtn]").parsley().reset();
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
