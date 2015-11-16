<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?> > <!--<![endif]-->

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<!--[if ie]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<?php wp_head(); ?>

</head>

<body <?php body_class() ;?>>

<!-- HEADER START
============================================= -->
<header id="header" class="site-header clearfix">
	<div class="container">
		<div class="row">
			<!-- LOGO START
			============================================= -->
			<div class="logo col-md-2">
				<?php kindergarten_logo_type() ?>
			</div>
			<!-- LOGO END -->

			<!-- NAVIGATION START
			============================================= -->
			<div class="navigation col-md-10 text-right">

				<!-- SEARCH BAR START
				============================================= -->
				<div id="sb-search" class="sb-search">
					<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<input class="sb-search-input" placeholder="Enter your search term..." type="search" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" >
						<input class="sb-search-submit" type="submit" value="<?php echo esc_attr_x( '', 'submit button', 'kindergarten' ); ?>">
						<span class="sb-icon-search"><i class="fa fa-search"></i></span>
					</form>
				</div>
				<!-- SEARCH BAR END -->

				<!--MOBILE MENU START
				============================================= -->
				<div class="mobile-menu">
					<button id="slide-buttons" class="icon icon-navicon-round"></button>
				</div>

				<nav id="c-menu--slide-right" class="c-menu c-menu--slide-right">
					<button class="c-menu__close icon icon-remove-delete"></button>
					<div class="logo-menu-right text-center">
						<?php kindergarten_logo_type() ?>
					</div>
						<?php kindergarten_top_mobile_menu(); ?>
				</nav>
				<div id="slide-overlay" class="slide-overlay"></div>
				<!-- MOBILE MENU -->

				<!-- MAIN NAVIGATION START
				============================================= -->
				<nav id="main-menu" class="menu">
					<?php kindergarten_top_nav_menu(); ?>
				</nav>
				<!-- MAIN NAVIGATION END -->
			</div>
			<!-- NAVIGATION END -->
		</div>
	</div>
</header>
<!-- HEADER END -->

<div id="main" class="site-main clearfix">