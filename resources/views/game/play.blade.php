@extends('layouts.default')
@section('content')
	<div class="jumbotron">
		<h1>Play game - <?php echo $item->name;?></h1>
	</div>
	<form action="play" method="post">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" name="gameId" value="{{ $item->id }}">
		<div class="row">
			<div class="col-md-12">
				<h4 class="name-game"><?php echo $item->name;?></h4>
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
				<p class="game-description"><?php echo $item->description; ?></p>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label for="">Price set:</label>
					<input type="number" max="<?php echo $item->max_price; ?>" min="<?php echo $item->min_price; ?>" name="value"  class="form-control"/>
				</div>
			</div>
		</div>

		<input type="submit" name="play" class="btn btn-success" id="playSubmit" value ="Play"/>
	</form>
	<script type="text/javascript">
		jQuery(document).ready(function($){
			$('#playSubmit').click(function(event) {
				var valueCheck = "";
				var priceSet = $('input[name="value"').val();
				var totalNumber = $('input[name="itemCheck"]:checked').length;
				$('input[name="itemCheck"]:checked').each(function() {
					valueCheck += this.value + ", ";
				});
				var str = "Game confirm \r\n";
				str+= "Your chooise: " + valueCheck + " \r\n";
				str+= "Price set: "+ priceSet +" \r\n";
				str+= "Total price: "+ priceSet*totalNumber +" \r\n";	
				// console.log(str);
				alert(str);
				return false;
			});
		});
	</script>
@stop
