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
                            <?php }  echo form_open('admin/clients/update/'.$client_uid,['enctype'=>'multipart/form-data']); ?>
                                <div class="row">
                                 <div class="col-md-6">
                        <div class="form-group">
                            <label for="fname">First Name<span class="text-danger">*</span></label>
                            <input type="fname" class="form-control <?php if(form_error('fname')!=''){ echo "parsley-error"; } ?>" name="fname" value="<?php echo isset($fname)?$fname:''?>" id="fname" parsley-trigger="change" required placeholder="First Name" tabindex="1"  maxlength="50" data-parsley-pattern="^[a-zA-Z\s+]+$"  data-parsley-error-message="Please enter valid name.">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lname">Last Name<span class="text-danger">*</span></label>
                            <input type="lname" class="form-control <?php if(form_error('lname')!=''){ echo "parsley-error"; } ?>" name="lname" id="lname" parsley-trigger="change" required placeholder="Last Name" value="<?php echo (isset($lname))?$lname:'';?>"  maxlength="15" tabindex="2" data-parsley-pattern="^[a-zA-Z\s+]+$"  data-parsley-error-message="Please enter valid name." >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email<span class="text-danger">*</span></label>
                            <input type="email" class="form-control <?php if(form_error('email')!=''){ echo "parsley-error"; } ?>" name="email" id="email" value="<?php echo isset($email)?$email:''?>" parsley-trigger="change" required placeholder="Email"  maxlength="50" tabindex="3" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mobileno">Mobile<span class="text-danger">*</span></label>
                            <input type="text" value="<?php echo (isset($mobileno)?$mobileno:'')?>" class="form-control <?php if(form_error('mobileno')!=''){ echo "parsley-error"; } ?>" name="mobileno" id="mobileno" parsley-trigger="change" required placeholder="Mobile" maxlength="10" tabindex="4" data-parsley-pattern="^[0-9]{10,15}$" data-parsley-error-message="only enter your 10 digit number." oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onkeypress="return isNumberKey1(event)"> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">Password<span class="text-danger">*</span></label>
                            <input type="password" class="form-control <?php if(form_error('password')!=''){ echo "parsley-error"; } ?>" name="password" id="password" parsley-trigger="change"  placeholder="Password"  maxlength="50" tabindex="5" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cpassword">Confirm Password<span class="text-danger">*</span></label>
                            <input type="password" class="form-control <?php if(form_error('cpassword')!=''){ echo "parsley-error"; } ?>" name="cpassword" id="cpassword" parsley-trigger="change" data-parsley-equalto="#password" placeholder="Confirm Password" tabindex="6" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control" tabindex="8" required>
                                <option value="1" <?php echo ($status==1)?'selected="selected"':'';?>>Active</option>
                                <option value="0" <?php echo ($status==0)?'selected="selected"':'';?>>Inactive</option>
                            </select>
                        </div>
                    </div>
					<div class="col-md-6">
						<div class="form-group">
						   <label for="client_logo">Client Logo</label>
                             <div class="custom-file">
                             <input id="client_logo" name="client_logo" type="file" class="form-control"  />
                             </div>
						</div>
					</div>
                    <div class="col-md-12">
                        <div class="card-box">
                            <fieldset>
                                <legend>Company Details</legend>
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="company_name">Company Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control <?php if(form_error('company_name')!=''){ echo "parsley-error"; } ?>" name="company_name" value="<?php echo isset($company_name)?$company_name:''?>" id="company_name" parsley-trigger="change" required placeholder="Company Name"  maxlength="100" tabindex='9'>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="company_gst_no">GST Number<span class="text-danger">*</span></label>
                            <input type="text" class="form-control <?php if(form_error('company_gst_no')!=''){ echo "parsley-error"; } ?>" name="company_gst_no" value="<?php echo isset($company_gst_no)?$company_gst_no:''?>" id="gst_no" parsley-trigger="change" required placeholder="GST Number"  maxlength="50" tabindex='10'>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="company_contact_person">Contact Person<span class="text-danger">*</span></label>
                            <input type="text" class="form-control <?php if(form_error('company_contact_person')!=''){ echo "parsley-error"; } ?>" name="company_contact_person" value="<?php echo isset($company_contact_person)?$company_contact_person:''?>" id="company_contact_person" parsley-trigger="change" required placeholder="Contact Person"  maxlength="100" tabindex='11' data-parsley-pattern="^[a-zA-Z\s+]+$"  data-parsley-error-message="Please enter valid name.">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="company_person_email">Contact Person Email<span class="text-danger">*</span></label>
                            <input type="email" class="form-control <?php if(form_error('company_person_email')!=''){ echo "parsley-error"; } ?>" name="company_person_email" value="<?php echo isset($company_person_email)?$company_person_email:''?>" id="company_person_email" parsley-trigger="change" required placeholder="Contact Person Email"  maxlength="50" tabindex='12' >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="company_person_mobile">Contact Person Mobile<span class="text-danger">*</span></label>
                            <input type="text" value="<?php echo (isset($company_person_mobile)?$company_person_mobile:'')?>" class="form-control <?php if(form_error('company_person_mobile')!=''){ echo "parsley-error"; } ?>" name="company_person_mobile" id="company_person_mobile" parsley-trigger="change" required placeholder="Contact Person Mobile" maxlength="10" tabindex='13' data-parsley-pattern="^[0-9]{10,15}$" data-parsley-error-message="only enter your 10 digit number." oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onkeypress="return isNumberKey1(event)">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="company_address">Address<span class="text-danger">*</span></label>
                            <input type="text" value="<?php echo isset($company_address)?$company_address:''?>" class="form-control <?php if(form_error('company_address')!=''){ echo "parsley-error"; } ?>" name="company_address" id="company_address" parsley-trigger="change" required placeholder="Address"  maxlength="50" tabindex='14'>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="company_city">City<span class="text-danger">*</span></label>
                            <input type="text" value="<?php echo (isset($company_city)?$company_city:'')?>"  class="form-control <?php if(form_error('company_city')!=''){ echo "parsley-error"; } ?>" name="company_city" id="company_city" parsley-trigger="change" required placeholder="City" tabindex='15'>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="role">Country</label>
                            <select id="country_id" name="country_id" class="form-control" required  tabindex='16'>
                                <option value="">--Select Country--</option>
                                <?php
                                    $country_id  = ($country_id!='')?$country_id:'99';
                                    foreach($country_arr as $key=>$countries){
                                    $selected    = ($countries->country_id==$country_id)?'selected':"";
                                    ?>
                                <option value="<?php echo $countries->country_id ?>" <?php echo $selected ?>><?php echo $countries->name;?></option>
                                <?php
                                    }
                                    ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="role">State<span class="text-danger">*</span> </label>
                            <select id="state_id" name="state_id" class="form-control <?php if(form_error('state_id')!=''){ echo "parsley-error"; } ?>" required tabindex='17'>
                                <option value="">--Select State--</option>
                                <?php
                                    $state_id =(isset($state_id)&&$state_id!='')?$state_id:'';
                                    foreach($state_arr as $key=>$states){
                                    $selected = ($states->state_id==$state_id)?'selected':"";
                                    ?>
                                <option value="<?php echo $states->state_id ?>" <?php echo $selected;?>><?php echo ucwords(strtolower($states->name));?></option>
                                <?php
                                    }
                                    ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="company_pincode">Pin Code<span class="text-danger">*</span></label>
                            <input type="text" class="form-control <?php if(form_error('company_pincode')!=''){ echo "parsley-error"; } ?>" name="company_pincode" id="company_pincode" parsley-trigger="change" required placeholder="Pin Code" maxlength="50" value="<?php echo isset($company_pincode)?$company_pincode:''?>" data-parsley-pattern="^[0-9]{2,6}$" data-parsley-error-message="Pincode should be six digits pincode should be in numbers" tabindex='18'>
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
         $(location).attr('href', '<?php base_url();?>/admin/clients');
      });
    
     $("#country_id").change(function() {
         var country_id =$("#country_id").val();
         $("#state_id").html('');
        $.ajax({
               url:'/admin/clients/ajax_state/'+country_id,
               success:function(data) {
                 $("#state_id").html(data);
                     return true;
             }
         });
     });
     function isNumberKey1(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
    
            return true;
        }
</script>
