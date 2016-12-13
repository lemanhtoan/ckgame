@extends('layouts.sidebar')
@section('content')
    <div class="jumbotron">
        <h1>Profile - {!! $user->id !!}</h1>
    </div>        
    <div class="row">        
        <div class="col-sm-12"> 
        	<p>{!! $user->name !!}</p>
        	<p>{!! $user->email !!}</p>
        </div>
    </div>
@stop