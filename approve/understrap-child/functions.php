<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();
    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );

add_action ('wp_enqueue_scripts', 'enqueue_parent_styles');
    function enqueue_parent_styles () {
    wp_enqueue_style ('parent-style', get_template_directory_uri (). '/style.css');
}

/**
 * Enqueue scripts and styles.
 */
function theme_scripts() {

	// Jquery
	wp_enqueue_script( 'jquery-js', get_stylesheet_directory_uri() . '/libs/jquery/jquery.js', array(), '20151215', true );

	// Bootstrap
  wp_enqueue_style( 'bootstrap-reboot-css', get_stylesheet_directory_uri() . '/libs/bootstrap/bootstrap-reboot.css' );
  wp_enqueue_style( 'bootstrap-grid-css', get_stylesheet_directory_uri() . '/libs/bootstrap/bootstrap-grid.min.css' );
  wp_enqueue_style( 'bootstrap-css', get_stylesheet_directory_uri() . '/libs/bootstrap/bootstrap.min.css' );
  wp_enqueue_script( 'bootstrap-js', get_stylesheet_directory_uri() . '/libs/bootstrap/bootstrap.min.js', array(), '20151215', true );

  // Slick Slider
  wp_enqueue_style( 'slick-theme-css', get_stylesheet_directory_uri() . '/libs/slick/slick-theme.css' );
  wp_enqueue_style( 'slick-css', get_stylesheet_directory_uri() . '/libs/slick/slick.css' );
  wp_enqueue_script( 'slick-js', get_stylesheet_directory_uri() . '/libs/slick/slick.min.js', array(), '20151215', true );

  // FontAwesome 5
  wp_enqueue_style( 'fontawesome-css', get_stylesheet_directory_uri() . '/libs/fontawesome/css/all.min.css' );
  wp_enqueue_script( 'fontawesome-js', get_stylesheet_directory_uri() . '/libs/fontawesome/js/all.min.js', array(), '20151215', true );

  // Animate.css
  wp_enqueue_style( 'animate-css', get_stylesheet_directory_uri() . '/libs/animate/animate.css' );

  // Input Mask
  wp_enqueue_script( 'inputMask-js', get_stylesheet_directory_uri() . '/libs/inputMask/jquery.inputmask.min.js', array(), '20151215', true );

  // Barba
  wp_enqueue_script( 'barba-js', get_stylesheet_directory_uri() . '/libs/barba/barba.umd.js', array(), '20151215', true );

  // Свои подключаемые стили
  wp_enqueue_style( 'theme-style', get_stylesheet_uri() );
  wp_enqueue_script( 'main-js', get_stylesheet_directory_uri() . '/libs/main/main.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );


add_action( 'init', 'true_register_post_type_init' ); 
 
function true_register_post_type_init() {
	$labels = array(
		'name' => 'Объекты недвижимости',
		'singular_name' => 'Объект', 
		'add_new' => 'Добавить объект',
		'add_new_item' => 'Добавить новый объект',
		'edit_item' => 'Редактировать объект',
		'new_item' => 'Новый объект',
		'all_items' => 'Все объекты',
		'view_item' => 'Просмотр объекта на сайте',
		'search_items' => 'Искать объект',
		'not_found' =>  'Объектов не найдено.',
		'not_found_in_trash' => 'В корзине нет объектов.',
		'menu_name' => 'Недвижимость' 
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_ui' => true, // показывать интерфейс в админке
		'has_archive' => true, 
		'menu_icon' => get_stylesheet_directory_uri() .'/img/list.png', // иконка в меню
		'menu_position' => 21, // порядок в меню
		'supports' => array( 'title', 'editor', 'comments', 'author', 'thumbnail')
	);
    register_post_type('realty', $args);
    
    $labels = array(
		'name' => 'Города и области',
		'singular_name' => 'Город', // админ панель Добавить->Функцию
		'add_new' => 'Добавить город или область',
		'add_new_item' => 'Добавить новый город', // заголовок тега <title>
		'edit_item' => 'Редактировать город',
		'new_item' => 'Новый город',
		'all_items' => 'Все города',
		'view_item' => 'Просмотр города на сайте',
		'search_items' => 'Искать город',
		'not_found' =>  'Городов не найдено.',
		'not_found_in_trash' => 'В корзине нет городов.',
		'menu_name' => 'База городов' // ссылка в меню в админке
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_ui' => true, // показывать интерфейс в админке
		'has_archive' => true, 
		'menu_icon' => get_stylesheet_directory_uri() .'/img/list-cities.png', // иконка в меню
		'menu_position' => 21, // порядок в меню
		'supports' => array( 'title', 'editor', 'comments', 'author', 'thumbnail')
	);
	register_post_type('cities', $args);
}

function add_new_taxonomy_realty_type() {
 
    $labels = array(
       'name' => _x( 'Тип недвижимости', 'Taxonomy plural name', 'text-domain' ),
       'singular_name' => _x( 'Тип', 'Taxonomy singular name', 'text-domain' ),
       'search_items' => __( 'Найти тип', 'text-domain' ),
       'popular_items' => __( 'Популярные типы', 'text-domain' ),
       'all_items' => __( 'Все типы', 'text-domain' ),
       'parent_item' => __( 'Родительский тип', 'text-domain' ),
       'parent_item_colon' => __( 'Родительский тип:', 'text-domain' ),
       'edit_item' => __( 'Редактировать тип', 'text-domain' ),
       'update_item' => __( 'Обновить тип', 'text-domain' ),
       'add_new_item' => __( 'Добавить тип', 'text-domain' ),
       'new_item_name' => __( 'Создать тип', 'text-domain' ),
       'add_or_remove_items' => __( 'Добавить', 'text-domain' ),
       'choose_from_most_used' => __( 'Редактировать', 'text-domain' ),
       'menu_name' => __( 'Тип недвижимости', 'text-domain' ),
    );
  
    $args = array(
       'labels' => $labels,
       'public' => true,
       'show_in_nav_menus' => true,
       'show_admin_column' => false,
       'hierarchical' => true,
       'show_tagcloud' => true,
       'show_ui' => true,
       'query_var' => true,
       'rewrite' => true,
       'capabilities' => array(),
    );
  
    register_taxonomy(
       'realty_type',
       array( 'realty' ),
       $args
    );
 }
  
add_action( 'init', 'add_new_taxonomy_realty_type' );

