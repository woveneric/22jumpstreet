<?php 
include '../../../wp-load.php';


$id=$_GET["id"];  // Current Page iD
$offset=$_GET["offset"]; // working DIV id 
$post=$_GET["post"]; // POST_ID
//update_post_meta( $id, '_feature'.$offset, $post );

if ($offset=='0')
{
?>
				<?php //query_posts("cat=6&showposts=1&offset=0&orderby=date&order=DESC&paged=$page&p=$offset"); 
				query_posts( "p=$post" );
//				query_posts( "p=14" );				

			 if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
			
				<article class="blog-post col-sm-6">
					<div id="featured-img">
						<a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail($page->ID, 'full'); ?></a>
					</div>
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<p><?php the_excerpt(); ?></p>
					<a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
					
				</article>
			<?php endwhile; endif; ?> 

<?php 
} else

if ($offset=='1')
{
?>
				<?php //query_posts("cat=6&showposts=1&offset=0&orderby=date&order=DESC&paged=$page&p=$offset"); 
				query_posts( "p=$post" );			
//				query_posts( "p=16" );							

			 if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
			
				<article class="blog-post col-sm-6">
					<div id="featured-img">
						<a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail($page->ID, 'full'); ?></a>
					</div>
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<p><?php the_excerpt(); ?></p>
					<a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
					
				</article>
			<?php endwhile; endif; ?> 

<?php 
} else
if ($offset=='2')
{
?>
				<?php //query_posts("cat=6&showposts=1&offset=0&orderby=date&order=DESC&paged=$page&p=$offset"); 
				query_posts( "p=$post");
//				query_posts( "p=18" );											

			 if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
			
				<article class="blog-post col-sm-6">
					<div id="featured-img">
						<a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail($page->ID, 'full'); ?></a>
					</div>
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<p><?php the_excerpt(); ?></p>
					<a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
					
				</article>
			<?php endwhile; endif; ?> 

<?php 
} else
if ($offset=='3')
{
?>
				<?php //query_posts("cat=6&showposts=1&offset=0&orderby=date&order=DESC&paged=$page&p=$offset"); 
				query_posts( "p=$post");
//				query_posts( "p=20" );							

			 if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
			
				<article class="blog-post col-sm-6">
					<div id="featured-img">
						<a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail($page->ID, 'full'); ?></a>
					</div>
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<p><?php the_excerpt(); ?></p>
					<a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
					
				</article>
			<?php endwhile; endif; ?> 

<?php 
}

wp_reset_query();
?>