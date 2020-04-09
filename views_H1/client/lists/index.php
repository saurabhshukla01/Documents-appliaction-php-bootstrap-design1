<div class="wrapper">
            <div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Lists</h4>
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
                                        <th>Data Count</th>
										<th>Type</th>
                                        <th>Added date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <thead>
                                    <tr>
										<td></td>
                                        <td><input type="text" placeholder="Name" size="10" class="input-FW" /></td>
                                        <td></td>
										<td>
                        					 <select name="type" id="type" class="input-FW" style="height:35px">
                        					        <option value=""></option>
                        					        <option value="1">List</option>
                        					        <option value="2">Segment</option>
                        					        <option value="3">Testmail</option>
                        					        <option value="4">Transactional Mail</option>
                        					 </select>
                        					</td>
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
<!-- overlay Add Subscriber -->
<div class="modal fade bs-example-modal-sm-subscriber" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="dialog-modal-subscriber">
    <div class="modal-dialog" role="document">
    <form id="add-subscribers-form">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="mySmallModalLabel">Add Subscriber</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" title="Save Segment" data-toggle="tooltip" data-placement="top" data-animation="false" data-html="true">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <input class="form-control" name="subscribers_email" id="subscribers_email" placeholder="Subscribers Email" required data-parsley-pattern="/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9\-]+\.)+([a-zA-Z0-9\-\.]+)+([,]([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9\-]+\.)+([a-zA-Z0-9\-\.]+))*$/" data-parsley-error-message="Accept Only Valid Email Separated With a ,(comma)" type="text">
        </div>
        <div class="modal-footer">
            <input type="hidden" name="list_uid" id="list_uid">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="add_subscribers">Save</button>
        </div>
        </div>
    </form>
    </div>
</div>
<!-- end --> 
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
                "url": "/client/lists/get_list",
                "type": "POST",
            },
            "columnDefs": [ {
                "targets": -1,
                "data": null,
                "render": function ( data, type, row ) {
                    return '<button  alt="Edit" title="Edit" class="btn-edit actToggle" type="button" data-original-title="Edit" id="'+ row.list_uid+'" data-id="'+ row.list_uid+'" data-uid="'+ row.list_uid+'" data-type="'+row.mode+'""><i class="far fa-edit" aria-hidden="true"></i></button><button alt="Delete" title="Delete" class="btn-delete actToggle" data-original-title="Delete" type="button" data-id="'+ row.list_uid+'" data-uid="'+ row.list_uid+'"><i class="fa fa-trash"></i></button><button alt="Upload" title="Upload" class="btn-upload actToggle" data-original-title="Upload" type="button" data-id="'+ row.list_uid+'" data-uid="'+ row.list_uid+'"><i class="fas fa-cloud-upload-alt"></i></button><button alt="Add Subscriber" title="Add Subscriber" class="btn-subscriber actToggle" data-original-title="Add Subscriber" type="button" data-id="'+ row.list_uid+'" data-uid="'+ row.list_uid+'"><i class="fas fa-user-check"></i></button><button alt="Reject Email" title="Reject Email" class="btn-reject actToggle" data-original-title="Reject Email" type="button" data-id="'+ row.list_uid+'" data-uid="'+ row.list_uid+'"><i class="fas fa-ban"></i></button>';
                },
                "defaultContent": ''
                },
             ],
         "buttons": [],
         "dom": 'Bfrtip',
            "columns": [
                {"data": "list_id"},
                { "data": "name"},
                { "data": "data_count"},
				{ "data": "type"},
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
            $(location).attr('href', '/client/lists/create')
         } );

         // Handle click on "Edit" button
         $('#table tbody').on('click', '.btn-edit', function (e) {
            var  uid=$(this).attr('data-uid');
			var type=$(this).attr('data-type');
			if(type=='2'){
            $(location).attr('href', '/client/segments/index/'+uid+'')
			}else{
			$(location).attr('href', '/client/lists/update/'+uid+'')
			}
         } );

		// Handle click on "Upload List" button
         $('#table tbody').on('click', '.btn-upload', function (e) {
            var  uid=$(this).attr('data-uid');
            $(location).attr('href', '/client/segments/upload/'+uid+'')
         } );

		$('#table tbody').on('click', '.btn-subscriber', function (e) {
        var uid= $(this).attr('data-uid');
        $('#list_uid').val(uid);
        $('.bs-example-modal-sm-subscriber').modal('show');
    	});

		// Handle click on "Reject Email" button
         $('#table tbody').on('click', '.btn-reject', function (e) {
            var  uid=$(this).attr('data-uid');
            $(location).attr('href', '/client/lists/reject/'+uid+'')
         } );

		$('#add_subscribers').on('click',function() {
        var validate = 0;
        if($('#add-subscribers-form').parsley().validate()) 
        {
            validate = 1;
        }
        if(validate > 0)
        {
            var list_uid= $('#list_uid').val(); 
            var subscribers_email = $('#subscribers_email').val().trim();
            var email_array = subscribers_email.split(',');
                    
            if(email_array.length > '<?php echo $maximum_allowed_email?>'){
                 swal({
                            title: "",
                            text: "Max "+"<?php echo $maximum_allowed_email?>"+" email can be added at the time",
                            timer: 2000,
                            showConfirmButton: false
                    });
                return false;
            }

            var companyid = $('#compnayid').val();

            $.ajax({
                url         :   '/<?php echo $TYPE ?>/lists/subscriber',
                type        :   'post',
                dataType    :   "json",
                data        :   {"subscribers_email":subscribers_email, "list_uid": list_uid},
                success     :   function(data) {
                    if(data.STATUS == 1)
                    {
                        table.ajax.reload();
                        $('#dialog-modal-subscriber').modal('hide');
                        $('#subscribers_email').val('');
                        swal({
                            title: "",
                            text: data.MESSAGE,
                            timer: 2000,
                            showConfirmButton: false
                        });
					window.location.href="/<?php echo $TYPE ?>/lists";
					//table.ajax.reload();
                    }else if(data.STATUS == 2){
                         swal({
                            title: "",
                            text: data.MESSAGE,
                            timer: 2000,
                            showConfirmButton: false
                        });

                   } else
                    {
                        swal({
                            title: "",
                            text: data.MESSAGE,
                            timer: 2000,
                            showConfirmButton: false
                        });
                    }
                }
            });
        }
    });


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
                            url:'/client/lists/delete/'+uid,
                            success:function(data) {
                                table.ajax.reload();
                                swal({
                                    title: "Deleted!",
                                    text: "Lists has been deleted.",
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
