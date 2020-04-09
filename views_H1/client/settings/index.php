<style type="text/css">
.wrapper .acctInfo {}
.wrapper .acctInfo h3 {font-size:17px;font-weight:600;margin-top:30px;margin-bottom:15px;position:relative;}
.wrapper .acctInfo h3:first-child {margin-top:0px;}
.wrapper .acctInfo h3 a {right:0px;font-size:12px;font-weight:300;position:absolute;border-radius:5px;background:#000;color:#fff;padding:6px 12px;text-decoration:none;}
.wrapper .acctInfo h3 a {right:0px;font-size:12px;font-weight:300;position:absolute;border-radius:5px;background:#333;color:#fff;padding:6px 12px;text-decoration:none;}
.wrapper .acctInfo ul {margin:0px;padding:0px;border-bottom:1px #e1e1e1 dashed;}
.wrapper .acctInfo ul:last-child {margin:0px;padding:0px;border-bottom:0px;}
.wrapper .acctInfo li {font-size:12px;list-style:none;display:inline-block;padding:10px 25px 10px 0px;font-weight:300;}
.wrapper .acctInfo li:first-child {font-weight:600;width:200px;}
.wrapper .acctInfo label {font-size:11px;font-weight:300;display:none;}
.wrapper .acctInfo legend {font-size:11px;font-weight:700;text-transform:uppercase;}
</style>
<div class="wrapper">
            <div class="container-fluid">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Profile</h4>
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
        						<?php if(!empty($this->session->flashdata('message'))) {?>
        							<div class="alert alert-success">
						            <div align="center"><?php echo $this->session->flashdata('message'); ?></div>
							        </div>
						        <?php  } ?>     
                <div class="table-responsive acctInfo">
                    <h3>Personal Details<a href="<?php echo base_url() ?><?php echo $TYPE;?>/settings/info"><i class="fa fa-pencil" aria-hidden="true"></i> Edit Details</a></h3>
                    <ul><li>Full Name:</li><li><?php echo isset($data->fname)?$data->fname:''?> <?php echo (isset($data->lname))?$data->lname:'';?></li></ul>
                    <ul><li>Mobile:</li><li><?php echo (isset($data->mobileno)?$data->mobileno:'')?></li></ul>
                    <ul><li>Password:</li><li>***************</li></ul>
                    <h3>Company Details</h3>
                    <ul><li>Company Name:</li><li><?php echo isset($data->company_name)?$data->company_name:''?></li></ul>
                    <ul><li>GST Number:</li><li><?php echo isset($data->company_gst_no)?$data->company_gst_no:''?></li></ul>
                    <ul><li>Contact Person:</li><li><?php echo (isset($data->company_contact_person)?$data->company_contact_person:'')?></li></ul>
                    <ul><li>Contact Person Email:</li><li><?php echo (isset($data->company_person_email)?$data->company_person_email:'')?></li></ul>
                    <ul><li>Contact Person Mobile:</li><li><?php echo (isset($data->company_person_mobile)?$data->company_person_mobile:'')?></li></ul>          
                </div>                        
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->
        
