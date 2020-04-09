<div class="wrapper">
            <div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Report</h4>
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
        				<?php if($this->session->flashdata('error_message')){?>
        				<div class="alert alert-danger">
        				    <?php echo $this->session->flashdata('error_message')?>
        				</div>
        				<?php } ?>
                            <div class="card-body">
                                <table id="table" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>Company Name/UID</th>
                                        <th>Campaign Date</th>
                                        <th>Campaign Count</th>
                                        <th>Processed</th>
										<th>Delivery Success</th>
                        				<th>Delivery Failure</th>
                                    </tr>
                                    </thead>
                                    <thead>
                                    <tr>
										<td><input type="text"  placeholder="Company" id="company_uid" class="input-FW"/></td>
                                        <td><input type="text"  placeholder="Campaign Date" id="min" size="10" class="input-FW" /></td>
                                        <td></td>
                                        <td></td>
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
	$( function() {
            $("#min" ).datepicker({
                    changeMonth: true,
                    changeYear: true,
                    dateFormat: 'yy-mm-dd'
                });
        });
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
                "url": "/<?php echo $TYPE; ?>/reports/ajax-client-daily-report",
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
				 { "data": "companyName"},
				 { "data": "campaign_date"},
				 { "data": "campaign_count"},
				 { "data": "processed"},
				 { "data": "delivery_success"},
				 { "data": "delivery_failure"},
			]
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
