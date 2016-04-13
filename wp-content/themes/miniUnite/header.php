<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta http-equiv="Cache-Control" content="no-transform">
<meta http-equiv="Cache-Control" content="no-siteapp">
<?php get_template_part( 'inc/functions/seo' ); ?>
<?php if ( is_home() ) { ?>
<meta name="description" content="wordpress移动版主题miniUnite" />
<meta name="keywords" content="wordpress移动版主题miniUnite" />
<?php } ?>
<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico">
<link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('template_directory'); ?>/images/favicon.png">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo('home'); ?>/xmlrpc.php">
<!--[if lt IE 9]><script src="<?php bloginfo('template_directory'); ?>/js/html5-css3.js"></script><![endif]-->
<link rel="stylesheet" id="nfgc-main-style-css" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="all">
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/script.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/scrollmonitor.js"></script>
<?php if (is_single() || is_page() ) { ?>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/comments-ajax.js"></script>
<?php } ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<header id="masthead" class="site-header">
	<nav id="top-header">
		<div class="top-nav">
		</div>
	</nav><!-- #top-header -->
<div id="middle-header">

</div>
	<div id="menu-box">
		<div id="top-menu">
			<span class="nav-search">搜索</span>
			<hgroup class="logo-site">
				<h1 class="site-title">
					<a href="<?php bloginfo('home'); ?>/">
						<img src="<?php bloginfo('template_directory'); ?>/images/logo.png" width="220" height="50" alt="<?php bloginfo('name'); ?>">
					</a>
				</h1>
			</hgroup><!-- .logo-site -->
			<div id="site-nav-wrap">
				<div id="sidr-close"><a href="<?php bloginfo('home'); ?>/#sidr-close" class="toggle-sidr-close">关闭</a>
			</div>
			
			<nav id="site-nav" class="main-nav">
				<a href="#sidr-main" id="navigation-toggle" class="bars">导航</a>	
				<ul class="down-menu nav-menu"><?php wp_list_cats('show_count=0&list=1&sort_column=name&hierarchical=0&exclude='); ?>
				<li><a href="http://boke123.net">boke123导航</a></li>
				</ul>				
			</nav>	
			</div><!-- #site-nav-wrap -->
		</div><!-- #top-menu -->
	</div><!-- #menu-box -->
</header><!-- #masthead -->

<div id="main-search">
	<?php get_search_form(); ?>	
	<div class="clear"></div>
</div>
<?php the_crumbs(); ?>