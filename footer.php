</div>
<!-- site-main -->
<footer id="footer">
    <div class="container">
        <div class="row">
            
            <!-- WIDGET FOOTER START
            ============================================= -->

            <?php kindergarten_footer_widget(); ?>
            
            <!-- WIDGET FOOTER END -->
        </div>
    </div>
</footer>
<!-- FOOTER END -->

<!-- COPYRIGHT START
============================================= -->
<div id="copyright">
    <div class="container">
        <div class="row">
            <!-- Copyright Text Start -->
            <div class="copyright-text col-md-6">
                <?php kindergarten_footer_copyright(); ?>
            </div>
            <!-- Copyright Text End -->

            <!-- Social LInks Start -->
            <div class="social-links col-md-6">
                <ul class="no-padding">
	                <?php kindergarten_social_profile(); ?>
                </ul>
            </div>
            <!-- Social Links End -->
        </div>
    </div>
</div>
<!-- COPYRIGHT END -->



<?php wp_footer(); ?>

</body>
</html>