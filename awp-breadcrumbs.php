<?php
	
	/*
	Plugin Name: Хлібні Крихти Навігація AWP
	Description: Description
	Plugin URI: http://#
	Author: AWP
	Author URI: http://#
	Version: 1.0
	License: GPL2
	Text Domain: Text Domain
	Domain Path: Domain Path
	*/
	
	add_filter('wp_title','awp_title', 20);

	function awp_title ($title)
	{
		$title = null;

		$sep = ' -> ';
		$site = get_bloginfo('name');

		if(is_home() || is_front_page() )
		{
			$title = array($site);
		}
		
		elseif ( is_page() )
		{
			$title = array( get_the_title() , $site);
		}

		elseif ( is_tag() )
		{
			$title = array( single_tag_title('Мітка : ', false), $site);
		}

		elseif (is_search()) {
			$title = array('Результат пошуку: '.get_search_query());
		}

		elseif ( is_404() )
		{
			$title = array('Сторінка не існує');
		}

		elseif (is_archive()) 
		{
			$title = array('Архів за :'. get_the_time("F Y"),$site);
		}
		


		$title = implode($sep , $title);
		return $title;

	}
?>