@extends('layouts.membre')

@section('content')
    {!! Form::open(array('class'=>'form-horizontal','route'=>'Gestionbook.store','files'=>true)) !!}
    <div class="form-group">
        <label>Titre</label>
        <input type="text" name="title" class="form-control" required>
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
        <input type="file" name="image" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Fichier (Pdf, word, zip, file)</label>
        <input type="file" name="file" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Description</label>
        <textarea name="description" class="form-control" rows="8"  required></textarea>
    </div>

    <button type="submit" class="btn btn-3d  btn-reveal btn-info">
        <i class="fa fa-plus"></i>
        <span>Add Book</span>
    </button>
    {!! Form::close() !!}
@endsection
