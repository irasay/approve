<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package iWebMoscow
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	
    <div class="front-news__item" style="background: linear-gradient(45deg, rgba(0, 0, 0, 1), #0000), url(<?php echo the_post_thumbnail_url(); ?>); background-size: cover;">
        <div class="news-inner__content">
            <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
        </div>
    </div>

</article><!-- #post-<?php the_ID(); ?> -->