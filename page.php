<?php 
/*
* index.php
*/
get_header(); ?>
		<div id="article">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="pagetitle">
				<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
			</div>
			<div class="section">
				<?php 
				
				/* if child of products and services */
				$products = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'products'");
				$services = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = 'services'");
				
				if (is_page('products') || is_page('projects') ) { ?> 
					<div class="aside">
						<?php get_sidebar(); ?>
					</div>
					<div class="content shared gallery" id="post_<?php the_ID(); ?>">
						<?php 
								// Displaying Child pages
								$mypages = get_pages( array( 'child_of' => $post->ID, 'sort_column' => 'post_date', 'sort_order' => 'asc' ) );

								foreach( $mypages as $page ) {		
									$content = $page->post_content;
									if ( ! $content ) // Check for empty page
										continue;

									$content = apply_filters( 'the_content', $content ); ?>
										<span id="basic-modal-<?php echo $page->ID ?>">
											<a href="#" class="basic pagethumbnail"><span class="gallery" style="background: #ffffff url(
												<?php 
												$thumb=vp_get_thumb_url($page->post_content); 
												if ($thumb!='') echo $thumb; ?>
												) no-repeat; "></span>
											</a>
										</span>
										<!-- modal content -->
										<div id="basic-modal-<?php echo $page->ID ?>-content" class="modal">		<?php echo $content; ?><br class="clearboth" />
										</div>
								<?php }


						?>
					</div>
					

					
					
				<?php } elseif (is_page('solar101')) { ?>
					<div class="content full" id="post_<?php the_ID(); ?>">
						<?php
							
								?>
										<div id="basic-modal-<?php echo get_page_id('solar-panels') ?>" style="display: inline-block; margin: 0 8px;">
											<a href="#" class="basic pagethumbnail">
												<img src="<?php bloginfo('template_url'); ?>/images/solar101-solar-panels.png" width="290" height="300" alt="" />
											</a>
										</div>
										<div id="basic-modal-<?php echo get_page_id('creating-a-curicuit') ?>" style="display: inline-block; margin: 0 8px;">
											<a href="#" class="basic pagethumbnail">
												<img src="<?php bloginfo('template_url'); ?>/images/solar101-creating-circuit.png" width="290" height="300" alt="" />
											</a>
										</div>
										<div id="basic-modal-<?php echo get_page_id('system-components') ?>" style="display: inline-block; margin: 0 8px;">
											<a href="#" class="basic pagethumbnail">
												<img src="<?php bloginfo('template_url'); ?>/images/solar101-system-components.png" width="290" height="300" alt="" />
											</a>
										</div>
								<?php

								// Displaying Child pages
								$mypages = get_pages( array( 'child_of' => $post->ID, 'sort_column' => 'post_date', 'sort_order' => 'asc' ) );

								foreach( $mypages as $page ) {		
									$content = $page->post_content;
									if ( ! $content ) // Check for empty page
										continue;

									$content = apply_filters( 'the_content', $content ); ?>
										<div id="basic-modal-<?php echo $page->ID ?>-content" class="modal">
											<?php echo $content; ?><br class="clearboth" />
										</div>
										<!-- end content -->
								<?php } 
						?>
					</div>
				<?php } else { ?>
					<div class="content full" id="post_<?php the_ID(); ?>">
						<?php the_content(); ?>
					</div>
				<?php } ?>
				<div class="clearboth"></div>
			</div>

		<?php endwhile; endif; ?>
		</div>
		<!-- end article. start footer -->
<?php get_footer(); ?>