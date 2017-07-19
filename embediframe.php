<?php
/*
 Plugin Name: WeTickets e-ticket shop invoeger
 Plugin URI: http://wetickets.nl
 Description: Toevoegen van een eigen gratis e-ticket shop. Gebruik: <code>[wetickets [shopID]]</code>. Wilt u een eigen breedte instellen? <code>[wetickets [shopID] [breedte]]</code>
 Author: Mark van Marion
 Version: 0.1
 Author URI: http://wetickets.nl
 */


include (dirname (__FILE__).'/plugin.php');

class EmbedIframe extends EmbedIframe_Plugin
{
	function EmbedIframe ()
	{
		$this->register_plugin ('embediframe', __FILE__);
		
		$this->add_filter ('the_content');
		$this->add_action ('wp_head');
	}
	
	function wp_head ()
	{
		
	}
	
	function replace ($matches)
	{
		$tmp = strpos ($matches[1], ' ');
		if (!$tmp)
		{
						$url = $matches[1];
		}else{
			// Because the regex is such a nuisance
			$url  =  substr ($matches[1], 0, $tmp);
			$rest = substr ($matches[1], strlen ($url));
			
			$width  = 400;
			$height = 500;
			

				$parts = array_values (array_filter (explode (' ', $rest)));
				$width = $parts[0];
				
				unset ($parts[0]);
				$height = implode (' ', $parts);
				$style = 'width:'.$width.'px;height:'.$height.'';

		}
			return $this->capture ('iframe', array ('url' => $url, 'style' => $style));
		}
		
	

	function the_content ($text)
	{
	  return preg_replace_callback ("@(?:<p>\s*)?\[wetickets\s*(.*?)\](?:\s*</p>)?@", array (&$this, 'replace'), $text);
	  //return preg_replace_callback ("@(?:<p>\s*)?\[wetickets\s*(.*)\](?:\s*</p>)?@", array (&$this, 'replace'), $text);
	 // return preg_replace_callback ("@(?:<p>\s*)?\[wetickets\s*(.*?)\](?:\s*</p>)?@", array (&$this, 'replace'), $text);
	}
}

$embediframe = new EmbedIframe;
?>
