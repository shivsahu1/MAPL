<?php get_header(); ?>
	<?php if ( get_option('modest_quote') == 'on' ) { ?>
		<div id="quote">
			<p id="quote-1"><span class="tagline-quote"></span><?php echo get_option('modest_quote_one'); ?><span class="tagline-quote"></span></p>
			<p id="quote-2"><?php echo get_option('modest_quote_two'); ?></p>
		</div> <!-- end #quote -->
	<?php } ?>

	<?php if ( get_option('modest_featured') == 'on' ) include(TEMPLATEPATH . '/includes/featured.php'); ?>
	
	<?php if ( get_option('modest_blog_style') == 'false' ){ ?>
		<div id="blurbs" class="clearfix">
			<?php 
				$blurbs_number = get_option('modest_use_third_page') == 'on' ? 3 : 2;
				if ( get_option('modest_') == 'on' ) $blurbs_number = 3; 
			?>
			<?php for ($i=1; $i <= $blurbs_number; $i++) { ?>
				<?php query_posts('page_id=' . get_pageId(html_entity_decode(get_option('modest_home_page_'.$i)))); while (have_posts()) : the_post(); ?>
					<?php 
						global $more; $more = 0;
					?>
					<div class="blurb<?php if ( $i == 3 ) echo ' last'; ?>">
						 <h3 class="title"><?php the_title(); ?></h3>
						<?php the_content(''); ?>
					</div> <!-- end .blurb -->
				<?php endwhile; wp_reset_query(); ?>
			<?php } ?>
			
			<?php if ( $blurbs_number == 2 ) { ?>
				<div class="blurb last">
					<h3 class="title"><?php _e('Examples of Our Work','Modest'); ?></h3>
					<?php query_posts("showposts=".get_option('modest_work_number')."&cat=".get_cat_ID(get_option('modest_work_cat')));
						if (have_posts()) : while (have_posts()) : the_post(); ?>
							<?php 
							$width = 56;
							$height = 56;
							$titletext = get_the_title();

							$thumbnail = get_thumbnail($width,$height,'item-image',$titletext,$titletext,true,'Work');
							$thumb = $thumbnail["thumb"];
							$fancybox_title = get_post_meta($post->ID,'Customtitle',true) ? get_post_meta($post->ID,'Customtitle',true) : get_the_title(); ?>
							<div class="thumb">
								
									<?php print_thumbnail($thumb, $thumbnail["use_timthumb"], $titletext, $width, $height, 'item-image'); ?>
									<span class="overlay"></span>
									<span class="zoom-icon"></span>
							
							</div> 	<!-- end .thumb -->
						<?php 
						endwhile; endif; 
					wp_reset_query(); ?>
				</div> <!-- end .blurb -->
			<?php } ?>
		</div> <!-- end #blurbs -->
	<?php } else { ?>
		<div id="left-area">
			<?php 
				$args=array(
					'showposts'=>get_option('modest_homepage_posts'),
					'paged'=>$paged,
					'category__not_in' => get_option('modest_exlcats_recent'),
				);
				if (get_option('modest_duplicate') == 'false') $args['post__not_in'] = $ids;
				query_posts($args);
			?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>		
				<?php include(TEMPLATEPATH . '/includes/entry.php'); ?>
			<?php endwhile; ?>
				<?php 
					if(function_exists('wp_pagenavi')) { wp_pagenavi(); }
					else { include(TEMPLATEPATH . '/includes/navigation.php'); } 
				?>
			<?php else : ?>
				<?php include(TEMPLATEPATH . '/includes/no-results.php'); ?>					
			<?php endif; wp_reset_query(); ?>
		</div> 	<!-- end #left-area -->
		<?php get_sidebar(); ?>
	<?php } ?>

<?php get_footer(); ?>
