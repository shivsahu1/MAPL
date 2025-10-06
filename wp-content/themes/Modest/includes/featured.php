<div id="featured">
	<?php	
		$ids = array();
		$i=1;
					
		$featured_cat = get_option('modest_feat_cat');
		$featured_num = get_option('modest_featured_num');
		$width = 462;
		$height = 306;
		
		if (get_option('modest_use_pages') == 'false') query_posts("showposts=$featured_num&cat=".get_catId($featured_cat));
		else {
			global $pages_number;
			
			if (get_option('modest_feat_pages') <> '') $featured_num = count(get_option('modest_feat_pages'));
			else $featured_num = $pages_number;
			
			query_posts(array
							('post_type' => 'page',
							'orderby' => 'menu_order',
							'order' => 'ASC',
							'post__in' => get_option('modest_feat_pages'),
							'showposts' => $featured_num)
						);
		}
		
		while (have_posts()) : the_post();
			$et_link = get_post_meta($post->ID,'Link',true) ? get_post_meta($post->ID,'Link',true) : get_permalink();
			
			$et_slide_class = '';
			if ( $i == 1 ) $et_slide_class = ' active-block';
			if ( $i == 2 ) $et_slide_class = ' next-block';
			if ( $i == $featured_num ) $et_slide_class = ' prev-block';
		?>
			<div class="slide<?php echo $et_slide_class; ?>">
				<a href="#" class="main">
					<?php
						$post_title = get_the_title();
						
						$thumbnail = get_thumbnail($width,$height,'thumb',$post_title,$post_title);
						$thumb = $thumbnail["thumb"];
						
						print_thumbnail($thumb, $thumbnail["use_timthumb"], $post_title, $width, $height, 'Featured'); 
					?>
				</a>
				
				<!-- <h2 class="featured-title"><?php the_title(); ?></h2> -->
				<div class="description">
					<p><?php truncate_post(245); ?></p>
				</div> <!-- end .description -->
				
				<div class="shadow-left"></div>
				<div class="shadow-right"></div>
				<a class="featured-link" href="#"><?php _e('Read more','Modest'); ?></a>
				
				<img src="<?php bloginfo('template_directory'); ?>/images/active-bottom-shadow.png" alt="" class="bottom-shadow" />
				<a href="#" class="gotoslide"><span></span></a>
			</div> <!-- end .slide -->
	<?php
			$ids[]= $post->ID; $i++;
		endwhile; wp_reset_query();	
	?>
</div> <!-- end #featured -->
