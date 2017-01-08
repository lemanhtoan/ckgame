@extends('layouts.default')
@section('content')
    <p class="head"><img src="<?php echo url('/').'/public/image/slider1.jpg';?>"/></p>
    @if(Session::has('message'))
        <div class="alert alert-info">
            {!! Session::get('message') !!}
        </div>
    @endif
    @if(Session::has('error'))
        <div class="alert alert-danger">
            {!! Session::get('error') !!}
        </div>
    @endif
    <h2>HOME PAGE HERE</h2>
    <?php 
//	$curl_handleUS500 = curl_init();
//	/*
//	http://www.investing.com/indices/us-spx-500-futures/
//	http://www.investing.com/indices/nq-100-futures/
//	http://www.investing.com/indices/us-30/
//	http://www.investing.com/indices/volatility-s-p-500/
//	http://www.investing.com/indices/germany-30/
//	http://www.investing.com/indices/japan-ni225/
//	*/
//
//    curl_setopt($curl_handleUS500, CURLOPT_URL,'http://www.investing.com/indices/us-spx-500-futures/');
//    curl_setopt($curl_handleUS500, CURLOPT_CONNECTTIMEOUT, 2);
//    curl_setopt($curl_handleUS500, CURLOPT_RETURNTRANSFER, 1);
//    curl_setopt($curl_handleUS500, CURLOPT_USERAGENT, 'CKGame');
//    $eqUS500 = curl_exec($curl_handleUS500);
//
//    function getHTMLByID($id, $html) {
//	    $dom = new DOMDocument;
//	    libxml_use_internal_errors(true);
//	    $dom->loadHTML($html);
//	    $node = $dom->getElementById($id);
//	    if ($node) {
//	        return $node->nodeValue;//saveXML($node);
//	    }
//	    return FALSE;
//	}

    ?>
    <h3>S&P 500 Futures: <?php //$number = explode(".", getHTMLByID('last_last', $eqUS500)); echo $number[1] , ' --- ', getHTMLByID('last_last', $eqUS500); ?></h3>
@stop