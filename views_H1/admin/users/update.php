<link href="/assets/plugins/jstree/style.css" rel="stylesheet" type="text/css" />
<script src="/assets/plugins/jstree/jstree.min.js" type="text/javascript"></script>
<script src="/assets/pages/jquery.tree.js" type="text/javascript"></script>
<div class="wrapper">
            <div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <h4 class="page-title">User Role Update</h4>
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
                                <?php if (validation_errors()!=''){ ?>
                            <div class="alert alert-danger">
                                <?php echo validation_errors(); ?>
                            </div>
                            <?php }  ?>
						<form name="user" id="user" action="" method="post">
                                <div class="row">
                                 <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name<span class="text-danger">*</span></label>
                            <input type="role_name" class="form-control <?php if(form_error('role_name')!=''){ echo "parsley-error"; } ?>" name="role_name" value="<?php echo isset($role_name)?$role_name:''?>" id="fname" parsley-trigger="change" required placeholder="Role Name" tabindex="1"  maxlength="50" data-parsley-pattern="^[a-zA-Z\s+]+$"  data-parsley-error-message="Please enter valid name.">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control" tabindex="2" required>
                                <option value="1" <?php echo ($status==1)?'selected="selected"':'';?>>Active</option>
                                <option value="0" <?php echo ($status==0)?'selected="selected"':'';?>>Inactive</option>
                            </select>
                        </div>
                    </div>
					<div class="inbox-widget col-sm-12" style="height: 330px; overflow: hidden;" tabindex="3">
                            <div id="checkTree">
                                <ul>
                                    <?php
                                        foreach($pages as $page){
                                            echo "<li data-jstree='{\"opened\":true}'>".$page->page_url."<ul>";
                                            foreach($actions as $action){
                                                $selected = '';
                                                foreach($role_page_action as $rpa){
                                                    if($rpa->action_id == $action->action_id && $rpa->page_id == $page->page_id){
                                                        $selected = ',"selected":true';
                                                    }
                                                }
                                                echo "<li data-actionid=\"".$action->action_id."\" data-pageid=\"".$page->page_id."\" data-jstree='{\"opened\":true,\"type\":\"file\"".$selected."}'>".$action->action_name."</li>";
                                            }
                                            echo "</ul></li>";
                                         }
                                    ?>
                                </ul>
                            </div>
                            </div>
                    <div class="col-md-6"></div>
					<input type="hidden" name="role_data" id="role_data">
                    <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12">
                        <div class="form-group" style="float:right;">
                            <button type="submit" class="btn btn-primary waves-effect waves-light" value="form_submit" name="save" id="save">Update</button>
                            <button type="button" class="btn btn-secondary waves-effect m-l-5" name="cancel" id="cancel">Cancel</button>
                        </div>
                    </div>
                                </div>
                            <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->  
<script type="text/javascript">
    $('#cancel').click(function() {
         $(location).attr('href', '<?php base_url();?>/admin/users/role');
      });
	$('#save').click(function(){
        var selectedElmsIds = [];
        var selectedElms = $('#checkTree').jstree("get_selected", true);
        $.each(selectedElms, function() {
            var obj = this.id;
            if($('#'+obj+'').attr("data-actionid") != undefined){
                var actionid = $('#'+obj+'').attr("data-actionid");
                var pageid = $('#'+obj+'').attr("data-pageid");
                var a = {};
                a.actionid = actionid;
                a.pageid = pageid; 
                selectedElmsIds.push(a);
            }
        });

         if(selectedElmsIds.length==0){
          swal({
             title: "User Role",
             text: "Please select any one permission",
             timer: 5000,
             showConfirmButton: false
             });
            return false;
        }

        var jsonConvertedData = JSON.stringify(selectedElmsIds);
        $('#role_data').val(jsonConvertedData);
        $('#user').submit();
    });
</script>
