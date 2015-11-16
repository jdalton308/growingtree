<?php get_header();  ?>

<!-- CONTENT START
============================================= -->
<section id="content" class="single-wrapper">

	<!-- BLOG START
	============================================= -->
	<div class="blog">
		<div class="container">
			<div class="row">

				<!-- BLOG LOOP START
				============================================= -->
				<div class="blog-post col-md-8 wow fadeIn">

				<?php while ( have_posts() ) : the_post(); 
		
					get_template_part( 'inc/format/loop', get_post_format() );

				endwhile; // end of the loop. ?>

				<?php kindergarten_content_nav($pages = '', $range = 2); ?>
				
				</div>
				<!-- BLOG LOOP END -->

				<!-- SIDEBAR START
				============================================= -->

				<?php get_sidebar(); ?>

				<!-- SIDEBAR END -->

			</div>
		</div>
	</div>
	<!-- BLOOG END -->

</section>
<!-- CONTENT END -->
		

<?php get_footer(); ?>