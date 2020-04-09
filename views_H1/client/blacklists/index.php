<div class="wrapper">
            <div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Blacklist</h4>
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
							<div class="form-group row">
				<div class="col-10"></div>
                <div class="col-2">
                     <button type="button" id="btn-upload-black-list" class="btn btn-primary waves-effect waves-light"> <i class="mdi mdi-check-all mr-2"></i> Import Black List</button>
                </div>
            </div>
                                <table id="table" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
									   	<th>Email</th>
                       					<th>Domain</th>
                       					<th>Reason</th>
                       					<th>Date Added</th>
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

<form method="post" id="upload-form-blaklist" name="" enctype="multipart/form-data">
<div class="modal bs-example-modal-sm"  id="black-list-upload-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mySmallModalLabel">BlackList</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-body-details-blacklist">
             <div class="form-group">
                   <label for="company_id">Upload Blacklist (.csv file allowed)</label>
                   <input type="file" name="blacklist_file" id="blacklist_file">
               </div>
            </div>
			<div><b>Heading--</b> email: reason:	domain</div>
            <div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button><button type="submit" class="btn btn-primary" id="btn-action-black-list">Submit</button></div>
        </div>
    </div>
</div>
</form>
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
                "url": "<?php echo base_url(); ?><?php echo $TYPE?>/blacklists/get_list",
                "type": "POST",
            },
            "columnDefs": [ {
                "targets": '',
                "data": null,
                "render": function ( data, type, row ) {
                    return '';
                },
                "defaultContent": ''
                },
             ],
         "buttons": [],
         "dom": 'Bfrtip',
            "columns": [
				{ "data": "email"},
             	{ "data": "domain"},
             	{ "data": "reason"},
             	{ "data": "date_added"},
			]
        });
		
		$("#btn-upload-black-list").on('click',function(event) {
       		 $("#black-list-upload-modal").modal('show');
     	});

		$("#btn-action-black-list").on('click',function(e) {
                e.preventDefault();
                var property = document.getElementById("blacklist_file").files[0];
                var formdata = new FormData(document.getElementById('upload-form-blaklist'));
                formdata.append("file", property);
                $.ajax({
                  url: "<?php echo base_url(); ?><?php echo $TYPE?>/blacklists/client-black-list",
                  type: "post",
                  data: formdata,
                  dataType: 'json',
                  mimeTypes:"multipart/form-data",
                  processData: false,
                  contentType: false,
                  success: function(text) {
                      if(text.success >0) {
                        $('#black-list-upload-modal').modal('hide');
                        swal(
                                 {
                                 title: "Black List",
                                 type: "success",
                                 text: "Your csv was uploaded successfully",
                                 confirmButtonClass: "btn-success",
                                 closeOnConfirm: false,
                                 }
                             );
                        table.ajax.reload();
                      }
                  },
                  error: function() {
                      alert("An error occured, please try again.");         
                  }
                });   
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
        $('#table_filter').hide();
    });
</script>        
