@extends('layout')

@section('content')

{{ Form::open(array('id' => 'login-form', 'url' => action('UserController@handleLogin'), 'role' => 'form')) }}

<div class="form-group<?php if ($errors->has('email')) echo ' has-error'; ?>">
    {{Form::label('email', 'Email', $attributes = array('class' => 'control-label') )}}
    {{Form::email('email', $value = null, $attributes = array('placeholder' => 'Email', 'class' => 'form-control', 'required' => 'required'))}}
    @if ($errors->has('email')) <span class="error">{{$errors->first('email')}}</span> @endif
</div>

<div class="form-group<?php if ($errors->has('password')) echo ' has-error'; ?>">
    {{Form::label('password', 'Password', $attributes = array('class' => 'control-label') )}}
    {{Form::password('password', $attributes = array('placeholder' => 'Password', 'class' => 'form-control', 'required' => 'required'))}}
    @if ($errors->has('password')) <span class="error">{{$errors->first('password')}}</span> @endif
</div>

<div class="checkbox">
    <label>
        {{Form::checkbox('remember')}} Remember me
    </label>
</div>

{{Form::submit('Login', $attributes = array('class' => 'btn btn-primary'))}}

{{ Form::close() }}

@stop