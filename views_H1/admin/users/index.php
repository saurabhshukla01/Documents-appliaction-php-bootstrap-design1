<style>
.cancel {background:#c01a1a; color:#fff;} 
.cancel:hover {background:#c01a1a; color:#fff;} 
.confirm {background:#f4511e; color:#fff;} 

.mid1 {width:100px; display:none; border:1px #000 solid;}
.mid {display:block; border:none !important;}

}
@media screen and (min-width:320px) and (max-width:900px) {

table.table-bordered.dataTable td .none {display:none !important;}

.hidden {visibility:hidden;}

.mid {width:100px; display:none; border:1px #000 solid;}
.mid1 {display:block;}

}


    </style>

<div class="wrapper">
            <div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <h4 class="page-title">User</h4>
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
                                <table id="table" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
										<th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile No</th>
										<th>Role</th>
                                        <th>Status</th>
                                        <th>Added date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <thead>
                                    <tr>
                                        <td class="mid1"><button class="btn-create actToggle" type="button"><i class="fas fa-plus-circle"></i></button></td>
										<td class="mid"></td>
                                        <td><input type="text" placeholder="Name" size="10" class="input-FW" /></td>
                                        <td><input type="text" placeholder="Email" size="10" class="input-FW" /></td>
                                        <td class="none"><input type="text" placeholder="Mobile no" size="10"class="input-FW" style="display:none;" /></td>
                                        <td class="none"></td>
                                        <td class="none"></td>
                                        <td class="none"></td>
                                        <td class="mid"><button class="btn-create actToggle" type="button"><i class="fas fa-plus-circle"></i></button></td>
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
                "url": "/admin/users/index-list",
                "type": "POST",
            },
            "columnDefs": [ {
                "targets": -1,
                "data": null,
                "render": function ( data, type, row ) {
					
					var template = '';
                   template += '<button  alt="Edit" title="Edit" class="btn-edit actToggle" type="button" data-original-title="Edit" id="'+ row.admin_uid+'" data-id="'+ row.admin_uid+'" data-uid="'+ row.admin_uid+'"><i class="far fa-edit" aria-hidden="true"></i></button>';
					if(row.role_id > '1'){
					template += '<button alt="Setting" title="Setting" class="btn-setting actToggle" data-original-title="Setting" type="button" data-id="'+ row.admin_uid+'" data-uid="'+ row.admin_uid+'" hello="'+row.role_id+'"><i class="fab fa-gg"></i></button>';
					}
                    template += '<button alt="Delete" title="Delete" class="btn-delete actToggle" data-original-title="Delete" type="button" data-id="'+ row.admin_uid+'" data-user_name="'+ row.first_name+'" data-uid="'+ row.admin_uid+'"><i class="fa fa-trash"></i></button>';
				return template;
                },
                "defaultContent": ''
                },
             ],
         "buttons": [],
         "dom": 'Bfrtip',
            "columns": [
			    {"data": "admin_id"},
                { "data": "first_name"},
                { "data": "email"},
                { "data": "mobile_no"},
                { "data": "role"},
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
            $(location).attr('href', '/admin/users/create-user')
         } );

         // Handle click on "Edit" button
         $('#table tbody').on('click', '.btn-edit', function (e) {
            var  uid=$(this).attr('data-uid');
            $(location).attr('href', '/admin/users/update-user/'+uid+'')
         } );

		// Handle click on "Setting" button
         $('#table tbody').on('click', '.btn-setting', function (e) {
            var  uid=$(this).attr('data-uid');
            $(location).attr('href', '/admin/users/index-setting/'+uid+'')
         });

         // Handle click on "Delete" button
         $('#table tbody').on('click', '.btn-delete', function (e) {
            var  uid=$(this).attr('data-uid');
			var user_name = $(this).attr('data-user_name');
            swal(
                {
                    title: "Are you sure you want to delete "+user_name+" ("+uid+")",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    closeOnConfirm: false,
                },
                function(isConfirm) {
                    if (isConfirm) {
                        $.ajax( {
                            url:'/admin/users/delete-user/'+uid,
                            success:function(data) {
                                table.ajax.reload();
                                swal({
                                    title: "Deleted!",
                                    text: "User has been deleted.",
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
