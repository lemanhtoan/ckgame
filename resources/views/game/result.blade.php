@extends('layouts.default')
@section('content')
    <div class="jumbotron">
        <h1>Play game - Result</h1>
    </div>
    <div class="results bootstrap-iso">
        <form method="post" action="filterData">
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
                <h3 class="sub-title">List result right</h3>
                <table class="table right">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Game Name</th>
                        <th>Right number</th>
                        <th>User</th>
                        <th>Number user set</th>
                        <th>Price user set</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($right as $item) <?php $i++; ?> 
                        <tr>
                            <td>{!! $i !!}</td>
                            <td>{!! $item->gameName !!}</td>
                            <td><b class="red">{!! $item->gameRightValue !!}</b></td>
                            <td><a href="<?php echo URL::to('/userhistory') ?>/{{ $item->userIdPlay }}">{{ $item->userName }}</a></td>
                            <td><b class="green">{!! $item->userNumberSet !!}</b></td>
                            <td>{!! $item->userPriceSet !!}</td>
                            <td><a href="<?php echo URL::to('/userhistory') ?>/{{ $item->userIdPlay }}"> Check history & pay </a></td>   
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            <?php endif; endif;?>

            <?php if (!empty($data['wrong'])): $wrong = $data['wrong']; $i=0; if (count($wrong)) :?>
                <h3 class="sub-title">List result wrong</h3>
                <table class="table wrong">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Game Name</th>
                        <th>Right number</th>
                        <th>User</th>
                        <th>Number user set</th>
                        <th>Price user set</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($wrong as $item)  <?php $i++; ?>
                        <tr>
                            <td>{!! $i !!}</td>
                            <td>{!! $item->gameName !!}</td>
                            <td>{!! $item->gameRightValue !!}</td>
                            <td><a href="<?php echo URL::to('/user/') ?>/{{ $item->userIdPlay }}">{{ $item->userName }}</a></td>
                            <td>{!! $item->userNumberSet !!}</td>
                            <td>{!! $item->userPriceSet !!}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            <?php endif; endif; ?>
        <?php else: ?>
        <h2>Empty</h2>
        <?php endif; ?>
    </div>
@stop
