<meta charset="utf-8">
<meta name="description" content="">
<meta name="author" content="ToanLM">
<title>Laravel 5.1 tranning</title>
{{-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> --}}

{!! Html::style('css/bootstrap.min.css') !!}
{!! Html::style('css/style.css') !!}
{!! Html::script('ckeditor/ckeditor.js') !!}
<!--add maps-->
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script>
	function initialize() {
	  var mapProp = {
	    center:new google.maps.LatLng(21.031109, 105.839968),
	    zoom:8,
	    mapTypeId:google.maps.MapTypeId.ROADMAP
	  };
	  var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
	}
	google.maps.event.addDomListener(window, 'load', initialize);
</script>