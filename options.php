<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 * 
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_theme_data(STYLESHEETPATH . '/style.css');
	$themename = $themename['Name'];
	$themename = preg_replace("/\W/", "", strtolower($themename) );
	
	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);
	
	// echo $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *  
 */

function optionsframework_options() {

	$themesPath = dirname(__FILE__) . '/admin/themes';
	
	// Insert default option
	$theList['default'] = OPTIONS_FRAMEWORK_DIRECTORY . '/themes/default-thumbnail-100x60.png';
	
	if ($handle = opendir( $themesPath )) {
	    while (false !== ($file = readdir($handle)))
	    {
	        if ($file != "." && $file != ".." && strtolower(substr($file, strrpos($file, '.') + 1)) == 'css')
	        {
	        	$name = substr($file, 0, strlen($file) - 4);
				$thumb = OPTIONS_FRAMEWORK_DIRECTORY . '/themes/' . $name . '-thumbnail-100x60.png';
				$theList[$name] = $thumb;
	        }
	    }
	    closedir($handle);
	}
	
	//print_r($theList);
	
	// fixed or scroll position
	$fixed_scroll = array("fixed" => "Fixed","scroll" => "Scroll");
	
	// Multicheck Defaults
	$multicheck_defaults = array("one" => "1","five" => "1");
	
	// Background Defaults
	$background_defaults = array('color' => '', 'image' => '', 'repeat' => 'repeat','position' => 'top center','attachment'=>'scroll');
	
	// Pull all the categories into an array
	$options_categories = array();  
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
    	$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Pull all the pages into an array
	$options_pages = array();  
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
    	$options_pages[$page->ID] = $page->post_title;
	}
		
	// If using image radio buttons, define a directory path
	$imagepath =  get_bloginfo('stylesheet_directory') . '/images/';
		
	$options = array();
	
	return $options;
}

add_action('admin_head', 'wpbs_javascript');

function wpbs_javascript() {
?>
<script type="text/javascript" >
jQuery(document).ready(function($) {

	var data = {
		action: 'wpbs_theme_check',
	};

	// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
	jQuery('#check-bootswatch').click( function(){ 
		jQuery.post(ajaxurl, data, function(response) {
			alert(response);
		});
	});
});
</script>
<?php
}

add_action('wp_ajax_wpbs_theme_check', 'wpbs_refresh_themes');

function wpbs_refresh_themes() {
	// this gets the xml feed from thomas park
	$xml_feed_url = 'http://feeds.pinboard.in/rss/u:thomaspark/t:bootswatch/';
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $xml_feed_url);
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$xml = curl_exec($ch);
	curl_close($ch);
	
	$feed = new SimpleXmlElement($xml, LIBXML_NOCDATA);	
	
    $cnt = count($feed->item);
    
    // go through each item found
    for($i=0; $i<$cnt; $i++)
    {
		$url 	= $feed->item[$i]->link;
		$title 	= strtolower($feed->item[$i]->title);
		$desc = $feed->item[$i]->description;
		
		// retrieve the contents of the css file
		$css_url = $url;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $css_url);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$css_contents = curl_exec($ch);
		curl_close($ch);
		
		$thumb_url_prefix = 'http://bootswatch.com/';
		$thumb_url = $thumb_url_prefix . $title . '/thumbnail.png';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $thumb_url);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$thumb_contents = curl_exec($ch);
		curl_close($ch);
		
		// create the file using the title of the item and then close it
		$template_path = get_template_directory();
		$filenameCSS = $template_path . '/admin/themes/' . $title . '.css';
		$filehandle = fopen($filenameCSS, 'w') or die("can't open file - " . $filenameCSS);
		fwrite($filehandle, $css_contents);
		fclose($filehandle);
		
		$filenameThumb = $template_path . '/admin/themes/' .$title . '-thumbnail.png';
		$filehandle = fopen($filenameThumb, 'w') or die("can't open file - " . $filenameThumb);
		fwrite($filehandle, $thumb_contents);
		fclose($filehandle);
		// resize thumb
		$destDirectory = substr( $filenameThumb, 0, strlen( $filenameThumb-14 ) );
		image_resize( $filenameThumb, 100, 60, true, '', $destDirectory, 100 );
		
    }
    
	echo "Themes refreshed.";

	die(); // this is required to return a proper result
}


?>