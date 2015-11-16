<?php get_header(); 

/*
Template Name: Home Template
*/


if( class_exists('acf') ) { 
	$hide_title		= get_field('hide_title');
$add_margin_top	= get_field('add_margin_top');




?>

<!-- CONTENT START
============================================= -->
	<!-- Page Title -->
	<?php if($hide_title == false){ ?>
	<div class="grey-background wow fadeIn" <?php if(!empty($add_margin_top)){ ?>style="margin-top: <?php echo sanitize_text_field( $add_margin_top ); ?>px;"<?php } ?>>
		<div class="container">
			<div class="heading-block page-title wow fadeIn">
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
	</div>
	<?php } ?>

<!-- SLIDER START
============================================= -->

<!-- meta-box -->
<?php 

	$home_slide	= get_field('home_slide');

?>

<?php if(have_rows('home_slide')): ?>
<section id="slider" class="flexslider-wrap fullscreen clearfix">
	<div class="slider-wrapper">
		<div class="flexslider clearfix"> 
			<ul class="slides">

			<?php while(have_rows('home_slide')):the_row(); 
				$slide_image	= get_sub_field('slide_image');
				$slide_tagline	= get_sub_field('slide_tagline');
				$slide_title	= get_sub_field('slide_title');
				$slide_text		= get_sub_field('slide_text');
				$slide_button	= get_sub_field('slide_button');
				$slide_button_link	= get_sub_field('slide_button_link');
			?>

				<li class="clearfix" style="background-image: url(<?php echo esc_url( $slide_image ); ?>); background-size: cover; background-repeat: no-repeat;">
					<div class="overlay color"></div>   
					<div class="flex-content vertical-center">
						<div class="container">
							<div class="caption wow fadeInLeft">
								<h1><?php echo sanitize_text_field( $slide_tagline ); ?></h1>
							</div>
							<div class="caption wow fadeIn">
								<h3><?php echo balancetags( $slide_title ); ?></h3>
							</div> 
							<div class="caption wow fadeIn">
								<p><?php echo balancetags( $slide_text ); ?></p>
							</div>
							<div class="caption wow fadeIn">
								<div class="button-normal white">
									<a href="<?php echo esc_url( $slide_button_link ); ?>"><?php echo sanitize_text_field( $slide_button ); ?></a>
								</div>
							</div>
						</div>
					</div>
				</li>

				<?php endwhile; ?>

			</ul>
		</div>
	</div>
</section>
<?php endif; ?>
<!-- SLIDER END -->

<!-- CONTENT START
============================================= -->
<section id="content">

	<!-- BANNER START
	============================================= -->
	<?php 
		$banner_text	= get_field('banner_text');
		$banner_animation	= get_field('banner_animation');
		$animation_delay	= get_field('animation_delay');
	?>
	<?php if(!empty($banner_text)) { ?>
	<div class="banner large text-center wow <?php echo sanitize_text_field( $banner_animation ); ?>" data-wow-delay="<?php echo sanitize_text_field( $animation_delay ); ?>s">
		<div class="container">
			<div class="row">
				<?php echo balancetags( $banner_text ); ?>
			</div>
		</div>
	</div>
	<?php } ?>
	<!-- BANNER END -->

	<!-- ABOUT US SECTION START
	============================================= -->
	<?php 
		$about_title	= get_field('about_title');
		$about_subtitle	= get_field('about_subtitle');
		$html_text	= get_field('html_text');
		$use_image	= get_field('use_image');
		$about_image	= get_field('about_image');

		$about_image_animation	= get_field('about_image_animation');
		$animation_delay	= get_field('animation_delay');
	?>
	<div class="about-us">
		<div class="container">
			<div class="row">
				<div class="col-md-6 wow fadeIn">
					<div class="heading-block">
						<?php if(!empty($about_title)){ ?>
							<h2><?php echo sanitize_text_field( $about_title ); ?></h2>
						<?php }
						if(!empty($about_subtitle)){ ?>
							<h4 class="tagline"><?php echo sanitize_text_field( $about_subtitle ); ?></h4>
						<?php } ?>
					</div>
					<?php if(!empty($html_text)) { 
						echo balancetags( $html_text );
					} ?>

				</div>
				
				<?php if(!empty($about_image)) { ?>
				<div class="about-img col-md-6 wow <?php echo sanitize_text_field( $about_image_animation ); ?>" data-wow-delay="<?php echo sanitize_text_field( $animation_delay ); ?>s">
					<img src="<?php echo esc_url( $about_image ); ?>" alt="<?php echo sanitize_text_field( $about_title ); ?>" />
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<!-- ABOUT US SECTION END -->

	<!-- FEATURES SECTION START
	============================================= -->
	<?php 
		$feature_title	= get_field('feature_title');
		$feature_subtitle	= get_field('feature_subtitle');
		$the_feature	= get_field('the_feature');
	?>

	<?php if(have_rows('the_feature')): ?>
	<div class="our-features grey-background">
		<div class="container">
			<div class="heading-block wow fadeIn">
				<?php if(!empty($feature_title)){ ?>
					<h2><?php echo sanitize_text_field( $feature_title ); ?></h2>
				<?php }
				if(!empty($feature_subtitle)){ ?>
					<h4 class="tagline"><?php echo sanitize_text_field( $feature_subtitle ); ?></h4>
				<?php } ?>
			</div>

			<div class="row">
				<div class="features">
					<?php while(have_rows('the_feature')):the_row(); 
						$use_icon_or_image	= get_sub_field('use_icon_or_image');
						$feature_icon	= get_sub_field('feature_icon');
						$feature_image	= get_sub_field('feature_image');
						$icon_background_color	= get_sub_field('icon_background_color');
						$icon_border_color	= get_sub_field('icon_border_color');
						$feature_item_title		= get_sub_field('feature_item_title');
						$feature_item_text	= get_sub_field('feature_item_text');
						$feature_animation	= get_sub_field('feature_animation');
						$animation_delay	= get_sub_field('animation_delay');
					?>
					<div class="feature-item col-md-4 wow <?php echo sanitize_text_field( $feature_animation ); ?>" data-wow-delay="<?php echo sanitize_text_field( $animation_delay ); ?>s">
						<?php if( $use_icon_or_image == 'icon' ) { ?>
						<div class="feature-icon" style="background-color: <?php echo esc_html( $icon_background_color ); ?>; border: 5px solid <?php echo esc_html( $icon_border_color ); ?>;">
							<div class="icon fa <?php echo sanitize_text_field( $feature_icon ); ?>"></div>
						</div>
						<?php }
						else { ?>
						<div class="feature-icon" style="background-color: <?php echo esc_html( $icon_background_color ); ?>; border: 5px solid <?php echo esc_html( $icon_border_color ); ?>;">
							<img src="<?php echo esc_url( $feature_image ); ?>" alt="feat-icon" class="icon">
						</div>
						<?php } ?>
						<div class="feature-desc">
							<h4><?php echo sanitize_text_field( $feature_item_title ); ?></h4>
							<?php echo balancetags( $feature_item_text ); ?>
						</div>
					</div>
					<?php endwhile; ?>
				</div>
				
			</div>
		</div>
	</div>
	<?php endif; ?>
	<!-- FEATURES SECTION END -->

	<!-- FACILITY SECTION START
	============================================= -->
	<?php 
		$counter_background	= get_field('counter_background');
		$counter_item	= get_field('counter_item');
	?>
	<?php if(have_rows('counter_item')): ?>
	<div class="our-facility with-bg-image" style="background-image: url(<?php echo esc_url( $counter_background ); ?>)">
		<div class="black-overlay">	
			<div class="container">
				<div class="row">

				<?php while(have_rows('counter_item')):the_row(); 
					$counter_value	= get_sub_field('counter_value');
					$counter_title	= get_sub_field('counter_title');
					$counter_text	= get_sub_field('counter_text');
					$counter_item_animation	= get_sub_field('counter_item_animation');
					$animation_delay	= get_sub_field('animation_delay');
				?>
					<div class="facility-item col-md-3 text-center wow <?php echo sanitize_text_field( $counter_item_animation ); ?>" data-wow-delay="<?php echo sanitize_text_field( $animation_delay ); ?>s">
						<div class="counter-number">
							<h2 class="counter"><?php echo sanitize_text_field( $counter_value ); ?></h2>
						</div>
						<h4 class="title"><?php echo sanitize_text_field( $counter_title ); ?></h4>
						<?php echo balancetags( $counter_text ); ?>
					</div>

					<?php endwhile; ?>

				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<!-- FEATURES SECTION END -->

	<!-- OUR TEACHER SECTION START
	============================================= -->
	<?php $show_teacher_post	= get_field('show_teacher_post'); 
		  $teacher_post_item	= get_field('teacher_post_item'); 
	if ($show_teacher_post == true){ ?>
	<div class="our-teacher">
		<div class="container">
			<div class="row">
				<!-- Tab panes -->
				<div class="teacher-profile-tab col-md-4"> 
				<?php $teacher_tab_home = array(
						'post_type'          => 'kindergarten_teacher',
						'post_status'        => 'publish',

					);
					$teacher_tab_home_hook = new WP_Query($teacher_tab_home);
					$i = 0;
					if ($teacher_tab_home_hook->have_posts()) : while($teacher_tab_home_hook->have_posts()) : $teacher_tab_home_hook->the_post(); 

					$teacher_position	= get_field('teacher_position');
					$facebook_link		= get_field('facebook_link');
					$twitter_link		= get_field('twitter_link');
					$instagram_link		= get_field('instagram_link');
					$linkedin_link		= get_field('linkedin_link');

					$i++;   
		            if($i == 1) { ?>
					<div role="tabpanel" class="teacher-desc fade in active" id="teamhome-<?php the_ID(); ?>">;
					<?php }
		            else { ?>
		            <div role="tabpanel" class="teacher-desc fade in" id="teamhome-<?php the_ID(); ?>">
		            <?php  } ?>
						<div class="heading-block">
							<h3><?php the_title(); ?></h3>
							<p class="position"><?php echo sanitize_text_field( $teacher_position ); ?></p>
						</div>
						<?php the_content(); ?>
						<ul class="no-padding">
							<?php if(!empty($facebook_link)){ ?>
								<li><a href="<?php echo esc_url( $facebook_link ); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
							<?php }
							if(!empty($twitter_link)){ ?>
								<li><a href="<?php echo esc_url( $twitter_link ); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
							<?php }
							if(!empty($instagram_link)){ ?>
								<li><a href="<?php echo esc_url( $instagram_link ); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
							<?php }
							if(!empty($linkedin_link)){ ?>
								<li><a href="<?php echo esc_url( $linkedin_link ); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
							<?php } ?>
						</ul>
					</div>
					<?php endwhile; wp_reset_postdata(); endif; ?>
				</div>
				<!-- Tab Panes End -->
				
				
				<!-- Nav Tabs -->
				<div class="teacher-photo col-md-8" role="tablist" id="planTabs">
					<div class="row">
						<div class="team-teacher">
						<?php $teacher_img_tab = array(
						'post_type'          => 'kindergarten_teacher',
						'post_status'        => 'publish',
						'posts_per_page' 	 => $teacher_post_item,

						);
							$teacher_img_home_hook = new WP_Query($teacher_img_tab);
							$i = 0;
							if ($teacher_img_home_hook->have_posts()) : while($teacher_img_home_hook->have_posts()) : $teacher_img_home_hook->the_post(); 

							if (has_post_thumbnail()) { 
								$teacher_img_btm = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full'); 
									$teacher_img_res2 = aq_resize($teacher_img_btm[0],  210 , 324, true);
								$teach2_alt = get_post(get_post_thumbnail_id())->post_title;
							}

							$i++;   
				            if($i == 1) { 
							echo '<div role="presentation" class="teacher-photo-box">';
							 }
				            else { ?>
				            <div role="presentation" class="teacher-photo-box">
				            <?php  } ?>
								<a href="#teamhome-<?php the_ID(); ?>" aria-controls="teamhome-<?php the_ID(); ?>" role="tab" data-toggle="tab">
									<img src="<?php echo esc_url( $teacher_img_res2 ); ?>" alt="<?php echo esc_attr( $teach2_alt ); ?>" />
								</a>
							</div>
							<?php endwhile; wp_reset_postdata(); endif; ?>
						</div>
					</div>
					<script type="text/javascript">
						jQuery(document).ready(function() {               
							jQuery(".teacher-photo .team-teacher").owlCarousel({
								items:3,
								activeClass: 'staff-home',
								centerClass: 'center',
								nav: true,
								navText: [
								  "<i class='icon icon-chevron-left'></i>",
								  "<i class='icon icon-chevron-right'></i>"
								  ],
								  responsiveClass:true,
			                        responsive:{
			                            0:{
			                                items:1,
			                                nav:true
			                            },
			                            600:{
			                                items:3,
			                                nav:true
			                            },
			                        }
							});
						});
					</script>
				</div>
				<!-- Nav Tabs End -->
			</div>
			
		</div>
	</div>
	<?php } ?>
	<!-- OUR TEACHER SECTION END -->

	<!-- BANNER SECTION START
	============================================= -->
	<?php
		$use_slogan	= get_field('use_slogan');
		$slogan_text	= get_field('slogan_text');
		$slogan_button_text	= get_field('slogan_button_text');
		$slogan_button_link	= get_field('slogan_button_link');
		$slogan_background_color	= get_field('slogan_background_color');

		$slogan_animation	= get_field('slogan_animation'); 
		$animation_delay	= get_field('animation_delay'); 

	if ($use_slogan == true){ ?>
	<div class="banner small wow <?php echo sanitize_text_field( $slogan_animation ); ?>" data-wow-delay="<?php echo sanitize_text_field( $animation_delay ); ?>s" style="background-color: <?php echo esc_html( $slogan_background_color ); ?>;">
		<div class="container">
			<div class="row">
			<?php if(!empty($slogan_text)){ ?>
				<div class="col-md-8 pull-left wow fadeIn">
					<h3><?php echo sanitize_text_field( $slogan_text ); ?></h3>
				</div>
			<?php }
			if(!empty($slogan_button_text)){ ?>
				<div class="col-md-4 wow fadeIn">
					<div class="button-normal white pull-right">
						<a href="<?php echo esc_url( $slogan_button_link ); ?>" class="no-margin"><?php echo sanitize_text_field( $slogan_button_text ); ?></a>
					</div>
				</div>
			<?php } ?>
			</div>
		</div>
	</div>
	<?php } ?>
	<!-- BANNER SECTION END -->

	<!-- OUR CLASSES SECTION START
	============================================= -->
	<?php
		$show_recent_class	= get_field('show_recent_class');
		$recent_class_item	= get_field('recent_class_item');
		$class_animation	= get_field('class_animation');
		$animation_delay	= get_field('animation_delay'); 

	if($show_recent_class == true){ ?>
	<div class="our-classes wow <?php echo sanitize_text_field( $class_animation ); ?>" data-wow-delay="<?php echo sanitize_text_field( $animation_delay ); ?>s">
		<div class="container">
			<div class="heading-block wow fadeIn">
				<h2><?php esc_html_e( 'Our Classes', 'kindergarten' ); ?></h2>
			</div>

			<div class="row">
				<div class="classes">
				<?php $home_classes_args = array(
						'post_type'          => 'kindergarten-class',
						'post_status'        => 'publish',
						'posts_per_page' 	 => $recent_class_item,

					);
					$recent_class_home_hook = new WP_Query($home_classes_args);
					if ($recent_class_home_hook->have_posts()) : while($recent_class_home_hook->have_posts()) : $recent_class_home_hook->the_post(); 

					if (has_post_thumbnail()) { 
					$class_home_img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full'); 
						$class_home_res = aq_resize($class_home_img[0],  287 , 216, true);
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
					$color_scheme	= get_field('color_scheme');  ?>

					<div class="col-md-6 wow fadeIn">
							<div class="class-item" style="background-color: <?php echo esc_html( $color_scheme ); ?>;">
								<a href="<?php the_permalink(); ?>">
									<div class="class-img pull-right">
										<?php if ( has_post_thumbnail()) { ?>
													<img src="<?php echo esc_url( $class_home_res ); ?>" alt="<?php the_title(); ?>" />
										<?php } ?> 
										<div class="overlay dark"></div>
										<span><i class="fa fa-plus"></i></span>
									</div>
								</a>

								<div class="class-details">
									<div class="class-desc">
										<a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
										<p class="class-category"><?php echo sanitize_text_field( $category_name ); ?></p>
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
					</div>
					<?php endwhile; wp_reset_postdata(); endif; ?>
				</div>
			</div>
		</div>
	</div>
	<!-- OUR CLASSES SECTION END -->

	<!-- OUR CLASSES SCRIPT START -->
	<script type="text/javascript">
		jQuery(window).load(function(){
			var classDetailsHeight = jQuery('.class-item img').height();
			jQuery(".class-details").css("height", classDetailsHeight);
		});
	</script>
	<!-- OUR CLASSES SCRIPT END -->
	<?php } ?>

	<!-- TESTIMONIAL SECTION START
	============================================= -->
	<?php 
	$show_testimonial = get_field('show_testimonial');

	if($show_testimonial == true) { 
		$testimonial_item = get_field('testimonial_item');
		$testimonial_background_image = get_field('testimonial_background_image'); ?>
	<div class="testimonial with-bg-image" <?php if(!empty($testimonial_background_image)){ ?> style="background-image: url(<?php echo esc_url( $testimonial_background_image ); ?>)" <?php } ?>>
		<div class="black-overlay">
			<div class="container">
				<div class="row">
					<div class="testimonial-wrap text-center wow fadeIn">
						<div class="testimonial-item flexslider">
							<ul class="slides">
							<?php $teacher_testi = array(
								'post_type'				=>	'kindergarten_testi',
								'posts_per_page' 	 	=> $testimonial_item,
								);

								$teacher_testi_hook = new WP_Query($teacher_testi);
								if ($teacher_testi_hook->have_posts()) : while($teacher_testi_hook->have_posts()) : $teacher_testi_hook->the_post(); 

								$testimonial_author_job = get_field('testimonial_author_job'); ?>
								<li>
									<div class="review">
										<?php the_content(); ?>
										<h5 class="title"><?php the_title(); ?></h5>
										<?php if(!empty($testimonial_author_job)){ ?>
										<h6 class="position"><?php echo sanitize_text_field( $testimonial_author_job ); ?></h6>
										<?php } ?>
									</div>
								</li>
								<?php endwhile; wp_reset_postdata(); endif; ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			jQuery('.testimonial .review p').addClass('text');
		</script>
	</div>
	<!-- TESTIMONIAL SECTION END -->
	<?php } ?>

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