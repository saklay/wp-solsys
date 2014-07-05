<?php 
/*
*
*
*
*/
?>
					<ul>
						<?php
							
							if ( is_page('products') || is_page('projects') ) {

								// Displaying Child pages
								$mypages = get_pages( array( 'child_of' => $post->ID, 'sort_column' => 'post_date', 'sort_order' => 'asc' ) );

								foreach( $mypages as $page ) {		
									$content = $page->post_content;
									if ( ! $content ) // Check for empty page
										continue;

									$content = apply_filters( 'the_content', $content ); ?>
										<li>
											<div id="basic-modal-<?php echo $page->ID ?>">
												<a href="#" class="basic"><?php echo $page->post_title; ?></a>
											</div>
										<!-- modal content -->
											<div id="basic-modal-<?php echo $page->ID ?>-content" class="modal">
																						<?php echo $content; ?><br class="clearboth" />
											</div>
										</li>
								<?php }
							} else {
								dynamic_sidebar('primary');
							} ?>
					</ul>