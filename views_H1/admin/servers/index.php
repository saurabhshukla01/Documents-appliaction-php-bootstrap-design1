<div class="wrapper">
            <div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Delivery Server Create</h4>
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
                                <?php if (validation_errors()!=''){ ?>
                            <div class="alert alert-danger">
                                <?php echo validation_errors(); ?>
                            </div>
                            <?php } echo form_open('admin/servers/index-delivery-server/'.$server_id); ?>
                                <div class="row">
                   				<div class="col-md-3">
                        <div class="form-group">
                            <label for="name">Name<span class="text-danger">*</span></label>
                            <input type="name" class="form-control <?php if(form_error('name')!=''){ echo "parsley-error"; } ?>" name="name" value="<?php echo isset($name)?$name:''?>" id="name" parsley-trigger="change"  placeholder="Name" tabindex="1"  maxlength="50" data-parsley-error-message="Please enter valid name." required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="hostname">Hostname<span class="text-danger">*</span></label>
                            <input type="hostname" class="form-control <?php if(form_error('hostname')!=''){ echo "parsley-error"; } ?>" name="hostname" id="hostname" parsley-trigger="change"  placeholder="Hostname" value="<?php echo (isset($hostname))?$hostname:'';?>" tabindex="2" data-parsley-error-message="Please enter valid name." required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="username">Username<span class="text-danger">*</span></label>
                            <input type="username" class="form-control <?php if(form_error('username')!=''){ echo "parsley-error"; } ?>" name="username" id="username" value="<?php echo isset($username)?$username:''?>" parsley-trigger="change"  placeholder="Username"  maxlength="50" tabindex="3" required >
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="password">Password<span class="text-danger">*</span></label>
                            <input type="password" class="form-control <?php if(form_error('password')!=''){ echo "parsley-error"; } ?>" name="password" id="password" value="<?php echo isset($password)?$password:''?>" parsley-trigger="change"  placeholder="Password"  maxlength="50" tabindex="4" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="port">Port<span class="text-danger">*</span></label>
                            <input type="port" class="form-control <?php if(form_error('port')!=''){ echo "parsley-error"; } ?>" name="port" id="port" parsley-trigger="change"  placeholder="Port"  maxlength="50" tabindex="5" value="<?php echo isset($port)?$port:''?>" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="protocol">Protocol<span class="text-danger"></span></label>
                            <input type="protocol" class="form-control <?php if(form_error('protocol')!=''){ echo "parsley-error"; } ?>" name="protocol" id="protocol" parsley-trigger="change" placeholder="Protocol" tabindex="6" >
                        </div>
                    </div>
                  
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="timeout">Time Out<span class="text-danger"></span></label>
                            <input type="text" class="form-control <?php if(form_error('timeout')!=''){ echo "parsley-error"; } ?>" name="timeout" value="<?php echo isset($timeout)?$timeout:''?>" id="timeout" parsley-trigger="change" placeholder="Timeout"  maxlength="100" tabindex='7'>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="from_email">From Email<span class="text-danger">*</span></label>
                            <input type="text" class="form-control <?php if(form_error('from_email')!=''){ echo "parsley-error"; } ?>" name="from_email" value="<?php echo isset($from_email)?$from_email:''?>" id="gst_no" parsley-trigger="change"  placeholder="From Email"  maxlength="50" tabindex='8' required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="from_name">From Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control <?php if(form_error('from_name')!=''){ echo "parsley-error"; } ?>" name="from_name" value="<?php echo isset($from_name)?$from_name:''?>" id="from_name" parsley-trigger="change"  placeholder="From Name"  maxlength="100" tabindex='9' data-parsley-error-message="Please enter valid name." required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="reply_to_email">Reply-To-Email<span class="text-danger">*</span></label>
                            <input type="reply_to_email" class="form-control <?php if(form_error('reply_to_email')!=''){ echo "parsley-error"; } ?>" name="reply_to_email" value="<?php echo isset($reply_to_email)?$reply_to_email:''?>" id="reply_to_email" parsley-trigger="change"  placeholder="Reply-To-Email"  maxlength="50" tabindex='10' required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="probability">Probability<span class="text-danger"></span></label>
                            <input type="text" value="<?php echo (isset($probability)?$probability:'')?>" class="form-control <?php if(form_error('probability')!=''){ echo "parsley-error"; } ?>" name="probability" id="probability" parsley-trigger="change"  placeholder="Probability" maxlength="10" tabindex='11'>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="hourly_quota">Hourly-Quota<span class="text-danger"></span></label>
                            <input type="text" value="<?php echo isset($hourly_quota)?$hourly_quota:''?>" class="form-control <?php if(form_error('hourly_quota')!=''){ echo "parsley-error"; } ?>" name="hourly_quota" id="hourly_quota" parsley-trigger="change"  placeholder="Hourly-Quota"  maxlength="50" tabindex='12'>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="monthly_quota">Monthly-Quota<span class="text-danger"></span></label>
                            <input type="text" value="<?php echo (isset($monthly_quota)?$monthly_quota:'')?>"  class="form-control <?php if(form_error('monthly_quota')!=''){ echo "parsley-error"; } ?>" name="monthly_quota" id="monthly_quota" parsley-trigger="change"  placeholder="Monthly-Quota" tabindex='13'>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="meta_data">Meta-Data<span class="text-danger"></span></label>
                            <input type="text" value="<?php echo (isset($meta_data)?$meta_data:'')?>"  class="form-control <?php if(form_error('meta_data')!=''){ echo "parsley-error"; } ?>" name="meta_data" id="meta_data" parsley-trigger="change"  placeholder="Meta-Data" tabindex='14'>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="confirmation_key">Confirmation-key<span class="text-danger"></span></label>
                            <input type="text" value="<?php echo (isset($confirmation_key)?$confirmation_key:'')?>"  class="form-control <?php if(form_error('confirmation_key')!=''){ echo "parsley-error"; } ?>" name="confirmation_key" id="confirmation_key" parsley-trigger="change"  placeholder="Confirmation-key" tabindex='15'>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="locked">Locked</label>
                            <select id="locked" name="locked" class="form-control" tabindex="16" >
                                <option value="yes" <?php echo (isset($locked)=='yes')?'selected="selected"':'';?>>Yes</option>
                                <option value="no" <?php echo (isset($locked)=='no')?'selected="selected"':'';?>>No</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="use_for">Used-For<span class="text-danger"></span></label>
                            <input type="text" value="<?php echo (isset($use_for)?$use_for:'')?>"  class="form-control <?php if(form_error('use_for')!=''){ echo "parsley-error"; } ?>" name="use_for" id="use_for" parsley-trigger="change"  placeholder="Used-For" tabindex='17'>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="use_queue">Use-Queue</label>
                            <select id="use_queue" name="use_queue" class="form-control" tabindex="18" >
                                <option value="yes" <?php echo (isset($use_queue)=='yes')?'selected="selected"':'';?>>Yes</option>
                                <option value="no" <?php echo (isset($use_queue)=='no')?'selected="selected"':'';?>>No</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="signing_enabled">Signing-Enabled</label>
                            <select id="signing_enabled" name="signing_enabled" class="form-control" tabindex="19" >
                                <option value="yes" <?php echo (isset($signing_enabled)=='yes')?'selected="selected"':'';?>>Yes</option>
                                <option value="no" <?php echo (isset($signing_enabled)=='no')?'selected="selected"':'';?>>No</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="force_from">Force-From<span class="text-danger"></span></label>
                            <input type="text" value="<?php echo (isset($force_from)?$force_from:'')?>"  class="form-control <?php if(form_error('force_from')!=''){ echo "parsley-error"; } ?>" name="force_from" id="force_from" parsley-trigger="change"  placeholder="Force-From" tabindex='20'>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="force_reply_to">Force-Reply-To<span class="text-danger"></span></label>
                            <input type="text" value="<?php echo (isset($force_reply_to)?$force_reply_to:'')?>"  class="form-control <?php if(form_error('force_reply_to')!=''){ echo "parsley-error"; } ?>" name="force_reply_to" id="force_reply_to" parsley-trigger="change"  placeholder="Force-Reply-To" tabindex='21'>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="must_confirm_delivery">Must-Confirm-Delivery</label>
                            <select id="must_confirm_delivery" name="must_confirm_delivery" class="form-control" tabindex="22" >
                                <option value="yes" <?php echo (isset($must_confirm_delivery)=='yes')?'selected="selected"':'';?>>Yes</option>
                                <option value="no" <?php echo (isset($must_confirm_delivery)=='no')?'selected="selected"':'';?>>No</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control" tabindex="23" >
                                <option value="1" <?php echo (isset($status)==1)?'selected="selected"':'';?>>Active</option>
                                <option value="0" <?php echo (isset($status)==0)?'selected="selected"':'';?>>Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="mailing_domain">Mailing-Domain</label>
                            <select id="mailing_domain" name="mailing_domain" class="form-control" tabindex="24" >
                                <option value="gmail" <?php echo (isset($mailing_domain)=='gmail')?'selected="selected"':'';?>>Gmail</option>
                                <option value="yahoo" <?php echo (isset($mailing_domain)=='yahoo')?'selected="selected"':'';?>>Yahoo</option>
                                <option value="rediff" <?php echo (isset($mailing_domain)=='rediff')?'selected="selected"':'';?>>Rediff</option>
                                <option value="microsoft" <?php echo (isset($mailing_domain)=='microsoft')?'selected="selected"':'';?>>Microsoft</option>
                                <option value="corporate" <?php echo (isset($mailing_domain)=='corporate')?'selected="selected"':'';?>>Corporate</option>
                                <option value="aol" <?php echo (isset($mailing_domain)=='aol')?'selected="selected"':'';?>>Aol</option>
                            </select>
                        </div>
                    </div> 
					<div class="col-md-3">
                        <div class="form-group">
                            <label for="tracking_domain_id">Tracking-Domain<span class="text-danger">*</span></label>
                            <select id="tracking_domain_id" name="tracking_domain_id" class="form-control" tabindex="25" required >
								<option value="">-Select Tracking Domain-</option>
								<?php
                                            foreach($tracking_data as $value){
                                            $selected  = ($value->domain_id==$tracking_domain_id) ? 'selected=selected' : '';
                                        ?>
                                        <option value="<?php echo $value->domain_id;?>" <?php echo $selected;?>> <?php echo $value->name; ?></option>
                                        <?php } ?>
                            </select>
                        </div>
                    </div>
					<div class="col-md-3">
                        <div class="form-group">
                            <label for="bounce_server_id">Bounce Server<span class="text-danger">*</span></label>
                            <select id="bounce_server_id" name="bounce_server_id" class="form-control" tabindex="26" required >
							<option value="">-Select Bounce Server-</option>
                                <?php
                                            foreach($bounce_data as $value){
                                            $selected  = ($value->server_id==$bounce_server_id) ? 'selected=selected' : '';
                                        ?>
                                        <option value="<?php echo $value->server_id;?>" <?php echo $selected;?>> <?php echo $value->service; ?>-<?php echo $value->hostname; ?>(<?php echo $value->username; ?>)</option>
                                        <?php } ?>
                            </select>
                        </div>
                    </div>
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
                    </div> <!-- end col -->
                </div> <!-- end row -->
			<script type="text/javascript">
			    $('#cancel').click(function() {
         		$(location).attr('href', '<?php base_url();?>/admin/dashboard/');
      			});
			</script>   
                <!-- end page title end breadcrumb -->
                 <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="table" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
										<th>Id</th>
                                        <th>Hostname</th>
                                        <th>Username</th>
                                        <th>Port</th>
                                        <th>Status</th>
                                        <th>Added date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <thead>
                                    <tr>
										<td></td>
                                        <td><input type="text" placeholder="Hostname" size="10" class="input-FW" /></td>
                                        <td><input type="text" placeholder="Username" size="10" class="input-FW" /></td>
                                        <td><input type="text" placeholder="Port" size="10"class="input-FW" /></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->
<script>
    var table;
    $(document).ready(function() {
        table = $('#table').DataTable({
            "responsive": true,
            "processing": true, 
            "serverSide": true,
            "ordering": false,
            "searching": true,
            "lengthChange": false,
            "pageLength": 50,
            "destroy": true,
            "ajax": {
                "url": "/admin/servers/index-delivery-server-list/",
                "type": "POST",
            },
            "columnDefs": [ {
                "targets": -1,
                "data": null,
                "render": function ( data, type, row ) {
                    return '<button  alt="Edit" title="Edit" class="btn-edit actToggle" type="button" data-original-title="Edit" id="'+ row.server_id+'" data-id="'+ row.server_id+'" data-uid="'+ row.server_id+'"><i class="far fa-edit" aria-hidden="true"></i></button>';
                },
                "defaultContent": ''
                },
             ],
         "buttons": [],
         "dom": 'Bfrtip',
            "columns": [
				{"data": "server_id"},
                { "data": "hostname"},
                { "data": "username"},
                { "data": "port"},
                { "data": "status"},
                { "data": "date_added"},
                { "data": "action" },]
        });

		$("#table thead select,input").on( 'keyup change', function (e){
            if (e.keyCode == 13 || e.keyCode==undefined || this.value == '')
            {
                if(this.id == 'max' || this.id == 'min')
                {
                    table
                        .column( $(this).parent().index()+':visible' )
                        .search( $('#min').val() + '::' + $('#max').val() )
                        .draw();
                }
                else
                {
                    table
                        .column( $(this).parent().index()+':visible' )
                        .search( this.value )
                        .draw();
                }
            }
    });

         // Handle click on "Edit" button
         $('#table tbody').on('click', '.btn-edit', function (e) {
            var  uid=$(this).attr('data-uid');
            $(location).attr('href', '/admin/servers/index-delivery-server/'+uid+'')
         } );

        $('#table_filter').hide();
    });

</script>        
