<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <h1><?php the_title(); ?></h1>
         <div class="single-post-wrapper container large-container" >

   		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php if ( has_post_thumbnail() ) { ?>
				<div class="featured-image post-header"><?php the_post_thumbnail( 'original' );  ?></div>
             <?php } ?>
               <?php if (get('featured_video', TRUE)) {
                        $id = get('featured_video');
                       echo '<div class="featured-video post-header"><iframe src="http://www.youtube.com/embed/'.$id.'?rel=0&showinfo=0&controls=1" frameborder="0"></iframe></div>';
                   } else {
                           } ?>

       			<div class="gridly-copy">
           		 <?php the_content(); ?>
                 <p><?php the_tags(); ?> | Posted: <a href="<?php the_permalink() ?>"><?php the_time(get_option('date_format')); ?></a></p>
                <div class="clear"></div>
				<?php comments_template(); ?>
                </div>




       </div>
         </div>
		<?php endwhile; endif; ?>

<!--       <div class="post-nav">-->
<!--               <div class="post-prev">--><?php //previous_post_link('%link'); ?><!-- </div>-->
<!--			   <div class="post-next">--><?php //next_post_link('%link'); ?><!--</div>-->
<!--        </div>      -->

<!-- ### this is footer -->
<?php get_footer(); ?>
