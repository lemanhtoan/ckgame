@extends('layouts.default')
@section('content')
    <h2>HOME PAGE HERE</h2>
    <?php 
	// $url = 'http://www.investing.com/indices/nq-100-futures/';
	// $content = file_get_contents($url);
	// $first_step = explode( '<div id="http://www.investing.com/indices/nq-100-futures">' , $content );
	// $second_step = explode("</div>" , $first_step[1] );

	// echo "<pre>";
	// var_dump($second_step);

	$curl_handle=curl_init();
    curl_setopt($curl_handle, CURLOPT_URL,'http://www.investing.com/indices/us-spx-500-futures/');
    curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Your application name');
    $query = curl_exec($curl_handle);
    
    echo getHTMLByID('last_last', $query);
    curl_close($curl_handle);

    function getHTMLByID($id, $html) {
	    $dom = new DOMDocument;
	    libxml_use_internal_errors(true);
	    $dom->loadHTML($html);
	    $node = $dom->getElementById($id);
	    if ($node) {
	        return $dom->saveXML($node);
	    }
	    return FALSE;
	}

    ?>
    
@stop