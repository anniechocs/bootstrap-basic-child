<?php
/**
 * The theme header
 * 
 * @package bootstrap-basic
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>  <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>     <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>     <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title><?php wp_title('|', true, 'right'); ?></title>
		<meta name="viewport" content="width=device-width">

		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		<!--wordpress head-->
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>

				
		<div class="container page-container">
			<?php do_action('before'); ?> 
			<header role="banner">

			<div class="row" id="header-container">
				
				<div class="col-sm-2 header-picture hidden-xs">
						<a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                			<!-- <img id="header-image" src="http://localhost:8888/niks-yoga/wp-content/uploads/2016/05/simple-logo-copy.png" alt="Nicola Vogler's Yoga logo"> -->
							<img id="header-image" src="<?php echo get_stylesheet_directory_uri(); ?>/images/simple-logo-copy.png" alt="Nicola Vogler's Yoga logo" width="100%">
						</a>
				</div>

				<div class="col-sm-10 col-xs-12" id="main-header">

					<div class="row site-branding">
						
						<div class="col-sm-8 site-title">
							<div id="title-branding">
								<h1 class="site-title-heading">
									<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php bloginfo('name'); ?></a>
								</h1>
								<div class="site-description">
										<?php bloginfo('description'); ?> 
								</div>
							</div>
						</div>
						<div class="col-sm-4 page-header-top-right">
							<div class="sr-only">
								<a href="#content" title="<?php esc_attr_e('Skip to content', 'bootstrap-basic'); ?>"><?php _e('Skip to content', 'bootstrap-basic'); ?></a>
							</div>
							<?php if (is_active_sidebar('header-right')) { ?> 
							<div class="pull-right">
								<?php dynamic_sidebar('header-right'); ?> 
							</div>
							<div class="clearfix"></div>
							<?php } // endif; ?> 
						</div>

					</div><!--.site-branding-->
				
				<div class="row main-navigation">
					<div class="col-sm-12">
						<nav class="navbar navbar-default" role="navigation">
							<div class="navbar-header">
								
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-primary-collapse">
									<div id="menu-btn-left">
										<h2>Menu</h2>
									</div>
									<div id="menu-btn-right">
										<span class="sr-only"><?php _e('Toggle navigation', 'bootstrap-basic'); ?></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
								</div>
								</button>
							</div>
							
							<div class="collapse navbar-collapse navbar-primary-collapse">
								<?php wp_nav_menu(array('theme_location' => 'primary', 'container' => false, 'menu_class' => 'nav navbar-nav', 'walker' => new BootstrapBasicMyWalkerNavMenu())); ?> 
								<?php dynamic_sidebar('navbar-right'); ?> 
							</div><!--.navbar-collapse-->
						</nav>
					</div>
				</div><!--.main-navigation-->

			</div><!-- end main part of header -->

		</div> <!-- end header container .row -->

		</header>
			
			
			<div id="content" class="row row-with-vspace site-content">