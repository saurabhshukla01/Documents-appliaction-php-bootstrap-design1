<div class="wrapper">
<div class="container-fluid">
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">Setting Create</h4>
            <div class="btn-group mt-2">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <?php echo $breadcrumbs; ?>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php if($this->session->flashdata('message')){?>
                <div class="alert alert-success">
                    <?php echo $this->session->flashdata('message')?>
                </div>
                <?php } ?>
                <?php if(validation_errors()!=''){ ?>
                <div class="alert alert-danger">
                    <?php echo validation_errors(); ?>
                </div>
                <?php } echo form_open('admin/clients/index-setting/'.$client_uid.'/'); ?>
                <div class="row">
					<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                          <div class="form-group">
                                    <label for="account_type">Account Type</label>
                                    <?php  
                                        $acount_type_arr = array("WARMUP"=>"WARMUP","INTERNAL"=>"INTERNAL","NORMAL"=>"NORMAL");
                                        $account_type   =(isset($account_type)&& $account_type!='')?$account_type:'';?> 
                                    <select id="account_type" name="account_type" class="form-control select2" data-placeholder="Account Type" tabindex='7' required data-parsley-errors-container="#account_type_error">
                                        <option value=""></option>
                                        <?php
                                            foreach($acount_type_arr as $key=>$acount_type_name){
                                                $selected = ($acount_type_name==$account_type)?'selected':"";
                                        ?>
                                        <option value="<?php echo $acount_type_name ?>" <?php echo $selected; ?>><?php echo ucwords(strtolower($acount_type_name));?></option>
                                        <?php } ?>
                                    </select>
                                    <div id="account_type_error"></div>
                                </div>
                            </div>
                    
                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                        <div class="form-group">
                            <label for="allowed_bounce_percent">Bounce Percentage Allowed</label>
                            <input type="text" class="form-control" name="allowed_bounce_percent" id="allowed_bounce_percent" data-parsley-pattern="^[0-9]*\.[0-9]{2}$" parsley-trigger="change"  placeholder="Bounce Percentage" tabindex='6'  value="<?php echo isset($allowed_bounce_percent) ? $allowed_bounce_percent : '' ?>">
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                        <div class="form-group">
                            <label for="delivery_server">Delivery Server (Click to select)</label>
                            <select id="delivery_server" name="delivery_server[]" class="select2 form-control select2-multiple" multiple="multiple" multiple data-placeholder="Delivery Server">
                                <?php 
                                    foreach($list_delivery_server as $delivery) { 
                                    
                                        $selected_delivery = in_array($delivery->server_id, $selected_delivery_server) ? 'selected' : '';
                                    
                                    ?>
                                <option value="<?php echo $delivery->server_id ?>" <?php echo $selected_delivery ?> >
                                    <?php echo $delivery->username ?><?php if($delivery->client_id!= '' && $delivery->client_id!= '0' && $delivery->client_uid!= $client_uid) { echo '<b> ( '.$delivery->client_uid.' ) </b>' ;   } ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                        <div class="form-group">
                            <label for="campaign_limit">Total Campaign Limit</label>
                            <input type="text" value="<?php echo (isset($total_campaign_limit)?$total_campaign_limit:'0')?>" class="form-control" name="total_campaign_limit" id="total_campaign_limit" data-parsley-type="digits" parsley-trigger="change"  placeholder="Total Campaign Limit" data-parsley-error-message="This value should be digits." tabindex='6'>
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                        <div class="form-group">
                            <label for="campaign_limit">Monthly Target</label>
                            <input type="text" value="<?php echo (isset($monthly_target)?$monthly_target:'0')?>" class="form-control" name="monthly_target" id="monthly_target" data-parsley-type="digits" parsley-trigger="change" data-parsley-error-message="This value should be digits."  placeholder="Monthly Target" tabindex='6'>
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                        <div class="form-group">
                            <label for="demo_credits">Demo Credits</label>
                            <input type="text" class="form-control" name="demo_credits" value="<?php echo (isset($demo_credits)&& $demo_credits!='0') ?$demo_credits:''?>" id="demo_credits" data-parsley-type="digits" parsley-trigger="change" data-parsley-error-message="This value should be digits." placeholder="Demo Credits" tabindex='6'>
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                        <div class="form-group">
                            <label for="demo_account_days">Demo Account Days</label>
                            <input type="text" class="form-control" value="<?php echo (isset($demo_account_days)&&$demo_account_days!='0') ?$demo_account_days:''?>" name="demo_account_days" id="demo_account_days" data-parsley-type="digits" parsley-trigger="change" data-parsley-error-message="This value should be digits." placeholder="Demo Account Days" tabindex='6'>
                        </div>
                    </div>
					<?php if(isset($list_approval) && $list_approval =='1'){ ?>
                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                        <div class="form-group">
                            <label for="email_verify">List Filtration</label>
                            <select id="email_verify" name="email_verify" class="form-control select2" data-placeholder="List Approval" tabindex='10'>
                                <option value="0" <?php echo $selected=(isset($email_verify)&&$email_verify=='0')?"selected":""?>>No</option>
                                <option value="1" <?php echo $selected=(isset($email_verify)&&$email_verify=='1')?"selected":""?>>Yes</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                        <div class="form-group">
                            <label for="list_approval">List Approval</label>
                            <select id="list_approval" name="list_approval" class="form-control select2" data-placeholder="List Approval" tabindex='10'>
                                <option value="0" <?php echo $selected=(isset($list_approval)&&$list_approval=='0')?"selected":""?>>No</option>
                                <option value="1" <?php echo $selected=(isset($list_approval)&&$list_approval=='1')?"selected":""?>>Yes</option>
                            </select>
                        </div>
                    </div>
					<?php } ?>
                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                        <div class="form-group">
                            <label for="allowed_domain">Allowed Domain</label>
                            <select id="allowed_domain" name="allowed_domain[]" class="select2 form-control select2-multiple" multiple="multiple" multiple data-placeholder="Allowed Domain">
                                <?php foreach($list_allowed_domain as $allowed) { 
                                    $selected_allowed = in_array($allowed->domain_id, $selected_allowed_domain) ? 'selected' : '';
                                    ?>
                                <option value="<?php echo $allowed->domain_id ?>" <?php echo $selected_allowed ?>><?php echo $allowed->name ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-3">
                        <div class="form-group">
                            <div class="dt-body-center">
                                <input type="checkbox" id="email_hide" name="email_hide" class="custom-control-input" value="1" <?php echo (isset($email_hide) && $email_hide == '1' ) ? 'checked' : ''?>> <label for="email_hide" style="opacity:1" class="custom-control-label"></label>Email Hide
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-3">
                        <div class="form-group">
                            <div class="dt-body-center">
                                <input type="checkbox" id="allow_export_report" name="allow_export_report" class="custom-control-input" value="1" <?php echo (isset($allow_export_report) && $allow_export_report == '1' ) ? 'checked' : ''?>> <label for="allow_export_report" style="opacity:1" class="custom-control-label"></label>Allow Export Report
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-3">
                        <div class="form-group">
                            <div class="dt-body-center">
                                <input type="checkbox" id="open_track_enable" name="open_track_enable" class="custom-control-input" value="1" <?php echo (isset($open_track_enable) && $open_track_enable == '1' ) ? 'checked' : ''?>> <label for="open_track_enable" style="opacity:1" class="custom-control-label"></label>Open Track Enable
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-3">
                        <div class="form-group">
                            <div class="dt-body-center">
                                <input type="checkbox" id="pmta_visibility" name="pmta_visibility" class="custom-control-input" value="1" <?php echo (isset($pmta_visibility) && $pmta_visibility == '1' ) ? 'checked' : ''?>> <label for="pmta_visibility" style="opacity:1" class="custom-control-label"></label>PMTA Log visibility
                            </div>
                        </div>
                    </div>
					<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-3">
                        <div class="form-group">
                            <div class="dt-body-center">
                                <input type="checkbox" id="upload_content_aws" name="upload_content_aws" class="custom-control-input" value="1" <?php echo (isset($upload_content_aws) && $upload_content_aws == '1' ) ? 'checked' : ''?>> <label for="upload_content_aws" style="opacity:1" class="custom-control-label"></label>Upload Content Aws
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="client_id" value="<?php echo (isset($client_id)?$client_id:'')?>">    
                    <div class="col-md-6"></div>
                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12">
                        <div class="form-group" style="float:right;">
                            <button type="submit" class="btn btn-primary waves-effect waves-light" value="form_submit" name="save" id="save">Submit</button>
                            <button type="button" class="btn btn-secondary waves-effect m-l-5" name="cancel" id="cancel">Cancel</button>
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>
<!-- end row -->
<script type="text/javascript">
    $('#cancel').click(function() {
            $(location).attr('href', '<?php base_url();?>/admin/clients/');
            });
</script>
