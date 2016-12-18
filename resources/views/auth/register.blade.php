@extends('layouts.sidebar')
@section('content')
    <div class="jumbotron">
        <h1>Login</h1>
    </div>
    
    <div class="row">

        <div class="col-sm-12">            

            <form method="POST" action="<?php echo URL::to('/auth/register') ?>" id="registerForm">
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
                    <label for="email">Capcha:</label>
                    <?php 
                        $a=rand(1,9); 
                        $b=rand(1,9);
                        $c=$a+$b;
                        echo $a."+".$b." =" 
                    ?>
                    <p class="capcha-error" style="color: red; display: none;">Wrong capcha code, please try again.</p>
                    <input type="hidden" name="capcha" value="<?php echo $c; ?>" />
                    <input type="text" name="recaptcha" class="form-control" />
                </div>

                <div class="form-group">
                    <button type="submit" onclick="return validationsPass()" class="btn btn-default">Register</button>
                </div>
            </form>
        </div>                 
    </div>    
    <script type="text/javascript">
            function validationsPass() {
                var inp = $('input[name="capcha"').val();
                var out = $('input[name="recaptcha"').val();
                if ( inp == out ) {
                    doRegister();
                } else {
                    $('.capcha-error').show();
                }

                return false;
            }

            function doRegister(){       
                $('#registerForm').submit();
            }
            
    </script>
@stop