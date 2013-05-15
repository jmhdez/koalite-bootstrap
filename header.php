<!doctype html>  

<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
	
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		
		<title><?php wp_title('', true, 'right'); ?></title>
				
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		
		<!-- For everything else -->
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		
		<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if necessary -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script>window.jQuery || document.write(unescape('%3Cscript src="<?php echo get_template_directory_uri(); ?>/library/js/libs/jquery-1.7.1.min.js"%3E%3C/script%3E'))</script>
		
		<script src="<?php echo get_template_directory_uri(); ?>/library/js/modernizr.full.min.js"></script>
		
		<!-- media-queries.js (fallback) -->
		<!--[if lt IE 9]>
			<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>			
		<![endif]-->

		<!-- html5.js -->
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		
  		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		
		<!-- wordpress head functions -->
		<?php wp_head(); ?>
		<!-- end of wordpress head -->
		
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css">
		
		<style type="text/css">
		body {
			padding: 40px;
		}
		</style>

		
		
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap-responsive.min.css">
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
		
		<link href="<?php echo home_url(); ?>/feed" rel="alternate" type="application/rss+xml" title="Subscribe to RSS feed" />
		
		<?php 

			// check wp user level
			get_currentuserinfo(); 
			// store to use later
			global $user_level; 
		
		?>
				
	</head>
	
	<body <?php body_class(); ?>>
	
		<div class="navbar navbar-fixed-top navbar-inverse">
			<div class="navbar-inner">
				<div class="container-fluid">
					<a class="brand" href="<?php echo home_url();?>/">Inicio</a>
					<ul class="nav">
						<li><a href="http://test-env.koalite.com/?page_id=1813">Archivo</a></li>
						<li><a href="#">Quién soy</a></li>
					</ul>
					<div class="social-icons pull-right">
						<a href="http://twitter.com/gulnor" target="_blank">
							<img src="/wp-content/themes/koalite-bootstrap/img/twitter-32-black.png" alt="Twitter" title="Sígueme en twitter"/>
						</a>
						<a href="http://github.com/jmhdez" target="_blank">
							<img src="/wp-content/themes/koalite-bootstrap/img/github-32-black.png" alt="Github" title="Proyectos en github"/>
						</a>
						<a href="mailto:juan.hernandez.arroyo@gmail.com" target="_blank">
							<img src="/wp-content/themes/koalite-bootstrap/img/email-32-black.png" alt="Email" title="Contacta por email"/>
						</a>
						<a href="http://blog.koalite.com/feed" target="_blank">
							<img src="/wp-content/themes/koalite-bootstrap/img/rss-32-black.png" alt="RSS" title="Suscríbete a este blog"/>
						</a>
					</div>
				</div>
			</div>
		</div>
	
	
		<div class="container-fluid">
					
			<header class="row-fluid blog-header">
				<a href="<?php echo home_url(); ?>/">
					<h1><?php bloginfo('name'); ?></h1>
					<p class="tagline"><?php bloginfo('description'); ?></p>
				</a>
			</header>
		
