<?php

	$slides = get_field('slides');

	$rotator_classes = '';

	if ( is_front_page() ) {

		if ( get_field('enable_floating_header', 'option') === true ) {
			$rotator_classes = 'floating-header';

			if ( is_user_logged_in() ) {
				$rotator_classes .= ' logged-in';
			}

		}

	}

?>
<!--kinetic-block:start-container-break-->
<div class="full-width-block">

	<div class="hero-rotator slick-rotator <?php echo $rotator_classes; echo ' ' . $block['className']; ?>">
		<?php

			foreach ($slides as $slide) {

				// Media
				$media_type = $slide['rotator_media_type'];
				switch ( $media_type ) {
					case "photo":
							$photo = $slide['photo']['sizes']['hero-rotator-image'];
							echo '<div class="slide" style="background-image: url(' . $photo . ');">';
						break;
					case "video":
							echo '<div class="slide">';
							$video = get_slide_video($slide['video_id'], $slide['video_host']);
							echo $video;
						break;
				}

				// Content
				$content_description = ($slide['rotator_content_description'] ? $slide['rotator_content_description'] : false);

				echo '<div class="slide-content">';
					echo '<div class="container">';
						echo '<div class="row">';
							echo '<div class="col-12 t-center">';
								if ( $content_description ) :
									echo $content_description;
								endif;
								if ( $slide['rotator_button_label'] && $slide['rotator_button_link'] ):
									echo '<a href="' . $slide['rotator_button_link'] . '" class="button primary">' . $slide['rotator_button_label'] . '</a>';
								endif;
							echo '</div>';
						echo '</div>';
					echo '</div>';
				echo '</div>';

				// Actions
				echo '</div>';

			}

		?>
	</div>

</div>
<!--kinetic-block:end-container-break-->
