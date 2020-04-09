<div class="wrapper">
            <div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Tracking Domain List</h4>
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
                            <?php } echo form_open('admin/domains/index-track-domains/'.$domain_id); ?>
                                <div class="row">
                                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Tracking Domain Name<span class="text-danger">*</span></label>
                            <input type="name" class="form-control <?php if(form_error('name')!=''){ echo "parsley-error"; } ?>" name="name" value="<?php echo isset($name)?$name:''?>" id="name" parsley-trigger="change" required placeholder="Tracking Domain Name" tabindex="1"  maxlength="100" data-parsley-error-message="Please enter valid name.">
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
                                        <th>Name</th>
                                        <th>Added date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <thead>
                                    <tr>
										<td></td>
                                        <td><input type="text" placeholder="Name" size="10" class="input-FW" /></td>
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
                "url": "/admin/domains/index-track-domain-list",
                "type": "POST",
            },
            "columnDefs": [ {
                "targets": -1,
                "data": null,
                "render": function ( data, type, row ) {
                    return '<button  alt="Edit" title="Edit" class="btn-edit actToggle" type="button" data-original-title="Edit" id="'+ row.domain_id+'" data-id="'+ row.domain_id+'" data-uid="'+ row.domain_id+'"><i class="far fa-edit" aria-hidden="true"></i></button>';
                },
                "defaultContent": ''
                },
             ],
         "buttons": [],
         "dom": 'Bfrtip',
            "columns": [
                {"data": "domain_id"},
                { "data": "name"},
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
            $(location).attr('href', '/admin/domains/index-track-domains/'+uid+'')
         } );

         // Handle click on "Delete" button
         $('#table tbody').on('click', '.btn-delete', function (e) {
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
                            url:'/admin/domains/delete/'+uid,
                            success:function(data) {
                                table.ajax.reload();
                                swal({
                                    title: "Deleted!",
                                    text: "Domain has been deleted.",
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
