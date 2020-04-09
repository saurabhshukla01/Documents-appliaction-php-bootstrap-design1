<div class="wrapper">
            <div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Client List</h4>
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
                                    <div class="alert alert-danger">
                                        <?php echo $this->session->flashdata('message')?>
                                    </div>
                                    <?php } ?>
                                <table id="table" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile No</th>
                                        <th>Status</th>
                                        <th>Added date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <thead>
                                    <tr>
										<td></td>
                                        <td><input type="text" placeholder="Name" size="10" class="input-FW" /></td>
                                        <td><input type="text" placeholder="Email" size="10" class="input-FW" /></td>
                                        <td><input type="text" placeholder="Mobile no" size="10"class="input-FW" /></td>
                                        <td></td>
                                        <td></td>
                                        <td><button class="btn-create actToggle" type="button"><i class="fas fa-plus-circle"></i></button></td>
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
                "url": "/admin/clients/index-client-list",
                "type": "POST",
            },
            "columnDefs": [ {
                "targets": -1,
                "data": null,
                "render": function ( data, type, row ) {
				return '<button  alt="Edit" title="Edit" class="btn-edit actToggle" type="button" data-original-title="Edit" id="'+ row.client_uid+'" data-id="'+ row.client_uid+'" data-uid="'+ row.client_uid+'"><i class="far fa-edit" aria-hidden="true"></i></button><button alt="Delete" title="Delete" class="btn-delete actToggle" data-original-title="Delete" type="button" data-id="'+ row.client_uid+'" data-uid="'+ row.client_uid+'"><i class="fa fa-trash"></i></button><button alt="CDN Host" title="CDN Host" class="btn-cdn-host actToggle" data-original-title="CDN Host" type="button" data-id="'+ row.client_uid+'" data-uid="'+ row.client_uid+'"><i class="fab fa-keycdn"></i></button><button alt="Domain" title="Domain" class="btn-domain actToggle" data-original-title="Domain" type="button" data-id="'+ row.client_uid+'" data-uid="'+ row.client_uid+'"><i class="fas fa-globe"></i></button><button alt="Setting" title="Setting" class="btn-setting actToggle" data-original-title="Setting" type="button" data-id="'+ row.client_uid+'" data-uid="'+ row.client_uid+'"><i class="fab fa-gg"></i></button><button alt="Impersonate" title="Impersonate" class="btn-impersonate actToggle" data-original-title="Impersonate" type="button" data-id="'+ row.client_uid+'" data-uid="'+ row.client_uid+'"><i class="fas fa-user-md"></i></button>';
                },
                "defaultContent": ''
                },
             ],
         "buttons": ['copy', 'excel', 'pdf', 'colvis'],
         "dom": 'Bfrtip',
            "columns": [
                {"data": "client_id"},
                { "data": "fname"},
                { "data": "email"},
                { "data": "mobileno"},
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

            // Handle click on "Create" button
         $('.btn-create').click( function(e) {
            $(location).attr('href', '/admin/clients/create')
         } );

         // Handle click on "Edit" button
         $('#table tbody').on('click', '.btn-edit', function (e) {
            var  uid=$(this).attr('data-uid');
            $(location).attr('href', '/admin/clients/update/'+uid+'')
         } );

		// Handle click on "Domain" button
         $('#table tbody').on('click', '.btn-domain', function (e) {
            var  uid=$(this).attr('data-uid');
            $(location).attr('href', '/admin/clients/index-domain/'+uid+'')
         } );

		// Handle click on "CDN Host" button
         $('#table tbody').on('click', '.btn-cdn-host', function (e) {
            var  uid=$(this).attr('data-uid');
            $(location).attr('href', '/admin/clients/create-cdn-host/'+uid+'')
         } );

		// Handle click on "Setting" button
         $('#table tbody').on('click', '.btn-setting', function (e) {
            var  uid=$(this).attr('data-uid');
            $(location).attr('href', '/admin/clients/index-setting/'+uid+'')
         } );
		
		// Handle click on "impersonate" button
         $('#table tbody').on('click', '.btn-impersonate', function (e) {
            var  uid=$(this).attr('data-uid');
			var link = document.createElement("a");
                link.href = '/admin/impersonate/index-auth/'+uid+'';
                link.style = "visibility:hidden";
                link.target = "_blank";
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link); 
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
                            url:'/admin/clients/delete/'+uid,
                            success:function(data) {
                                table.ajax.reload();
                                swal({
                                    title: "Deleted!",
                                    text: "Client has been deleted.",
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
