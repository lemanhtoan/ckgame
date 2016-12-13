<?php 
	//helper file

	//navigation active router
	/**
	* Set active router page
	*
	* @param string $url
	* @return string
	*/
	function set_active($url)
	{
		return Request::is($url) ? 'active' : '';
	}

?>