<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package iWebMoscow
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	
    <div class="front-news__item" style="background: linear-gradient(45deg, rgba(0, 0, 0, 1), #0000), url(<?php echo the_post_thumbnail_url(); ?>); background-size: cover;">
        <div class="news-inner__content">
            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            <div class="inner-news__item-date"><?php the_date() ?></div>
            <div class="inner-news__item-category"><?php the_category() ?></div>
        </div>
    </div>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Страницы:', 'iweb-moscow' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
