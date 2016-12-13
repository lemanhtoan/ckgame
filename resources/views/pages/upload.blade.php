@extends('layouts.default')
@section('content')
  {!! Form::open(array('files'=>true)) !!}
   <div class="control-group">
      <div class="controls">
        {!! Form::file('image') !!}
        {!! Form::submit('Upload', array('class'=>'send-btn')) !!}
        {!! Form::close() !!}
      </div>
   </div>
@stop

