@extends('layouts.default')
@section('content')
	<div class="jumbotron">
		<h1>Play game - <?php echo $item->name;?></h1>
		@if(Session::has('message'))
			<div class="alert alert-info">
				{!! Session::get('message') !!}
			</div>
		@endif
	</div>
	<form action="play" method="post">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" name="gameId" value="{{ $item->id }}">
		<div class="row">
			<div class="col-md-12">
				<h4 class="name-game"><?php echo $item->name;?></h4>
				<?php for ( $i = 0; $i < 100; $i++ ) :?>
					<div class="item-check">
						<input id="chb<?php echo $i;?>" class="chb" type="checkbox" name="itemCheck[]" value="<?php echo $i; ?>">
						<label	class="lbl-item"><?php if ($i < 10) { echo '0'.$i;} else { echo $i; }?></label>
						<input style="display: none;" id="inp<?php echo $i;?>"  name="valueInp[]"   type="number" max="<?php echo $item->max_price; ?>" min="<?php echo $item->min_price; ?>" class="form-control input-number" step="1" pattern="\d*"/>
					</div>
				<?php endfor; ?>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<p class="game-description"><?php echo $item->description; ?></p>
			</div>
		</div>

		<input type="submit" name="play" class="btn btn-success" id="playSubmit" value ="Play"/>
	</form>
	<script type="text/javascript">
		jQuery(document).ready(function($){
			$(".chb").change(function() {
				if(this.checked) {
					var i =  $(this).attr('id').split('chb')[1];
					$('#inp' + i).attr('required', '').show();
				} else {
					var i =  $(this).attr('id').split('chb')[1];
					$('#inp' + i).removeAttr('required');
					$('#inp' + i).hide();
				}
			});
			$('#playSubmit').click(function(event) {
//				var valueCheck = "";
//				var priceSet = $('input[name="value"]').val();
//				var totalNumber = $('input[name="itemCheck"]:checked').length;
//				$('input[name="itemCheck[]"]:checked').each(function() {
//					valueCheck += this.value + ", ";
//				});
//				 console.log(valueCheck);
//				alert(str);
//				return false;
			});
		});
	</script>
@stop
