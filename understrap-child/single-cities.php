<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
*/

get_header();
?>

	<div class="container">
    <h2 class="section-title">Последние объекты недвижимости:</h2>
		<div class="row">
			<div class="col-lg-12">
				<?php
				while ( have_posts() ) :
                    the_post();
                    
                    $cities_realty = get_field('cities_realty');

                    if( $cities_realty ): ?>
                        <ul>
                        <?php foreach( $cities_realty as $post): // variable must be called $post (IMPORTANT) ?>
                            <?php setup_postdata($post); ?>
                            <li>
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </li>
                        <?php endforeach; ?>
                        </ul>
                        <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                    <?php endif;
                ?>
                    
				<?php endwhile;
				?>
			</div>
		</div>
	</div>

<?php
get_sidebar();
get_footer();
