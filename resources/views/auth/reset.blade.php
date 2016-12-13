@extends('layouts.sidebar')
@section('content')
    <div class="jumbotron">
        <h1>Reset password step2</h1>
    </div>        
    <div class="row">        
        <div class="col-sm-12">    
            <form method="POST" action="<?php echo URL::to('/password/reset') ?>">
                {!! csrf_field() !!}
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm Password:</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"/>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-default">
                        Reset Password
                    </button>
                </div>
            </form>
        </div>
    </div>       
@stop
