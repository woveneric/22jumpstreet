<?php
/**
 * Single Post Template
 *
 */
?>

<?php get_header(); ?>

<div id="mob-trailer" class="mobile trailer-widget">
	<?php dynamic_sidebar('MOBILE TRAILER'); ?>
</div>


 <div class="container single">
    
    	<div id="content_box" class="row single">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<div id="content" class="col-sm-8 single">
		
		<div  class="content-title">
		
			<h1><?php the_title(); ?>
			<div class="single-author">
<span>by <?php the_author(); ?> on <?php the_date(); ?></span>
</div>

		</div>	
		
		<div class="content-single">
		<?php the_content(); ?>
		</div>
		
<?php
endwhile; endif;

?>		
		
		</div><!-- /.blog-main -->
    	 
    	<div id="sidebar" class="col-sm-4 page-sidebar">
        	<div class="sidebar-module sidebar-module-inset">
        	
        		<?php dynamic_sidebar('inner page'); ?>
        	
        	
        		<div class="side-comp-one">
        			
        			<h2>Life at MCSC</h2>
        			<ul>
        			
        			<?php query_posts("cat=3&showposts=3&orderby=date&order=DESC"); 

			 if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        			
        			
        				<li><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></li>
			
			<?php endwhile; endif; ?>
			
        			</ul>
        		
        		</div>
        		
        		<div class="side-comp-one">
        		
        			<h2>Extracurricular</h2>
        			<ul>
        				<?php query_posts("cat=4&showposts=3&orderby=date&order=DESC"); 

			 if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        			
        			
        				<li><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></li>
			
			<?php endwhile; endif; ?>
        			</ul>
        			
        		</div>
        		
        		<div class="side-comp-one">
        		
        			<h2>Alumni</h2>
        			<ul>
        				<?php query_posts("cat=5&showposts=3&orderby=date&order=DESC"); 

			 if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        			
        			 
        				<li><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></li>
			
			<?php endwhile; endif; ?>
        			</ul>
        			
        		</div>
        	
        	
        	
        	
        	
        	</div>
    	</div> <!-- /.blog-sidebar -->
    	 
    	 
   	 </div> <!-- /.row -->
    
    </div><!-- /.container -->




<?php get_sidebar(); ?>
<?php get_footer(); ?>