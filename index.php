<?php get_header(); ?>
<?php $flag = 0 ?>

<?php if (have_posts()) : ?>
<div id="post-grid" class="post-grid">
    <?php while (have_posts()) : the_post(); ?>

    <div id="post-<?php the_ID(); ?>" <?php post_class('grid-item'); ?>>
    <?php if (has_post_thumbnail()) { ?>
        <div class="gridly-image featured-image"><a
                href="<?php the_permalink() ?>"><?php the_post_thumbnail('large');  ?></a></div>
        <?php } ?>
        <?php if (get('featured_video', TRUE)) {
        $youtube = get('featured_video');
        echo '<div class="featured-video preview" data-youtube="'. $youtube .'" data-title="'.the_title('','',false).'" style="background-image:url(http://img.youtube.com/vi/' . $youtube . '/hqdefault.jpg)"><div class="play"></div></div>';
    } else {
            } ?>

        <div class="gridly-copy"><h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
            <?php 
            /*the_excerpt(); */
            $excerpt = strip_tags(get_the_excerpt());
            echo $excerpt;
            ?>

            <p class="gridly-date"><a href="<?php the_permalink() ?>"><?php the_time(get_option('date_format')); ?></a>
             </p>
        </div>
    </div>
        <?php if ($flag == 0) {
        $flag = 1;
        ?>
            <div class="grid-item" id="meetup">
                <div class="past_event">
                    <h3><a href="#" target="_blank">Last meetup</a></h3>
                    <time></time>
                </div>
                <div class="next_event">
                    <h3><a href="#" target="_blank">Upcoming</a></h3>
                    <time></time>
                    <a id="join" href="#" target="_blank">Join</a>
                    <small>20 seats left</small>
                </div>
            </div>
        <?php }?>
    <?php endwhile; ?>
</div>
<hr>
<?php else : ?>
<?php endif; ?>

<?php next_posts_link('<p class="view-older">View Older Entries</p>') ?>

<!-- ### this is footer -->
<?php get_footer(); ?>
