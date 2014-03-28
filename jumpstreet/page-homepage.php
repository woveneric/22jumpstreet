<?php
/**
 * Template Name: Homepage
 *
 */
?>


<?php get_header(); ?>

 <div class="container">
    
		<div class="row">
		<div id="slider" class="col-md-12">
			
			 <div class="device">
				
				<a class="arrow-left" href="#"></a> 
    			<a class="arrow-right" href="#"></a>
    			
    			<div class="swiper-container">
      				<div class="swiper-wrapper">
       					
       					<div class="swiper-slide">
          					<div class="content-slide">
           						<p class="title">Open Enrollment begins april 11th</p>
            					<div class="slider-img col-sm-6">
            					<img src="http://143.95.97.86/~jmpstg22/wp-content/themes/jumpstreet/images/slider-place.jpg" class="img-responsive" />
          						</div>
          					</div>
    					</div>
    					
    					<div class="swiper-slide">
          					<div class="content-slide">
           						<p class="title">Open Enrollment begins april 11th</p>
           						<div class="slider-img col-sm-6">
            					<img src="http://143.95.97.86/~jmpstg22/wp-content/themes/jumpstreet/images/slider-place.jpg" class="img-responsive" />
          						</div>
          					</div>
    					</div>
      				
      				</div>
   				<div class="pagination"></div>
   				</div>
    
    			
  
  			</div>
  
  <script>
  var mySwiper = new Swiper('.swiper-container',{
    pagination: '.pagination',
    loop:true,
    grabCursor: true,
    paginationClickable: true
  })
  $('.arrow-left').on('click', function(e){
    e.preventDefault()
    mySwiper.swipePrev()
  })
  $('.arrow-right').on('click', function(e){
    e.preventDefault()
    mySwiper.swipeNext()
  })
  </script>
		
		</div>
		
	
	</div>


    	<div id="content_box" class="row">

		<div id="content" class="col-sm-8 blog-main">
		<a name="video"></a>
			<div id="video">
			
				<h2>22 Jump Street Red Band Trailer</h2>
				<img src="http://143.95.97.86/~jmpstg22/wp-content/themes/jumpstreet/images/video-place.jpg" class="img-responsive" />
			
			</div>
		
			<div id="blog-roll">
			
			<?php //query_posts("cat=6&showposts=1&orderby=date&order=DESC&paged=$page"); 

//			 if ( have_posts() ) : while ( have_posts() ) : the_post(); 
			 
		$settings = get_option( "ilc_theme_settings" );
		 $value0 = $settings['_feature0'];
		 $value1 = $settings['_feature1'];
		 $value2 = $settings['_feature2'];
		 $value3 = $settings['_feature3'];
	 
 ?>
			<?php //endwhile; endif; 
			
//wp_reset_query();
?>
<?php 
			 query_posts( "p=$value0");
			 if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
            			
            
			
				<article class="blog-post col-sm-6">
					<div id="featured-img">
						<a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail($page->ID, 'full'); ?></a>
					</div>
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<p><?php the_excerpt(); ?></p>
					<a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
					
				</article>
				
			<?php endwhile; endif; wp_reset_query(); ?> 	

<?php 		 query_posts( "p=$value1");
			 if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
            			
            
			
				<article class="blog-post col-sm-6">
					<div id="featured-img">
						<a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail($page->ID, 'full'); ?></a>
					</div>
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<p><?php the_excerpt(); ?></p>
					<a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
					
				</article>
				
			<?php endwhile; endif; wp_reset_query();?> 	
            

<?php 		 query_posts( "p=$value2");
			 if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
            			
            
			
				<article class="blog-post col-sm-6">
					<div id="featured-img">
						<a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail($page->ID, 'full'); ?></a>
					</div>
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<p><?php the_excerpt(); ?></p>
					<a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
					
				</article>
				
			<?php endwhile; endif; wp_reset_query();?> 	
            
<?php 		 query_posts( "p=$value3");
			 if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
            			
            
			
				<article class="blog-post col-sm-6">
					<div id="featured-img">
						<a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail($page->ID, 'full'); ?></a>
					</div>
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<p><?php the_excerpt(); ?></p>
					<a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
					
				</article>
				
			<?php endwhile; endif; wp_reset_query();?> 	
            
			
			
			</div>
		
		
		
		
		</div><!-- /.blog-main -->
    	 
    	<div id="sidebar" class="col-sm-4 blog-sidebar">
        	<div class="sidebar-module sidebar-module-inset">
        	
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