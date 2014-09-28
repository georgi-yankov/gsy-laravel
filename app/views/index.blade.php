@extends('layout')

@section('content')
<div class="page-header">
    <h1>All Games <small>Gotta catch 'em all!</small></h1>
</div>

@if (Auth::user())
<div class="panel panel-default">
    <div class="panel-body">
        <a href="{{ action('GamesController@create') }}" class="btn btn-primary">Create Game</a>
    </div>
</div>
@endif

@if ($games->isEmpty())
<p>There are no games! :(</p>
@else

<?php
// Sort games and show the most recently updated games first
$games->sortByDesc(function ($game) {
    return $game->updatedAt;
});
?>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Title</th>
            <th>Publisher</th>
            <th>Complete</th>

            @if (Auth::user())
            <th>Actions</th>
            @endif

        </tr>
    </thead>
    <tbody>
        @foreach($games as $game)
        <tr>
            <td>{{ $game->title }}</td>
            <td>{{ $game->publisher }}</td>
            <td>{{ $game->complete ? 'Yes' : 'No' }}</td>            
            <td>
                @if (Auth::user() && Auth::user()->id === $game->user_id)
                <a href="{{ action('GamesController@edit', $game->id) }}" class="btn btn-default">Edit</a>
                <a href="{{ action('GamesController@delete', $game->id) }}" class="btn btn-danger">Delete</a>
                @endif
            </td>            
        </tr>
        @endforeach
    </tbody>
</table>
@endif
@stop