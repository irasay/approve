<?php
/*
    Template Name: Главная страница
*/

get_header();
?>

<section class="cities">
    <div class="container">
        <h2 class="section-title"><i class="fas fa-city"></i> Выберите город</h2> 
        <div class="row">
            <?php $cities = new WP_Query(array('post_type' => 'cities', 'posts_per_page' => -1, 'order' => 'ASC')); ?>
            <?php if ( $cities->have_posts() ) : while ( $cities->have_posts() ) : $cities->the_post(); ?>
            
                <div class="col-lg-4">
                    <a class="border-none item item__city" href="<?php the_permalink(); ?>" style="background: linear-gradient(to top right, rgba(0, 0, 0, .5), rgba(0, 0, 0, .8)), url(<?php echo get_the_post_thumbnail_url( $cities->ID ); ?>); background-position: center;
                            background-size: cover;">
                        <h3><?php the_title(); ?></h3>
                    </a>
                </div>
            
                <?php endwhile; ?>
            <?php endif; ?>
        </div>      
    </div>   
</section>

<section class="realty">
    <div class="container">
        <h2 class="section-title"><i class="fas fa-stream"></i> Последние объекты недвижимости</h2>
        <div class="row">

        <?php $realty = new WP_Query(array('post_type' => 'realty', 'posts_per_page' => 9, 'orderby' => 'id', 'order' => 'ASC')); ?>
        <?php 
            if ( $realty->have_posts() ) : while ( $realty->have_posts() ) : 
                $realty->the_post(); 
                $realty_city = get_field("realty_city");
                $realty_area = get_field("realty_area");
                $realty_living_area = get_field("realty_living_area");
                $realty_floor = get_field("realty_floor");
                $realty_address = get_field("realty_address");
                $realty_cost = get_field("realty_cost");
        ?>
            
            <div class="col-lg-4">
                <a class="border-none item item__realty" href="<?php the_permalink(); ?>" style="background: linear-gradient(to top right, rgba(0, 0, 0, .5), rgba(0, 0, 0, .8)), url(<?php echo get_the_post_thumbnail_url( $realty->ID ); ?>); background-position: center;
                        background-size: cover;"> 
                    <h3><?php the_title(); ?></h3>
                    <div class="item-info">
                        <p><span>Площадь:</span> <?php echo $realty_area; ?></p>
                        <p><span>Жилая площадь:</span> <?php echo $realty_living_area; ?></p>
                        <p><span>Этажность:</span> <?php echo $realty_floor; ?></p>
                        <p><span>Адрес объекта:</span> <?php echo $realty_address; ?></p>
                        <p><span>Стоимость:</span> <?php echo $realty_cost; ?></p>
                    </div>
                    <div class="item-info__city">
                        <?php echo $realty_city->post_title; ?>
                    </div>
                </a>
            </div>
        
            <?php endwhile; ?>
        <?php endif; ?>

        </div>
    </div>
</section>

<?php
get_sidebar();
get_footer();
