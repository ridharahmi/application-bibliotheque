@extends('layouts.membre')

@section('content')
    {!! Form::model($file, array('class'=>'form-horizontal', 'method'=>'PATCH','action'=>['Membre\LivresController@update',$file->id],'files'=>true)) !!}
    <div class="form-group">
        <label>Titre</label>
        {!! Form::text('title', null, array('class'=>'form-control')) !!}
    </div>
    <div class="form-group">
        <label>Categories</label>
        {!! Form::select('cat', [
        '1'=>'Informatique',
        '2'=>'Math',
        '3'=>'Physique',
        '4'=>'Chimie',
        ],null, array('required','class'=>'form-control','placeholder'=>'Categories')) !!}
    </div>
    <div class="form-group">
        <label>Image</label>
        <img src="{{ asset($file->image) }}" width="100">
        <input type="hidden" name="photo" value="{{ $file->image }}" />
        {!! Form::file('image', null, array('class'=>'form-control')) !!}
    </div>
    <div class="form-group">
        <label>Fichier (Pdf, word, zip, file)</label>
        <input type="hidden" name="files" value="{{ $file->file }}" />
        <input type="file" name="file" class="form-control" >
    </div>
    <div class="form-group">
        <label>Description</label>
        {!! Form::textarea('description', null, array('class'=>'form-control', 'rows' => '8')) !!}
    </div>

    <button type="submit" class="btn btn-3d  btn-reveal btn-success">
        <i class="fa fa-pencil"></i>
        <span>Edit Book</span>
    </button>
    {!! Form::close() !!}
@endsection
