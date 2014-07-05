<?php /**/ ?>
		<div id="footer" class="clearboth">
			<a class="greengeek" href="http://www.greengeeks.com" title="GreenGeeks" alt="GreenGeeks" target="_blank"><img src="http://www.greengeeks.com/greentags/greengeeks_hosted_120x60.gif" height="30" width="60" border="0" alt="GreenGeeks" class="greengeek" /></a>		
			<span class="wrap">
				<a href="http://www.facebook.com/pages/Solsys-Power-Solutions/261839413859644" title="facebook" target="_blank"><span class="facebook"></span></a>
				<a href="http://twitter.com/SolsysPower" target="_blank" title="twitter"><span class="twitter"></span></a>
				<a href="mailto:info@solsys.com.ph" title="info@solsys.com.ph" target="_blank"><span class="email"></span></a>
			</span>
			<!-- 
			<div class="clearboth">
				Powered by <a href="http://WordPress.com" title="WordPress" target="_blank">WordPress</a> and <a href="http://EraldMariano.com" title="EraldMariano.com" target="_blank">EraldMariano.com</a>
			</div>
			-->
		</div>
	</div>

	<?php if (is_page('products') || is_page('projects') || is_page('solar101')) { ?>
	<!-- Load jQuery, SimpleModal and Basic JS files -->		
		<!-- preload the images -->
		<div style="display:none">
			<img src='<?php bloginfo('template_directory'); ?>/images/x.png' alt='' />
		</div>

		<script type='text/javascript' src='<?php bloginfo('template_directory'); ?>/scripts/jquery.js'></script>
		<script type='text/javascript' src='<?php bloginfo('template_directory'); ?>/scripts/jquery.simplemodal.js'></script>
		<script type='text/javascript'>
		
			jQuery(function ($) {
			
			<?php
			// Displaying Child pages of the current page in post format 
			// http://codex.wordpress.org/Function_Reference/get_pages
			$mypages = get_pages( array( 'child_of' => $post->ID, 'sort_column' => 'post_date', 'sort_order' => 'desc' ) );
			foreach( $mypages as $page ) {		
				$content = $page->post_content;
				if ( ! $content ) // Check for empty page
				continue;

				$content = apply_filters( 'the_content', $content ); ?>
				
				// start
				$('#basic-modal-<?php echo $page->ID ?> .basic').click(function (e) {
					$('#basic-modal-<?php echo $page->ID ?>-content').modal({
	                    minHeight:400
                    });

					return false;
				});
			<?php }	?>
			
			});
		</script>
	<?php } ?>
</body>
</html>