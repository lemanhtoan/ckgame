{!!Html::style('css/jquery.Jcrop.css')!!}
{!!Html::script('js/jquery.min.js')!!}
{!!Html::script('js/jquery.Jcrop.js')!!}

@extends('layouts.default')
@section('content')
	<img src="<?php echo $image; ?>" alt="" id="cropimage">
  {!! Form::open() !!}
   <div class="control-group">
      <div class="controls">
        {!! Form::hidden('image', $image) !!}
        {!! Form::hidden('x', '', array('id' => 'x')) !!}
        {!! Form::hidden('y', '', array('id' => 'y')) !!}
        {!! Form::hidden('w', '', array('id' => 'w')) !!}
        {!! Form::hidden('h', '', array('id' => 'h')) !!}
        {!! Form::submit('Crop') !!}
        {!! Form::close() !!}
      </div>
   </div>
	<script>
	   $(function() {
         $('#cropimage').Jcrop({
            onSelect: updateCoords  
         });
	   });
	   function updateCoords(c) {
	   	 $('#x').val(c.x);
	   	 $('#y').val(c.y);
	   	 $('#w').val(c.w);
	   	 $('#h').val(c.h);
	   }
	</script>
@stop

