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
		<div class="row">
			<div class="col-lg-12">
				<?php
				while ( have_posts() ) :
					the_post();
                    
                    $realty_images = get_field("realty_images");
                    $realty_city = get_field("realty_city");
                    $realty_area = get_field("realty_area");
                    $realty_living_area = get_field("realty_living_area");
                    $realty_floor = get_field("realty_floor");
                    $realty_address = get_field("realty_address");
                    $realty_cost = get_field("realty_cost");
                    ?>
                        
                    <div class="realty-inner">

                        <div class="item-info__city">
                            <?php echo $realty_city->post_title; ?>
                        </div>

                        <div class="realty-slider__wrap">
                            <div class="realty-slider">
                                <div class="realty-slider__img"><img src="<?php echo $realty_images['realty_images_1']['url']; ?>" alt=""></div>
                                <div class="realty-slider__img"><img src="<?php echo $realty_images['realty_images_2']['url']; ?>" alt=""></div>
                                <div class="realty-slider__img"><img src="<?php echo $realty_images['realty_images_3']['url']; ?>" alt=""></div>
                            </div>
                        </div>

                        <div class="item-info">
                            <?php 
                                $cur_terms = get_the_terms( get_the_ID(), 'realty_type' );
                                if( is_array( $cur_terms ) ){
                                    foreach( $cur_terms as $cur_term ){
                                        echo '<p><span>Тип недвижимости: </span><a href="'. get_term_link( $cur_term->term_id, $cur_term->taxonomy ) .'">'. $cur_term->name .'</a></p>';
                                    }
                                }
                            ?>
                            <p><span>Площадь:</span> <?php echo $realty_area; ?></p>
                            <p><span>Жилая площадь:</span> <?php echo $realty_living_area; ?></p>
                            <p><span>Этажность:</span> <?php echo $realty_floor; ?></p>
                            <p><span>Адрес объекта:</span> <?php echo $realty_address; ?></p>
                            <p><span>Стоимость:</span> <?php echo $realty_cost; ?></p>
                        </div>
                        
                    </div>
        

				<?php endwhile;
				?>
			</div>
		</div>
	</div>

<?php
get_sidebar();
get_footer();
