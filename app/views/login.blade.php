@extends('layout')

@section('content')

{{ Form::open(array('id' => 'login-form', 'url' => action('UserController@handleLogin'), 'role' => 'form')) }}

<div class="form-group">
    {{Form::label('email', 'Email' )}}
    {{Form::email('email', $value = null, $attributes = array('placeholder' => 'Enter email', 'class' => 'form-control', 'required' => 'required'))}}
    @if ($errors->has('email')) <span class="error">{{$errors->first('email')}}</span> @endif
</div>

<div class="form-group">
    {{Form::label('password', 'Password' )}}
    {{Form::password('password', $attributes = array('placeholder' => 'Enter password', 'class' => 'form-control', 'required' => 'required'))}}
    @if ($errors->has('password')) <span class="error">{{$errors->first('password')}}</span> @endif
</div>

<div class="checkbox">
    <label>
        {{Form::checkbox('remember')}} Remember me
    </label>
</div>

{{Form::submit('Login', $attributes = array('class' => 'btn btn-default'))}}

{{ Form::close() }}

@stop