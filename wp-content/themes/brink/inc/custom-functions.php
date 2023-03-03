<?php
/**
 * Custom functions and methods for this theme
 *
 * @package Kinetic
 */

include_once( 'acf-new-fields/acf-post-type.php' );

// Image Sizes
add_image_size( 'hero-rotator-image', 1920, 1080, true );

// Add support for upload SVG
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

// Add main logos
function get_logo( $option = NULL ) {
	$logo = get_field($option, 'option');

	if ( $logo ) {
		echo '<img src="'. $logo["url"] .'" alt="'. get_bloginfo("name") .'" />';
	}
	else {
		$logo = get_field('default_logo', 'option');
		if ( $logo ) {
			echo '<img src="'. $logo["url"] .'" alt="'. get_bloginfo("name") .'" />';
		}
		else {
			echo '<p>'. get_bloginfo("name") .'</p>';
		}
	}
}

function get_phone() {
	$phone = get_field('phone_number', 'option');
	$char_arr = array('(', ')', '.', ',', '-', '+', ' ');
	$new_phone = str_replace($char_arr, '', $phone);

	$formatted_phone = substr($new_phone, 0, 3) . '.' . substr($new_phone, 3, 3) . '.' . substr($new_phone, 6);

    $country_code = ( get_field('country_code', 'option') ? get_field('country_code', 'option') : '+1' );

	echo '<a href="tel:' . $country_code . $new_phone .'"><i class="fa fa-phone" aria-hidden="true"></i> '. $formatted_phone .'</a>';
}

function get_social($icons = true) {
    $icon = '';
    $url = '';

    if (get_field('facebook', 'option')) {
        echo '<li><a href="'. get_field('facebook', 'option') .'" target="_blank" aria-label="Link to Facebook page">'
        . ($icons ? '<i class="fab fa-facebook"></i>' : 'Facebook')
        . '</a></li>';
    }
    if (get_field('twitter', 'option')) {
        echo '<li><a href="'. get_field('twitter', 'option') .'" target="_blank" aria-label="Link to Twitter page">'
        . ($icons ? '<i class="fab fa-twitter"></i>' : 'Twitter')
        .'</a></li>';
    }
    if (get_field('instagram', 'option')) {
        echo '<li><a href="'. get_field('instagram', 'option') .'" target="_blank" aria-label="Link to Instagram page">'
        . ($icons ? '<i class="fab fa-instagram"></i>' : 'Instagram')
        . '</a></li>';
    }
    if (get_field('youtube', 'option')) {
        echo '<li><a href="'. get_field('youtube', 'option') .'" target="_blank" aria-label="Link to YouTube page">'
        . ($icons ? '<i class="fab fa-youtube"></i>' : 'YouTube')
        . '</a></li>';
    }
    if (get_field('linkedin', 'option')) {
        echo '<li><a href="'. get_field('linkedin', 'option') .'" target="_blank" aria-label="Link to LinkedIn page">'
        . ($icons ? '<i class="fab fa-linkedin"></i>' : 'linkedin')
        . '</a></li>';
    }
}

function my_login_logo() {

    $login_logo = get_field('login_logo', 'option');
    if ( $login_logo ):
        echo '<style type="text/css">
            body.login h1 a { background-image: url(' . $login_logo['url'] . ') !important; }
        </style>';
    endif;
}
add_action( 'login_enqueue_scripts', 'my_login_logo' );


function cleanup_video_id( $video ){
    $urls = array( 'https://vimeo.com/', 'http://vimeo.com/', 'https://www.youtube.com/watch?v=', 'http://www.youtube.com/watch?v=', 'https://www.youtube.com/embed/' );
    $video_id = $video;

    foreach ( $urls as $url ){
        $video_id = str_replace( $url, '', $video_id );
    }

    return $video_id;
}

/**
 * Accepts video field and cleans up url
 *
 * @param string $video
 * @return string
 */
function cleanup_video_url( $video ){
    $match = preg_match( '/(src=".*?\")/', $video, $matches );
    if ( $match ):
        $url = $matches[0];
        $url = explode( '"', $url );
        $url = $url[1];
        return $url;
    else :
        return $video;
    endif;
}

/**
 * Build Slide Videos for Homepage Slideshow
 *
 * @param string $video_url
 * @param string $video_host
 * @return string
 */
 function get_slide_video( $video_url, $video_host ){
    $video_id = cleanup_video_id( $video_url );
    $clean_url = cleanup_video_url( $video_url );
    $html = '';
    switch ( $video_host ):
        case 'other':
            $html .= '<video onloadeddata="this.play();" poster="" class="slide-video" playsinline autoplay muted loop>
                        <source src="'. $clean_url .'" type="video/mp4">
                    </video>';
            break;
        default :
            $html .= '<div id="video-'. $video_id .'" class="video-player '. $video_host .'-player slide-video" data-options="autoplay no-controls loop muted playsinline" data-video="'. $video_id .'"></div>';
    endswitch;

    return $html;
 }

/**
 * Return any acf image array url
 *
 * @param array $field
 * @param mixed $size
 * @return string
 */
 function image_arr_to_url( $field, $size = false ){

    if ( empty( $size ) ) {
        return get_template_directory_uri() . $field['url'];
    }

    return $field['sizes'][$size];

 }

/**
 * Replace Gravity Forms button classes with Bootstrap button classes.
 */
function kin_gravity_forms_btn_classes($button, $form)
{
    return str_replace('gform_button button', 'gform_button button primary', $button);
}
add_filter('gform_submit_button', 'kin_gravity_forms_btn_classes', 10, 2);
