<?php

class GamesController extends BaseController {

    public function index() {
        // Show a listing of games.
        $games = Game::all();

        return View::make('index', compact('games'));
    }

    public function create() {
        if (Auth::guest()) {
            return Redirect::action('UserController@login');
        }

        // Show the create game form.
        return View::make('create');
    }

    public function handleCreate() {
        if (Auth::guest()) {
            return Redirect::action('UserController@login');
        }

        // Handle create form submission.
        $game = new Game;
        $game->title = Input::get('title');
        $game->publisher = Input::get('publisher');
        $game->complete = Input::has('complete');
        $game->user_id = Auth::user()->id;
        $game->save();

        return Redirect::action('GamesController@index');
    }

    public function edit(Game $game) {
        if (Auth::guest()) {
            return Redirect::action('UserController@login');
        }

        // Show the edit game form.
        return View::make('edit', compact('game'));
    }

    public function handleEdit() {
        if (Auth::guest()) {
            return Redirect::action('UserController@login');
        }

        // Handle edit form submission.
        $game = Game::findOrFail(Input::get('id'));
        $game->title = Input::get('title');
        $game->publisher = Input::get('publisher');
        $game->complete = Input::has('complete');
        $game->save();

        return Redirect::action('GamesController@index');
    }

    public function delete(Game $game) {
        if (Auth::guest()) {
            return Redirect::action('UserController@login');
        }

        // Show delete confirmation page.
        return View::make('delete', compact('game'));
    }

    public function handleDelete() {
        if (Auth::guest()) {
            return Redirect::action('UserController@login');
        }

        // Handle the delete confirmation.
        $id = Input::get('game');
        $game = Game::findOrFail($id);
        $game->delete();

        return Redirect::action('GamesController@index');
    }

}
