<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- App Favicon -->
        <link rel="shortcut icon" href="/assets/images/favicon.png">
        <!-- App title -->
        <title><?php echo $title?></title>
        <!-- Bootstrap CSS -->
		 <!-- App CSS -->
        <link href="/assets/css/style.css" rel="stylesheet" type="text/css" />
        <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="/assets/css/custom_blue.css" rel="stylesheet" type="text/css" />
       
        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <!-- Modernizr js -->
        <script src="/assets/js/modernizr.min.js"></script>
    </head>
    <body>
        <form method="post" id="resubscribe-frm" action="/tracking/resubscribe">
            <div class="wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-8">
                            <div class="card-box unsubscribe">
                                <div class="form-group row">
                                    <div class="col-12">
										 <div role="alert" class="txtGrey">
										  <p>
											<?php if(isset($email)) { ?>
                                            <h2> <?php echo "You have successfully unsubscribed from list.";?></h2>
                                          <?php } else{ ?>
											<h2> <?php echo "You have successfully subscribed.";?></h2>
											<?php } ?>
										  </p>
										 </div>
                                   </div>
                                </div>
								 <?php if(isset($email)) { ?>
									<i class="fa fa-frown-o" aria-hidden="true"></i>
									<h2 class="m-t-0 m-b-30">You can <span>Join US!</span> Back</h2>
                                    <a href="javascript:void(0);" onclick="javascript:unsubscribe();" class="btn btn-unsubscibe">Click to Subscribe</a>
									<input type="hidden" name="email" id="email" value="<?php echo $email ?>">
								<?php } else { ?>
									<i class="fa fa-smile-o" aria-hidden="true"></i>
								<?php } ?>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <!-- container -->
            </div>
            <!-- End wrapper -->
        </form>
        <!-- jQuery  -->
        <script src="/assets/js/jquery.min.js"></script>
        <script src="/assets/js/tether.min.js"></script><!-- Tether for Bootstrap -->
        <script src="/assets/js/bootstrap.min.js"></script>
        
    </body>
</html>
<script>
    function unsubscribe() {
    	 $( "#resubscribe-frm" ).submit();
    }
</script>
