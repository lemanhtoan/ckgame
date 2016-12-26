@extends('layouts.default')
@section('content')
    <div class="jumbotron">
        <h1>Play game - Result</h1>
    </div>
    <div class="results bootstrap-iso">
        <!-- Form code begins -->
        <form method="post" action="filterData">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group"> <!-- Date input -->
                <label class="control-label" for="date">Date</label>
                <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text"/>
            </div>
            <div class="form-group"> <!-- Submit button -->
                <button class="btn btn-primary " name="submit" type="submit">Submit</button>
            </div>
        </form>
        <!-- Form code ends -->
    </div>
@stop
