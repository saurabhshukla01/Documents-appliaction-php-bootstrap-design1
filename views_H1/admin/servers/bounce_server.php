<div class="wrapper">
            <div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Bounce Server List</h4>
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
                            <?php } echo form_open('admin/servers/index-bounce-server/'.$server_id); ?>
                                <div class="row">
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
                            <label for="email">Email<span class="text-danger">*</span></label>
                            <input type="text" class="form-control <?php if(form_error('email')!=''){ echo "parsley-error"; } ?>" name="email" value="<?php echo isset($email)?$email:''?>" id="email" parsley-trigger="change"  placeholder="Email"  maxlength="50" tabindex='5' required>
                        </div>
                    </div>
					<div class="col-md-3">
                        <div class="form-group">
                            <label for="service">Service</label>
                            <select id="service" name="service" class="form-control" tabindex="6" >
                                <option value="imap" <?php echo (isset($service)=='imap')?'selected="selected"':'';?>>Imap</option>
                                <option value="pop3" <?php echo (isset($service)=='pop3')?'selected="selected"':'';?>>Pop3</option>
                            </select>
                        </div>
                    </div>
					<div class="col-md-3">
                        <div class="form-group">
                            <label for="port">Port<span class="text-danger">*</span></label>
                            <input type="port" class="form-control <?php if(form_error('port')!=''){ echo "parsley-error"; } ?>" name="port" id="port" parsley-trigger="change"  placeholder="Port"  maxlength="50" tabindex="5" value="<?php echo isset($port)?$port:''?>">
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
                            <label for="validate_ssl">Validate ssl</label>
                            <select id="validate_ssl" name="validate_ssl" class="form-control" tabindex="16" >
                                <option value="yes" <?php echo (isset($validate_ssl)=='yes')?'selected="selected"':'';?>>Yes</option>
                                <option value="no" <?php echo (isset($validate_ssl)=='no')?'selected="selected"':'';?>>No</option>
                            </select>
                        </div>
                    </div>
					<div class="col-md-3">
                        <div class="form-group">
                            <label for="search_charset">Search Charset<span class="text-danger"></span></label>
                            <input type="text" value="<?php echo (isset($search_charset)?$search_charset:'')?>" class="form-control <?php if(form_error('search_charset')!=''){ echo "parsley-error"; } ?>" name="search_charset" id="search_charset" parsley-trigger="change"  placeholder="Search Charset" maxlength="50" tabindex='11'>
                        </div>
                    </div>
					<div class="col-md-3">
                        <div class="form-group">
                            <label for="disable_authenticator">Disable Authenticator<span class="text-danger"></span></label>
                            <input type="text" value="<?php echo (isset($disable_authenticator)?$disable_authenticator:'')?>" class="form-control <?php if(form_error('disable_authenticator')!=''){ echo "parsley-error"; } ?>" name="disable_authenticator" id="disable_authenticator" parsley-trigger="change"  placeholder="Disable Authenticator" maxlength="50" tabindex='11'>
                        </div>
                    </div>
					<div class="col-md-3">
                        <div class="form-group">
                            <label for="delete_all_messages">Delete all messages</label>
                            <select id="delete_all_messages" name="delete_all_messages" class="form-control" tabindex="16" >
                                <option value="yes" <?php echo (isset($delete_all_messages)=='yes')?'selected="selected"':'';?>>Yes</option>
                                <option value="no" <?php echo (isset($delete_all_messages)=='no')?'selected="selected"':'';?>>No</option>
                            </select>
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
                            <label for="status">Status</label>
                            <select name="status" class="form-control" tabindex="23" >
                                <option value="1" <?php echo (isset($status)==1)?'selected="selected"':'';?>>Active</option>
                                <option value="0" <?php echo (isset($status)==0)?'selected="selected"':'';?>>Inactive</option>
                            </select>
                        </div>
                    </div> 
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
                    </div> <!-- end col -->
                </div> <!-- end row -->
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
                "url": "/admin/servers/index-bounce-list",
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
            $(location).attr('href', '/admin/servers/index-bounce-server/'+uid+'')
         } );
        $('#table_filter').hide();
    });

</script>        
