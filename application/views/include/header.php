<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
<head>
    <title>NMRC</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">    
    <link rel="shortcut icon" href="favicon.ico">  
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>   
    <!-- Global CSS -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap-datetimepicker.min.css">
    <link href="<?=base_url()?>assets/css/beyond.less.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/css/demo.min.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/css/typicons.min.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/css/animate.min.css" rel="stylesheet" />
    <link href="<?=base_url()?>assets/css/min.css" rel="stylesheet" />
    <link id="skin-link" href="" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/styles.css"/>
    <link rel="stylesheet" href="<?=base_url()?>assets/css/dataTables.bootstrap.min.css"> 
    <link rel="stylesheet" href="<?=base_url()?>assets/css/dataTables.bootstrap.css"> 
    <link href="<?=base_url()?>assets/css/beyond.less" rel="stylesheet" />
    <!-- Plugins CSS -->    
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/flexslider/flexslider.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/pretty-photo/css/prettyPhoto.css"> 
    <!-- Theme CSS -->  
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head> 

<body class="home-page">
    <div class="wrapper">
        <!-- ******HEADER****** --> 
        <header class="header">  
            <div class="top-bar">
                <div class="container">              
                    <ul class="social-icons col-md-6 col-sm-6 col-xs-12 hidden-xs">
                        <li><a href="#" ><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" ><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" ><i class="fa fa-youtube"></i></a></li>
                        <li><a href="#" ><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#" ><i class="fa fa-google-plus"></i></a></li>         
                        <li class="row-end"><a href="#" ><i class="fa fa-rss"></i></a></li>             
                    </ul><!--//social-icons-->
                    <form class="pull-right search-form" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search the site...">
                        </div>
                        <button type="submit" class="btn btn-theme">Go</button>
                    </form>         
                </div>      
            </div><!--//to-bar-->
            <div class="header-main container">
                <h4 class="logowe col-md-5 col-sm-5">
                    <a href="index.html"><img id="logowe" src="<?=base_url()?>assets/images/nam.jpg" alt="Logo"><b>Namibia Medicines Regulatory Council</b></a>
                </h4><!--//logo-->           
                <div class="info col-md-7 col-sm-7" id="navbar-semi">
                    <ul class="menu-top navbar-right hidden-xs">
                        <li class="divider"><a href="<?php echo site_url('index.php');?>" >Home</a></li>
                        <li class="divider"><a href="<?php echo site_url('about');?>">About</a></li>
                        <li class="divider"><a href="<?php echo site_url('vacancies');?>">Vacancies</a></li>
                        <li class="divider"><a href="<?php echo site_url('contact');?>">Contact Us</a></li>
                        <li><a href="<?php echo site_url('faq');?>">FAQ</a></li>
                    </ul><!--//menu-top-->
                    <br />
                    <div class="contact pull-right">
                        <p class="phone"><i class="fa fa-phone"></i>Call us today 0812222331</p> 
                        <p class="email"><i class="fa fa-envelope"></i><a href="#">enquires@nmrc.com</a></p>
                    </div><!--//contact-->
                </div><!--//info-->
            </div><!--//header-main-->
        </header><!--//header-->
        
        <!-- ******NAV****** -->
        <nav class="main-nav" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button><!--//nav-toggle-->
                </div><!--//navbar-header-->            
                <div class="navbar-collapse collapse" >
                    <ul class="nav navbar-nav">
                        <li class="nav-item"><a href="<?php echo site_url('index.php');?>"><strong>Home</strong></a></li>
                        <li class="nav-item dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="<?php echo site_url('productreg');?>">Medicine Registration<i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                            <li><a href="<?php echo site_url('productreg');?>"><strong>Medicine Registration</strong></a></li>
                            <li><a href="http://pharmadex.msh.org/namibia/home.faces"><strong>Register Medicine</strong></a></li>
                            <li><a href="<?php echo site_url('product_register');?>"><strong>Medicines Register</strong></a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a href="<?php echo site_url('inspection');?>"><strong>Inspection & Licensing</strong></a></li>
                        <li class="nav-item"><a href="<?php echo site_url('qsl');?>"><strong>QSL</strong></a></li>
                        <li class="nav-item"><a href="<?php echo site_url('tipc');?>"><strong>TIPC</strong></a></li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="<?php echo site_url('downloads');?>">Information and Downloads<i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo site_url('downacts');?>"><strong>Acts and Regulations</strong></a></li>
                                <li><a href="<?php echo site_url('downmedreg');?>"><strong>Medicine Registration</strong></a></li>
                                <li><a href="<?php echo site_url('downinspection');?>"><strong>Inspection and Licensing</strong></a></li>
                                <li><a href="<?php echo site_url('downtipc');?>" title="TIPC"><strong>TIPC</strong></a></li>
                                <li><a href="<?php echo site_url('downqsl');?>" title="This will cause a tooltip to appear"><strong>Quality Surveillance Laboratory</strong></a></li>     
                                <li><a href="<?php echo site_url('downfees');?>"><strong>Fees</strong></a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a href="<?php echo site_url('news');?>"><strong>News</strong></a></li>
                        <li class="nav-item"><a href="<?php echo site_url('events');?>"><strong>Events</strong></a></li>
                    </ul><!--//nav-->
                </div><!--//navabr-collapse-->
            </div><!--//container-->
        </nav><!--//main-nav-->
  