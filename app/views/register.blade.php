@extends('layout')

@section('content')

{{ Form::open(array('id' => 'register-form', 'url' => action('UserController@handleRegister'), 'role' => 'form')) }}

<div class="form-group<?php if ($errors->has('username')) echo ' has-error'; ?>">
    {{Form::label('username', 'Username', $attributes = array('class' => 'control-label') )}}
    {{Form::text('username', $value = null, $attributes = array('placeholder' => 'Enter username', 'class' => 'form-control', 'required' => 'required'))}}
    @if ($errors->has('username')) <span class="error">{{$errors->first('username')}}</span> @endif
</div>

<div class="form-group<?php if ($errors->has('email')) echo ' has-error'; ?>">
    {{Form::label('email', 'Email', $attributes = array('class' => 'control-label') )}}
    {{Form::email('email', $value = null, $attributes = array('placeholder' => 'Enter email', 'class' => 'form-control', 'required' => 'required'))}}
    @if ($errors->has('email')) <span class="error">{{$errors->first('email')}}</span> @endif
</div>

<div class="form-group<?php if ($errors->has('password')) echo ' has-error'; ?>">
    {{Form::label('password', 'Password', $attributes = array('class' => 'control-label') )}}
    {{Form::password('password', $attributes = array('placeholder' => 'Enter password', 'class' => 'form-control', 'required' => 'required'))}}
    @if ($errors->has('password')) <span class="error">{{$errors->first('password')}}</span> @endif
</div>

<div class="form-group<?php if ($errors->has('repeat-password')) echo ' has-error'; ?>">
    {{Form::label('repeat-password', 'Repeat password', $attributes = array('class' => 'control-label') )}}
    {{Form::password('repeat-password', $attributes = array('placeholder' => 'Repeat password', 'class' => 'form-control', 'required' => 'required'))}}
    @if ($errors->has('repeat-password')) <span class="error">{{$errors->first('repeat-password')}}</span> @endif
</div>

{{Form::submit('Register', $attributes = array('class' => 'btn btn-default'))}}

{{ Form::close() }}

@stop