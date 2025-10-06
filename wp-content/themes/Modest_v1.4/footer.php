			</div> <!-- end #content-area -->
		</div> <!-- end .container -->
		
		<?php if ( is_home() && get_option('modest_blog_style') == 'false' && get_option('modest_footer_quote') == 'on' ) { ?>
			<div id="call-to-action">
				<div class="container">
					<p><?php echo get_option('modest_footer_quote_text'); ?>
						<a href="<?php echo get_option('modest_footer_quote_url'); ?>" class="learn-more"><span><?php //_e('Learn More','Modest'); ?></span></a>
					</p>
					<span id="down-arrow"></span>
				</div> <!-- end .container -->	
			</div> <!-- end #call-to-action -->
		<?php } ?>
	</div> <!-- end .left-shadow -->	
</div> <!-- end .right-shadow -->				

<div id="footer">
	<div class="right-shadow">
		<div class="left-shadow">
			<div id="footer-top">
				<div class="container">
					<div id="footer-widgets" class="clearfix">
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer') ) : ?>
						<?php endif; ?>
					</div> <!-- end #footer-widgets -->	
					
					
					<div class="clearfix" id="footer-bottom">	
						<ul class="bottom-nav"> 
							<li class="current_page_item"><a href="<?php echo home_url();?>">Home</a></li>
						   <li class="page_item page-item-766"><a title="Company" href="<?php echo home_url();?>?page_id=766">Company</a></li>
							<li class="page_item page-item-747"><a title="Services" href="<?php echo home_url();?>?page_id=747">Services</a></li>
							<li class="page_item page-item-749"><a title="Projects" href="<?php echo home_url();?>?page_id=749">Projects</a></li>
							<li class="page_item page-item-752"><a title="Clients" href="<?php echo home_url();?>?page_id=752">Clientele</a></li>
							<li class="page_item page-item-754"><a title="PhotoGallery" href="<?php echo home_url();?>?page_id=754">Photo Gallery</a></li>
							<li class="page_item page-item-756"><a title="Careers" href="<?php echo home_url();?>?page_id=756">Careers</a></li>
							<li class="page_item page-item-758"><a title="Contact Us" href="<?php echo home_url();?>?page_id=758">Contact Us</a></li>
							<li class="page_item page-item-1241"><a title="Terms of Use" href="<?php echo home_url();?>?page_id=1241">Terms of Use</a></li>
							<li class="page_item page-item-1239"><a title="Privacy Policy" href="<?php echo home_url();?>?page_id=1239">Privacy Policy</a></li>
							<li class="page_item page-item-1232"><a title="Site Map" href="<?php echo home_url();?>?page_id=1232">SiteMap</a></li>
                     </ul>												
						
					</div>
					
					
				<!--	</div> --> <!-- end #footer-bottom -->
				</div> <!-- end .container -->	
			</div> <!-- end #footer-top -->	
		</div> <!-- end .left-shadow -->	
	</div> <!-- end .right-shadow -->
</div> <!-- end #footer -->	

<?php include(TEMPLATEPATH . '/includes/scripts.php'); ?>
<?php wp_footer(); ?>


</body>

</script>
</html>
