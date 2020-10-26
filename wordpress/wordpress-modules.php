<?php
/**
 * Display author avatar on hero page
 */
function lh_page_hero_gravatar() {
    ob_start();
    global $post;
    $author_id = $post->post_author;
    ?>
    <div class="page-hero-gravatar">
        <?php echo get_avatar( $author_id ); ?>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode( 'page_hero_gravatar','lh_page_hero_gravatar' );





/**
 * Show the “Updated” Post Date in Header Element
 */
function post_modified_date() {
	ob_start();
    global $post;	
	
		$date = get_the_modified_date();
		$time = get_post_modified_time('G', true, $post);
		
		$mytime = time() - $time ;
		
		if($mytime > 0 && $mytime < 7*24*60*60) {
		  $mytimestamp1 = sprintf(__('%s ago'), human_time_diff($time));
		  echo $mytimestamp1;}
		else
		{	
		  $mytimestamp = date(get_option('date_format'), strtotime($date));
	      echo $mytimestamp . ' ' . do_shortcode('[currentyear]');}
	
    return ob_get_clean();
}
add_shortcode( 'modified_date', 'post_modified_date' );

?>