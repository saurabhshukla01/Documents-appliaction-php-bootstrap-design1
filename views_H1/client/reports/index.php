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
								<?php if(isset($allow_export_report) && $allow_export_report =='1'){ ?>
								<div class="form-group row">
									<div class="col-10"></div>
                						<div class="col-2">
                     						<button class="btn btn-primary waves-effect waves-light" id="btn-report-export"> <i class="mdi mdi-check-all mr-2"></i> Export</button>
                						</div>
            					</div>
								<?php } ?>
                                <table id="table" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>Company</br>Name/UID/Send At</th>
                                        <th>Campaign / List<br/>Name/UID</th>
                                        <th>Delivery<br/>Sent/Success/Failure</th>
                                        <th>Open<br/>All/Unique</th>
                                        <th>Click <br/>All/Unique</th>
                                        <th>Bounce/Unsub.</th>
										<th>Status</th>
                        				<th>Send At</th>
                                    </tr>
                                    </thead>
                                    <thead>
                                    <tr>
										<td><input type="text"  placeholder="Company" id="company_uid" class="input-FW"/></td>
				                        <td><input type="text"  placeholder="Name" id="campaign_uid" class="input-FW"/></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
										<select name="status" class="input-FW" id="status_data" style="height:30px;width:90px;">
                            			    <option value="">-Select-</option>
                            			    <option value="0">Draft</option>
                            			    <option value="1">Pending-sending</option>
                            			    <option value="2">Processing</option>
                            			    <option value="3">Sending</option>
                            			    <option value="4">Sent</option>
                            			    <option value="5">Pause</option>
                            			    <option value="6">Deleted</option>
                            			</select>
										</td>
                                        <td><input type="text"  placeholder="Campaign Date" id="min" size="10" class="input-FW" /><br/>
											<input type="text"  placeholder="Campaign Date" id="max" size="10" class="input-FW" /></td>
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
<div id="myModal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mySmallModalLabel">Captcha</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="form" name="form">
                <div class="modal-body">
                    <div id="message-text" style="display:none"></div>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                            <div class="form-group">
                                <label for="captcha">Captcha Code<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="captcha" id="captcha" parsley-trigger="change" required="" placeholder="Captcha Code" value="" maxlength="10" tabindex="1" data-parsley-id="6">
                            </div>
                        </div>
						<div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                            <div class="form-group" style="float:left;margin-right:10px; margin-top:25px;" id="captcha-img">
                            </div>
                            <div class="form-group" style="float:left;margin-right:10px; margin-top:25px;"><a href="javascript:void(0)" class="refresh" alt="refresh" title="refresh"><i class="fas fa-registered"></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="report_type" id="report_type">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-send">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
	$( function() {
            $("#min" ).datepicker({
                    changeMonth: true,
                    changeYear: true,
                    dateFormat: 'yy-mm-dd'
                });
            $( "#max" ).datepicker({
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
                "url": "/<?php echo $TYPE; ?>/reports/campaing-report",
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
				{ "data": "company"},
				 { "data": "campaign"},
				 { "data": "sent"},
				 { "data": "open"},
				 { "data": "click"},
				 { "data": "bounce"},
				 { "data": "status"},
                 { "data": "finished_at"},
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

		// Handle click on "Report Csv Download" button
        $("#btn-report-export").on('click',function(event) {
            $('#captcha').val('');
            $('#success').html('');
            $('#success').hide();
            $("#myModal").modal();
            $("#captcha-img").html('');
            $('.form-control').removeClass('parsley-error');
            $('.parsley-required').html('');
            $.ajax({
                url:"/<?php echo $TYPE; ?>/captcha/captcha-get/",
                type:'post',
                dataType:"json",
                data:{"action":"report-export"},
                success:function(response) {
                    var img = response.image;
                    $("#captcha-img").html(img);
                },
                error: function() {

                }
            });
      });

		$(document).ready(function() {
        $("a.refresh").click(function() {
            $('#captcha').val('');
            $('#success').html('');
            $('#success').hide();
            $("#captcha-img").html('');
            $.ajax({
                url:"/<?php echo $TYPE; ?>/captcha/captcha-get/",
                type:'post',
                dataType:"json",
                data:{"action":"report-export"},
                success:function(response) {
                    var img = response.image;
                    $("#captcha-img").html(img);
                },
                error: function() {

                }
            });
        });

        $('#myModal').on('hide.bs.modal', function () {
            $('#message-text').removeClass('alert alert-danger');
            $('#message-text').removeClass('alert alert-success');
            $('#message-text').html('');
         });
    });

	$("#form").submit(function(e) {
         e.preventDefault();
         var form_valid = 0;
         $('#form').parsley().destroy();
         $('#form').parsley();
         if($('#form').parsley().validate()) {
            var form_valid = 1;
         }
         if(form_valid > 0) {
            var captcha = $('#captcha').val();
			var company_uid = $('#company_uid').val();
            var campaign_uid = $('#campaign_uid').val();
            var status_data= $('#status_data').val();
            var min= $('#min').val();
            var max= $('#max').val();
            var action = "report-export";
            var postData = {
                    "captcha": captcha,
                    "action": "report-export"
                };
			if($('#company_uid').val())
                {
                        postData.company_uid= $('#company_uid').val();
                }
            if($('#campaign_uid').val())
                {
                        postData.campaign_uid_srch = $('#campaign_uid').val();
                }
            if($('#status_data').val())
                {
                        postData.status_data= $('#status_data').val();
                }
			if($('#min').val())
                {
                        postData.min= $('#min').val();
                }
			if($('#max').val())
                {
                        postData.max= $('#max').val();
                }
           postData.client_uid= "<?php echo $client_uid; ?>";
            $.ajax({
                url:"/<?php echo $TYPE;?>/reports/index-report-download/",
                type:'post',
                dataType:"json",
                data:postData,
                success:function(response) {
                    if(response.success > 0) {
                       window.location.href="/<?php echo $TYPE; ?>/reports/";
                        $('#message-text').removeClass('alert alert-danger');
                        $('#message-text').addClass('alert alert-success');
                        $('#message-text').html(response.message);
                        $('#message-text').show();
                        $('#captcha').val('');
                        $('#myModal').modal('hide');
                        swal({
                            title: "",
                            text: response.message,
                            timer: 2000,
                            showConfirmButton: false
                        });
                    }else{
                        $('#message-text').removeClass('alert alert-success');
                        $('#message-text').addClass('alert alert-danger');
                        $('#message-text').html(response.message);
                        $('#message-text').show();
                        $('#captcha').val('');
                        $("#captcha-img").html('');
                            $.ajax({
                            url:"/<?php echo $TYPE; ?>/captcha/captcha-get/",
                            type:'post',
                            dataType:"json",
                            data:{"action":"report-export"},
                            success:function(response) {
                            var img = response.image;
                            $("#captcha-img").html(img);
                            },
                            error: function() {
                            }
                        });
                    }
                },
                error: function() {
                    $('#message-text').addClass('alert alert-danger');
                    $('#message-text').html('Error Please try again');
                    $('#message-text').show();
                }
             });
          }
    });

        $('#table_filter').hide();
    });

</script>        
