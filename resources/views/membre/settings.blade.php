@extends('layouts.membre')

@section('content')
    @include('message.flash-message')
    {!! Form::open(array('class'=>'settings_profil','url'=>'settings','files'=>true)) !!}
    <div class="input-group form-group">
        <div class="input-group-prepend">
            <label>Name</label>
        </div>
        <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
    </div>
    <div class="input-group form-group">
        <div class="input-group-prepend">
            <label>Email</label>
        </div>
        <input type="text" class="form-control" name="email_1" value="{{ Auth::user()->email }}" disabled>
        <input type="hidden" class="form-control" name="email" value="{{ Auth::user()->email }}">
    </div>
    <div class="input-group form-group">
        <div class="input-group-prepend">
            <label>Password</label>
        </div>
        <input type="password" class="form-control " name="password">
    </div>
    <div class="input-group form-group">
        <div class="input-group-prepend">
            <label>Password Confirmation</label>
        </div>
        <input type="password" class="form-control" name="password_confirmation">
    </div>
    <div class="form-group">
        <input type="submit" value="edit" class="btn btn-success">
    </div>
    {!! Form::close() !!}
@endsection
