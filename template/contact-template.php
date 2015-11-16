<?php get_header(); 

/*
Template Name: Contact Template
*/

if( class_exists('acf') ) {
$hide_title		= get_field('hide_title');
$add_margin_top	= get_field('add_margin_top');
	$google_maps 			= get_field('google_maps');
	$contact_form 			= get_field('contact_form');

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

	<!-- MAP START
	============================================= -->
	<div class="map">
		<div class="acf-map">
			<div class="marker" id="map" data-lat="<?php echo balancetags( $google_maps['lat'] ); ?>" data-lng="<?php echo balancetags( $google_maps['lng'] ); ?>">
			</div>
		</div>
	</div>
	<!-- MAP END -->

	<!-- CONTACT CONTENT START
	============================================= -->
	<div class="contact-section">
		<div class="container">
			<div class="row">
				
				<div class="contact-details col-md-4 wow fadeIn">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; // end of the loop. ?>
				</div>

				<div class="contact-form col-md-8 wow fadeIn">
					<?php echo do_shortcode( $contact_form ); ?>
				</div>
			</div>
		</div>
	</div>
	<!-- CONTACT CONTENT END -->

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