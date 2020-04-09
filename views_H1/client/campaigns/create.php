<div class="wrapper">
            <div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Campaign Create</h4>
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
								<?php echo form_open('client/campaigns/create/');?>
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="header-title m-t-0 m-b-30">Create new campaign </h4>
                    <?php  
                        if (validation_errors()!=''){
                     ?>
                    <div class="alert alert-danger">
                     <?php echo validation_errors();  ?>
                    </div>
                    <?php
                        }
                     ?>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-4">
                            <div class="form-group">
                                <label for="name">Campaign Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Campaign Name" parsley-trigge="change" required tabindex='1'>
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-4">
                            <div class="form-group">
                                <label for="category_id">Category<span class="text-danger">*</span></label>
                                 <select id="category_id" name="category_id" class="form-control" data-placeholder="Category" required  tabindex='4' data-parsley-errors-container="#category_error">
                                    <option value=""></option>
                                    <?php foreach($categories_arr as $key=>$category){ ?>
                                    <option value="<?php echo $category->category_id; ?>"><?php echo $category->category_name;?></option>
                                   <?php  } ?>
                                </select>
                            </div>
                            <div id="category_error"></div>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-4">
                            <div class="form-group">
                                <label for="list_id">List<span class="text-danger">*</span></label>
                                <select id="list_id" name="list_id" class="form-control" data-placeholder="List" tabindex='3' data-original-title="List" required>
                                    <option value=""></option>
                                    <?php foreach($list_arr as $list) { ?>
                                    
                                     <option value="<?php echo $list->list_id ?>"><?php echo$list->name ?>(<b><?php echo $list->list_uid?></b>) (<?php echo $list->data_count ?>)</option>
                                    <?php } ?>
                                </select>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="header-title m-t-0 m-b-30">Campaign setup</h4>
                    <div class="row">
                       <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                            <div class="form-group">
                                <label for="from_name">Sender Name<span class="text-danger">*</span></label>
                                <input type="from_name" class="form-control" name="from_name" value="<?php echo isset($from_name)?$from_name:''?>" id="from_name" parsley-trigger="change" required placeholder="From Name"  maxlength="50" tabindex='5' data-original-title="From Name" data-container="body" data-toggle="popover" data-placement="top" data-content="This is the name of the &quot;From&quot; header used in campaigns, use a name that your subscribers will easily recognize, like your website name or company name." data-trigger="focus">
                            </div>
                        </div>
                         <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                            <div class="form-group">
                                <label for="max_send_count">Max. subscribers<span class="text-danger">*</span></label>
                                <input class="form-control" name="max_send_count" value="<?php echo isset($max_send_count)?$max_send_count:0; ?>" id="max_send_count"  placeholder="Max. subscribers" parsley-trigger="change"  maxlength="8" required  tabindex='9' data-original-title="Max. subscribers" data-container="body" data-toggle="popover" data-placement="top" min="0" max="500000" data-content="Whether to send only to this number of subscribers instead of sending to the whole list" data-trigger="focus" data-parsley-type="digits">
                            </div>
                        </div>
                       <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-4">
                            <div class="form-group">
                                <div class="form-group">
                                   <label for="campaign_domain">Campaign Domain<span class="text-danger">*</span></label>
                                    <select id="campaign_domain" name="campaign_domain" class="form-control select2" data-placeholder="Campaign Domain" tabindex='6' required data-parsley-errors-container="#campaign_error">
                                         <option value=""></option>
                                          <?php foreach($domain_arr as $domain) { ?>
                                            <option value="<?php echo $domain->domain_id; ?>"> <?php echo $domain->domain_name; ?></option>
                                          <?php } ?>
                                    </select>
                            </div>
                            <div id="campaign_error"></div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-4">
                            <div class="form-group">
                                <label for="from_email">From email<span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="from_email" value="<?php echo isset($from_email)?$from_email:''?>" id="from_email" parsley-trigger="change" required placeholder="From Email"  maxlength="50" tabindex='7' readonly data-original-title="From email">                           </div>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-4">
                            <div class="form-group">
                                <label for="contact_person">Reply to<span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="reply_to" value="<?php echo isset($reply_to)?$reply_to:''?>" id="reply_to" parsley-trigger="change" required placeholder="Reply To"  maxlength="50" tabindex='8' readonly data-original-title="Reply to">
                            </div>
                        </div> 
                        
                        <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12">
                            <div class="form-group">
                                <label for="subject">Subject<span class="text-danger">*</span></label>
                                <input type="subject" class="form-control" name="subject" value="<?php echo isset($subject)?$subject:''?>" id="subject" parsley-trigger="change" required placeholder="Subject" maxlength="250" tabindex='10' data-original-title="Subject" data-container="body" data-toggle="popover" data-placement="top" data-content="Campaign subject. There are a few available tags for customization." data-trigger="focus" data-original-title="Popover title" autocomplete="off">
                            </div>
                        </div> 
                        <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12"> 
                            <div class="form-group" style="float:right;">
                                       <button class="btn btn-primary waves-effect waves-light" type="submit" value="save-next"  name="btn-save-next" id="btn-save-next" tabindex='11'>Save & Next</button> 
                                        <input type="hidden" name="hdn-save-next" id="hdn-save-next" value="hdn-save-next">
                                      </div> 
                                </div> 
                            </div> 
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
		
	$('#btn-save-next').on('click',function(){
          var $this = $(this);
          if($('form').parsley().validate()) {
              $this.html('<i class="fa fa-refresh fa-spin"></i> Please wait, processing...');
              $(this).attr('disabled', true);
              $("form").submit();
          }
    });
	
	$("#campaign_domain").change(function() {
       var campaign_domain_id   =  $("#campaign_domain").val();
       $("#from_email").val('');
       $("#reply_to").val('');
       $.ajax({
              url:"/<?php echo $user_type ?>/campaigns/campaign-domain/"+campaign_domain_id,
              type:'get',
              dataType:"json",
              success:function(data) {
                    var from_email      = data.from_email;
                    var reply_to        = data.reply_to;
                    $("#from_email").val(from_email);
                    $("#reply_to").val(reply_to);
                 }
        });

    });
</script>
