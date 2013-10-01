<?php
/*
	Section: Breadcrumb
	Author: Online Profiler
	Author URI: http://www.onlineprofiler.de
	Description: Build for WordPress SEO by Yoast - this section will display a breadcrumb navigation for better usability and SEO benefits. It requires the installation of the plugin "WordPress SEO" by Yoast and creates within PageLines DMS a section, that can be placed via drag & drop wherever you need it.
	Class Name: WordPressSEOBreadcrumb
	Demo:
	Version: 1.0
	Filter: nav
	v3: true
*/

class WordPressSEOBreadcrumb extends PageLinesSection {

	const version = '1.0'; //first version


// RUNS IN <HEAD> 

	function section_head() {		
	}

	
// SECTION MARKUP	
	function section_template() {
		if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb('<p id="breadcrumbs">','</p>');
			}
	}	
	

// WELCOME

	function welcome(){

		ob_start();

		?><div style="font-size:12px;"><?php _e('Thank you for using Breadcrumb NAV for WordPress SEO!<br />Just follow the instruction to set it up.<br /><br /><strong>INSTRUCTIONS</strong><br />1. STEP: <br />Download & install the WordPress SEO Plugin.<br />2. STEP: <br />Define the settings for the Breadcrumb. <br />(Please find all necessary links attached.)<br />Now you can place the section "Breadcrumb NAV" via drag & drop wherever you need it!<br /><br />Have fun!<br /><br />This section is free but of course it took me some time to create it. If you feel like saying thank you, I would be more then happy if you could donate to <strong>"Berliner Stadtkatzen"</strong>. This project tries to help stray cats throughout Berlin to get medical treatments.<br />You might find the donation button on my site<br /><strong><a href="http://www.onlineprofiler.de/sozial/" target="_blank" title="Online Profiler | Social Projects">www.onlineprofiler.de</a></strong>.<br /><br />Thank you!','wordpress-seo-breadcrumb');?></div><?php

		return ob_get_clean();
	}

// SECTION OPTIONS

	function section_opts(){

	//WELCOME BOX

		$options[]    = array(
			'key'        => 'breadcrumb_welcome',
			'type'       => 'template',
			'title'      => __('Welcome to Breadcrumb NAV Section','wordpress-seo-breadcrumb'),
			'template'   => $this->welcome()
		);
		
	
	//LINK BOXES 

		$options[]   = array(
			'key'		=> 'set_breadcrumb',
			'label'		=> '<i class="icon-download "></i> Download WordPress SEO by Yoast ',
			'type' 		=> 'link',
			'classes'	=> 'btn-primary btn-block',
			'url'		=> 'http://wordpress.org/plugins/wordpress-seo/' ,
			'title' 	=> __( '1.STEP: Download & install WordPress SEO Plugin', 'wordpress-seo-breadcrumb' ),
		);
		
		$options[]   = array(
			'key'		=> 'set_breadcrumb',
			'label'		=> '<i class="icon-dashboard "></i> Setup WordPress SEO Breadcrumb ',
			'type' 		=> 'link',
			'classes'	=> 'btn-primary btn-block',
			'url'		=> admin_url( 'admin.php?page=wpseo_internal-links' ),
			'title' 	=> __( '2.STEP: Setup WordPress SEO Breadcrumb', 'wordpress-seo-breadcrumb' ),
		);
		
		return $options;
	}

}//end 