<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LOGIN</title>

	<!-- Global stylesheets -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/css/icons/icomoon/styles.css'); ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/css/minified/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/css/minified/core.min.css'); ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/css/minified/components.min.css'); ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/css/minified/colors.min.css'); ?>" rel="stylesheet" type="text/css">
  <!-- /global stylesheets -->

  <!-- Core JS files -->
  <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/loaders/pace.min.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/core/libraries/jquery.min.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/core/libraries/bootstrap.min.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/loaders/blockui.min.js'); ?>"></script>
  <!-- /core JS files -->
  <script type="text/javascript" src="<?php echo base_url('assets/js/core/app.js'); ?>"></script>
<style>

    body { 
       
        
   }
    .panel-default {
        opacity: 0.9;
        margin-top:30px;
    }
    .form-group.last {
        margin-bottom:0px;
    }
   .login-page{
        /*height-min: 125%;*/
         background: url('assets/images/2.jpg') #fff no-repeat center center fixed; 
         min-height: 100%;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover; 
        
        
        
    }   
    
    .text-center{
        
        color: white;
    }  
    .text1{
        	
    	margin-left: 500px
    }

    .content{width:400px;}  
    .panel-body{
    	background: transparent url('assets/images/img/transpBlue50.png') repeat;
    }
    
</style> 
</head>

<body class='login-page'>

	
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="container">
    <div class="row">
        
        <div class="col-md-5 col-md-offset-8 animated flipInY" style="color: #fff;">

		<!-- Page content -->
		<div class="login-box_tengah">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

					<!-- Simple login form -->
					<form action="<?php echo site_url('Login/cek_log'); ?>" method="post">
						<div class="panel panel-body login-form">
							<div class="text-center">
								<div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
								<h5 class="content-group">LOGIN</h5>
							</div>
							<?php 
							$data=$this->session->flashdata('sukses');
							if($data!=""){ ?>
							<div class="alert alert-success"><strong>Sukses! </strong> <?=$data;?></div>
							<?php } ?>
							<?php 
							$data2=$this->session->flashdata('error');
							if($data2!=""){ ?>
							<div class="alert alert-danger"><strong> Error! </strong> <?=$data2;?></div>
							<?php } ?>
							<div class="form-group has-feedback has-feedback-left">
								<input type="text" class="form-control" name="username" required placeholder="Username">
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="password" class="form-control" name="password" required placeholder="Password">
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>

							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block">Sign in <i class="icon-circle-right2 position-right"></i></button>
							</div>
						</div>
					</form>
					
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->


			</div>
			<!-- /main content -->

		</div>
	</div>
		<!-- /page content -->
		<div class="footer text-muted text1">
						&copy; 2018. <a href="http://www.tungauIt.blogspot.com" target="blank">Dory Achmad</a>
					</div>

	</div>
	<!-- /page container -->

</body>
</html>
