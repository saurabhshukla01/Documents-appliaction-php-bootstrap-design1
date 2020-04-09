<div class="wrapper">
            <div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Campaigns</h4>
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
        						<div class="alert alert-success">
        						    <?php echo $this->session->flashdata('message')?>
        						</div>
        						<?php } ?>
        						<?php if($this->session->flashdata('error_message')){?>
        						<div class="alert alert-danger">
        						    <?php echo $this->session->flashdata('error_message')?>
        						</div>
        						<?php } ?>
                                <table id="table" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
										<th>Campaign<span>Name/UID</span></th>
                        				<th>List<span>Name/UID</span></th>
                        				<th>Client<span>Name/UID</span></th>
                        				<th>Status</th>
                        				<th>Added date</th>
                        				<th>Action</th>
                                    </tr>
                                    </thead>
                                    <thead>
                                    <tr>
										<td><input type="text" placeholder="Campaign Name/UID" class="input-FW"/></td>
                        				<td><input type="text" placeholder="Name/UID" class="input-FW"/></td>
                        				<td><input type="text" placeholder="Client Name/UID" class="input-FW"/></td>
                        				<td>
                        				 <select name="status" class="input-FW">
                        				        <option value="">-Select-</option>
                        				        <option value="0">Draft</option>
                        				        <option value="1">Pending-sending</option>
                        				        <option value="2">Processing</option>
                        				        <option value="3">Sending</option>
                        				        <option value="4">Sent</option>
                        				        <option value="5">Pause</option>
                        				 </select>
                        				</td>
                        				<td>
                        				</td>
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
                "url": "/client/campaigns/ajax-campaign",
                "type": "POST",
            },
            "columnDefs": [ {
                "targets": -1,
                "data": null,
                "render": function ( data, type, row ) {
				var template = '';
				template += '<button alt="Copy" title="Copy" class="btn-copy actToggle" data-original-title="Copy" type="button" data-uid="'+row.campaign_uid+'" data-toggle="tooltip" data-placement="top" data-animation="false" data-html="true"><i class="fas fa-copy"></i></button>';
                 if(row.campaign_status != '1' && row.campaign_status!='3') {
                    template += '<button alt="Edit" title="Edit" class="btn-edit actToggle" type="button" data-original-title="Edit" data-uid="'+row.campaign_uid+'" data-type="'+row.type+'" data-toggle="tooltip" data-placement="top" data-animation="false" data-html="true"><i class="far fa-edit"></i></button>';
                 }
                 if(row.is_campaign_sent != '1' && row.campaign_status != '1' && row.campaign_status!='3') { 
                    template += '<button alt="Delete" title="Delete" class="btn-delete actToggle" type="button" data-original-title="Delete" data-uid="'+row.campaign_uid+'" data-name="'+row.name+'" data-toggle="tooltip" data-placement="top" data-animation="false" data-html="true"><i class="fa fa-trash"></i></button>';

                 }
                 if(row.campaign_status == '1') {
                         template += '<button alt="Mark as Sent" title="Mark as Sent" class="btn-send actToggle" data-original-title="Mark as sent" type="button" data-uid="'+row.campaign_uid+'" data-name="'+row.name+'" data-status="4" data-toggle="tooltip" data-placement="top" data-animation="false" data-html="true"><i class="fas fa-paper-plane"></i></button>';
                         template += '<button alt="Pause Sending" title="Pause Sending" class="btn-pause actToggle" data-original-title="Pause Sending" type="button" data-uid="'+row.campaign_uid+'" data-status="5" data-toggle="tooltip" data-placement="top" data-animation="false" data-html="true"><i class="fas fa-pause"></i></button>';

                        }
                 if(row.campaign_status == '5' ) {
                         template += '<button alt="Mark as Sent" title="Mark as Sent" class="btn-send actToggle" data-original-title="Mark as sent" type="button" data-uid="'+row.campaign_uid+'" data-name="'+row.name+'" data-status="4" data-toggle="tooltip" data-placement="top" data-animation="false" data-html="true"><i class="fas fa-paper-plane"></i></button>';
                         template += '<button alt="Unpause sending" title="Unpause sending" class="btn-unpause actToggle" data-original-title="Pause sending" type="button" data-uid="'+row.campaign_uid+'" data-status="1" data-toggle="tooltip" data-placement="top" data-animation="false" data-html="true"><i class="fas fa-play"></i></button>';
                    }
				  return template;
                },
                "defaultContent": ''
                },
             ],
         "buttons": [],
         "dom": 'Bfrtip',
            "columns": [
					{ "data": "campaign_name"},
             		{ "data": "list_name"},
             		{ "data": "client_name"},
             		{ "data": "status"},
             		{ "data": "send_at"},
             		{ "data": "action"},
                 ]
        });

		$("#table thead select , input").on( 'keyup change', function (e) {
    	  if (e.keyCode == 13 || e.keyCode==undefined || this.value == '') {        
    	     if(this.id == 'from_date' || this.id == 'to_date'){
    	     table
    	         .column( $(this).parent().index()+':visible' )
    	         .search( $('#from_date').val() + '::' + $('#to_date').val() )
    	         .draw();
    	     }
    	    else {
    	     table
    	         .column( $(this).parent().index()+':visible' )
    	         .search( this.value )
    	         .draw();
    	     }
    	   }
    	});

         // Handle click on "Create" button
         $('.btn-create').click( function(e) {
            $(location).attr('href', '/client/campaigns/create')
         } );

         // Handle click on "Edit" button
         $('#table tbody').on('click', '.btn-edit', function (e) {
            var  uid=$(this).attr('data-uid');
            $(location).attr('href', '/client/campaigns/update/'+uid+'')
         });
			
		// Handle click on "Send" button
      $('#table tbody').on('click', '.btn-send', function (e) {
         var  uid    = $(this).attr('data-uid');
         var  campaign_name = $(this).attr('data-name');
         var  status = $(this).attr('data-status'); 
         swal(
             {
                 title: "Are you sure to send campaign "+campaign_name+" ("+uid+") ?",
                 type: "warning",
                 showCancelButton: true,
                 confirmButtonClass: "btn-danger",
                 closeOnConfirm: false,
             },
             function(isConfirm) {
                 if (isConfirm) {
                     $.ajax( {
                        url: '/client/campaigns/update-status',
                        type:'post',
                        dataType:"json",  
                        data:{"uid":uid,"status":status},
                         success:function(data) {
                             table.ajax.reload();
                             swal({
                                 title: "Status!",
                                 text: "Campaign Status "+campaign_name+" ("+uid+") changes successfully",
                                 timer: 2000,
                                 showConfirmButton: false
                             });
                        }
                    });
                 }
             });
      	});

		// Handle click on "Pause:" button
      $('#table tbody').on('click', '.btn-pause', function (e) {
         var  uid    = $(this).attr('data-uid');
         var  status = $(this).attr('data-status'); 
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
                         url: '/client/campaigns/update-status',
                         type:'post',
                         dataType:"json",  
                         data:{"uid":uid,"status":status},
                         success:function(data) {
                             table.ajax.reload();
                             swal({
                                 title: "Pause",
                                 text: "Campaign Paused Successfully.",
                                 timer: 2000,
                                 showConfirmButton: false
                             });
                         }
                     });
                 }
             });
      });

		// Handle click on "Un Pause" button
      $('#table tbody').on('click', '.btn-unpause', function (e) {
         var  uid    = $(this).attr('data-uid');
         var  status = $(this).attr('data-status'); 
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
                         url: '/client/campaigns/update-status',
                         type:'post',
                         dataType:"json",  
                         data:{"uid":uid,"status":status},
                         success:function(data) {
                             table.ajax.reload();
                             swal({
                                 title: "UnPaused",
                                 text: "Campaign Unpaused Successfully",
                                 timer: 2000,
                                 showConfirmButton: false
                             });
                         }
                     });
                 }
             });
      } );

		  // Handle click on "Copy" button
      $('#table tbody').on('click', '.btn-copy', function (e){
         var  uid=$(this).attr('data-uid');
         $.ajax({
         url:'/client/campaigns/copy-campaign/'+uid,
         success:function(data){
             table.ajax.reload();
             swal({
             title: "Copied!",
             text: "Campaign has been copied.",
             timer: 2000,
             showConfirmButton: false
             });
         }
         });
      });
		// Handle click on "Delete" button
      $('#table tbody').on('click', '.btn-delete', function (e) {
         var  uid=$(this).attr('data-uid');
         var  campaign_name = $(this).attr('data-name');
         swal(
             {
                 title: "Are you sure to delete campaign "+campaign_name+ "( "+uid+" ) ?",
                 type: "warning",
                 showCancelButton: true,
                 confirmButtonClass: "btn-danger",
                 closeOnConfirm: false,
             },
             function(isConfirm) {
                 if (isConfirm) {
                     $.ajax( {
                         url: '/client/campaigns/delete',
                         type:'post',
                         complete: function () {
                         $('[data-toggle="tooltip"]').tooltip();
                         },
                         dataType:"json",  
                         data:{"uid": uid},
                         success:function(data) {
                             table.ajax.reload();
                             swal({
                                 title: "Deleted!",
                                 text: "Campaign "+campaign_name+"("+uid+") has been deleted.",
                                 timer: 2000,
                                 showConfirmButton: false
                             });
                         }
                     });
                 }
             });
      } );
        $('#table_filter').hide();
    });

</script>        
