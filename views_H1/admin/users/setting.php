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
                <?php } echo form_open('admin/users/index-setting/'.$admin_uid.'/'); ?>
                <div class="row">                    
                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                        <div class="form-group">
                            <label for="total_limit">Total Limit</label>
                            <input type="text" class="form-control" name="total_limit" id="total_limit" parsley-trigger="change" placeholder="Total Limit"  value="<?php echo isset($total_limit)?$total_limit :''?>" data-parsley-type="digits" parsley-trigger="change" data-parsley-error-message="This value should be digits." tabindex="1">
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                        <div class="form-group">
                            <label for="total_consume_limit">Total Consume Limit</label>
                            <input type="text" class="form-control" name="total_consume_limit" id="total_consume_limit" parsley-trigger="change" placeholder="Total Consume Limit"  value="<?php echo isset($total_consume_limit)?$total_consume_limit :''?>" data-parsley-type="digits" parsley-trigger="change" data-parsley-error-message="This value should be digits." tabindex="2" readonly>
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                        <div class="form-group">
                            <label for="no_of_client">Number Of Client</label>
                            <input type="text" class="form-control" name="no_of_client" id="no_of_client" parsley-trigger="change" placeholder="Number Of Client"  value="<?php echo isset($no_of_client)?$no_of_client :''?>" data-parsley-type="digits" parsley-trigger="change" data-parsley-error-message="This value should be digits." tabindex="3">
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                        <div class="form-group">
                            <label for="pricing">Price</label>
                            <input type="text" value="<?php echo (isset($pricing)?$pricing:'0')?>" class="form-control" name="pricing" id="pricing" data-parsley-type="" parsley-trigger="change"  placeholder="Price" data-parsley-error-message="This value should be digits." tabindex='4'>
                        </div>
                    </div>
                    <input type="hidden" name="admin_id" value="<?php echo (isset($admin_id)?$admin_id:'')?>">    
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
		<div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="table" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Total Limit</th>
                                        <th>Total Consume Limit</th>
                                        <th>Number Of Client</th>
                                        <th>Price</th>
										<th>Action</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
    </div>

    <!-- end col -->
</div>
<!-- end row -->
<script type="text/javascript">
    $('#cancel').click(function() {
            $(location).attr('href', '<?php base_url();?>/admin/users/');
            });
</script>
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
                "url": "/admin/users/index-setting-list/<?php echo $admin_uid;?>",
                "type": "POST",
            },
            "columnDefs": [ {
                "targets": -1,
                "data": null,
                "render": function ( data, type, row ) {
					var action =(row.list_approval=='1')?'fa-toggle-on':'fa-toggle-off';
                    var tooltip =(row.list_approval=='1')?'Approved':'Pending';
                    var val=(row.list_approval=='1')?'0':'1';
				return '<button class="btn-active-inactive" alt="'+tooltip+'" title="'+tooltip+'" type="button"  data-uid="'+ row.setting_id+'/'+val+'"><i class="icon fa '+action+'"></i></button>';
                },
                "defaultContent": ''
                },
             ],
         "buttons": [],
         "dom": 'Bfrtip',
            "columns": [
                {"data": "setting_id"},
                { "data": "total_limit"},
                { "data": "total_consume_limit"},
                { "data": "no_of_client"},
                { "data": "pricing" },
				{ "data": "list_approval" },]
        });

		 // Handle click on "Active Inactive" button
         $('#table tbody').on('click', '.btn-active-inactive', function (e) {
             var  uid=$(this).attr('data-uid');
            swal(
                {
                    title: "Are you sure?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    closeOnConfirm: false,
                },
                function(isConfirm) {
                    if (isConfirm) {
                        $.ajax( {
                            url:'/admin/users/index-active-inactive/'+uid,
                            success:function(data) {
                                table.ajax.reload();
                                swal({
                                    title: "Settings!",
                                    text: "User Setting Has Successfully Update.",
                                    timer: 2000,
                                    showConfirmButton: false
                                });
                            }
                        });
                    }
                }
             );
         } );

        $('#table_filter').hide();
    });

</script>
