<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Pyzie_Dashboard</title>
	<meta name="description" content="">
	<meta name="author" content="Dennis Ji">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="keyword" content="">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
        <link id="bootstrap-style" href="<?=site_url('assets/admin/css/bootstrap.min.css')?>" rel="stylesheet">
	<link href="<?=site_url('assets/admin/css/bootstrap-responsive.min.css')?>" rel="stylesheet">
	<link id="base-style" href="<?=site_url('assets/admin/css/style.css')?>" rel="stylesheet">
	<link id="base-style-responsive" href="<?=site_url('assets/admin/css/style-responsive.css')?>" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="<?=site_url('assets/admin/img/favicon.ico')?>">
	<!-- end: Favicon -->
	
	<script src="<?=site_url('assets/js/tinymce/tinymce.min.js')?>"></script>
	
		
		
</head>

<body>
		<!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
                            <a class="brand" href="<?=  site_url('admin')?>"><span>Pyzie CMS</span></a>
				
				
			</div>
		</div>
	</div>
	<!-- start: Header -->
	
		<div class="container-fluid-full" style="
    min-height: 500px;
">
		<div class="row-fluid">
				
			<!-- start: Main Menu -->
			<div id="sidebar-left" class="span2">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
                                                <li><a href="<?=site_url('admin/main_menus')?>"><i class="icon-file-alt"></i><span class="hidden-tablet">Main Menu</span></a></li>
						<li><a href="<?=site_url('admin/categories')?>"><i class="icon-envelope"></i><span class="hidden-tablet"> Categories</span></a></li>
						<li><a href="<?=site_url('admin/subcats')?>"><i class="icon-envelope"></i><span class="hidden-tablet"> Sub Categories</span></a></li>
						<!--<li><a href="<?=site_url('admin/authors')?>"><i class="icon-envelope"></i><span class="hidden-tablet"> Authors</span></a></li>-->
                                                <li><a href="<?=site_url('admin/products')?>"><i class="icon-envelope"></i><span class="hidden-tablet"> Products</span></a></li>
                                                <li><a href="<?=site_url('admin/slides')?>"><i class="icon-envelope"></i><span class="hidden-tablet"> Slides</span></a></li>
                                                <!--<li><a href="<?=site_url('admin/ads')?>"><i class="icon-envelope"></i><span class="hidden-tablet"> Ads</span></a></li>-->
                                                <li><a href="<?=site_url('admin/orders')?>"><i class="icon-envelope"></i><span class="hidden-tablet"> Orders</span></a></li>
                                                <li><a href="<?=site_url('admin/subs')?>"><i class="icon-envelope"></i><span class="hidden-tablet"> Subscriptions</span></a></li>
                                                <li><a href="<?=site_url('admin/packages')?>"><i class="icon-envelope"></i><span class="hidden-tablet"> Delivery Packages</span></a></li>
                                                 <!--<li><a href="<?=site_url('admin/subs')?>"><i class="icon-envelope"></i><span class="hidden-tablet"> Delivery Subscriptions</span></a></li>-->
                                                <!--<li><a href="<?=site_url('admin/suggestions')?>"><i class="icon-envelope"></i><span class="hidden-tablet"> suggestions</span></a></li>-->
                                        </ul>
				</div>
			</div>
			<!-- end: Main Menu -->
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			<!-- start: Content -->
			<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a ><?=$breadcrumb?></a></li>
			</ul>