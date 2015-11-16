<?php get_header(); 

/*
Template Name: Gallery Template
*/

if( class_exists('acf') ) {
$gallery_images = get_field('gallery_images');
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
	<!-- GALLERY START
	============================================= -->
	<div class="gallery">
		<div class="container">
			<!-- Gallery Items
			============================================= -->
			<div id="gallery" class="wow fadeIn clearfix">

			<?php if( $gallery_images){
				foreach( $gallery_images as $image ):
				$alt = $image['alt']; 

			$image1 = aq_resize($image['url'],  276 , 276, true);?>

				<div class="gallery-item exterior">
					<div class="wow fadeIn">
						<a title="gallery" href="<?php echo esc_url( $image['url'] ); ?>">
							<div class="gallery-image">
								<img src="<?php echo esc_url( $image1 ); ?>" alt="<?php echo esc_attr( $alt ); ?>" />
								<div class="overlay dark"></div>
								<span><i class="fa fa-plus"></i></span>
							</div>
						</a>
					</div>
				</div>

			<?php endforeach; } ?>

			</div>
			<!-- Gallery Items End -->

			<!-- Gallery Script
			============================================= -->
			<script type="text/javascript">

				jQuery(window).load(function(){

					var jQuerycontainer = jQuery('#gallery');

					jQuerycontainer.isotope({ transitionDuration: '0.65s' });

					jQuery(window).resize(function() {
						jQuerycontainer.isotope('layout');
					});

				});
			</script>
			<!-- Gallery Script End -->
		</div>
	</div>
	<!-- GALLERY END -->

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