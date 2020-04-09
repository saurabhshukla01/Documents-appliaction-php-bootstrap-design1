<div class="wrapper">
            <div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Global Setting</h4>
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
                                <?php echo validation_errors(); ?>
                            </div>
                            <?php } echo form_open('', ['enctype'=>'multipart/form-data']); ?>
                                <div class="row">
								<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
				                        <div class="form-group">
									<label for="allowed_bounce_percent">Bounce Percentage Allowed</label>
                                     <input type="text" class="form-control" name="allowed_bounce_percent" id="allowed_bounce_percent" data-parsley-pattern="^[0-9]*\.[0-9]{2}$" parsley-trigger="change"  placeholder="Bounce Percentage" tabindex='6'  value="<?php if(isset($global_setting_data)) { echo $global_setting_data->allowed_bounce_percent; } ?>">
               			         </div>
					                    </div>
                   		<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                                <div class="form-group">
									
                                    <label for="Count Login Retry Allowed">Count Login Retry Allowed</label>
                                     <input type="text" class="form-control" name="login_failed_count" id="login_failed_count" data-parsley-type="digits"  parsley-trigger="change"  placeholder="Count Login Retry Allowed" tabindex='6'  value="<?php if(isset($global_setting_data)) { echo $global_setting_data->login_failed_count; } ?>">
                                </div>
                            </div>
							<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                                <div class="form-group">
                                    <label for="Same IP Hit Count Allowed">Same IP Hit Count Allowed</label>
                                     <input type="text" class="form-control" name="same_ip_count_allowed" id="same_ip_count_allowed" data-parsley-type="digits" parsley-trigger="change"  placeholder="Same IP Hit Count Allowed" tabindex='6'  value="<?php if(isset($global_setting_data)) { echo $global_setting_data->same_ip_count_allowed; } ?>">
                                </div>
                            </div>
	<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                                <div class="form-group">
                                    <label for="Count Login Retry Allowed">Server Daily Campaign Limit</label>
                                     <input type="text" class="form-control" name="server_daily_campaign_limit" id="server_daily_campaign_limit" parsley-trigger="change"  placeholder="Server Daily Campaign Limit" required data-parsley-type="digits" data-parsley-error-message="    This value should be digits." value="<?php if(isset($global_setting_data)) { echo $global_setting_data->server_daily_campaign_limit; } ?>">
                                </div>
                            </div>
							<?php $selected_allowed_domain = explode(',', $global_setting_data->allow_domain_list_upload);?>
							<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                                <div class="form-group">
                                    <label for="allowed_domain">Allowed Domain</label>
									<select id="allowed_domain" name="allowed_domain[]" class="select2 form-control select2-multiple" multiple="multiple" multiple data-placeholder="Allowed Domain">
                                        <?php 
										foreach($allowed_domain_domain_list as $allowed) { 
                                            $selected_allowed = in_array($allowed->name, $selected_allowed_domain) ? 'selected' : '';
                                        ?>
									    <option value="<?php echo $allowed->name ?>" <?php echo $selected_allowed ?>><?php echo $allowed->name ?></option>
                                        <?php } ?>
                                    </select>      
                                </div>
                            </div>       
                                
							 
							<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                                <div class="form-group">
									  <div class="dt-body-center">
										<input type="checkbox" class="custom-control-input" id="allow_copy_right_click" name="allow_copy_right_click" value="1" <?php if(isset($global_setting_data)) { if($global_setting_data->allow_copy_right_click==1) { echo $checked = 'checked';  } }?> > <label style="opacity:1" for="allow_copy_right_click" class="custom-control-label">Copy allowed</label>
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
         $(location).attr('href', '<?php base_url();?>/admin/global_setting/index-setting');
      });
</script>
