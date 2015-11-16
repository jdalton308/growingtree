<?php get_header(); 

/*
Template Name: Class Template
*/

if( class_exists('acf') ) {
$hide_title		= get_field('hide_title');
$add_margin_top	= get_field('add_margin_top');
?>

<!-- CONTENT START
============================================= -->
<section id="content" class="single-wrapper" <?php if(!empty($add_margin_top)){ ?>style="margin-top: <?php echo sanitize_text_field( $add_margin_top ); ?>px;"<?php } ?>>
	<!-- Page Title -->
	<?php if($hide_title == false){ ?>
	<div class="grey-background wow fadeIn">
		<div class="container">
			<div class="heading-block page-title wow fadeIn">
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
	</div>
	<?php } ?>

	<!-- CLASS START
	============================================= -->
	<div class="classes-page">
		<div class="container">
			
			<?php $class_temp_args = array(
				'post_type'          => 'kindergarten-class',
				'post_status'        => 'publish',
				'posts_per_page' 	 => 4,

			);
			$class_temp_loop = new WP_Query($class_temp_args);
			if ($class_temp_loop->have_posts()) : while($class_temp_loop->have_posts()) : $class_temp_loop->the_post(); 

			if (has_post_thumbnail()) { 
			$class_temp_img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full'); 
				$class_temp_resimg = aq_resize($class_temp_img[0],  634, 370, true);
			}

			$class_terms = get_the_terms($post->ID, 'class-category');

				 foreach($class_terms as $term){
				 $category_name = $term->name;
				 $category_slug = $term->slug;
				}

			$age_group		= get_field('age_group');
			$class_size		= get_field('class_size');
			$class_price	= get_field('class_price');
			$class_session	= get_field('class_session');
			$color_scheme	= get_field('color_scheme'); ?>

			<div class="classes-wrapper wow fadeInUp">
				<a href="<?php the_permalink(); ?>">
					<div class="class-item" style="background-color: <?php echo esc_html( $color_scheme ); ?>;">
						<div class="class-img">
							<?php if ( has_post_thumbnail()) { ?>
								<img src="<?php echo esc_url( $class_temp_resimg ); ?>" alt="<?php the_title(); ?>">
							<?php } ?> 
							<div class="overlay dark"></div>
							<span><i class="fa fa-plus"></i></span>
						</div>

						<div class="class-details">
							<div class="class-desc">
								<h2><?php the_title(); ?></h2>
								<p class="class-category"><?php echo sanitize_text_field( $category_name ); ?></p>
								<div class="excerpt-text"><?php the_excerpt(); ?></div>
								<p class="class-date"><?php echo get_the_date(); ?></p>
							</div>

							<div class="class-type">
								<?php if (!empty($age_group)){ ?>
									<div class="class-year">
										<h6 class="title"><?php esc_html_e( 'Age Group', 'kindergarten' ); ?></h6>
										<p><?php echo sanitize_text_field( $age_group ); ?></p>
									</div>
								<?php }
								if (!empty($class_size)){ ?>
									<div class="class-size">
										<h6 class="title"><?php esc_html_e( 'Class Size', 'kindergarten' ); ?></h6>
										<p><?php echo sanitize_text_field( $class_size ); ?></p>
									</div>
								<?php }
								if (!empty($class_price)){ ?>
									<div class="class-price">
										<h3><?php echo balancetags( $class_price ); ?></h3>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</a>
			</div>
			<?php endwhile; wp_reset_postdata(); endif; ?>
			
		</div>
	</div>
	<!-- CLASSES END -->

	<!-- OUR CLASSES SCRIPT START -->
	<script type="text/javascript">
		jQuery(document).ready(function(){
			var classDetailsHeight = jQuery('.class-item img').height();
			jQuery(".class-details").css("height", classDetailsHeight);

			jQuery('.class-desc .excerpt-text p').addClass('excerpt');
		});
	</script>
	<!-- OUR CLASSES SCRIPT END -->

</section>
<!-- CONTENT END -->

<?php } 

else { ?>


<section id="content" class="single-wrapper">
	<!-- Page Title -->
	<div class="grey-background wow fadeIn">
		<div class="container">
			<div class="heading-block page-title wow fadeIn">
						<h1>
			<?php esc_html_e( 'Please Activate ACF plugin to use this Page Template', 'kindergarten' ); ?>
		</h1>
			</div>
		</div>
	</div>	

</section>
<!-- CONTENT END -->


<?php } ?>

<?php get_footer(); ?>