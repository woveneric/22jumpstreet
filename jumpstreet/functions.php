<?php
add_action( 'after_setup_theme', 'blankslate_setup' );
function blankslate_setup()
{
load_theme_textdomain( 'blankslate', get_template_directory() . '/languages' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
global $content_width;
if ( ! isset( $content_width ) ) $content_width = 640;
register_nav_menus(
array( 'main-menu' => __( 'Main Menu', 'blankslate' ) )
);
}
add_action( 'wp_enqueue_scripts', 'blankslate_load_scripts' );
function blankslate_load_scripts()
{
wp_enqueue_script( 'jquery' );
}
add_action( 'comment_form_before', 'blankslate_enqueue_comment_reply_script' );
function blankslate_enqueue_comment_reply_script()
{
if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}
add_filter( 'the_title', 'blankslate_title' );
function blankslate_title( $title ) {
if ( $title == '' ) {
return '&rarr;';
} else {
return $title;
}
}
add_filter( 'wp_title', 'blankslate_filter_wp_title' );
function blankslate_filter_wp_title( $title )
{
return $title . esc_attr( get_bloginfo( 'name' ) );
}
add_action( 'widgets_init', 'blankslate_widgets_init' );
function blankslate_widgets_init()
{
register_sidebar( array (
'name' => __( 'Sidebar Widget Area', 'blankslate' ),
'id' => 'primary-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => "</li>",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
}
function blankslate_custom_pings( $comment )
{
$GLOBALS['comment'] = $comment;
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php 
}
add_filter( 'get_comments_number', 'blankslate_comments_number' );
function blankslate_comments_number( $count )
{
if ( !is_admin() ) {
global $id;
$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
return count( $comments_by_type['comment'] );
} else {
return $count;
}
}




function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );



/* -------- ADD META BOX ON ANY PAGE ID OR TEMPLATE ----- */

add_action( 'add_meta_boxes', 'my_add_custom_box' );

function my_add_custom_box($postType) {
	$types = array('post');
	if(in_array($postType, $types)){
		
		add_meta_box('myid',
				__( 'Home Page Featured Area', 'myplugin_textdomain' ),
				'callback',
				$postType);
	}
}

function get_id() {

    global $my_admin_page;
    $screen = get_current_screen();

    if ( is_admin() && ($screen->id == 'post') ) {
        global $post;
        $id = $post->ID;
//        var_dump($id);
		return $id;
    }
}


function get_title() {

    global $my_admin_page;
    $screen = get_current_screen();

    if ( is_admin() && ($screen->id == 'post') ) {
        global $post;
        $id =  get_the_title();
//        var_dump($id);
		return $id;
    }
}


add_action( 'admin_notices', 'get_id' );


function callback() {
		global $post; 

	 wp_nonce_field( 'callback', 'callback_nonce' );

		
		$settings = get_option( "ilc_theme_settings" );
		 $value0 = $settings['_feature0'];
		 $value1 = $settings['_feature1'];
		 $value2 = $settings['_feature2'];
		 $value3 = $settings['_feature3'];
		 
		?>


<input type="hidden" value="<?php echo  $value0; ?>" name="_feature0" id="_feature0" />
<input type="hidden" value="<?php echo  $value1; ?>" name="_feature1" id="_feature1" />
<input type="hidden" value="<?php echo  $value2; ?>" name="_feature2" id="_feature2" />
<input type="hidden" value="<?php echo  $value3; ?>" name="_feature3" id="_feature3" />

	<div id="meta-container">
			
			<?php // echo get_id();?>

			<script>
			
			change(<?php echo isset($_GET["post"])?$_GET["post"]:0;  ?>,0,<?php echo !empty($value0) ? $value0 : 14 ?>);
			change(<?php echo isset($_GET["post"])?$_GET["post"]:0;  ?>,1,<?php echo !empty($value1) ? $value1 : 16 ?>);
			change(<?php echo isset($_GET["post"])?$_GET["post"]:0;  ?>,2,<?php echo !empty($value2) ? $value2 : 18 ?>);
			change(<?php echo isset($_GET["post"])?$_GET["post"]:0;  ?>,3,<?php echo !empty($value3) ? $value3 : 20 ?>);
			
			function change(id,n,post) // no ';' here
{
 //   document.getElementById("test"+n).innerHTML="Hello World"+id;

		document.getElementById("_feature"+n).value	= post;
		
		var data = 'id=' + id+'&offset='+n+'&post='+post;	;
//		var data = 'id=' + id+'&post='+post;		
//alert(data);
		var path=  '<?php echo get_template_directory_uri(); ?>';
		jQuery.ajax({
			
			url: path+"/ajax.php",	
			
			//GET method is used
			type: "GET",

			//pass the data			
			data: data,		
			
			//Do not cache the page
			cache: false,
			
			//success
			success: function (html) {		
				//if process.php returned 1/true (send mail success)
//alert(html);				
			// jQuery('#test'+n).html(html);
			 document.getElementById("test"+n).innerHTML=html;			 
//				alert(html);
			}		
		});
		
		
}
			
	</script>
	
	<div class="featured-exp">1<?php echo get_title(); ?>1
	The four featured posts below are what currently show on the home page.  Click the CHANGE ME button to put THIS POST in any of the featured areas.  Once you click it, you will see the change, however it will not show on the homepage until you click the UPDATE button for the post. 
	</div>
		
			
	<div class="featured-roll one" style="display: inline-block; margin-right: 20px; width: 330px; height: 350px;">
	
	<h4 style="margin-top: 40px; border-top: 1px solid; border-bottom: 1px solid;">FEATURED AREA 1</h4>
			
			<a onclick="change(<?php echo isset($_GET["post"])?$_GET["post"]:0;  ?>,0,<?php echo get_id(); ?>)" style="background: grey; width: 200px; height: 30px; border-radius: 5px; display: block; color: #fff; text-align: center; padding: 10px 0px 0px 0px; margin-bottom: 20px; cursor: pointer;">CLICK HERE TO CHANGE ME!</a>
			
			<div id="test0" style="width: 330px; height: 350px; display: block;"></div>
			
			</div>
		
		
		
			
	<div class="featured-roll two" style="display: inline-block; margin-right: 20px; width: 330px; height: 350px;">
			
		<h4 style="margin-top: 40px; border-top: 1px solid; border-bottom: 1px solid;">FEATURED AREA 2</h4>
		
		<a onclick="change(<?php echo isset($_GET["post"])?$_GET["post"]:0;  ?>,1,<?php echo get_id(); ?>)" style="background: grey; width: 200px; height: 30px; border-radius: 5px; display: block; color: #fff; text-align: center; padding: 10px 0px 0px 0px; margin-bottom: 20px; cursor: pointer;">CLICK HERE TO CHANGE ME!</a>
			
			
			<div id="test1" style="width: 330px; height: 350px; display: block;"></div>
            			
			</div>
		
		
		
		
		
		
		
		
			
	<div class="featured-roll three" style="display: inline-block; margin-right: 20px; width: 330px; height: 350px;">
			
		<h4 style="margin-top: 40px; border-top: 1px solid; border-bottom: 1px solid;">FEATURED AREA 3</h4>
		
		<a onclick="change(<?php echo isset($_GET["post"])?$_GET["post"]:0;  ?>,2,<?php echo get_id(); ?>)" style="background: grey; width: 200px; height: 30px; border-radius: 5px; display: block; color: #fff; text-align: center; padding: 10px 0px 0px 0px; margin-bottom: 20px; cursor: pointer;">CLICK HERE TO CHANGE ME!</a>
			
			<div id="test2" style="width: 330px; height: 350px; display: block;"></div>
            					
			</div>
		
		
		
		
		
			
	<div class="featured-roll four" style="display: inline-block; margin-right: 20px; width: 330px; height: 350px;"">
			
		<h4 style="margin-top: 40px; border-top: 1px solid; border-bottom: 1px solid;">FEATURED AREA 4</h4>	
		
		<a onclick="change(<?php echo isset($_GET["post"])?$_GET["post"]:0;  ?>,3,<?php echo get_id(); ?>)" style="background: grey; width: 200px; height: 30px; border-radius: 5px; display: block; color: #fff; text-align: center; padding: 10px 0px 0px 0px; margin-bottom: 20px; cursor: pointer;">CLICK HERE TO CHANGE ME!</a>		
			
			<div id="test3" style="width: 330px; height: 350px; display: block;">CLICK HERE TO CHANGE ME!
			</div>
            			
			</div>
			
	</div>
	
				
<?php  
}
	

function save_postdata( $post_id ) {

  if ( ! isset( $_POST['callback_nonce'] ) )
    return $post_id;

  $nonce = $_POST['callback_nonce'];
  
  if ( ! wp_verify_nonce( $nonce, 'callback' ) )
      return $post_id;
	
  // Sanitize user input.
  $_feature0 = sanitize_text_field( $_POST['_feature0'] );
  $_feature1 = sanitize_text_field( $_POST['_feature1'] );
  $_feature2 = sanitize_text_field( $_POST['_feature2'] );
  $_feature3 = sanitize_text_field( $_POST['_feature3'] );      

$settings = get_option( "ilc_theme_settings" );
$settings['_feature0']	  = $_feature0;
$settings['_feature1']	  = $_feature1;
$settings['_feature2']	  = $_feature2;
$settings['_feature3']	  = $_feature3;
//  update_post_meta( $post_id, '_feature0', $_feature0 );
//  update_post_meta( $post_id, '_feature1', $_feature1 );
//  update_post_meta( $post_id, '_feature2', $_feature2 );
//  update_post_meta( $post_id, '_feature3', $_feature3 );      
	$updated = update_option( "ilc_theme_settings", $settings );
}

add_action( 'save_post', 'save_postdata' );	
	

	

/* ------------ ADD INNER PAGE SIDEBAR ------------- */

register_sidebar(array(
  'name' => __( 'Inner Page' ),
  'id' => 'sb-inner',
  'description' => __( '' ),
  'before_widget' => '<div id="%1$s" class="widget %2$s">',
  'widget_id'    => "%1$s",
  'after_widget' => '</div>',
  'before_title' => '<h3>',
  'after_title' => '</h3>'
));


/* ------------ ADD MOBILE TRAILER SIDEBAR ------------- */

register_sidebar(array(
  'name' => __( 'MOBILE TRAILER' ),
  'id' => 'mob-trailer',
  'description' => __( '' ),
  'before_widget' => '<div id="%1$s" class="widget %2$s">',
  'widget_id'    => "%1$s",
  'after_widget' => '</div>',
  'before_title' => '<h3>',
  'after_title' => '</h3>'
));


/* -------------- TRAILER WIDGET ----------- */

/**
 * CTA BUTTON WIDGET
 */
class Sep_Widget extends WP_Widget
{
	function Sep_Widget()
	{
		parent::WP_Widget( false, 'Trailer' );
	}

	function form( $instance )
	{
	
		?>
		<span>Trailer and Countdown Widget</span>
		<br><br>
		
		<?php
	}

	function update($new_instance, $old_instance )
	{
		// processes widget options to be saved
		return $new_instance;
	}

	function widget( $args, $instance )
	{

		?>
		<li class="widget sb_trailer">
		<div id="trailer-count">

	<h2>22 Jump Street Red Band Trailer</h2>
	<div class="trailer-img"><a href="http://22jumpstaging.wovencodes.com/#video"><img src="http://143.95.97.86/~jmpstg22/wp-content/themes/jumpstreet/images/video-place.jpg" class="img-responsive" /></a>
			</div>
	<div class="trailer-countdown">
	
		<h3>Want theChive to throw a raid party at your college</h3>
		
		<div class="vote-clock">
		
			<!-- MARQUEE SECTION 2 // UP NEXT COUNTDOWN -->
	<div id="next-countdown-cont" class="module">
			<!-- Refresh MASTER COUNTDOWN DIV FOR SECONDS -->
		
	<div class="vends">
	Voting <span>Ends</span>
	</div>
			
	<span class="in">in</span>
			
	<div id="countdown-right">
				
		<div id="countdown_dashboard">
			
			
			<div class="dash days_dash">
				<div class="digit">0</div>
				<div class="digit">0</div>
				<div class="dash_title">Days</div>                
			</div>

			<div class="dash hours_dash">
				<div class="digit">0</div>
				<div class="digit">0</div>
				<div class="dash_title">hrs</div>                
			</div>

			<div class="dash minutes_dash">
				<div class="digit">0</div>
				<div class="digit">0</div>
				<div class="dash_title">mins</div>                
			</div>

			<div class="dash seconds_dash">

				<div class="digit">0</div>
				<div class="digit">0</div>
				<div class="dash_title">secs</div>                
			</div>

		</div>                
			</div>


<!--- SET TIME FOR TIMER --->
	<script language="javascript" type="text/javascript">
			jQuery(document).ready(function() {
				$('#countdown_dashboard').countDown({
					targetDate: {
						'day': 		11,
						'month': 	4,
						'year': 	2014,
						'hour': 	12,
						'min': 		0,
						'sec': 		0
					}
				});
				
			});
		</script>

	</div>

<style>
#ticker-cont.testing
{
display: block;
visibility: hidden; 
position: absolute;
}
</style>
		
		</div>
		
		<div class="enter-school">
			<a href="/">Enter your school here</a>
		</div>
	
	</div>

		</li>
		<?php

	}

}
register_widget( 'Sep_Widget' );




/* -------------- POPULAR WIDGET ----------- */

/**
 * CTA BUTTON WIDGET
 */
class Sep_Widget1 extends WP_Widget
{
	function Sep_Widget1()
	{
		parent::WP_Widget( false, 'POPULAR' );
	}

	function form( $instance )
	{
	
		?>
		<span>3 MOST POPULAR POSTS</span>
		<br><br>
		
		<?php
	}

	function update($new_instance, $old_instance )
	{
		// processes widget options to be saved
		return $new_instance;
	}

	function widget( $args, $instance )
	{

		?>
		<div class="widget sb-popular">
			
			<div class="sb-title">
				<h2>POPULAR</h2>
			</div>
			 
			<?php query_posts("cat=6&showposts=3&orderby=date&order=DESC&paged=$page"); 

			 if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
			
				<article class="sb-popular-post">
					<div id="featured-img">
						<a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail($page->ID, 'full'); ?></a>
					</div>
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<p><?php echo improved_trim_excerpt(); ?></p>
					<a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
					
				</article>
				
			<?php endwhile; endif; ?> 	
			
			
			</div>
		
	
		<?php

	}

}
register_widget( 'Sep_Widget1' );




/* -------- CUSTOM EXCERPT ------- */

function improved_trim_excerpt($text) {
        global $post;
        if ( '' == $text ) {
                $text = get_the_content('');
                $text = apply_filters('the_content', $text);
                $text = str_replace('\]\]\>', ']]&gt;', $text);
                $text = preg_replace('@<script[^>]*?>.*?</script>@si', '', $text);
                $text = strip_tags($text, '<p>');
                $excerpt_length = 10;
                $words = explode(' ', $text, $excerpt_length + 1);
                if (count($words)> $excerpt_length) {
                        array_pop($words);
                        array_push($words, '[...]');
                        $text = implode(' ', $words);
                }
        }
        return $text;
}



