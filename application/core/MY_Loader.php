<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * MY_Loader Class
 *
 * @author Drew Harvey (http://www.daharveyjr.com/)
 * 
 * This class extends the CI_Loader class, and adds tiles functionality.
 */
class MY_Loader extends CI_Loader {

	protected $_tilesets = array();
        

	function __construct() {
		parent::__construct();
		$this->_tilesets = array(
                         
			 'admin'=>array(
                                'frame' => 'pages'.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'common'.DIRECTORY_SEPARATOR.'frame_admin.php', 
				'header' => 'pages'.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'common'.DIRECTORY_SEPARATOR.'header_admin.php',
				'sidebar' => 'pages'.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'common'.DIRECTORY_SEPARATOR.'sidemenu_admin.php',
                                'import_top_custom'=>'pages'.DIRECTORY_SEPARATOR.'common'.DIRECTORY_SEPARATOR.'empty.php',
                                'import_botton_custom'=>'pages'.DIRECTORY_SEPARATOR.'common'.DIRECTORY_SEPARATOR.'empty.php',
                                'footer' => 'pages'.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'common'.DIRECTORY_SEPARATOR.'footer_admin',
                                'import_bottom' => 'pages'.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'common'.DIRECTORY_SEPARATOR.'bottomImport.php',
                                'import_top' => 'pages'.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'common'.DIRECTORY_SEPARATOR.'topimport.php'
                        
                        ),
                    'public'=>array(
                        
                        'frame' => 'pages'.DIRECTORY_SEPARATOR.'common'.DIRECTORY_SEPARATOR.'publicframe.php',
                        'import_top' => 'pages'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'import'.DIRECTORY_SEPARATOR.'top_import.php',
                        'import_top_custom'=>'pages'.DIRECTORY_SEPARATOR.'common'.DIRECTORY_SEPARATOR.'empty.php',
                        'header' => 'pages'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'import'.DIRECTORY_SEPARATOR.'header.php',
                        //'import_top' => 'pages'.DIRECTORY_SEPARATOR.'common'.DIRECTORY_SEPARATOR.'empty.php',
                        'sidebar' => 'pages'.DIRECTORY_SEPARATOR.'common'.DIRECTORY_SEPARATOR.'empty.php',
                        'footer' => 'pages'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'import'.DIRECTORY_SEPARATOR.'footer',
                        'import_bottom' => 'pages'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'import'.DIRECTORY_SEPARATOR.'bottom_import',
                        'import_botton_custom'=>'pages'.DIRECTORY_SEPARATOR.'common'.DIRECTORY_SEPARATOR.'empty.php'
                                
                        
                        )
		);
	}
        
        
        function pageLoadBy($frameset,$pagePath, $dataToPage){
           
            
            
            
            $this->tile($frameset, 'frame', $pagePath, $dataToPage);

        }

        
      
        
        
        
	/**
	 * Load Tile
	 *
	 * This function is used to load a "tile" file.  It has three parameters:
	 *
	 * 1. The name of the "tile" file to be included.
	 * 2. An associative array of data to be extracted for use in the tile.
	 *
	 * @access	public
	 * @param	string
	 * @param	array
	 * @return	void
	 */
	function tile($tileset, $basepage, $view, $vars = array(), $return_flag = false) {

		$data = $vars;
                
               // printv($data,'MY_Load.php','RED');
               
		// Get CI instance
		$CI =& get_instance();
		//$vars['error_string'] = validation_errors();
		//$vars['flash_message'] = $CI->session->flashdata('flash_message');
		unset($CI);
		
		// Meta Checks
		//$vars['meta_keywords'] = (!empty($vars['meta_keywords'])) ? $vars['meta_keywords'] : '';
		//$vars['meta_description'] = (!empty($vars['meta_description'])) ? $vars['meta_description'] : '';
		
		// Create Response & Tile
		if (!isset($vars['title'])) {
			$data['title'] = "Ignite Reviews";
		} else {
			$data['title'] = $vars['title'];
		}

		

       
                if (!isset($vars['import_top'])) {
			$data['import_top'] = $this->view($this->_tilesets[$tileset]['import_top'], $vars, true);
		} else {
			$data['import_top'] = $this->view($vars['import_top'], $vars, true);
		}
                
                if (!isset($vars['import_bottom'])) {
			$data['import_bottom'] = $this->view($this->_tilesets[$tileset]['import_bottom'], $vars, true);
		} else {
			$data['import_bottom'] = $this->view($vars['import_bottom'], $vars, true);
		}
                
                
                
                if (!isset($vars['import_top_custom'])) {
			$data['import_top_custom'] = $this->view($this->_tilesets[$tileset]['import_top_custom'], $vars, true);
		} else {
			$data['import_top_custom'] = $this->view($vars['import_top_custom'], $vars, true);
		}
                
                 if (!isset($vars['import_botton_custom'])) {
			$data['import_botton_custom'] = $this->view($this->_tilesets[$tileset]['import_botton_custom'], $vars, true);
		} else {
			$data['import_botton_custom'] = $this->view($vars['import_botton_custom'], $vars, true);
		}
       
       
		if (!isset($vars['header'])) {
			$vars['header'] = $this->view($this->_tilesets[$tileset]['header'], $vars, true);
		} else {
			$data['header'] = $this->view($vars['header'], $vars, true);
		}

		if (!isset($vars['footer'])) {
			$data['footer'] = $this->view($this->_tilesets[$tileset]['footer'], $vars, true);
		} else {
			$data['footer'] = $this->view($vars['footer'], $vars, true);
		}

		if (!isset($vars['sidebar'])) {
			$vars['sidebar'] = $this->view($this->_tilesets[$tileset]['sidebar'], $vars, true);
		} else {
			$data['sidebar'] = $this->view($vars['sidebar'], $vars, true);
		}
		
		$data['content'] = $this->view($view, $vars, true);
               
                //print_r($data);

		return $this->view($this->_tilesets[$tileset][$basepage], $data, $return_flag);

	}

}

/* End of file MY_Loader.php */