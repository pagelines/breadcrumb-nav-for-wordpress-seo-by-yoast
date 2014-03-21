<?php
/*
	Section: Breadcrumb
	Author: Online Profiler
	Author URI: http://www.onlineprofiler.de
	Description: <strong>Use it with DMS2</strong><br />Built for WordPress SEO by Yoast - this section will display breadcrumb navigation for better usability and SEO benefit. It requires the installation of the plugin "WordPress SEO" by Yoast and creates a PageLines DMS section that can be placed via drag & drop.<br />Find all Versions of Breadcrumb on <a href="http://www.onlineprofiler.de/technik/neues-dms-section-breadcrumb-nav/" target="_blank">www.onlineprofiler.de</a>
	Class Name: WordPressSEOBreadcrumb
	Demo:
	Version: 1.2
	Filter: nav
	Loading: active
	Cloning: true
	v3: true
*/

class WordPressSEOBreadcrumb extends PageLinesSection {

	const version = '1.2'; 


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

		?><div style="font-size:12px;"><?php _e('<strong>Version: 1.2 Please use it only with DMS 2!</strong><br />Thank you for using Breadcrumb NAV for WordPress SEO by Yoast!<br />Just follow the instructions to set it up.<br />Have fun! <br /><br /> If you might need older Breadcrumb Versions, please find them on my website <br /><a href="http://www.onlineprofiler.de/technik/neues-dms-section-breadcrumb-nav/" target="_blank" alt="Online Profiler | Breadcrumb">&rarr; All Versions of the Breadcumb section on www.onlineprofiler.de</a><br /><br />Thank you! ','breadcrumb-nav-for-wordpress-seo-by-yoast');?></div><?php

		return ob_get_clean();
	}

// SECTION OPTIONS

	function section_opts(){

	//WELCOME BOX

		$options[]    = array(
			'key'        => 'breadcrumb_welcome',
			'type'       => 'template',
			'col'	     =>  1,
			'title'      => __('Welcome to Breadcrumb NAV Section','breadcrumb-nav-for-wordpress-seo-by-yoast'),
			'template'   => $this->welcome()
		);
		
	
	//LINK BOXES 

		
		$options[] = array(

			'key'			=> 'set_breadcrumb',
			'type' 			=> 'multi',
			'col'			=> 2,
			'label' 	=> __( 'Instructions', 'breadcrumb-nav-for-wordpress-seo-by-yoast' ),
			'opts'	=> array(
				array(
					'key'		=> 'set_wpseo',
					'label'		=> '<i class="fa fa-download"></i> Download WordPress SEO by Yoast ',
					'type' 		=> 'link',
					'classes'	=> 'btn-primary btn-block',
					'url'		=> 'http://wordpress.org/plugins/wordpress-seo/' ,
					
					'help'	 	=> __( 'Download & install the WordPress SEO Plugin', 'breadcrumb-nav-for-wordpress-seo-by-yoast' )
					
				),
				array(
					'key'		=> 'set_breadcrumb',
					'label'		=> '<i class="fa fa-dashboard"></i> Setup WordPress SEO Breadcrumb ',
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