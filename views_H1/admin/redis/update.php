<div class="wrapper">
            <div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Client Create</h4>
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
                            <?php }  echo form_open('admin/redis-client/update/'.$key); ?>
                                <div class="row">
                                 <div class="col-md-6">
                        <div class="form-group">
							<label for="rediskey">Redis Key<span class="text-danger">*</span></label>
                            <input type="rediskey" class="form-control <?php if(form_error('rediskey')!=''){ echo "parsley-error"; } ?>" name="rediskey" value="<?php echo isset($rediskey)?$rediskey:''?>" id="rediskey" parsley-trigger="change" required placeholder="Redis key" tabindex="1"  maxlength="150"  data-parsley-error-message="Please enter valid redis Key.">
                        </div>
                    </div>
                    <div class="col-md-6"></div>
                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12">
                        <div class="form-group" style="float:right;">
                            <button type="submit" class="btn btn-primary waves-effect waves-light" name="save" id="save">Update</button>
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
         $(location).attr('href', '<?php base_url();?>/admin/redis-client');
      });
</script>
