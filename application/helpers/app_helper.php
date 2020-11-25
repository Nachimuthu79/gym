<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function get_current_url()
{
	
	return ($_SERVER['QUERY_STRING']) ? current_url().'?'.$_SERVER['QUERY_STRING'] : current_url();

}


?>
