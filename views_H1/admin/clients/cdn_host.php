<div class="wrapper">
            <div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <h4 class="page-title">CDN HOST Create</h4>
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
                            <?php } echo form_open('admin/clients/create-cdn-host/'.$client_uid.'/'.$cdn_host_id); ?>
                                <div class="row">
					<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                                <div class="form-group">
                                    <label for="content">Content<span class="text-danger">*</span></label>
                                    <input type="content" class="form-control" name="content" value="<?php echo isset($content)?$content:''?>" id="content" parsley-trigger="change" required placeholder="Content" tabindex="1"  maxlength="50">
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
			<script type="text/javascript">
			    $('#cancel').click(function() {
         		$(location).attr('href', '<?php base_url();?>/admin/clients/');
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
										<th>Tag</th>
                                		<th>Content</th>
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
                "url": "/admin/clients/index-cdn-host-list/<?php echo $client_uid;?>",
                "type": "POST",
            },
            "columnDefs": [ {
                "targets": -1,
                "data": null,
                "render": function ( data, type, row ) {
			var template = '';
				 template += '<button  alt="Edit" title="Edit" class="btn-edit actToggle" type="button" data-original-title="Edit" id="'+ row.cdn_uid+'" data-id="'+ row.cdn_uid+'" data-uid="'+ row.cdn_uid+'"><i class="far fa-edit" aria-hidden="true"></i></button><button alt="Delete" title="Delete" data-toggle="tooltip" data-placement="top" data-animation="false" data-html="true" class="btn-delete actToggle" data-original-title="Delete" type="button" data-domainid="'+row.cdn_host_id+'" data-clientuid="'+row.client_id+'"><i class="fa fa-trash"></i></button>';
		    return template;
                },
                "defaultContent": ''
                },
             ],
         "buttons": [],
         "dom": 'Bfrtip',
            "columns": [
				{"data": "cdn_host_id"},
                { "data": "tag"},
                { "data": "content"},
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
            $(location).attr('href', '/admin/clients/create-cdn-host/'+uid+'')
         } );


	$('#table tbody').on('click', '.btn-delete', function (e) {
    var client_uid =$(this).attr('data-clientuid');
    var cdn_host_id=$(this).attr('data-domainid');
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
                 url: "/admin/clients/delete-cdn-host",
			     type:'post',
			     dataType:"json",  
			     data:{"client_uid":client_uid, "cdn_host_id":cdn_host_id},
                 success:function(data) {
                     table.ajax.reload();
                     swal({
                         title: "Deleted!",
                         text: "CDN Host has been deleted.",
                         timer: 2000,
                         showConfirmButton: false
                     });
                 }
             });
         }
     }
    );
    });
      $('#table_filter').hide();
    });
</script>        
