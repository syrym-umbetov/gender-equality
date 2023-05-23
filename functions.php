<?php
add_action('init', 'register_post_types');


function register_post_types()
{
    add_theme_support('post-thumbnails');

    register_post_type('main-section', array(
        'label'  => null,
        'labels' => array(
            'name'               => 'Главная', // основное название для типа записи
            'singular_name'      => 'main-section', // название для одной записи этого типа
            'add_new'            => 'Добавить Главная', // для добавления новой записи
            'add_new_item'       => 'Добавление Главная', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование Главная', // для редактирования типа записи
            'new_item'           => 'Новый Главная', // текст новой записи
            'view_item'          => 'Смотреть Главная', // для просмотра записи этого типа.
            'search_items'       => 'Искать Главная', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Главная ', // название меню
        ),
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true, // зависит от public
        'menu_position'       => null,
        'menu_icon'           => 'dashicons-products',
        'hierarchical'        => false,
        'supports'            => array('title', 'thumbnail', 'editor',),
        'taxonomies'          => array(),
        // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
    ));

    register_post_type('materials-section', array(
        'label'  => null,
        'labels' => array(
            'name'               => 'Материалы', // основное название для типа записи
            'singular_name'      => 'materials-section', // название для одной записи этого типа
            'add_new'            => 'Добавить Материалы', // для добавления новой записи
            'add_new_item'       => 'Добавление Материалы', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование Материалы', // для редактирования типа записи
            'new_item'           => 'Новый Материалы', // текст новой записи
            'view_item'          => 'Смотреть Материалы', // для просмотра записи этого типа.
            'search_items'       => 'Искать Материалы', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Материалы ', // название меню
        ),
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true, // зависит от public
        'menu_position'       => null,
        'menu_icon'           => 'dashicons-products',
        'hierarchical'        => false,
        'supports'            => array('title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'),
        'taxonomies'          => array('sport, news','elzhas'),
        // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
    ));

    register_post_type('last-section', array(
        'label'  => null,
        'labels' => array(
            'name'               => 'Последние', // основное название для типа записи
            'singular_name'      => 'last-materials-section', // название для одной записи этого типа
            'add_new'            => 'Добавить Последние', // для добавления новой записи
            'add_new_item'       => 'Добавление Последние', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование Последние', // для редактирования типа записи
            'new_item'           => 'Новый Последние', // текст новой записи
            'view_item'          => 'Смотреть Последние', // для просмотра записи этого типа.
            'search_items'       => 'Искать Последние', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Последние', // название меню
        ),
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true, // зависит от public
        'menu_position'       => null,
        'menu_icon'           => 'dashicons-products',
        'hierarchical'        => false,
        'supports'            => array('title', 'thumbnail', 'editor',),
        'taxonomies'          => array(),
        // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
    ));

    register_post_type('video', array(
        'label'  => null,
        'labels' => array(
            'name'               => 'Видео', // основное название для типа записи
            'singular_name'      => 'video', // название для одной записи этого типа
            'add_new'            => 'Добавить Видео', // для добавления новой записи
            'add_new_item'       => 'Добавление Видео', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование Видео', // для редактирования типа записи
            'new_item'           => 'Новый Видео', // текст новой записи
            'view_item'          => 'Смотреть Видео', // для просмотра записи этого типа.
            'search_items'       => 'Искать Видео', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Видео', // название меню
        ),
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true, // зависит от public
        'menu_position'       => null,
        'menu_icon'           => 'dashicons-products',
        'hierarchical'        => false,
        'supports'            => array('title', 'thumbnail', 'editor',),
        'taxonomies'          => array(),
        // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
    ));
}

add_action('init', function(){
    add_rewrite_rule( 'materials/([a-z]+)[/]?$', 'index.php?material=$matches[1]', 'top' );
});

add_filter( 'query_vars', function( $query_vars ) {
    $query_vars[] = 'material';
    return $query_vars;
} );

add_action( 'template_include', function( $template ) {
    if ( get_query_var( 'material' ) == false || get_query_var( 'material' ) == '' ) {
        return $template;
    }
 
    return get_template_directory() . '/page-materials.php';
} );

function fond1_get_fields($name)
{
    $args = array(
        'orderby'        => 'date',
        'order'          => 'ASC',
        'post_type'      => $name,
        'post_parent'    => 0,
        'posts_per_page' => 100,
        'ignore_sticky_posts' => 1,
        'no_found_rows'  => 1,
        'hierarchical'   => 0,
    );

    $blocks = [];

    foreach (get_posts($args) as $key => $post) {
        $fields = get_fields($post->ID);
    // array_push($fields, $post->ID);
        $fields['id'] = $post->ID;
        $blocks[$key] = $fields;
    }

    return $blocks;
}

function fond1_get_field_by_id($name, $id)
{
    $args = array(
        'orderby'        => 'date',
        'order'          => 'ASC',
        'post_type'      => $name,
        'post__in' => [$id],
        'post_parent'    => 0,
        'posts_per_page' => 1,
        'ignore_sticky_posts' => 1,
        'no_found_rows'  => 1,
        'hierarchical'   => 0,
    );

    $blocks = [];

    foreach (get_posts($args) as $key => $post) {
        $fields = get_fields($post->ID);

        $blocks[$key] = $fields;
    }

    return $blocks;
}

function fond1_get_field_by_category($name, $categories)
{
    $args = array(
        'orderby'        => 'date',
        'order'          => 'ASC',
        'post_type'      => $name,
        'post__in' => [$categories],
        'post_parent'    => 0,
        'posts_per_page' => 1,
        'ignore_sticky_posts' => 1,
        'no_found_rows'  => 1,
        'hierarchical'   => 0,
    );

    $blocks = [];

    foreach (get_posts($args) as $key => $post) {
        $fields = get_fields($post->ID);
        $fields['categories'] = $post->post_category;
        $blocks[$key] = $fields;
    }

    return $blocks;
}

?>

