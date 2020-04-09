<div class="accountbg"></div>
	<div class="overlay-bg"></div>
        <div class="wrapper-page login-container">
			<div class="row" style="padding-left:15px;">
				<div class="col-md-6 login-left-bg text-center"><img src="../../../assets/images/login-left.png" height="" 	alt	="" style="padding-top: 50px;width: 95%;padding-left: 10px;" ></div>
			<div class="col-md-6">	
            <div class="card">
                <div class="card-body">
                    <div class="text-center m-b-15">
                        <a href="<?php base_url();?>/admin/auth/login/" class="logo logo-admin"><img src="../../assets/images/heysend-logo.png" height="50" alt="logo"></a>
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
                    <div class="p-3">
                        <form class="form-horizontal m-t-20 form" action="" method="POST">
                            <div class="form-group">
                               <label class="form-label" for="email">Useremail</label>
									 <input class="form-input" type="email" id="email" name="email" required="" placeholder="Useremail" autocomplete="off" />
									<!--<input class="form-control" type="email" id="email" name="email" required="" placeholder="Useremail">-->
                                </div>		
							<div class="form-group">
                                <label class="form-label" for="password">Password</label>
									<input class="form-input" type="password" id="password" name="password" required="" placeholder="Password" />
                                   <!-- <input class="form-control" type="password" name="password" id="password" required="" placeholder="Password">-->
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
                                    <button class="btn btn-danger btn-block waves-effect waves-light" type="submit">Log In</button>
                                </div>
                            </div>
                            <div class="form-group m-t-10 mb-0 row">
                                <div class="col-sm-12 m-t-20">
                                    <a href="<?php base_url();?>/admin/auth/forgot/" class="text-muted"><i class="mdi mdi-lock"></i> <small>Forgot your password ?</small></a>
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
	</div>
</div>
<script>
$('input').focus(function(){
  $(this).parents('.form-group').addClass('focused');
});

$('input').blur(function(){
  var inputValue = $(this).val();
  if ( inputValue == "" ) {
    $(this).removeClass('filled');
    $(this).parents('.form-group').removeClass('focused');  
  } else {
    $(this).addClass('filled');
  }
})  
</script>