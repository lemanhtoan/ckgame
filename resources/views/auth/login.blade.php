@extends('layouts.sidebar')
@section('content')
    <div class="jumbotron">
        <h1>Login</h1>
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

            <form method="POST" action="<?php echo URL::to('/auth/login') ?>" class="form-horizontal" role="form">
                {!! csrf_field() !!}

                <div class="form-group">
                    <label for="email" class="control-label col-sm-2">Email:</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control"/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="control-label col-sm-2">Password:</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" id="password" class="form-control"/>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label for="remember"><input type="checkbox" name="remember" id="remember"/>Remember me</label>
                        </div>
                    </div>
                </div>
                
                
				<div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Login</button>
                    </div>
                </div>
                
            </form>
        </div> 
    </div>   
@stop

