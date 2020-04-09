<script>
    $(document).ready(function () {
        var currHrs = <?php echo $HOURS ?>;
        
        var co_type = $("input[name='co_type']").val();
        if(co_type == 'hours')
        {
            $('#by_days').hide();
            $('#by_hours').show();
            $('#by_date').hide();
        }
        else if(co_type == 'date')
        {
            $('#by_days').hide();
            $('#by_hours').hide();
            $('#by_date').show();
        }
        else
        {
            $('#by_days').show();
            $('#by_hours').hide();
            $('#by_date').hide();
        }

        $("#created").ionRangeSlider(
            {
                type: "double",
                min: 0,
                max: 90,
                from: 0,
                to: 0,
                from_fixed:true,
            }
        );
        $("#view").ionRangeSlider(
            {
                type: "double",
                min: 0,
                max: 90,
                from: 0,
                to: 0,
            }
        );
        $("#click").ionRangeSlider(
            {
                type: "double",
                min: 0,
                max: 90,
                from: 0,
                to: 0,
            }
        );
        $("#view_h").ionRangeSlider(
            {
                type: "double",
                min: 0,
                max: 1380,
                from: 0,
                to: 0,
                step: 10,
                //from_max: currHrs,
                prettify: function(value){
                    var hours = Math.floor(Math.abs(value) / 60);
                    var minutes = Math.abs(value) % 60;
                    var tt = '';
                    if(hours > 0){
                        tt += hours + ' h '
                    }
                    if(minutes > 0){
                        tt += minutes + ' mn'
                    }
                    return tt;
                }
            }
        );
        $("#click_h").ionRangeSlider(
            {
                type: "double",
                min: 0,
                max: 1380,
                from: 0,
                to: 0,
                step: 10,
                //from_max: currHrs,
                prettify: function(value){
                    var hours = Math.floor(Math.abs(value) / 60);
                    var minutes = Math.abs(value) % 60;
                    var tt = '';
                    if(hours > 0){
                        tt += hours + ' h '
                    }
                    if(minutes > 0){
                        tt += minutes + ' mn'
                    }
                    return tt;
                }
            }
        );
    });
</script>
<div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Segment</h4>
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
							<?php if (validation_errors()!=''){ ?>
                   			 <div class="alert alert-danger">
                   			     <?php echo validation_errors(); ?>
                   			 </div>
                   			 <?php }?>
							 <form name="srResult" action="" method="post" accept-charset="utf-8">
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-4">
                                <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="keyword" id="keyword" placeholder="Keyword"> 
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12">
                                    <div class="form-group">
                                        <label for="campaign">Campaign</label>
										<select id="campaign" name="campaign" class="select2 form-control" multiple data-placeholder="Campaign">
										   <?php if(count($CAMPAIGN_DATA) > 0) {
												foreach($CAMPAIGN_DATA as $CAMPAIGN) {

											?>
												<option value="<?php echo $CAMPAIGN->campaign_id ?>"><?php echo $CAMPAIGN->name ?></option>

											<?php 
											   
												 }
											  } 
											
											?>
										</select>      
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12">
                                    <div class="form-group">
                                        <label for="location">Location</label>
                                        <?php
                                            $locHtml = <<<HTML
                                          <select id="location" name="location" class="form-control select2" data-placeholder="Location" multiple>
HTML;
                                            foreach($LOCCOMBO as $row)
                                            {
                                                $locName = $row;
											    $locHtml .=<<<HTML
                                                        <option value="$locName">$locName</option>
HTML;
                                            }
                                            $locHtml .= "</select>";
                                            echo $locHtml; 
                                        ?>
                        
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12">
                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <?php
                                            $catHtml = <<<HTML
                                                            <select id="category" name="category" class="form-control select2" data-placeholder="Category" multiple>$CATCOMBO
HTML;
                                            
                                            $catHtml .= "</select>";
                                            echo $catHtml; 
                                        ?>

                                    </div>
                                </div>
                                
                                <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12">
                                    <div class="form-group">
                                        <label for="location">Domain</label>
                                        <?php
                                            $domainHtml = <<<HTML
                                                            <select id="domain" name="domain" class="form-control select2" data-placeholder="Domain" multiple>$DOMAINCOMBO</select>
HTML;
                                            echo $domainHtml; 
                                        ?>
                        
                                    </div>
                                </div>


                                <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12">
                                    <div class="form-group">
                                        <label for="device">Device</label>
                                        <?php
                                            $deviceHtml = <<<HTML
                                                            <select id="device" name="device" class="form-control select2" data-placeholder="Device" multiple>
HTML;
                                            foreach($DEVICECOMBO as $row)
                                            {
                                                $deviceName = $row;
                                                $deviceHtml .=<<<HTML
                                                        <option value="$deviceName">$deviceName</option>
HTML;
                                            }
                                            $deviceHtml .= "</select>";
                                            echo $deviceHtml;
                                        ?>
        
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12">
                                    <div class="form-group row">
                                        <div class="col-sm-12 col-xs-12">
                                            <span class="clearfix" style="font-size:12px;margin-bottom:5px;display:block">Added</span>
                                            <input type="text" id="created">
                                        </div>
                                    </div>
                                    <input type="hidden" name="co_type" value="<?php //echo $radio_type ?>">
                                </div> 
            
                                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12 col-xs-12">
                                                <span class="clearfix" style="font-size:12px;margin-bottom:5px;display:block">By Days Opener</span>
                                                <input type="text" id="view">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12 col-xs-12">
                                                <span class="clearfix" style="font-size:12px;margin-bottom:5px;display:block">By Days Clicker</span>
                                                <input type="text" id="click">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12 col-xs-12">
                                                <span class="clearfix" style="font-size:12px;margin-bottom:5px;display:block">By Hours Opener</span>
                                                <input type="text" id="view_h">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12 col-xs-12">
                                                <span class="clearfix" style="font-size:12px;margin-bottom:5px;display:block">By Hours Clicker</span>
                                                <input type="text" id="click_h">
                                            </div>
                                        </div>
                                    </div>

                            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12">
                                <div class="form-group">
                                    <button class="btn btn-primary waves-effect waves-light" type="submit" name="search_data" id="search_data" title="Search">Search</button>
                                    <?php if((isset($SEGMENTUID)) && (isset($LISTTYPE) && $LISTTYPE == '2')) { ?>
                                        <button class="btn btn-primary waves-effect waves-light" type="button" name="search_update" id="search_update" title="Update Segment">Update</button>
                                    <?php }else{ ?>
                                    <button class="btn btn-primary waves-effect waves-light" type="button" name="search_save" id="search_save" data-toggle="modal" data-target=".bs-example-modal-sm" title="Save Segment">Save</button>
                                    <?php } ?>
                                </div>
                            </div>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-8">
                                <table id="table" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                    <thead>
                                        <tr>
                                            <th>Email</th>
                                            <th>Created Date</th>
                                            <th>Last Clicked Date</th>
                                            <th>Last Open Date</th>
                                        </tr>
                                    </thead>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
								
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="dialog-modal">
    <div class="modal-dialog" role="document">
    <form id="my-form" onSubmit="return false">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="mySmallModalLabel">Save Segment</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" title="Save Segment" data-toggle="tooltip" data-placement="top" data-animation="false" data-html="true">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <input class="form-control" name="segment_name" id="segment_name" placeholder="Segment Name" required data-parsley-pattern="/[^TESTMAIL|TRANSACTIONALMAIL$]/i" data-parsley-error-message="TESTMAIL and TRANSACTIONALMAIL can not be used as filename" data-parsley-id="4" type="text">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" title="Close" data-toggle="tooltip" data-placement="top" data-animation="false" data-html="true">Close</button>
            <button type="button" class="btn btn-primary" id="save_segment" title="Save" data-toggle="tooltip" data-placement="top" data-animation="false" data-html="true">Save</button>
        </div>
        </div>
    </form>
    </div>
</div>
<script>
$(document).on('click', '[name="co_type"]', function () {
        var co_type = $("input[name='co_type']:checked").val();
        if(co_type == 'hours')
        {
            $('#by_days').hide();
            $('#by_hours').show();
            $('#by_date').hide();
        }
        else if(co_type == 'date')
        {
            $('#by_days').hide();
            $('#by_hours').hide();
            $('#by_date').show();
        }
        else
        {
            $('#by_days').show();
            $('#by_hours').hide();
            $('#by_date').hide();
        }
    });

	$('#search_save').on('click',function() {
        $('#dialog-modal').modal('show');
        return false;
    });
	
	
    $('#save_segment').on('click',function() {
        var validate = 0;
        if($('#my-form').parsley().validate()) {
            validate = 1;
        }
        if(validate > 0){ 
        var segment_name = $('#segment_name').val().trim();
        var args = getFields();
        var listArgs = {};
        listArgs.LISTTYPE = '<?php echo $LISTTYPE ?>';
        listArgs.PRECRITERIA = '<?php echo $CRITERIA ?>';
         
        $.ajax({
            url         :   '/<?php echo $TYPE ?>/segments/create-segment',
            type        :   'post',
            dataType    :   "json",  
            data        :   {"segment_name":segment_name, "criteria": args, "listArgs":listArgs },
            success     :   function(data) {
            if(data.SUCCESS == 1)
            {
                $('#dialog-modal').modal('hide');
				var redirect_url = '/<?php echo $TYPE ?>/lists/';
                $(location).attr('href', redirect_url);
            }
            else
            {
                swal({
                    title: "",
                    text: data.MSG,
                    timer: 2000,
                    showConfirmButton: false
                });
            }
          }
        });
        }
    });

    $('#segment_name').keypress(function(e){
        if(e.keyCode == 13)
        {
            $('#save_segment').click(); 
        }
    });

    $('#cancel').click(function() {
        window.history.back();
    });

    $( document ).ready(function() {
	var not_allow_copy = '<?php echo $not_allow_copy ?>';
	if(not_allow_copy !='1')
	{
		$('.disableEvent').bind('cut copy paste', function (e) {
        		e.preventDefault();
        	});
	}

        var args = {};
        args.keyWord = $('#keyword').val().trim();
        args.CAMPAIGN = $('#campaign').val();
        args.LOC = $('#location').val();
        args.CAT = $('#category').val();
        args.DOMAIN = $('#domain').val();
        args.DEVICE = $('#device').val();
        args.CREATED = $('#created').val();
        args.VIEWED = $('#view').val();
        args.VIEWED_HRS = $('#view_h').val();
        args.CLICKED = $('#click').val();
        args.CLICKED_HRS = $('#click_h').val();
        args.HRSTYPE = '<?php echo $HRSTYPE ?>';
        args.CLIENT_UID= '<?php echo $client->client_uid; ?>';
        args.list_uid = '<?php echo $SEGMENTUID ?>';
        args.LISTTYPE = '<?php echo $LISTTYPE ?>';
        args.CRITERIA = '<?php echo $CRITERIA ?>';
        args.EXTRAINFO = '<?php echo $EXTRAINFO ?>';
        args.ONLOADPAGE = '1';
        getDataTblInfo(args);
    });

    $('#search_data').on('click',function() {
        var args = {};
        args.keyWord = $('#keyword').val().trim();
        args.CAMPAIGN = $('#campaign').val();
        args.LOC = $('#location').val();
        args.CAT = $('#category').val();
        args.DOMAIN = $('#domain').val();
        args.DEVICE = $('#device').val();
        args.CREATED = $('#created').val();
        args.VIEWED = $('#view').val();
        args.CLICKED = $('#click').val();
        args.VIEWED_HRS = $('#view_h').val();
        args.CLICKED_HRS = $('#click_h').val();
        args.FROMCLICK = 1;
        args.FROMSEARCH = 1;
        args.CLIENT_UID= '<?php echo $client->client_uid?>';
        args.LISTTYPE = '<?php echo $LISTTYPE ?>';
        args.PRECRITERIA = '<?php echo $CRITERIA ?>';
        getDataTblInfo(args);
        return false; 
    });

    function getDataTblInfo(allSearchData)
    {
        var segmentUID = '<?php echo $SEGMENTUID ?>';
        if(segmentUID)
        {
            
            var campJoin = ['<?php echo $CAMPAIGNSELECTED ?>'];
            var locJoin = ['<?php echo $LOCSELECTED ?>'];
            var catJoin = ['<?php echo $CATSELECTED ?>'];
            var domainJoin = ['<?php echo $DOMAINSELECTED ?>'];
            var deviceJoin = ['<?php echo $DEVICESELECTED ?>'];
            if(locJoin)
            {
                if(!allSearchData.LOC && !allSearchData.FROMCLICK)
                {
                    $('#location').val(locJoin).trigger('change');
                }
            }
            if(campJoin)
            {
                if(!allSearchData.CAMPAIGN && !allSearchData.FROMCLICK)
                {
                    $('#campaign').val(campJoin).trigger('change');
                }
            }
            if(catJoin)
            {
                if(!allSearchData.CAT && !allSearchData.FROMCLICK)
                {
                    $('#category').val(catJoin).trigger('change');
                }
            }
            if(domainJoin)
            {
                if(!allSearchData.DOMAIN && !allSearchData.FROMCLICK)
                {
                    $('#domain').val(domainJoin).trigger('change');
                }
            }
            if(deviceJoin)
            {
                if(!allSearchData.DEVICE && !allSearchData.FROMCLICK)
                {
                    $('#device').val(deviceJoin).trigger('change');
                }
            }
           
            if(!allSearchData.FROMSEARCH)
            {
                    var parse_extrainfo = JSON.parse(allSearchData.EXTRAINFO);
                    $("#created").data("ionRangeSlider").update({from: parse_extrainfo.duration_created_min});
                    $("#created").data("ionRangeSlider").update({to: parse_extrainfo.duration_created_max});
                    
                    setTimeout(function(){ $("#click").data("ionRangeSlider").update({from: parse_extrainfo.days_open_min});}, 3);
                    $("#view").data("ionRangeSlider").update({to: parse_extrainfo.days_open_max});
                    setTimeout(function(){ $("#click").data("ionRangeSlider").update({from: parse_extrainfo.days_click_min});}, 3);
                    $("#click").data("ionRangeSlider").update({to: parse_extrainfo.days_click_max});
                    
                    setTimeout(function(){ $("#view_h").data("ionRangeSlider").update({from: parse_extrainfo.hours_open_min});}, 3);
                    $("#view_h").data("ionRangeSlider").update({to: parse_extrainfo.hours_open_max});
                    setTimeout(function(){ $("#click_h").data("ionRangeSlider").update({from: parse_extrainfo.hours_click_min});}, 3);
                    $("#click_h").data("ionRangeSlider").update({to: parse_extrainfo.hours_click_max});
                }
           
            if(!allSearchData.FROMSEARCH)
            {
                $("#keyword").val('<?php echo $KEYWORD ?>');
            }
        }
	//allSearchData.COMPANY_ID = '<?php echo $client->client_id;?>';
	allSearchData.EMAIL_HIDE = '<?php echo $email_hide ?>';
        table = $('#table').DataTable({
		"responsive": true,
            "processing": true, 
            "serverSide": true,
            "ordering": false,
            "searching": false,
            "lengthChange": false,
            "pageLength": 50,
            "destroy": true,
        "ajax": {
            "url": "/<?php echo $TYPE ?>/segments/segmentlist",
            "type": "POST",
            "dataType":"json",
            "data":{'allSearchParam':allSearchData},
        },
        "columnDefs": [ {
            "targets": '',
            "data": null,
            "render": function ( data, type, row ) {
            },
            "defaultContent": ''
            },
         ],
        "dom": '<"top"i>t<"bottom"flp><"clear">',
        "columns": [
            { "name": ""},
            { "name": ""},
            { "name": ""},
            { "name": ""},
        ]
    });
}

    function getCriteria(args, cb)
    {
        $.ajax({
                url:"/<?php echo $TYPE?>/segments/criteria",
                type:'post',
                dataType:"json",
                data:{"searchCriteria":args},
                success: function(respo){
                    return cb(respo);
                },
                error: function(xhr, status, error){
                }
            });
    }

    $( "#search_update" ).click(function(e) {
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
            var args = getFields();
            var listArgs = {};
            //listArgs.LISTTYPE = '<?php echo $LISTTYPE ?>';
           // listArgs.PRECRITERIA = '<?php echo $CRITERIA ?>';
             $.ajax( {
                 url        :   '/<?php echo $TYPE ?>/segments/update-segment',
			     type       :   'post',
			     dataType   :   "json",  
			     data       :   {"criteria": args, "listArgs":listArgs },
                 success:function(data) {
			var redirect_url = '/<?php echo $TYPE ?>/lists/';
			$(location).attr('href', redirect_url);
                 }
             });
         }
     }
    );
    } );

    function getFields()
    {
        var args = {};
        args.keyWord = $('#keyword').val().trim();
        args.CAMPAIGN = $('#campaign').val();
        args.LOC = $('#location').val()
        args.CAT = $('#category').val();
        args.DOMAIN = $('#domain').val();
        args.DEVICE = $('#device').val();
        args.CREATED = $('#created').val();
        args.VIEWED = $('#view').val();
        args.CLICKED = $('#click').val();
        args.VIEWED_HRS = $('#view_h').val();
        args.CLICKED_HRS = $('#click_h').val();
        args.CLIENT_UID= '<?php echo $client->client_uid; ?>';
        args.list_uid = '<?php echo $SEGMENTUID; ?>';
        return args;
    }
</script>        
