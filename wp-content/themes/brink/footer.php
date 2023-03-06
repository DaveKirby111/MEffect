<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Kinetic
 */

?>				
	</div><!-- #content -->
</div><!-- #page -->

<div class="footer bg-secondary-color">
    <div class="container t-light-gray footer-wrap">
        <div class="group row">
            <div class="col-12 col-lg-9">
                <div class="footer-contact">
                   <!-- <?php echo get_field('address', 'option'); ?>
                    <p>
                        <?php get_phone(); ?>
                        <br /> -->
                        <?php if (get_field('email_address', 'option')): 
                            echo '<a href="mailto:'. get_field('email_address', 'option') .'">';
                        else:
                            echo '<a href="'. home_url() .'/contact/" >';
                        endif; ?>
                            <i class="fa fa-envelope" aria-hidden="true"></i> Email Us
                        </a>
                    </p>
                </div>
                <?php dynamic_sidebar( 'sidebar-3' ); ?>
            </div>

            <div class="col-12 col-lg-3">
                <h5 class="caps t-white">Follow</h5>
                <ul class="social-icons">
                	<?php get_social(); ?>
            	</ul>
            	<p class="tiny">Author: David</p>
            </div>
            
        </div>
    </div>
    <div class="n7">
    </div>
</div>

<?php wp_footer(); ?>

</body>
</html>
