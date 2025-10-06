<?php 
/*
Template Name: Blog Page
*/
?>
<?php the_post(); ?>

<?php 
$et_ptemplate_settings = array();
$et_ptemplate_settings = maybe_unserialize( get_post_meta($post->ID,'et_ptemplate_settings',true) );

$fullwidth = isset( $et_ptemplate_settings['et_fullwidthpage'] ) ? (bool) $et_ptemplate_settings['et_fullwidthpage'] : (bool) $et_ptemplate_settings['et_fullwidthpage'];

$et_ptemplate_blogstyle = isset( $et_ptemplate_settings['et_ptemplate_blogstyle'] ) ? (bool) $et_ptemplate_settings['et_ptemplate_blogstyle'] : (bool) $et_ptemplate_settings['et_ptemplate_blogstyle'];

$et_ptemplate_showthumb = isset( $et_ptemplate_settings['et_ptemplate_showthumb'] ) ? (bool) $et_ptemplate_settings['et_ptemplate_showthumb'] : (bool) $et_ptemplate_settings['et_ptemplate_showthumb'];

$blog_cats = isset( $et_ptemplate_settings['et_ptemplate_blogcats'] ) ? $et_ptemplate_settings['et_ptemplate_blogcats'] : array();
$et_ptemplate_blog_perpage = isset( $et_ptemplate_settings['et_ptemplate_blog_perpage'] ) ? $et_ptemplate_settings['et_ptemplate_blog_perpage'] : 10;
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
			
			<div id="et_pt_blog">
				<?php $cat_query = ''; 
				if ( !empty($blog_cats) ) $cat_query = '&cat=' . implode(",", $blog_cats);
				else echo '<!-- blog category is not selected -->'; ?>
				<?php query_posts("showposts=$et_ptemplate_blog_perpage&paged=$paged" . $cat_query); ?>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
					<div class="et_pt_blogentry clearfix">
						<h2 class="et_pt_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						
						<p class="et_pt_blogmeta"><?php _e('Posted','Modest'); ?> <?php _e('by','Modest'); ?> <?php the_author_posts_link(); ?> <?php _e('on','Modest'); ?> <?php the_time(get_option('modest_date_format')) ?> <?php _e('in','Modest'); ?> <?php the_category(', ') ?> | <?php comments_popup_link(__('0 comments','Modest'), __('1 comment','Modest'), '% '.__('comments','Modest')); ?></p>
						
						<?php $thumb = '';
						$width = 184;
						$height = 184;
						$classtext = '';
						$titletext = get_the_title();

						$thumbnail = get_thumbnail($width,$height,$classtext,$titletext,$titletext);
						$thumb = $thumbnail["thumb"]; ?>
						
						<?php if ( $thumb <> '' && !$et_ptemplate_showthumb ) { ?>
							<div class="et_pt_thumb alignleft">
								<?php print_thumbnail($thumb, $thumbnail["use_timthumb"], $titletext, $width, $height, $classtext); ?>
								<a href="<?php the_permalink(); ?>"><span class="overlay"></span></a>
							</div> <!-- end .thumb -->
						<?php }; ?>
						
						<?php if (!$et_ptemplate_blogstyle) { ?>
							<p><?php truncate_post(550);?></p>
							<a href="<?php the_permalink(); ?>" class="readmore"><span><?php _e('read more','Modest'); ?></span></a>
						<?php } else { ?>
							<?php the_content(''); ?>
						<?php } ?>
					</div> <!-- end .et_pt_blogentry -->
					
				<?php endwhile; ?>
					<div class="page-nav clearfix">
						<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); }
						else { ?>
							 <?php include(TEMPLATEPATH . '/includes/navigation.php'); ?>
						<?php } ?>
					</div> <!-- end .entry -->
				<?php else : ?>
					<?php include(TEMPLATEPATH . '/includes/no-results.php'); ?>
				<?php endif; wp_reset_query(); ?>
			
			</div> <!-- end #et_pt_blog -->
			
			<?php edit_post_link(__('Edit this page','Modest')); ?>	
		</div> <!-- end .entry -->
		
		<?php if (get_option('modest_integration_single_bottom') <> '' && get_option('modest_integrate_singlebottom_enable') == 'on') echo(get_option('modest_integration_single_bottom')); ?>
	</div> 	<!-- end #left-area -->	
	<?php if (!$fullwidth) get_sidebar(); ?>
			
<?php get_footer(); ?>