<div class="wrapper">
            <div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Update Profile</h4>
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
                                <?php }  echo form_open('', ['enctype'=>'multipart/form-data']); ?>
								<div class="whiteBox">
                         <div class="row">
                            <div class="col-md-6">
                        <div class="form-group">
                            <label for="first_name">First Name<span class="text-danger">*</span></label>
                            <input type="first_name" class="form-control" name="first_name" value="<?php echo isset($first_name)?$first_name:''?>" id="first_name" parsley-trigger="change" required placeholder="First Name" tabindex="1"  maxlength="50" data-parsley-pattern="^[a-zA-Z\s+]+$"  data-parsley-error-message="Please enter valid name.">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="last_name">Last Name<span class="text-danger">*</span></label>
                            <input type="last_name" class="form-control" name="last_name" id="last_name" parsley-trigger="change" required placeholder="Last Name" value="<?php echo (isset($last_name))?$last_name:'';?>"  maxlength="15" tabindex="2" data-parsley-pattern="^[a-zA-Z\s+]+$"  data-parsley-error-message="Please enter valid name." >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mobileno">Mobile<span class="text-danger">*</span></label>
                            <input type="text" value="<?php echo (isset($mobile_no)?$mobile_no:'')?>" class="form-control" name="mobile_no" id="mobile_no" parsley-trigger="change" required placeholder="Mobile" maxlength="10" tabindex="4" data-parsley-pattern="^[0-9]{10,15}$" data-parsley-error-message="only enter your 10 digit number." oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onkeypress="return isNumberKey1(event)">
                        </div>
                    </div>
					 <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">Password<span class="text-danger"></span></label>
                            <input type="password" class="form-control" name="password" id="password" parsley-trigger="change" placeholder="Password"  maxlength="50" tabindex="5" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cpassword">Confirm Password<span class="text-danger"></span></label>
                            <input type="password" class="form-control" name="cpassword" id="cpassword" parsley-trigger="change" data-parsley-equalto="#password" placeholder="Confirm Password" tabindex="6" >
                        </div>
                    </div>
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
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->  
<script type="text/javascript">
    $('#cancel').click(function() {
         $(location).attr('href', '<?php base_url();?>/admin/settings');
      });
    
     function isNumberKey1(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
    
            return true;
        }
</script>
