@extends('layouts.sidebar')
@section('content')
    <div class="jumbotron">
        <h1>Login</h1>
    </div>
    
    <div class="row">
    
        <div class="col-sm-12">            

            <form method="POST" action="<?php echo URL::to('/auth/register') ?>">
                {!! csrf_field() !!}

                <div class="form-group">
                    <label for="email">Name:</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="email">Password:</label>
                    <input type="password" name="password" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="email">Confirm Password:</label>
                    <input type="password" name="password_confirmation" class="form-control"/>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-default">Register</button>
                </div>
            </form>
        </div>                 
    </div>    
@stop