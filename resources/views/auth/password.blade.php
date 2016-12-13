@extends('layouts.sidebar')
@section('content')
    <div class="jumbotron">
        <h1>Reset password</h1>
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
