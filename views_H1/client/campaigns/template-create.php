<script src="/assets/ckeditor/ckeditor.js"></script>
<script src="/assets/ckeditor/adapters/jquery.js"></script>
<script src="/assets/ckeditor/lang/en.js"></script>
<div class="wrapper">
            <div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Template Create</h4>
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
								<?php if($this->session->flashdata('message')) { ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">×</span>
         </button>
         <?php echo $this->session->flashdata('message')?>
      </div>
      <?php } ?>
      <?php if($this->session->flashdata('error_message')) { ?>
      <div class="alert alert-danger alert-dismissible fade show" style="margin-top:2rem" role="alert">
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">×</span>
         </button>
         <?php echo $this->session->flashdata('error_message')?>
      </div>
      <?php } ?>
      <!-- end row -->
      <?php echo form_open('client/campaigns/create-template/'.$campaign_uid.'/create', array('id'=>'template-form','name' => 'template-form'));?>
      <div class="row">
         <div class="col-12">
            <div class="card-box">
               <h4 class="header-title m-t-0 m-b-30">Template Campaign </h4>
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
                  <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12">
                     <div class="form-group" style="float:left">
                        Content<span class="text-danger">* </span>[<a href="" data-toggle="modal" data-target="#available-tags-modal" >Details</a>]
                     </div>
                     <div class="form-group" style="float:right;">
                        <button type="button" data-toggle="modal" data-target="#test-email-modal"  href="#template-test-email" class="btn btn-primary" >
                        Test template
                        </button> 
                     </div>
                  </div>
                  <div class="clear"></div>
                  <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12">
                     <div class="form-group" >
                        <textarea name="content" id="content" class="content" rows="100" cols="80" ><?php echo $content_display ?></textarea>
                     </div>
                  </div>
                  <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12" style="display:none" id="template-plain-text">
                     <div class="form-group" >
                                <textarea name="plain_text" id="plain_text" rows="10" style="width:100%"><?php echo $content_plain_text ?></textarea>
                     </div>
                  </div>

                  <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6 col-xl-6">
                     <div class="form-group" >
                          <label for="sent_at">Send At<span class="text-danger">*</span></label>
                          <input type="text" class="form-control has-help-text" name="send_at" value="<?php if(!empty($scheduled_at)) { echo $scheduled_at; }  ?>" id="send_at" maxlength="50" tabindex='1' data-title="Send at" placeholder="YYYY-mm-dd hh:mm">
                     </div>
                  </div>
                  <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3 col-xl-3">
                     <div class="form-group" >
                          <button class="btn btn-primary btn-plain-text" type="button" id="show_plain_text">Show plain text</button>
                     </div>
                  </div>
                  <div class="col-lg-3 col-sm-3 col-xs-3 col-md-3 col-xl-3">
                     <div class="form-group" >
                         <input type="hidden" name="hdn-save-template" id="hdn-save-template" value="0">
                        <button class="btn btn-primary btn-submit btn-go-next" value="save-template" name="btn-save-template" id="btn-save-template" type="submit">Save template </button>
                     </div>
                  </div>

                  <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12">
                     <div class="row marginRight6">
                        <div class="col"></div>
                        <div class="col"></div>
                        <div class="col align-right dt-body-center" style="padding-top:6px;">
                            <input type="checkbox" name="tpl_test" id="tpl_test" value="1"> <label class="chkbx" style="opacity:1" for="tpl_test">Skip Validation</label>&nbsp;&nbsp;
                        </div>
                        <div class="col">
                           <button class="btn btn-primary waves-effect waves-light btn-block" type="button" value="save-next"  name="btn-save-next" id="btn-save-next">Save and Send Campaign</button>
                           <input type="hidden" name="hdn-save-next" id="hdn-save-next" value="0">
                        </div>
                     </div>
                  </div>
                  <div class="clearfix"></div>
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


<form id="test-mail-form" name="test-mail-form" action="/client/campaigns/create-template/<?php echo $campaign_uid;?>/heysendmail" method="post">
   <div class="modal fade" id="test-email-modal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
            <div class="modal-header ">
               <h5 id="exampleModalLabel">Test Template</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="form-group">
                        <label for="email"><span id="selected_count">0</span> Email(s)</label>
                        <select id="email" name="email[]" class="recipient_select2 form-control" multiple="multiple" data-placeholder="Email">
					<?php foreach($auth_email_data as $key=>$value) { ?>
						<option value="<?php echo $value;?>"><?php echo $value;?></option>
					<?php } ?>
				   </select>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="button" class="btn btn-primary" id="btn-send-test">Send Test Email</button>
            </div>
         </div>
      </div>
   </div>
</form>
<form method="post" action="/<?php echo $user_type ?>/campaigns/create-template/<?php echo $campaign_uid;?>" name="tag-subcategory-form" id="tag-subcategory-form" enctype="multipart/form-data">
   <div class="modal fade" id="available-tag-subcategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
            <div class="modal-header ">
               <h5 id="exampleModalLabel">Tag Url</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body" id="url-modal-body">
				
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="button" class="btn btn-primary" id="url-modal-save">Save changes</button>
			   <input type="hidden" name="campaign_uid" id="campaign_uid"  value="<?php echo $campaign_uid ?>">
                </div>
            </div>
        </div>
    </div>
</form>
<form method="post" action="" name="campaign-template-preview" id="campaign-template-preview">
    <div class="modal fade" id="modal-campaign-template-preview" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header ">
                    <h5 id="exampleModalLabel">Campaign Preview</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body scroll-480" >
				
				 <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <div class="table-rep-plugin">
                                <div class="table-responsive" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table table-striped table-bordered">
                                        <tbody>
                                            <tr>
                                                <td><b>Campaign Name</b></td>
                                                <td><?php echo $campaign_name; ?> (<?php echo $campaign_uid; ?>)</td>
                                            </tr>
                                            <tr>
                                                <td><b>List</b></td>
                                                <td><?php echo $list_name; ?> (<?php echo $data_count; ?>)</td>
                                            </tr>
											                      <tr>
                                                <td><b>Category</b></td>
                                                <td><?php echo $category_name; ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Subject</b></td>
                                                <td><?php echo $subject; ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>From Name</b></td>
                                                <td><?php echo $from_name; ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Max. Subscribers</b></td>
                                                <td><?php echo $max_send_count; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>

				 <div class="row">
                    <div class="col-12">
                        <div class="card-box" id="campaign_content_html">
                            <?php echo $content_display ?>
                        </div>
                    </div>
                 </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btn-save-send-campaign">Send Campaign</button>
                </div>
            </div>
        </div>
    </div>
</form> 
<script type="text/javascript">

var url_category =  '<?php echo json_encode($url_category) ?>';

$("#show_plain_text").on('click',function() {
            if($("#template-plain-text").is(":visible")) {
                $(this).text("Show Plain Text");
                $("#template-plain-text").hide();
            }
            else {
                $(this).text("Hide Plain Text");
                $("#template-plain-text").show();
            } 
        
        });
/*<![CDATA[*/
   jQuery(function($) {
       wysiwygOptionsCampaignTemplate_content = {'toolbar':'Default','language':'en','contentsLanguage':'en','contentsLangDirection':'ltr','contentsCss':['/assets/css/font-awesome.min.css','/assets/css/ionicons.min.css','/assets/css/adminlte.css','/assets/css/skin-blue.css'],'fullPage':true,'allowedContent':true,'height':800};
       $(".content").ckeditor(wysiwygOptionsCampaignTemplate_content);
       wysiwygInstanceCampaignTemplate_content = CKEDITOR.instances["content"];
   
        $('#send_at').daterangepicker({
           singleDatePicker: true,
           showDropdowns: true,
           useCurrent:false,
           timePicker: true,
           drops: "up",
           timePicker24Hour: true,
           autoUpdateInput: false,
           locale: {
               format: 'YYYY-MM-DD H:mm'
           },
           buttonClasses: ['btn', 'btn-sm'],
           applyClass: 'btn-custom',
           cancelClass: 'btn-secondary'
       });
   });
   /*]]>*/
	$('input[name="send_at"]').on('apply.daterangepicker', function(ev, picker) {
		$(this).val(picker.startDate.format('YYYY-MM-DD H:mm'));
    }); 	


	$('#btn-save-template').on('click',function(){
             var $this = $(this);
             $("#hdn-save-template").val('1'); 
             $("#hdn-save-next").val('0'); 
             $('#content').attr('data-parsley-required', 'true');
             $('#template-form').parsley();
             if($('#template-form').parsley().validate()) {
                $this.html('<i class="fa fa-refresh fa-spin"></i> Please wait, processing...');
                $(this).attr('disabled', true);
                $("#template-form").submit();
             }
             return false;
        });

		$("#btn-send-test").click(function() {
            var $this = $(this);
             $('#email').attr('data-parsley-required', 'true')
             $('#email').attr('data-parsley-emails', 'true')
             $('#from_email').attr('data-parsley-type', 'email')
             $('#test-mail-form').parsley();
             if($('#test-mail-form').parsley().validate()) {
                 $(this).attr('disabled',true);
                 $this.html('<i class="fa fa-refresh fa-spin"></i> Please wait, processing...');
                 $('#test-mail-form').submit();
             }
         });

		$('#btn-save-next').on('click',function() {
             var campaign_uid = $("#campaign_uid").val();
			 var html_content = CKEDITOR.instances.content.getData();
			 var url_category_json = JSON.parse(url_category);
			 var $this = $(this);
             $("#hdn-save-next").val('1'); 
             $("#hdn-save-template").val('0'); 
             
             $('#content').attr('data-parsley-required', 'true');
             $('#send_at').attr('data-parsley-required', 'true');
		
			 window.ParsleyValidator
        .addValidator('campaignlogoextension', function (value, requirement) {
        	var tagslistarr = requirement.split('|');
            var fileExtension = value.split('.').pop();
						var arr=[];
						$.each(tagslistarr,function(i,val){
   						 arr.push(val);
						});
            if(jQuery.inArray(fileExtension, arr)!='-1') {
               return true;
            } else {
              return false;
            }
        }, 32)
		 .addMessage('en', 'campaignlogoextension', 'The extension png | jpeg | jpg | gif is required');
			 var sub_category = <?php echo json_encode($subcategory); ?>;
             $('#template-form').parsley();
			$.ajax({
					url:"/<?php echo $TYPE?>/campaigns/index-get-subcategory-url/",
					type:'post',
					dataType:"json",
					data:{"campaign_uid":campaign_uid,"content": html_content},
					success: function(response) {
        var url_update_required = response.url_update_required;
        var template = '';
        if (url_update_required == 1) {

            template += '<div class="form-group row">';
            template += '<div class="col-sm-8">';
            template += '<b>Url</b>';

            template += '</div>';
            template += '<div class="col-sm-4">';
            template += '<b>Sub Category</b>';
            template += '</div>';
            template += '</div>';
            var i = 0;
            var regx = /\[/;
            var cat_ids = new Array();
           	$(response.url).each(function(index, item) {
                var url = item;
                var selected = '';
                var category_id = '';
                var url_status_obj = find_url_category(response.campaign_db_urls, url);
                if (url_status_obj.cat > 0) {
                    var url_det = url_status_obj.url + '-' + url_status_obj.url_id;
                    category_id = url_status_obj.cat;
                    delete(response.campaign_db_urls[url_det]);
                }
                i++;
                if (!url.match(regx)) {
                    template += '<div class="form-group row seprationBottom">';
                    template += '<div class="col-sm-8 overlapText paddingTp10">' + url;
                    template += '</div>';
                    template += '<div class="col-sm-4">';
                    template += '<select id="category_id_' + i + '" name="category_id[]" class="form-control select2" data-placeholder="Sub Category" required data-parsley-errors-container="#category_id_' + i + '_error">';
                    $.each(sub_category, function(i, val) {
                        if (val.category_id == category_id) {
                            selected = "selected";
                        } else {
                            selected = '';
                        }
                        template += '<option value="' + val.category_id + '" ' + selected + '>' + val.category_name + '</option>';
                    });
                    template += '</select>';
                    template += '<div id="category_id_' + i + '_error"></div>';
                    template += '</div>';
                    template += '<input type="hidden" name="url[]" id="url_' + i + '" value="' + url + '">';
                    template += '</div>';
                    cat_ids.push("category_id_" + i);
                } else {
                    template += '<input type="hidden" name="category_id[]" id="category_id_' + i + '" value="0">';
                    template += '<input type="hidden" name="url[]" id="url_' + i + '" value="' + url + '">';
                }
            });

            template += '<input type="hidden" name="cnt_url" id="cnt_url" value="' + i + '">';
            $("#url-modal-body").html(template);
            for (var i in cat_ids) {
            }
            $("#available-tag-subcategory").modal('show');
        } else {
            $("#modal-campaign-template-preview").modal('show');
        }
    },
    error: function() {}
				});
		return false;	
			});

	$("#url-modal-save").on('click',function() {
             $('#tag-subcategory-form').parsley();            
			 if($('#tag-subcategory-form').parsley().validate()) {
				 $("#url-modal-save").html('<i class="fa fa-refresh fa-spin"></i> Please wait, processing...');
				 $("#url-modal-save").attr('disabled', true);
                 var formdata = new FormData(document.getElementById('tag-subcategory-form'));

				 $.ajax({
						url:"/<?php echo $TYPE?>/campaigns/create-subcategory-url",
						type:'post',
						data: formdata,
						dataType:"json",
						mimeTypes:"multipart/form-data",
						processData: false,
						contentType: false,	
						success:function(response) {
							if(response.status == 'success') {	
								$("#available-tag-subcategory").modal('hide');
								$("#modal-campaign-template-preview").modal('show');
								$("#url-modal-save").html('Save changes').attr('disabled', false);
							}
						},
						error: function() {
						}
					 });
			 }
			return false;
		 });

		function find_url_category(category_db_url, url) {
			var data = {"url":"","cat":"","url_id":""};
			$.each(category_db_url,function(index, value) {
				var url_arr = index.split('-');
				if(url_arr[0] == url) {
					data.url = url;
					data.cat = value;
					data.url_id = url_arr[1];
					return data;
			 }
        });
			return data;
		}
		
		$("#btn-save-send-campaign").on('click',function() {			
				 $("#btn-save-send-campaign").html('<i class="fa fa-refresh fa-spin"></i> Please wait, processing...');
				 $("#btn-save-send-campaign").attr('disabled', true);
				 $("#template-form").action = "<?php $user_type ?>/campaigns/create-template/create";
				 $("#template-form").submit();
        });


            $(document).ready(function() {
                $('#email').on('select2:close', function (evt) {
                    var uldiv = $(this).siblings('span.select2').find('ul')
                    var count = uldiv.find('li').length - 1;
                    $('#selected_count').html(count);
                });
            });			
</script>
