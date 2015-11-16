<?php get_header(); 

/*
Template Name: Teacher Template
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

	<!-- OUR TEACHER SECTION START
	============================================= -->
	
	<div class="class-course">
		<div class="container">
			<div class="row">
				<!-- Nav Tabs -->
				<div class="teacher-nav wow fadeIn" role="tablist" id="teacherTab" aria-multiselectable="true">
					<div id="teacher-carousel" class="no-margin no-padding">

					<?php $teacher_tab_img = array(
							'post_type'          => 'kindergarten_teacher',
							'post_status'        => 'publish',

						);
							
							$teacher_tab_images = new WP_Query($teacher_tab_img);
							$i = 0;
							if ($teacher_tab_images->have_posts()) : while($teacher_tab_images->have_posts()) : $teacher_tab_images->the_post(); 
							
							$i++;   
							if($i == 1) { 
								?>
							<div role="presentation" class="teacher-person active">
							<?php }
							else { ?>
							<div role="presentation" class="teacher-person">
							<?php  }
							

						  if (has_post_thumbnail()) { 
							$teacher_img_top = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full'); 
								$teacher_img_res = aq_resize($teacher_img_top[0],  210 , 324, true);
							$teach_alt = get_post(get_post_thumbnail_id())->post_title; } 

						?>
							<a data-parent="#teacherTab" href="#team-<?php the_ID(); ?>" aria-controls="team-<?php the_ID(); ?>" role="tab" data-toggle="tab">
								<img src="<?php echo esc_url( $teacher_img_res ); ?>" alt="<?php echo esc_attr( $teach_alt ); ?>" />
							</a>
						</div>
						<?php endwhile; wp_reset_postdata(); endif; ?>	

					</div>
					<script type="text/javascript">
						jQuery(document).ready(function() {               
							jQuery("#teacher-carousel").owlCarousel({
								items:3,
								activeClass: 'staff-teacher',
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

			<!-- Tab panes -->
			<?php $teacher_tab_panel = array(
				'post_type'          => 'kindergarten_teacher',
				'post_status'        => 'publish',

			);
			$teacher_tab_pan = new WP_Query($teacher_tab_panel);
			$i = 0;
			if ($teacher_tab_pan->have_posts()) : while($teacher_tab_pan->have_posts()) : $teacher_tab_pan->the_post(); 

			$i++;   
			if($i == 1) { 
				?>
			<div role="tabpanel" class="teacher-desc fade in active" id="team-<?php the_ID(); ?>">
			<?php }
			else { ?>
			<div role="tabpanel" class="teacher-desc fade in" id="team-<?php the_ID(); ?>">
			<?php  }
			
			if (has_post_thumbnail()) { 
				$teacher_img_btm = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full'); 
					$teacher_img_res2 = aq_resize($teacher_img_btm[0],  300 , 300, true);
				$teach2_alt = get_post(get_post_thumbnail_id())->post_title;
			} 

			/*meta-box*/
				$teacher_position	= get_field('teacher_position');
				$teacher_email		= get_field('teacher_email');

				// skill
				$graphic_skill		= get_field('graphic_skill');
				$drawing_skill		= get_field('drawing_skill');
				$paint_skill		= get_field('paint_skill');
				$music_skill		= get_field('music_skill');
				$sport_skill		= get_field('sport_skill');

				//social
				$facebook_link		= get_field('facebook_link');
				$twitter_link		= get_field('twitter_link');
				$instagram_link		= get_field('instagram_link');
				$linkedin_link		= get_field('linkedin_link');

			?>

				<div class="heading-block clearfix">
					<h3><?php the_title(); ?></h3>
					<p class="position"><?php echo sanitize_text_field( $teacher_position ); ?></p>
				</div>

				<div class="row">
					<!-- Section 1 Start -->
					<div class="section-1 wow fadeIn clearfix">
						<div class="col-md-4">
							<div class="teacher-photo">
								<img src="<?php echo esc_url( $teacher_img_btm[0] ); ?>" alt="<?php echo esc_attr( $teach2_alt ); ?>" />
								<div class="social-links">
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
							</div>
						</div>

						<div class="col-md-4">
							<div class="heading-block clearfix">
								<h4><?php esc_html_e( 'About', 'kindergarten' ); ?></h4>
							</div>
							<?php the_content(); ?>
						</div>

						<div class="col-md-4">
							<div class="heading-block clearfix">
								<h4><?php esc_html_e( 'My Skills', 'kindergarten' ); ?></h4>
							</div>
							<div class="my-skills">
								<?php if(!empty($graphic_skill)){ ?>
								<div class="skills-barrow clearfix">
									<div class="skills-bar" data-percent="<?php echo sanitize_text_field( $graphic_skill ); ?>%">
										<div class="bar" style="background-color: #edbf47;"></div>
										<span class="skill-title"><?php esc_html_e( 'Graphic - ', 'kindergarten' ); ?><?php echo sanitize_text_field( $graphic_skill ); ?>%</span>
									</div>
								</div>
								<?php }
								if(!empty($drawing_skill)){ ?>
								<div class="skills-barrow clearfix">
									<div class="skills-bar" data-percent="<?php echo sanitize_text_field( $drawing_skill ); ?>%">
										<div class="bar" style="background-color: #58beca;"></div>
										<span class="skill-title"><?php esc_html_e( 'Drawing - ', 'kindergarten' ); ?><?php echo sanitize_text_field( $drawing_skill ); ?>%</span>
									</div>
								</div>
								<?php }
								if(!empty($paint_skill)){ ?>
								<div class="skills-barrow clearfix">
									<div class="skills-bar" data-percent="<?php echo sanitize_text_field( $paint_skill ); ?>%">
										<div class="bar" style="background-color: #6fc191;"></div>
										<span class="skill-title"><?php esc_html_e( 'Paint - ', 'kindergarten' ); ?><?php echo sanitize_text_field( $paint_skill ); ?>%</span>
									</div>
								</div>
								<?php }
								if(!empty($music_skill)){ ?>
								<div class="skills-barrow clearfix">
									<div class="skills-bar" data-percent="<?php echo sanitize_text_field( $music_skill ); ?>%">
										<div class="bar" style="background-color: #ec774b;"></div>
										<span class="skill-title"><?php esc_html_e( 'Music - ', 'kindergarten' ); ?><?php echo sanitize_text_field( $music_skill ); ?>%</span>
									</div>
								</div>
								<?php }
								if(!empty($sport_skill)){ ?>
								<div class="skills-barrow clearfix">
									<div class="skills-bar" data-percent="<?php echo sanitize_text_field( $sport_skill ); ?>%">
										<div class="bar" style="background-color: #e16c6c;"></div>
										<span class="skill-title"><?php esc_html_e( 'Sport - ', 'kindergarten' ); ?><?php echo sanitize_text_field( $sport_skill ); ?>%</span>
									</div>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
					<!-- Section 1 End -->

					<!-- Section 2 Start -->
					<?php
						$teach_schedule		= get_field('teach_schedule'); 
					?>

					<div class="section-2 wow fadeIn clearfix">
						<div class="col-md-4">
							<?php if(have_rows('teach_schedule')): ?>
							<div class="schedule">
								<table class="table">
									<thead>
										<tr>
											<th colspan="2" class="header"><span class="icon icon-clock104"></span><?php esc_html_e( 'My Schedule', 'kindergarten' ); ?></th>
										</tr>
									</thead>
									<tbody>
									<?php while(have_rows('teach_schedule')):the_row(); 
											$teach_day 	= get_sub_field('teach_day');
											$teach_hour = get_sub_field('teach_hour'); 
										?>
										<tr>
											<td class="day"><?php echo sanitize_text_field( $teach_day ); ?></td>
											<td class="time"><?php echo sanitize_text_field( $teach_hour ); ?></td>
										</tr>
										<?php endwhile; ?>
									</tbody>
								</table>
							</div>
						<?php endif; ?>
						</div>

						<div class="col-md-4">

						<?php
							$lesson		= get_field('lesson'); 
						?>

						<?php if(have_rows('lesson')): ?>
							<div class="heading-block clearfix">
								<h4><?php esc_html_e( 'My Lesson', 'kindergarten' ); ?></h4>
							</div>
							<ul class="lesson no-margin no-padding">
							<?php while(have_rows('lesson')):the_row(); 
							$name_of_class 		= get_sub_field('name_of_class');
							$online_lesson_link = get_sub_field('online_lesson_link'); ?>

								<li><a href="<?php echo esc_url( $online_lesson_link ); ?>"><?php echo sanitize_text_field( $name_of_class ); ?></a></li>

							<?php endwhile; ?>
							</ul>
						<?php endif; ?>
						</div>

						<div class="contact-me col-md-4">
						<?php if(!empty($teacher_email)){ ?>
							<div class="heading-block clearfix">
								<h4><?php esc_html_e( 'Contact Me', 'kindergarten' ); ?></h4>
							</div>
							<?php echo do_shortcode( $teacher_email ); ?>
						<?php } ?>
						</div>
					</div>
					<!-- Section 2 End -->
				</div>
			</div>
			<?php endwhile; wp_reset_postdata(); endif; ?>

		</div>
	</div>
	<!-- CLASS AND COURSE SECTION END -->
	
	<?php 
		$teacher_slogan_text			= get_field('teacher_slogan_text');
		$teacher_button_text			= get_field('teacher_button_text');
		$teacher_button_link			= get_field('teacher_button_link');
		$show_hide_testimonial_post		= get_field('show_hide_testimonial_post');
	?>
	<!-- BANNER SECTION START
	============================================= -->
	<?php if(!empty($teacher_slogan_text)){ ?>
	<div class="banner small wow fadeIn">
		<div class="container">
			<div class="row">
				<div class="col-md-8 pull-left wow fadeIn">
					<h3><?php echo sanitize_text_field( $teacher_slogan_text ); ?></h3>
				</div>
				
				<?php if(!empty($teacher_button_text)){ ?>
				<div class="col-md-4 wow fadeIn">
					<div class="button-normal white pull-right">
						<a href="<?php echo esc_url( $teacher_button_link ); ?>" class="no-margin"><?php echo sanitize_text_field( $teacher_button_text ); ?></a>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<?php } ?>
	<!-- BANNER SECTION END -->

	<!-- TESTIMONIAL SECTION START
	============================================= -->
	<?php if($show_hide_testimonial_post == true) { 
		$teacher_testimonial_background = get_field('teacher_testimonial_background'); ?>
	<div class="testimonial with-bg-image" <?php if(!empty($teacher_testimonial_background)){ ?> style="background-image: url(<?php echo esc_url( $teacher_testimonial_background ); ?>)" <?php } ?>>
		<div class="container">
			<div class="row">
				<div class="testimonial-wrap text-center wow fadeIn">
					<div class="testimonial-item flexslider">
						<ul class="slides">
						<?php $teacher_testi = array(
							'post_type'				=>	'kindergarten_testi',
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
	<script type="text/javascript">
		jQuery('.testimonial .review p').addClass('text');
	</script>
	</div>
	<?php } ?>
	<!-- TESTIMONIAL SECTION END -->

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