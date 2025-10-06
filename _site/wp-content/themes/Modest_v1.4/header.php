<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php elegant_titles(); ?></title>
<?php elegant_description(); ?>
<?php elegant_keywords(); ?>
<?php elegant_canonical(); ?>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link href='http://fonts.googleapis.com/css?family=Josefin+Sans:regular,bold' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Droid+Sans:regular,bold' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Goudy+Bookletter+1911' rel='stylesheet' type='text/css' />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<!--[if lt IE 7]>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/ie6style.css" />
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/DD_belatedPNG_0.0.8a-min.js"></script>
	<script type="text/javascript">DD_belatedPNG.fix('img#logo, #et-social-icons img, span.overlay, .gotoslide span, #featured .description, .featured-title, .footer-widget ul li, #footer-top, span#down-arrow, .thumb .zoom-icon, span.post-overlay, .avatar-overlay');</script>
<![endif]-->
<!--[if IE 7]>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/ie7style.css" />
<![endif]-->
<!--[if IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/ie8style.css" />
<![endif]-->

<script type="text/javascript">
	document.documentElement.className = 'js';
</script>

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>


<style>
.top-head{
background: #003466;
height: 140px;
position: absolute;
z-index: 0;
top: 0px;
width: 100%;
}
</style>
<div class="top-head"></div>


	<div class="right-shadow">
		<div class="left-shadow">
			<div class="container clearfix<?php global $fullwidth; if ( is_page_template('page-full.php') || $fullwidth ) echo '  fullwidth'; ?>">
				<div id="header" class="clearfix">
					<?php 
						global $default_colorscheme;
						$logo_additional_path = get_option('modest_color_scheme') <> $default_colorscheme ? 'black/' : '';
					?>
					<a href="<?php bloginfo('url'); ?>"><?php $logo = (get_option('modest_logo') <> '') ? get_option('modest_logo') : get_bloginfo('template_directory').'/images/'.$logo_additional_path.'logo.jpg'; ?>
						<img src="<?php echo $logo; ?>" alt="<?php bloginfo('name'); ?>" id="logo" width=200 height=100 />
					</a>
					<?php $menuClass = 'nav';
					$menuID = 'top-menu';
					$primaryNav = '';
					if (function_exists('wp_nav_menu')) {
						$primaryNav = wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container' => '', 'fallback_cb' => '', 'menu_class' => $menuClass, 'menu_id' => $menuID, 'echo' => false ) ); 
					};
					if ($primaryNav == '') { ?>
						<ul id="<?php echo $menuID; ?>" class="<?php echo $menuClass; ?>">
							<?php if (get_option('modest_home_link') == 'on') { ?>
								<li <?php if (is_home()) echo('class="current_page_item"') ?>><a href="<?php bloginfo('url'); ?>"><?php _e('Home','Modest') ?></a></li>
							<?php } ?>
							
							<?php show_page_menu($menuClass,false,false); ?>
							<?php show_categories_menu($menuClass,false); ?>
						</ul> <!-- end ul#nav -->
					<?php }	else echo($primaryNav); ?>
					
					<div id="icons">
						<span><?php //echo get_option('modest_header_tagline'); ?></span>
						<div id="et-social-icons">
							 <?php 
								$et_rss_url = get_option('modest_rss_url') <> '' ? get_option('modest_rss_url') : get_bloginfo('comments_rss2_url');
								if ( get_option('modest_show_twitter_icon') == 'on' ) $social_icons['twitter'] = array('image' => get_bloginfo('template_directory') . '/images/twitter.png', 'url' => get_option('modest_twitter_url'), 'alt' => 'Twitter' );
								if ( get_option('modest_show_rss_icon') == 'on' ) $social_icons['rss'] = array('image' => get_bloginfo('template_directory') . '/images/rss.png', 'url' => $et_rss_url, 'alt' => 'Rss' );
								if ( get_option('modest_show_facebook_icon') == 'on' ) $social_icons['facebook'] = array('image' => get_bloginfo('template_directory') . '/images/facebook.png', 'url' => get_option('modest_facebook_url'), 'alt' => 'Facebook' );
								$social_icons = apply_filters('et_social_icons', $social_icons);

								if (count($social_icons) > 0) {
                           foreach ($social_icons as $icon) {
                              echo "<a href='{$icon['url']}' target='_blank'><img alt='{$icon['alt']}' src='{$icon['image']}' /></a>";
                           }
                        }
							?>
						</div>
					</div>
				</div> <!-- end #header -->
				
				<?php do_action('et_header'); ?>
				
				<div id="content-area" class="clearfix">
