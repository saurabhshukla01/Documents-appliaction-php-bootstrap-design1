<div class="wrapper">
            <div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Global BlackList</h4>
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
							<?php if($this->session->flashdata('message')){?>
        						<div class="alert alert-success">
        						    <?php echo $this->session->flashdata('message')?>
        						</div>
        						<?php } ?>
                            <div class="card-body">
                                <table id="table" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>Redis Key</th>
                                        <th>Redis value</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <thead>
                                    <tr>
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
                "url": "/admin/redis-client/get_list",
                "type": "POST",
            },
            "columnDefs": [ {
                "targets": -1,
                "data": null,
                "render": function ( data, type, row ) {
				return '<button alt="Delete" title="Delete" class="btn-delete actToggle" data-original-title="Delete" type="button" data-id="'+ row.keyId+'" data-uid="'+ row.keyId+'"><i class="fa fa-trash"></i></button>';
                },
                "defaultContent": ''
                },
             ],
         "dom": 'Bfrtip',
		"buttons": [
         ],
            "columns": [
                {"data": "key"},
                { "data": "value"},
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
            $(location).attr('href', '/admin/redis-client/create')
         } );

         // Handle click on "Edit" button
         $('#table tbody').on('click', '.btn-edit', function (e) {
            var  uid=$(this).attr('data-uid');
            $(location).attr('href', '/admin/redis-client/update/'+uid+'')
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
