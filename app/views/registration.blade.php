@extends('layout')

@section('content')

{{ Form::open(array('id' => 'registration-form', 'url' => '/user', 'role' => 'form')) }}

<div class="form-group">
    {{Form::label('input-username', 'Username' )}}
    {{Form::text('input-username', $value = null, $attributes = array('placeholder' => 'Enter username', 'class' => 'form-control', 'required' => 'required'))}}
    {{$errors->first('input-username')}}
</div>

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

<div class="form-group">
    {{Form::label('input-repeat-password', 'Repeat password' )}}
    {{Form::password('input-repeat-password', $attributes = array('placeholder' => 'Repeat password', 'class' => 'form-control', 'required' => 'required'))}}
    {{$errors->first('input-repeat-password')}}
</div>

{{Form::submit('Register', $attributes = array('class' => 'btn btn-default'))}}

{{ Form::close() }}

@stop