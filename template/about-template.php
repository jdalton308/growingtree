<?php get_header(); 

/*
Template Name: About Template
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

	<!-- ABOUT US SECTION START
	============================================= -->
	<?php 
		$accordion_about	= get_field('accordion_about');
		$accordion_background_color	= get_field('accordion_background_color');
	?>
	
	<div class="about-us">
		<div class="container">
			<div class="row">
				<?php if(have_rows('accordion_about')): ?>
				<!-- Accordion Start -->
				<div class="accordion col-md-6">
					<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

					<?php while(have_rows('accordion_about')):the_row(); 
						$accordion_title = get_sub_field('accordion_title');
						$accordion_text	 = get_sub_field('accordion_text');

						$myvalue = $accordion_title;
						$result = split(" ", $myvalue);
					?>

						<div class="panel panel-default">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php the_ID(); ?>-<?php echo sanitize_text_field( $result[0] ); ?>" aria-expanded="true" aria-controls="collapse-<?php the_ID(); ?>-<?php echo sanitize_text_field( $result[0] ); ?>">
								<div class="panel-heading" role="tab" id="heading-<?php the_ID(); ?>-<?php echo sanitize_text_field( $result[0] ); ?>" style="background-color: <?php echo esc_html( $accordion_background_color ); ?>">
								  <h4 class="panel-title"><?php echo sanitize_text_field( $accordion_title ); ?></h4>
								</div>
							</a>
							<div id="collapse-<?php the_ID(); ?>-<?php echo sanitize_text_field( $result[0] ); ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-<?php the_ID(); ?>-<?php echo sanitize_text_field( $result[0] ); ?>">
								<div class="panel-body">
									<?php echo balancetags( $accordion_text ); ?>
								</div>
							</div>
						</div>

					<?php endwhile; ?>

					</div>
					<script type="text/javascript">
					jQuery('.accordion .panel-default:first-child').each(function() {
					    jQuery(this).find( '.panel-collapse' ).addClass( 'in' );
					});
					</script>
				</div>
				<!-- Accordion End -->
				<?php endif; ?>

				<div class="col-md-6 wow fadeIn">
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="heading-block">
						<h2><?php the_title(); ?></h2>
					</div>
					<?php the_content(); ?>
				<?php endwhile; // end of the loop. ?>
				</div>
			</div>
		</div>
	</div>
	<!-- ABOUT US SECTION END -->

	<!-- FEATURES SECTION START
	============================================= -->
	<?php 
	$about_feature_title	= get_field('about_feature_title');
	$about_feature_subtitle	= get_field('about_feature_subtitle');
	$the_feature	= get_field('the_feature');

	if(have_rows('the_feature')): ?>
	<div class="our-features grey-background">
		<div class="container">
			<?php if(!empty($about_feature_title)){ ?>
			<div class="heading-block wow fadeIn">
				<h2><?php echo sanitize_text_field( $about_feature_title ); ?></h2>
				<?php if(!empty($about_feature_subtitle)){ ?>
					<h4 class="tagline"><?php echo sanitize_text_field( $about_feature_subtitle ); ?></h4>
				<?php } ?>
			</div>
			<?php } ?>

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

	<!-- CLASS AND COURSE SECTION START
	============================================= -->
	<?php 
	$class_section_title	= get_field('class_section_title');
	$class_section_subtitle	= get_field('class_section_subtitle'); 
	$show_class_tab			= get_field('show_class_tab');
	?>
	<div class="class-course">
		<div class="container">
			<?php if(!empty($class_section_title)){ ?>
			<div class="heading-block wow fadeIn">
				<h2><?php echo sanitize_text_field( $class_section_title ); ?></h2>
				<?php if(!empty($class_section_subtitle)){ ?>
					<h4 class="tagline"><?php echo sanitize_text_field( $class_section_subtitle ); ?></h4>
				<?php } ?>
			</div>
			<?php } ?>

			<div class="row">
				<!-- Nav Tabs -->
				<div class="class-course-nav" role="tablist" id="planTabs">
					<ul class="no-margin no-padding">

					<?php $class_temp_args = array(
						'post_type'          => 'kindergarten-class',
						'post_status'        => 'publish',
						'posts_per_page' 	 => $show_class_tab	,

					);
					$class_temp_loop = new WP_Query($class_temp_args);
					$i = 0;
					if ($class_temp_loop->have_posts()) : while($class_temp_loop->have_posts()) : $class_temp_loop->the_post(); 

					$class_icon	= get_field('class_icon');
					$fa_class_icon	= get_field('fa_class_icon');
					$kindergaten_class_icon	= get_field('kindergaten_class_icon');
					$color_scheme	= get_field('color_scheme'); 

						$i++;   
						if($i == 1) { ?>
						<li role="presentation" class="wow fadeIn active">
						<?php }
						else { ?>
						<li role="presentation" class="wow fadeIn">
						<?php } ?>

							<a href="#classtab-<?php the_ID(); ?>" aria-controls="classtab-<?php the_ID(); ?>" role="tab" data-toggle="tab" style="border-color: <?php echo esc_html( $color_scheme ); ?>; color: <?php echo esc_html( $color_scheme ); ?>;">
								<?php the_title(); ?>
								
								<?php if( $class_icon == 'kinder' ) { ?>
								<div class="icon <?php echo sanitize_text_field( $kindergaten_class_icon ); ?>"></div>
								<?php }
								else { ?>
								<div class="icon fa <?php echo sanitize_text_field( $fa_class_icon ); ?>"></div>
								<?php } ?>
							</a>
						</li>

						<?php endwhile; wp_reset_postdata(); endif; ?>

					</ul>
				</div>
				<!-- Nav Tabs End -->

				<!-- Tab panes -->
				<div class="class-course-details wow fadeIn"> 
		
					<?php $class_temp_args = array(
						'post_type'          => 'kindergarten-class',
						'post_status'        => 'publish',
						'posts_per_page' 	 => $show_class_tab	,

					);
					$class_temp_loop = new WP_Query($class_temp_args);
					$i = 0;
					if ($class_temp_loop->have_posts()) : while($class_temp_loop->have_posts()) : $class_temp_loop->the_post(); 

					$class_session	= get_field('class_session');
					$color_scheme	= get_field('color_scheme'); 

					if (has_post_thumbnail()) { 
					$class_temp_img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full'); } 

					$i++;   
						if($i == 1) { ?>
						<div role="tabpanel" class="class-course-content fade in active" id="classtab-<?php the_ID(); ?>">
					<?php }
						else { ?>
						<div role="tabpanel" class="class-course-content fade in" id="classtab-<?php the_ID(); ?>">
					<?php } ?>

						<div class="col-md-6">
							<img src="<?php echo esc_url( $class_temp_img[0] ); ?>" alt="<?php the_title(); ?>">
						</div>

						<div class="col-md-6">
							<h3><?php the_title(); ?></h3>
							<p class="subtitle"><?php echo balancetags( $class_session ); ?></p>
							<div class="content">
								<?php echo the_excerpt(); ?>
							</div>

							<div class="button-normal green">
								<a href="<?php the_permalink(); ?>"><?php esc_html_e( 'VIEW MORE', 'kindergarten' ); ?></a>
							</div>
						</div>
					</div>

					<?php endwhile; wp_reset_postdata(); endif; ?>

				</div>
				<!-- Tab Panes End -->
			</div>
		</div>
	</div>
	<!-- CLASS AND COURSE SECTION END -->

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

	<!-- PRICING TABLE SECTION START
	============================================= -->
	<?php 
		$pricing_table	= get_field('pricing_table');
	?>
	<?php if(have_rows('pricing_table')): ?>
	<div class="pricing-table wow fadeIn">
		<div class="container">
			
			<?php while(have_rows('pricing_table')):the_row(); 
				$pricing_title	= get_sub_field('pricing_title');
				$pricing_price	= get_sub_field('pricing_price');
				$pricing_expire	= get_sub_field('pricing_expire');
				$pricing_head_color	= get_sub_field('pricing_head_color');
				$featured_price	= get_sub_field('featured_price');
				$table_item	= get_sub_field('table_item');
				$pricing_button	= get_sub_field('pricing_button');
				$pricing_link	= get_sub_field('pricing_link');
				$pricing_animation	= get_sub_field('pricing_animation');
				$animation_delay	= get_sub_field('animation_delay');
			?>
			<div class="pricing-item <?php if($featured_price == true){ ?>featured<?php } ?> col-md-4 text-center wow <?php echo sanitize_text_field( $pricing_animation ); ?>" data-wow-delay="<?php echo sanitize_text_field( $animation_delay ); ?>s">
				<div class="header-area" style="background-color: <?php echo esc_html( $pricing_head_color ); ?>">
					<h3 class="title"><?php echo sanitize_text_field( $pricing_title ); ?></h3>
					<h1 class="price"><?php echo sanitize_text_field( $pricing_price ); ?><span>/<?php echo sanitize_text_field( $pricing_expire ); ?></span></h1>
				</div>
				<div class="content">
				<?php if(have_rows('table_item')): ?>
					<ul class="no-padding no-margin">
					<?php while(have_rows('table_item')):the_row(); 
						$pricing_item	= get_sub_field('pricing_item'); ?>

						<li><?php echo sanitize_text_field( $pricing_item ); ?></li>

						<?php endwhile; ?>
					</ul>
				<?php endif; ?>
					<?php if(!empty($pricing_button)){ ?>
					<div class="bottom-section">
						<div class="button-normal green">
							<a href="<?php echo esc_url( $pricing_link ); ?>"><?php echo sanitize_text_field( $pricing_button ); ?></a>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
			<?php endwhile; ?>

		</div>
	</div>
	<!-- PRICING TABLE SECTION END -->
	<?php endif; ?>

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