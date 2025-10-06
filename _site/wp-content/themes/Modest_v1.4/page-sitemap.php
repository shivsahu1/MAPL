<?php 
/*
Template Name: Sitemap Page
*/
?>
<?php the_post(); ?>

<?php 
$et_ptemplate_settings = array();
$et_ptemplate_settings = maybe_unserialize( get_post_meta($post->ID,'et_ptemplate_settings',true) );

$fullwidth = isset( $et_ptemplate_settings['et_fullwidthpage'] ) ? (bool) $et_ptemplate_settings['et_fullwidthpage'] : (bool) $et_ptemplate_settings['et_fullwidthpage'];
?>

<?php get_header(); ?>
	
	<?php include(TEMPLATEPATH . '/includes/top_info.php'); ?>
	
	<div id="left-area">
		<?php if (get_option('modest_integration_single_top') <> '' && get_option('modest_integrate_singletop_enable') == 'on') echo(get_option('modest_integration_single_top')); ?>
		
		<div class="entry clearfix post">	
			<?php 
				$thumb = '';
				$width = 188;
				$height = 188;
				$classtext = 'post-thumb';
				$titletext = get_the_title();
				$thumbnail = get_thumbnail($width,$height,$classtext,$titletext,$titletext,false,'Entry');
				$thumb = $thumbnail["thumb"]; 
			?>
			
			<?php if($thumb <> '' && get_option('modest_page_thumbnails') == 'on') { ?>
				<div class="post-thumbnail">
					<?php print_thumbnail($thumb, $thumbnail["use_timthumb"], $titletext, $width, $height, $classtext); ?>
					<span class="post-overlay"></span>
				</div> 	<!-- end .post-thumbnail -->
			<?php } ?>
			
			<?php the_content(); ?>
			<?php wp_link_pages(array('before' => '<p><strong>'.__('Pages','Modest').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
			
			<div id="sitemap">
				<div class="sitemap-col">
					<h2><?php _e('Pages','Modest'); ?></h2>
					<ul id="sitemap-pages"><?php wp_list_pages('title_li='); ?></ul>
				</div> <!-- end .sitemap-col -->
				
				<div class="sitemap-col">
					<h2><?php _e('Categories','Modest'); ?></h2>
					<ul id="sitemap-categories"><?php wp_list_categories('title_li='); ?></ul>
				</div> <!-- end .sitemap-col -->
				
				<div class="sitemap-col<?php if (!$fullwidth) echo ' last'; ?>">
					<h2><?php _e('Tags','Modest'); ?></h2>
					<ul id="sitemap-tags">
						<?php $tags = get_tags();
						if ($tags) {
							foreach ($tags as $tag) {
								echo '<li><a href="' . get_tag_link( $tag->term_id ) . '">' . $tag->name . '</a></li> ';
							}
						} ?>
					</ul>
				</div> <!-- end .sitemap-col -->
				
				<?php if (!$fullwidth) { ?>
					<div class="clear"></div>
				<?php } ?>
				
				<div class="sitemap-col<?php if ($fullwidth) echo ' last'; ?>">
					<h2><?php _e('Authors','Modest'); ?></h2>
					<ul id="sitemap-authors" ><?php wp_list_authors('show_fullname=1&optioncount=1&exclude_admin=0'); ?></ul>
				</div> <!-- end .sitemap-col -->
			</div> <!-- end #sitemap -->
			
			<div class="clear"></div>
			
			<?php edit_post_link(__('Edit this page','Modest')); ?>	
		</div> <!-- end .entry -->
		
		<?php if (get_option('modest_integration_single_bottom') <> '' && get_option('modest_integrate_singlebottom_enable') == 'on') echo(get_option('modest_integration_single_bottom')); ?>
	</div> 	<!-- end #left-area -->	
	<?php if (!$fullwidth) get_sidebar(); ?>
			
<?php get_footer(); ?>