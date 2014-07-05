<?php 
/*
* index.php
*/
get_header(); ?>
		<div id="article">
			<div class="prodgallery">
				<?php if ( function_exists( 'meteor_slideshow' ) ) { 
						meteor_slideshow(); 
					} else {?>
						<img src="<?php bloginfo('template_url'); ?>/images/img-home-1.jpg" alt="sample" />
				<?php } ?>
			</div>
			<div class="section">
				<div class="homeboxfirst">
					<h3>About Us</h3>
					<?php dynamic_sidebar( 'about' ); ?>
				</div>
				<div class="homebox">
					<h3>Solsys News</h3>
					<ul>
						<?php 
						$recent_query = new WP_Query(array(
						'post__not_in' => $do_not_duplicate,
						'showposts' => 7,
						'orderby' => 'date'
						));
						while ($recent_query->have_posts()) : $recent_query->the_post(); ?>
							<li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
						<?php endwhile; ?>
					</ul>
				</div>
				<div class="homeboxlast">
					<h3>Industry News</h3>
					<?php dynamic_sidebar( 'twitterfeed' ); ?>
				</div>
			</div>
		</div>
		<!-- end article. start footer -->
<?php get_footer(); ?>