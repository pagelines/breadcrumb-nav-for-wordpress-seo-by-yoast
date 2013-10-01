<?php
/*
	Section: Breadcrumb
	Author: Online Profiler
	Author URI: http://www.onlineprofiler.de
	Description: Built for WordPress SEO by Yoast - this section will display breadcrumb navigation for better usability and SEO benefit. It requires the installation of the plugin "WordPress SEO" by Yoast and creates a PageLines DMS section that can be placed via drag & drop.
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

		?><div style="font-size:12px;"><?php _e('Thank you for using Breadcrumb NAV for WordPress SEO by Yoast!<br />Just follow the instructions to set it up.<br />Have fun!<br /><br />This section is free but of course it took me some time to create it. If you feel like saying thank you, I would be more then happy if you could donate to <strong>"Berliner Stadtkatzen"</strong>. This project tries to help stray cats throughout Berlin to get medical treatments.<br />You might find the donation button on my site<br /><strong><a href="http://www.onlineprofiler.de/sozial/" target="_blank" title="Online Profiler | Social Projects">www.onlineprofiler.de</a></strong>.<br />Thank you!','breadcrumb-nav-for-wordpress-seo-by-yoast');?></div><?php

		return ob_get_clean();
	}

// SECTION OPTIONS

	function section_opts(){

	//WELCOME BOX

		$options[]    = array(
			'key'        => 'breadcrumb_welcome',
			'type'       => 'template',
			'title'      => __('Welcome to Breadcrumb NAV Section','breadcrumb-nav-for-wordpress-seo-by-yoast'),
			'template'   => $this->welcome()
		);
		
	
	//LINK BOXES 

		
		$options[] = array(

			'key'			=> 'set_breadcrumb',
			'type' 			=> 'multi',
			'label' 	=> __( 'Instructions', 'breadcrumb-nav-for-wordpress-seo-by-yoast' ),
			'opts'	=> array(
				array(
					'key'		=> 'set_wpseo',
					'label'		=> '<i class="icon-download "></i> Download WordPress SEO by Yoast ',
					'type' 		=> 'link',
					'classes'	=> 'btn-primary btn-block',
					'url'		=> 'http://wordpress.org/plugins/wordpress-seo/' ,
					
					'help'	 	=> __( 'Download & install the WordPress SEO Plugin', 'breadcrumb-nav-for-wordpress-seo-by-yoast' )
					
				),
				array(
					'key'		=> 'set_breadcrumb',
					'label'		=> '<i class="icon-dashboard "></i> Setup WordPress SEO Breadcrumb ',
					'type' 		=> 'link',
					'classes'	=> 'btn-primary btn-block',
					'url'		=> admin_url( 'admin.php?page=wpseo_internal-links' ),
					
					'help'	 	=> __( 'Set the breadcrumb nav options in the WordPress SEO plugin.', 'breadcrumb-nav-for-wordpress-seo-by-yoast' )
				
				),
				
			),
		);
		
		return $options;
	}

}//end 