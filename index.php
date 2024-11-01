<?php
/*
Plugin Name: SpinRewriter
Plugin URI: http://www.spinrewriter.com/?ref=d4d7
Description: Spin articles directly from WordPress using the SpinRewriter API.  The SpinRewriter plugin grabs content directly from your wordpress post or page, and spins the content. The SpinRewriter plugin is compatible with WooCommerce products. SpinRewriter will create tons of high quality ENL semantically spun content in seconds. It will intelligently spin words, phrases, sentences and paragraphs and it will create SEO-optimized phrases, sentences and paragraphs for best results. It will also semantically spin and export multiple SEO-optimized articles with 1 click. You need to purchase the API key. 
Author: Milos Bejda
Version: 1.3
Author URI: http://www.bejda.com
*/

$plugin_path = dirname(__FILE__).'/';
if(class_exists('SanityPluginFramework') != true)
    require_once($plugin_path.'framework/sanity.php');

if(isset($_REQUEST['spinrewriter_api']) && !empty($_REQUEST['spinrewriter_api']))
{
	$api = $_REQUEST['spinrewriter_api'];
	update_option('spinrewriter_api',$api);
}
if(isset($_REQUEST['spinrewriter_email']) && !empty($_REQUEST['spinrewriter_email']))
{
	$email = $_REQUEST['spinrewriter_email'];
	update_option('spinrewriter_email',$email);
}


class spinRewriter extends SanityPluginFramework {
	
	var $version = '1.0';
	var $endpoint = 'http://www.spinrewriter.com/action/api';
	public $data;
	        var $admin_css = array('bootstrap','style');
	        var $admin_js = array('script');
	            var $ajax_actions = array('admin' => array('call'));
	function __construct() {
      parent::__construct(__FILE__);
 

  }
	function activate() {
		
	}
	
	function initialize() {
		add_action('admin_menu', array(&$this, 'add_options_page'));
		add_action( 'add_meta_boxes', array($this,'add_meta_box')); 
	     
    $temp_email = get_option('spinrewriter_email',false);
   
    $temp_api   = get_option('spinrewriter_api',false);
     if($temp_email == false)
      {
      	add_option( 'spinrewriter_email', 'not set' );
      }
       if($temp_api == false)
      {
      	add_option( 'spinrewriter_api', 'not set' );
      } 
      $this->data['email'] = get_option('spinrewriter_email');
      $this->data['api'] = get_option('spinrewriter_api');

         
	}
	function add_options_page () {
		add_options_page('SpinRewriter','Spin Rewriter','manage_options','spin_rewriter',array($this, 'render_page'));
	}
	function  render_page () {

	echo $this->render('settings');

	}
	function add_meta_box()
	{
	add_meta_box( 'Spin-Rewriter', 'Spin Rewriter', array(&$this,'render_meta_box'), 'post', 'side', 'high' );  
		add_meta_box( 'Spin-Rewriter', 'Spin Rewriter ', array(&$this,'render_meta_box'), 'page', 'side', 'high' );  
		
		if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    		add_meta_box( 'Spin-Rewriter', 'Spin Rewriter ', array(&$this,'render_meta_box'), 'product', 'side', 'high' );  

}


	
	}
	function render_meta_box()
	{
		
	echo $this->render('meta');

	}
	 function call() {
	 	$query;
        $data = isset($_REQUEST['data']) ? $_REQUEST['data'] : false;
        if($data == false)
        {
        echo json_encode(array('status'=>'ERROR','response'=>'Text didnt go through'));	
        	
        }
        
        foreach($data as $key=>$v)
        {
        	$value = $data[$key];
        	if($value['name'] == "spinrewriter_action")
        	{
                $query['action'] = $value['value'];
		
        	}else{
        $query[$value['name']] = $value['value'];
        	}
        	
        }
        $query['email_address'] = $this->data['email'];
        $query['api_key'] = $this->data['api'];

        
        	$data_raw = "";
		foreach ($query as $key => $value){
			$data_raw = $data_raw . $key . "=" . urlencode($value) . "&";
		}

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->endpoint);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_raw);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$response = trim(curl_exec($ch));
		curl_close($ch);
	
        
        
        echo $response;
        exit();
    }
	
}

// Initalize the your plugin
$spinRewriter = new spinRewriter();

// Add an activation hook
register_activation_hook(__FILE__, array(&$spinRewriter, 'activate'));

add_action('init', array(&$spinRewriter, 'initialize'));

?>