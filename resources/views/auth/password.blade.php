@extends('layouts.sidebar')
@section('content')
    <div class="jumbotron">
        <h1>Reset password</h1>
        @if(Session::has('message'))
            <div class="alert alert-info">
                {!! Session::get('message') !!}
            </div>
        @endif
        @if ($errors->has())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif
    </div>        
    <div class="row">        
        <div class="col-sm-12">    
            <form method="POST" action="<?php echo URL::to('/password/email') ?>">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control"/>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-default">
                        Reset password
                    </button>
                </div>
            </form>
        </div>
    </div>       
@stop
