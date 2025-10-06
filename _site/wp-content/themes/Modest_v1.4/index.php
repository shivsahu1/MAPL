<?php if (is_archive()) $post_number = get_option('modest_archivenum_posts');
if (is_search()) $post_number = get_option('modest_searchnum_posts');
if (is_tag()) $post_number = get_option('modest_tagnum_posts');
if (is_category()) $post_number = get_option('modest_catnum_posts'); ?>
<?php get_header(); ?>
							
	<?php include(TEMPLATEPATH . '/includes/top_info.php'); ?>
	
	<div id="left-area">
		<?php 
			global $query_string;
			$i = 1;
			if (is_category()) query_posts($query_string . "&showposts=$post_number&paged=$paged&cat=$cat");
			else query_posts($query_string . "&showposts=$post_number&paged=$paged");
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
<?php get_footer(); ?>