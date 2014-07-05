<?php 
/*
* index.php
*/
get_header(); ?>
		<div id="article">
		<?php if ( have_posts() ) the_post(); ?>
			<div class="pagetitle">
				<?php if ( is_day() ) : ?>
					<?php printf( __( 'Daily Archives: <span>%s</span>', 'twentyten' ), get_the_date() ); ?>
				<?php elseif ( is_month() ) : ?>
					<?php printf( __( 'Monthly Archives: <span>%s</span>', 'twentyten' ), get_the_date( 'F Y' ) ); ?>
				<?php elseif ( is_year() ) : ?>
					<?php printf( __( 'Yearly Archives: <span>%s</span>', 'twentyten' ), get_the_date( 'Y' ) ); ?>
				<?php else : ?>
					<?php _e( 'Blog Archives', 'twentyten' ); ?>
				<?php endif; ?>
			</div>
			<div class="section">
				<div class="aside">
					<?php get_sidebar(); ?>
				</div>
				<div class="content shared">
					Sorry, but you are looking for something that isn't here.
					<p />
				</div>
			</div>		
		</div>
		<!-- end article. start footer -->
<?php get_footer(); ?>