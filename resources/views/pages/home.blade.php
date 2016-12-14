@extends('layouts.default')
@section('content')
    <h2>HOME PAGE HERE</h2>
    <?php 
	$curl_handleUS500 = $curl_handleNQ100 = $curl_handleUS30 = $curl_handleVOL500 = $curl_handleGER30 = $curl_handleJAP225 = curl_init();
	/*
	http://www.investing.com/indices/us-spx-500-futures/
	http://www.investing.com/indices/nq-100-futures/
	http://www.investing.com/indices/us-30/
	http://www.investing.com/indices/volatility-s-p-500/
	http://www.investing.com/indices/germany-30/
	http://www.investing.com/indices/japan-ni225/
	*/

    curl_setopt($curl_handleUS500, CURLOPT_URL,'http://www.investing.com/indices/us-spx-500-futures/');
    curl_setopt($curl_handleUS500, CURLOPT_CONNECTTIMEOUT, 2);
    curl_setopt($curl_handleUS500, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl_handleUS500, CURLOPT_USERAGENT, 'CKGame');
    $eqUS500 = curl_exec($curl_handleUS500);
    //curl_close($curl_handleUS500);

    curl_setopt($curl_handleNQ100, CURLOPT_URL,'http://www.investing.com/indices/nq-100-futures/');
    curl_setopt($curl_handleNQ100, CURLOPT_CONNECTTIMEOUT, 2);
    curl_setopt($curl_handleNQ100, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl_handleNQ100, CURLOPT_USERAGENT, 'CKGame');
    $NQ100 = curl_exec($curl_handleNQ100);
    //curl_close($curl_handleNQ100);

    curl_setopt($curl_handleUS30, CURLOPT_URL,'http://www.investing.com/indices/us-30/');
    curl_setopt($curl_handleUS30, CURLOPT_CONNECTTIMEOUT, 2);
    curl_setopt($curl_handleUS30, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl_handleUS30, CURLOPT_USERAGENT, 'CKGame');
    $US30 = curl_exec($curl_handleUS30);

    curl_setopt($curl_handleVOL500, CURLOPT_URL,'http://www.investing.com/indices/volatility-s-p-500/');
    curl_setopt($curl_handleVOL500, CURLOPT_CONNECTTIMEOUT, 2);
    curl_setopt($curl_handleVOL500, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl_handleVOL500, CURLOPT_USERAGENT, 'CKGame');
    $VOL500 = curl_exec($curl_handleVOL500);

    curl_setopt($curl_handleGER30, CURLOPT_URL,'http://www.investing.com/indices/germany-30/');
    curl_setopt($curl_handleGER30, CURLOPT_CONNECTTIMEOUT, 2);
    curl_setopt($curl_handleGER30, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl_handleGER30, CURLOPT_USERAGENT, 'CKGame');
    $GER30 = curl_exec($curl_handleGER30);

    curl_setopt($curl_handleJAP225, CURLOPT_URL,'http://www.investing.com/indices/japan-ni225/');
    curl_setopt($curl_handleJAP225, CURLOPT_CONNECTTIMEOUT, 2);
    curl_setopt($curl_handleJAP225, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl_handleJAP225, CURLOPT_USERAGENT, 'CKGame');
    $JAP225 = curl_exec($curl_handleJAP225);

    function getHTMLByID($id, $html) {
	    $dom = new DOMDocument;
	    libxml_use_internal_errors(true);
	    $dom->loadHTML($html);
	    $node = $dom->getElementById($id);
	    if ($node) {
	        return $node->nodeValue;//saveXML($node);
	    }
	    return FALSE;
	}

    ?>
    <h3>S&P 500 Futures: <?php $number = explode(".", getHTMLByID('last_last', $eqUS500)); echo $number[1] , ' --- ', getHTMLByID('last_last', $eqUS500); ?></h3>
    <h3>Nasdaq 100 Futures: <?php $number = explode(".", getHTMLByID('last_last', $NQ100)); echo $number[1] , ' --- ', getHTMLByID('last_last', $NQ100); ?></h3>
    <h3>Dow Jones Industrial Average (DJI): <?php $number = explode(".", getHTMLByID('last_last', $US30)); echo $number[1] , ' --- ', getHTMLByID('last_last', $US30); ?></h3>
    <h3>CBOE Volatility Index (VIX): <?php $number = explode(".", getHTMLByID('last_last', $VOL500)); echo $number[1] , ' --- ', getHTMLByID('last_last', $VOL500); ?></h3>
    <h3>DAX (GDAXI): <?php $number = explode(".", getHTMLByID('last_last', $GER30)); echo $number[1] , ' --- ', getHTMLByID('last_last', $GER30); ?></h3>
    <h3>Nikkei 225 (N225): <?php $number = explode(".", getHTMLByID('last_last', $JAP225)); echo $number[1] , ' --- ', getHTMLByID('last_last', $JAP225); ?></h3>
    
@stop