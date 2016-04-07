<?php


// 	Theme Supports

	add_theme_support( 'post-thumbnails' );
	add_editor_style('css/wysiwyg.css');


	add_action( 'wp_before_admin_bar_render', 'wpse200296_before_admin_bar_render' );
	function wpse200296_before_admin_bar_render(){
		global $wp_admin_bar;
		$wp_admin_bar->remove_menu('customize');
	}




//	Image Compression

	function custom_theme_setup() {
		add_theme_support( 'advanced-image-compression' );
	}
	add_action( 'after_setup_theme', 'custom_theme_setup' );




/*
 *  ACF - Options
 */

	if( function_exists('acf_add_options_page') ) {
		acf_add_options_page(array(
			'page_title' 	=> 'Opciones Generales',
			'menu_title'	=> 'Opciones',
			'menu_slug' 	=> 'theme-general-settings',
			'capability'	=> 'edit_posts',
			'redirect'		=> false
		));
		acf_add_options_sub_page(array(
			'page_title' 	=> 'Opciones de Menus',
			'menu_title'	=> 'Menus',
			'parent_slug'	=> 'theme-general-settings'
		));
		acf_add_options_sub_page(array(
			'page_title' 	=> 'Detalles de Lenguaje',
			'menu_title'	=> 'Lenguaje',
			'parent_slug'	=> 'theme-general-settings'
		));
	}




/*
 *	HEX 2 rgba
 */

function hex2rgba($color, $opacity = false) {

	$default = 'rgb(0,0,0)';

	//Return default if no color provided
	if(empty($color))
          return $default;

	//Sanitize $color if "#" is provided
        if ($color[0] == '#' ) {
        	$color = substr( $color, 1 );
        }

        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
                return $default;
        }

        //Convert hexadec to rgb
        $rgb =  array_map('hexdec', $hex);

        //Check if opacity is set(rgba or rgb)
        if($opacity){
        	if(abs($opacity) > 1)
        		$opacity = 1.0;
        	$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
        	$output = 'rgb('.implode(",",$rgb).')';
        }

        //Return rgb(a) color string
        return $output;
}




/*
 *	Pager
 */

function pagination($pages = '', $range = 4) {
	$showitems = ($range * 2)+1;

	global $paged;
	if(empty($paged)) $paged = 1;

	if($pages == '') {
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if(!$pages) {
			$pages = 1;
		}
	}

	if(1 != $pages) {
		echo "<div class=\"pagination wrap\">";
		if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; </a>";
		if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; </a>";

		for ($i=1; $i <= $pages; $i++) {
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
				echo ($paged == $i)? "<a href='#' class=\"current\">".$i."</a>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
			}
		}

		if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\"> &rsaquo;</a>";
		if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'> &raquo;</a>";
		echo "</div>\n";
	}
}









/*
 *  WYSIWYG Combobox styles
 */

	function wpa_45815($arr){
		$arr['block_formats'] = 'Paragraph=p;Heading 1=h1;Heading 2=h2;Heading 3=h3';
		return $arr;
	}
	add_filter('tiny_mce_before_init', 'wpa_45815');





/*
 *	Legalize Date repeater field
 */

	function my_posts_where( $where ) {
		$where = str_replace("meta_key = 'days_%_date", "meta_key LIKE 'days_%_date", $where);
		$where = str_replace("meta_key = 'dates_%_start-day", "meta_key LIKE 'dates_%_start-day", $where);
		$where = str_replace("meta_key = 'dates_%_end-day", "meta_key LIKE 'dates_%_end-day", $where);
		return $where;
	}
	add_filter('posts_where', 'my_posts_where');
