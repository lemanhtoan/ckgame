@extends('layouts.default')
@section('content')
	<div class="jumbotron">
		<h1>Play game</h1>
	</div>
	<form action="play" method="post">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label for="">Game Name:</label>
				<select name="name" id="name" class="form-control" required>
					<option value=""></option>
					@if (count($data) > 0)
						@foreach ($data as $item)
							<option value="{!! $item->id !!}">{!! $item->name !!}</option>
						@endforeach
					@endif
				</select>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<h4 class="name-game"></h4>
			<?php for ( $i = 0; $i < 100; $i++ ) :?>
				<div class="item-check">
					<input type="checkbox" name="itemCheck" value="<?php echo $i; ?>">
					<label	class="lbl-item"><?php if ($i < 10) { echo '0'.$i;} else { echo $i; }?></label>
				</div>
			<?php endfor; ?>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label for="">Price set:</label>
				<input type="number" max="" min="" name="value"  class="form-control"/>
			</div>
		</div>
	</div>

	<input type="submit" name="play" class="btn btn-success" value ="Play"/>
	</form>
	<script>
		jQuery(document).ready(function($){
			$('#name').change(function() {
				var select = $("#name option:selected").val();
				$('.name-game').text($("#name option:selected").text());
				var data = '<?php echo json_encode($data); ?>';
				console.log(data);
				console.log(select);
			});
		});
	</script>
@stop
