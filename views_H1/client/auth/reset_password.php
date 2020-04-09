 <div class="accountbg"></div>
        <div class="wrapper-page">

            <div class="card">
                <div class="card-body">

                    <div class="text-center m-b-15">
                        <a href="<?php base_url();?>/client/auth/login/" class="logo logo-admin"><img src="assets/images/logo.png" height="24" alt="logo"></a>
                    </div>
                   <?php if ((isset($message) && $message['error']!='') || validation_errors()!='') { ?>
                        <div class="alert alert-danger">
                            <?php echo validation_errors();
                                if($message['error']!=''){
                                   echo $message['error'];
                                }
                                ?>
                        </div>
                        <?php } ?>
                        <?php if(!empty($this->session->flashdata('message'))){ ?>
                        <div class="alert alert-danger">
                            <?php echo $this->session->flashdata('message'); ?>
                        </div>
                        <?php } ?>
                    <div class="p-3">
                        <form class="form-horizontal m-t-20" action="" method="POST">
                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" type="password" id="password" name="password" required="" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" name="confirm_password" type="password" data-parsley-minlength="6"  data-parsley-equalto="#password" data-parsley-error-message="Password and Confirm Password should be match" data-parsley-errors-container="#error-container" placeholder="Confirm Password" aria-label="Password" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <!--<div class="form-group row">
                                <div class="col-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Remember me</label>
                                    </div>
                                </div>
                            </div>-->
                            <div class="form-group text-center row m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-danger btn-block waves-effect waves-light" type="submit">Reset Password</button>
                                </div>
                            </div>
                            <div class="form-group m-t-10 mb-0 row">
                                <div class="col-sm-7 m-t-20">
                                    <a href="<?php base_url();?>/client/auth/login/" class="text-muted"><i class="mdi mdi-lock"></i> <small>Back to login ?</small></a>
                                </div>
                                <!--<div class="col-sm-5 m-t-20">
                                    <a href="pages-register.html" class="text-muted"><i class="mdi mdi-account-circle"></i> <small>Create an account ?</small></a>
                                </div>-->
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
