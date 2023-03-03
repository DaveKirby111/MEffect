<?php if ( get_field('disable_preheader', 'option') !== true ): ?>
<div class="preheader">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<?php if ( get_field('phone_number', 'option') ): ?>
		        	<?php get_phone(); ?>
		    	<?php endif; ?>
		        <ul class="social-icons right">

		            <?php get_social(); ?>
		        </ul>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>