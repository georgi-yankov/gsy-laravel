@extends('layout')

@section('content')

{{ Form::open(array('id' => 'register-form', 'url' => action('UserController@handleRegister'), 'role' => 'form')) }}

<div class="form-group">
    {{Form::label('username', 'Username' )}}
    {{Form::text('username', $value = null, $attributes = array('placeholder' => 'Enter username', 'class' => 'form-control', 'required' => 'required'))}}
    <span class="error">{{$errors->first('username')}}</span>
</div>

<div class="form-group">
    {{Form::label('email', 'Email' )}}
    {{Form::email('email', $value = null, $attributes = array('placeholder' => 'Enter email', 'class' => 'form-control', 'required' => 'required'))}}
    <span class="error">{{$errors->first('email')}}</span>
</div>

<div class="form-group">
    {{Form::label('password', 'Password' )}}
    {{Form::password('password', $attributes = array('placeholder' => 'Enter password', 'class' => 'form-control', 'required' => 'required'))}}
    <span class="error">{{$errors->first('password')}}</span>
</div>

<div class="form-group">
    {{Form::label('repeat-password', 'Repeat password' )}}
    {{Form::password('repeat-password', $attributes = array('placeholder' => 'Repeat password', 'class' => 'form-control', 'required' => 'required'))}}
    <span class="error">{{$errors->first('repeat-password')}}</span>
</div>

{{Form::submit('Register', $attributes = array('class' => 'btn btn-default'))}}

{{ Form::close() }}

@stop