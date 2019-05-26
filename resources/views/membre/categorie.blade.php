@extends('layouts.membre')

@section('content')
    <div class="container text-center">
        <div class="row" id="ads">
            @foreach($fichier as $myficher)
                <div class="col-md-4">
                    <div class="card rounded">
                        <div class="card-image">
                            <span class="card-notify-badge">{{ $myficher->title }}</span>
                            <span class="card-notify-year">
                                @if($myficher->cat == 1)
                                    Informatique
                                @elseif($myficher->cat == 2)
                                    Math
                                @elseif($myficher->cat == 3)
                                    Physique
                                @elseif($myficher->cat == 4)
                                    Chimie
                                @endif
                            </span>
                            <img class="img-fluid" src="{{ asset($myficher->image) }}"
                                 style=" height:150px; width:150px;"/>
                        </div>
                        <div class="card-body text-center">
                            <div class="ad-title m-auto">
                                <a class="ad-btn btn-detail" href="showbook/{{ $myficher->id }}"><i
                                            class="fa fa-eye"></i> More</a>
                            </div>
                            <a class="ad-btn btn-download" target="_blank" href="{{ asset($myficher->file) }}"><i
                                        class="fa fa-download"></i> download</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-12">
                {!! $fichier->render() !!}
            </div>
        </div>
    </div>
@endsection
