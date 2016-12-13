{!!Html::script('js/jquery.min.js')!!}
@extends('layouts.sidebar')
@section('content')
	<ul>
		<li>
			<a href="#" id="tab1" class="tabs"> Tab 1</a>
			<a href="#" id="tab2" class="tabs"> Tab 2</a>
		</li>
	</ul>
	<h1 id="title"></h1>
	<div id="content"></div>
	<script>
	$(function() {
		$(".tabs").on("click", function(e) {
			e.preventDefault();
			var tab = $(this).attr("id");
			var title = $(this).html();
			$("#content").html("loading...");
			$.get(tab, function(data) {
				$("#title").html(title);
				$("#content").html(data);
			});
		});
	});
	</script>
@stop