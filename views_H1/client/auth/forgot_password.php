<!-- Begin page -->
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
                    <div class="alert alert-success">
                        <?php echo $this->session->flashdata('message'); ?>
                    </div>
                    <?php } ?>
                    <div class="p-3">
                        <form class="form-horizontal" action="#" method="POST">
                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" type="email" required="" placeholder="Email" name="email" id="email">
                                </div>
                            </div>
                            <div class="form-group text-center row m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-danger btn-block waves-effect waves-light" type="submit">Send Email</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
