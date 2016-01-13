<!doctype html>
<html lang="en">

<!-- Mirrored from vivaco.com/demo/startuply/register.html by HTTrack Website Copier/3.x [XR&CO'2010], Fri, 04 Jul 2014 04:24:30 GMT -->
<head>

    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <title>Business Process Framework</title>
    <meta name="description" content="PSD to HTML5+CSS3 conversion.">
    <meta name="keywords" content="PSD, HTML5, CSS3">
    <meta name="author" content="Erwin Kaddy">

    <link rel="shortcut icon" href="assets/img/favicon.ico">
    <link rel="apple-touch-icon" href="assets/img/apple-touch-icon.jpg">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/img/apple-touch-icon-72x72.jpg">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/img/apple-touch-icon-114x114.jpg">
        
    <link rel="stylesheet" href="<?php echo base_url();?>public/support_login/css/bootstrap.min.css" type="text/css" media="all" />
    <link rel="stylesheet" href="<?php echo base_url();?>public/support_login/css/font-awesome.min.css" type="text/css" media="all" />
    <link rel="stylesheet" href="<?php echo base_url();?>public/support_login/css/font-lineicons.css" type="text/css" media="all" />
    <link rel="stylesheet" href="<?php echo base_url();?>public/support_login/css/animate.css" type="text/css" media="all" />
    <link rel="stylesheet" href="<?php echo base_url();?>public/support_login/css/toastr.min.css" type="text/css" media="all" />
    <link rel="stylesheet" href="<?php echo base_url();?>public/support_login/css/style.css" type="text/css" media="all" />
    
    <!--[if lt IE 9]>
        <script src="assets/js/html5.js"></script>
        <script src="assets/js/respond.min.js"></script>
    <![endif]-->



</head>

<body id="register-page">


    <header>
        <nav class="navigation navigation-header">
            <div class="container">
                <!--div class="navigation-brand" -->
				
                <!-- /div -->
                <div class="navigation-navbar">
                    <ul class="navigation-bar navigation-bar-left">
                        <li class="active"><a href="./">Home</a></li>
                        <li><a href="#about">Jadwal</a></li>
                        <li><a href="#features">Statistik</a></li>
						<li><a href="#product">Informasi</a></li>
                        <li><a href="#feedback">Feedback</a></li>
                        <li><a href="#team">Bantuan</a></li>
                        <li><a href="#footer">Contacts</a></li>
                    </ul>
                    <!--ul class="navigation-bar navigation-bar-right">
                        <li><a href="register.html">Login</a></li>
                        <li class="featured"><a href="register.html">Sign up</a></li>
                    </ul-->  
                </div>
            </div>
        </nav>
    </header>
    
    <div id="hero" class="static-header light">
        <div class="text-heading">
	<div>
		<INPUT TYPE="image" SRC="<?php echo base_url();?>public/support_login/img/icon/logo.png" id='logohead'>
	</div>
            <h1 id='headmobile'>Business <span class="highlight">Process</span> Framework</h1>
				<?php 
					if(isset($msg)){
						echo $msg;
					}else{
						echo "<p>Proses Manajemen, Proses Operasi <span>dan Proses Penunjang</span></p>";
					}
				?>	
            
        </div>
        
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">
                    <form class="form form-register dark" id="registration" method="post" action="<?php echo base_url();?>BPF_corecontrol/BPF_authcontrol/login" method="POST" name='process'>
                        <div class="form-group">
                            <label for="fullname" class="col-sm-3 col-xs-12 control-label">Username</label>
                            <div class="col-sm-9 col-xs-12">
                                <input type="text" class="form-control required" name="username" id="username" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-sm-3 col-xs-12 control-label">Password</label>
                            <div class="col-sm-9 col-xs-12">
                                <input type="password" class="form-control required" name="password" id="password" placeholder="">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Get started</button>
                    </form>
                    
                    <p class="agree-text">Silakan masukkan username dan password anda.<br />
                    Jika anda mengalami kesulitan saat log in, harap menghubungi <A HREF="">admin</A>.</p>
                </div>
            </div>
        </div>
        
        
    </div>

	                    <div class="brand-logo" style='margin-top:-21px;'>
						<a href="index.html" class="logo"><!-- img src="<?php echo base_url();?>public/support_mainpage/img/bisproft.png" class='imglogo'--></a>
						<span class="sr-only"></span>
                    </div>

<script src="http://10.16.107.77:3000/socket.io/socket.io.js"></script>
<script src="<?php echo base_url();?>public/support_mainpage/js/jquery-1.7.2.min.js"></script> 
<script src="<?php echo base_url();?>public/support_mainpage/js/socket_related.js"></script> 
</body>

<!-- Mirrored from vivaco.com/demo/startuply/register.html by HTTrack Website Copier/3.x [XR&CO'2010], Fri, 04 Jul 2014 04:24:56 GMT -->
</html>