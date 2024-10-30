<?php

/**

Plugin Name: Cryptocurrency Mining Pools 
Plugin URI: https://howtocreateapressrelease.com/
Description: Displays a list of cryptocurrency mining pools in your WordPress sidebar or any widget area of your wordpress blog.
Version: 1.0 
Author: How To Create A Press Release
Author URI: https://howtocreateapressrelease.com
License: GPL-2.0+
License URI: http://www.gnu.org/licenses/gpl-2.0.txt

Displays a list of cryptocurrency mining pools in your WordPress sidebar or any widget area of your wordpress blog. 

**/

# Exit if accessed directly
if (!defined("ABSPATH"))
{
	exit;
}

# Constant

/**
 * Exec Mode
 **/
define("CRYPTOMP_EXEC",true);

/**
 * Plugin Base File
 **/
define("CRYPTOMP_PATH",dirname(__FILE__));

/**
 * Plugin Base Directory
 **/
define("CRYPTOMP_DIR",basename(CRYPTOMP_PATH));

/**
 * Plugin Base URL
 **/
define("CRYPTOMP_URL",plugins_url("/",__FILE__));

/**
 * Plugin Version
 **/
define("CRYPTOMP_VERSION","1.0"); 

/**
 * Debug Mode
 **/
define("CRYPTOMP_DEBUG",false);  //change false for distribution



/**
 * Base Class Plugin
 * @author cryptocurrencymarketcapital
 *
 * @access public
 * @version 1.0
 * @package Cryptocurrency Mining Pools
 *
 **/

class CryptocurrencyMiningPools
{

	/**
	 * Instance of a class
	 * @access public
	 * @return void
	 **/

	function __construct()
	{
		add_action("plugins_loaded", array($this, "cryptomp_textdomain")); //load language/textdomain
		
		add_action("widgets_init", array($this, "cryptomp_widget_mining_pools_init")); //init widget
		add_action("after_setup_theme", array($this, "cryptomp_image_size")); // register image size.
		add_filter("image_size_names_choose", array($this, "cryptomp_image_sizes_choose")); // image size choose.
		add_action("init", array($this, "cryptomp_register_taxonomy")); // register register_taxonomy.
		
	}



	/**
	 * Register new widget (mining_pools)
	 *
	 * @access public
	 * @return void
	 **/
	public function cryptomp_widget_mining_pools_init()
	{
		if(file_exists(CRYPTOMP_PATH . "/includes/widget.mining_pools.inc.php")){
			require_once(CRYPTOMP_PATH . "/includes/widget.mining_pools.inc.php");
			register_widget("MiningPools_Widget");
		}
	}


	/**
	 * Register a new image size.
	 * @link http://codex.wordpress.org/Function_Reference/add_image_size
	 * @access public
	 * @return void
	 **/
	public function cryptomp_image_size()
	{
	}


	/**
	 * Choose a image size.
	 * @access public
	 * @param mixed $sizes
	 * @return void
	 **/
	public function cryptomp_image_sizes_choose($sizes)
	{
		$custom_sizes = array(
		);
		return array_merge($sizes,$custom_sizes);
	}


	/**
	 * Register Taxonomies
	 * @https://codex.wordpress.org/Taxonomies
	 * @access public
	 * @return void
	 **/
	public function cryptomp_register_taxonomy()
	{
	}


	
	
}


new CryptocurrencyMiningPools();
