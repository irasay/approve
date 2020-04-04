<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package iWebMoscow
 */

?>

<div class="container not-found">
	<div class="row">
		<div class="col-lg-12">
			<h2 class="not-found-title">К сожалению, по вашему запросу ничего не найдено.</h2>
			
			<p style="font-weight: bold;">Возможно, вы искали:</p>
			
			<?php 
			
			$args = array(
            	'depth'        => 0,
            	'show_date'    => '',
            	'date_format'  => get_option('date_format'),
            	'child_of'     => 0,
            	'exclude'      => '',
            	'exclude_tree' => '',
            	'include'      => '',
            	'title_li'     => __(''),
            	'echo'         => 1,
            	'authors'      => '',
            	'sort_column'  => 'menu_order',
            	'sort_order'   => 'ASC',
            	'link_before'  => '',
            	'link_after'   => '',
            	'meta_key'     => '',
            	'meta_value'   => '',
            	'number'       => '',
            	'offset'       => '',
            	'walker'       => '',
            	'post_type'    => 'page', // из функции get_pages()
            ); 
            
            wp_list_pages( $args );
            
            ?>

		</div>
	</div>
</div>
