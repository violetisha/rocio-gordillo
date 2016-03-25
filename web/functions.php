<?php


/*-----------------------------------------------------------------------------------*/
/*  Locale
/*-----------------------------------------------------------------------------------*/

add_action('after_setup_theme', 'my_theme_setup');
function my_theme_setup(){
    load_theme_textdomain('rocio-theme', get_template_directory() . '/languages');
}

/*-----------------------------------------------------------------------------------*/
/*	Custom Excerpt
/*-----------------------------------------------------------------------------------*/

//Replace Excerpt Link

add_filter('excerpt_more', 'new_excerpt_more');
function new_excerpt_more($more) {
       global $post;
	return '...';
}

//custom excerpts
function excerpt($limit) {
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt)>=$limit) {
		array_pop($excerpt);
		$excerpt = implode(" ",$excerpt).'...';
	} else {
		$excerpt = implode(" ",$excerpt);
	}
	$excerpt = preg_replace('`[[^]]*]`','',$excerpt);
	return $excerpt;
}

/*-----------------------------------------------------------------------------------*/
/*	Navigation Menu
/*-----------------------------------------------------------------------------------*/

function register_menu() {
  register_nav_menu('navigation-front',__( 'Navigation Front' ));
  register_nav_menu('navigation-main',__( 'Navigation Main' ));
}
add_action( 'init', 'register_menu' );


/*-----------------------------------------------------------------------------------*/
/* Featured Images
/*-----------------------------------------------------------------------------------*/

if ( function_exists( 'add_theme_support' ) ) {  
	add_theme_support( 'post-thumbnails' );  
}




/*-----------------------------------------------------------------------------------*/
/* Custom Galery
/*-----------------------------------------------------------------------------------*/
add_filter('post_gallery', 'my_post_gallery', 10, 2);
function my_post_gallery($output, $attr) {
    global $post;

    if (isset($attr['orderby'])) {
        $attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
        if (!$attr['orderby'])
            unset($attr['orderby']);
    }

    extract(shortcode_atts(array(
        'order' => 'ASC',
        'orderby' => 'menu_order ID',
        'id' => $post->ID,
        'itemtag' => 'dl',
        'icontag' => 'dt',
        'captiontag' => 'dd',
        'columns' => 3,
        'size' => 'thumbnail',
        'include' => '',
        'exclude' => ''
    ), $attr));

    $id = intval($id);
    if ('RAND' == $order) $orderby = 'none';

    if (!empty($include)) {
        $include = preg_replace('/[^0-9,]+/', '', $include);
        $_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));

        $attachments = array();
        foreach ($_attachments as $key => $val) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    }

    if (empty($attachments)) return '';

    // Here's your actual output, you may customize it to your need
    $output = "<div class='grid'>\n";

    // Now you loop through each attachment
    foreach ($attachments as $id => $attachment) {
        // Fetch the thumbnail (or full image, it's up to you)
		// $img = wp_get_attachment_image_src($id, 'full');
		// $img = wp_get_attachment_image_src($id, 'my-custom-image-size');
        $img = wp_get_attachment_image_src($id, 'full');
        $img_fullsize = wp_get_attachment_image_src($id, 'full');

        $caption = $attachment->post_excerpt;

        // Alt and Title
        //$thumb_img = get_post( get_post_thumbnail_id() );
        //$img_alt = $thumb_img->post_excerpt;

       // $output .= "<div class='item-portafolio'>\n";
        $output .= "<a class='image-link item-portafolio' title='$caption' href=\"{$img_fullsize[0]}\">\n";
        $output .= "<img src=\"{$img[0]}\" width=\"{$img[1]}\" height=\"{$img[2]}\" alt='$caption' />\n";
        $output .= "</a>\n";
        //$output .= "</div>\n";
    }

    $output .= "</div>\n";

    return $output;
}


/*-----------------------------------------------------------------------------------*/
/* Single Category
/*-----------------------------------------------------------------------------------*/
add_filter('single_template', create_function(
    '$the_template',
    'foreach( (array) get_the_category() as $cat ) {
        if ( file_exists(TEMPLATEPATH . "/single-{$cat->slug}.php") )
        return TEMPLATEPATH . "/single-{$cat->slug}.php"; }
    return $the_template;' )
);



/*-----------------------------------------------------------------------------------*/
/* Custom Style Admin Area
/*-----------------------------------------------------------------------------------*/

add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
  echo '<style>
  	.wp-list-table .lang-es_mx {
  		background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAALCAYAAAB24g05AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNSBNYWNpbnRvc2giIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6MzFBNTJFNUFFQkJDMTFFMkE1OERENThCODYzNzJDNTQiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6MzFBNTJFNUJFQkJDMTFFMkE1OERENThCODYzNzJDNTQiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo5N0EzMjc3NUVCQkIxMUUyQTU4REQ1OEI4NjM3MkM1NCIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo5N0EzMjc3NkVCQkIxMUUyQTU4REQ1OEI4NjM3MkM1NCIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PtEZoEcAAAFqSURBVHjafJG/SgNBEMa/zeViYuDEk9ikTCMoCqnUXvvYWPgMlpaib2DvI1jEyhewFCIoKlqI0YARIZpc4rl/srvunbB3CdGBZWd2Zn878y0BUKrVD94xZvXa4Uj8urU9XoLy6cl81uxFqSVWShX8Z7mlxXgnBNAaYFfXUViMAI6QEn0e4oP2/wSI5xfrO/4stBCxGwHABEePfSEwK22Sc0g6QM7zoYLAnhPHwZCx2I8BlNH49cB0oaP+jPUFxdnRLloPF9jZO4bq9hKyKeGUJoBvyvCEN9NBaGvuby7BBx0gr3B7d45Ks2lzGc8DdTJpQIiMOwWllS3qhC9o+QtwCh5kqQytkpweClCuUiOYDtyiawDaFq1XNzFTmINUBNXlVbTVfkrRodFNJIBonqyeBkkJ6BV8rFU3kgOSZCOdKE+JyI3aeaNM7vdTJhpxXdgXzKgsBeBKKnQf2yMXGo3GSNzqfk7i8h8BBgDdUqYvGHFIHQAAAABJRU5ErkJggg==") no-repeat 0% center;
  		text-indent: -9999px;
  	}
   
  </style>';
}


?>