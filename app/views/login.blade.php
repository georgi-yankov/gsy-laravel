@extends('layout')

@section('content')

{{ Form::open(array('id' => 'login-form', 'url' => '/user/store_login', 'role' => 'form')) }}

<div class="form-group">
    {{Form::label('input-email', 'Email' )}}
    {{Form::email('input-email', $value = null, $attributes = array('placeholder' => 'Enter email', 'class' => 'form-control', 'required' => 'required'))}}
    {{$errors->first('input-email')}}
</div>

<div class="form-group">
    {{Form::label('input-password', 'Password' )}}
    {{Form::password('input-password', $attributes = array('placeholder' => 'Enter password', 'class' => 'form-control', 'required' => 'required'))}}
    {{$errors->first('input-password')}}
</div>

{{Form::submit('Login', $attributes = array('class' => 'btn btn-default'))}}

{{ Form::close() }}

@stop