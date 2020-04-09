<div class="wrapper">
            <div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Score Details</h4>
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
										<?php if (validation_errors()!=''){ ?> 
                 							<div class="alert alert-danger">
                 							    <?php echo validation_errors();  ?>
                 							</div>
                 							<?php } ?>
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <div class="row">
                       <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-12">
                                <div class="form-group">
                                   <iframe src="https://www.mail-tester.com/<?php echo $user_name_mail_tester ?>-<?php echo $suggestion?>" width="900px" height="400px"></iframe>
 
                                </div>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 col-xl-6">
                            </div> 
                    </div>
                </div>
            </div>
        </div>
       <div class="loading" style="width:600px;height:300px;">Loading...</div> 
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->  
<script>
    $('iframe').load(function(){
          $(".loading").remove();
    }).show();
</script>
