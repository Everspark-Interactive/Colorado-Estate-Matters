<?php 

function current_year(){
	return date('Y');
}
add_shortcode( 'year', 'current_year' );

function testimonials_slider(){

	$args = array(
		'post_type' => 'testimonials',
		'posts_per_page' => -1,
	);

	$testimonials = get_posts( $args );

	ob_start();

	?>
	<div class="testimonials-slider">
		<?php foreach ($testimonials as $testimonial): ?>
			<div class="test-item">
				<?php echo $testimonial->post_content ?>
			</div>
		<?php endforeach ?>
	</div>
	<?php

	return ob_get_clean();

}
add_shortcode( 'testimonial-slider', 'testimonials_slider' );


function my_acf_init() {
  
  acf_update_setting('google_api_key', get_field('gmaps_key','option'));
}

add_action('acf/init', 'my_acf_init');

function load_maps_library() {
	add_action('wp_footer', function() { ?>
<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo get_field('gmaps_key', 'option'); ?>&callback=load_maps" async defer></script>
<?php }, 50);
}
