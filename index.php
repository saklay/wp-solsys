<?php 
/*
* index.php
*/
get_header(); ?>
		<div id="article">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="pagetitle">
				<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
			</div>
			<div class="section">
				<div class="aside">
					<?php get_sidebar(); ?>
				</div>
				<div class="content shared" id="post_<?php the_ID(); ?>">
					<?php if ( is_archive() || is_home() ) { ?>
							<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
							<?php the_excerpt(); ?>
						<?php } else {
							the_content(); 
						} ?>
				</div>
				<?php endwhile; else: ?>
				<div class="content shared">
					Sorry, but you are looking for something that isn't here.
				</div>
				<?php endif; ?>
			</div>
		</div>
		<!-- end article. start footer -->
<?php get_footer(); ?>