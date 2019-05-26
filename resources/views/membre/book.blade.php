@extends('layouts.membre')

@section('content')
    <div class="aboutus-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="aboutus">
                        <h2 class="aboutus-title">{{ $book->title }}</h2>
                        <p class="aboutus-text">{{ $book->description }}</p>
                        <a class="aboutus-more" target="_blank" href="{{ asset($book->file) }}">download</a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 text-center">
                    <div class="aboutus-banner">
                        <img src="{{ asset($book->image) }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
