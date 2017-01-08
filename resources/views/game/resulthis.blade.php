@extends('layouts.default')
@section('content')
    <div class="jumbotron">
        <h1>Play game - Result number</h1>
    </div>
    <div class="results bootstrap-iso">
        <form method="post" action="filterDataNumber">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group"> <!-- Date input -->
                <label class="control-label" for="date">Date</label>
                <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text" required/>
            </div>
            <div class="form-group"> <!-- Submit button -->
                <button class="btn btn-primary " name="submit" type="submit">Find</button>
            </div>
        </form>

        <?php if (!empty($data)) : ?>
            <?php if (!empty($data['right'])) : $right = $data['right']; ?>
            <?php $i = 0; if (count($right)) : ?>
                <h3 class="sub-title">Result right</h3>
                <table class="table right">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Game Name</th>
                        <th>Right number</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($right as $item) <?php $i++; ?> 
                        <tr>
                            <td>{!! $i !!}</td>
                            <td>{!! $item->gameName !!}</td>
                            <td><b class="red">{!! $item->gameRightValue !!}</b></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            <?php endif; endif;?>
        <?php else: ?>
        <h2>Empty</h2>
        <?php endif; ?>
    </div>
@stop
