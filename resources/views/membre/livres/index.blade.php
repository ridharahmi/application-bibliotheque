@extends('layouts.membre')

@section('content')
    @include('message.flash-message')
    <div class="panel panel-primary filterable">
        <div class="panel-heading">
            <h3 class="panel-title"><a href="Gestionbook/create"><i class="fa fa-plus"></i> Add New Book</a></h3>
            <div class="pull-right">
                <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-search"></span>
                    Rechercher
                </button>
            </div>
        </div>
        <table class="table">
            <thead>
            <tr class="filters">
                <th>#Image</th>
                <th><input type="text" class="form-control" placeholder="Title" disabled></th>
                <th><input type="text" class="form-control" placeholder="Description" disabled></th>
                <th><input type="text" class="form-control" placeholder="Status" disabled></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach( $fichier as $myficher)
                <tr>
                    <td><img src="{{ $myficher->image }}" class="img-thumbnail img-responsive" width="100"></td>
                    <td>{{ $myficher->title }}</td>
                    <td>{{  str_limit($myficher->description, 100) }}</td>
                    <td>@if($myficher->status == 0)
                            <a class="btn btn-danger btn-xs" title="Book Invalide">Invalide</a>
                        @else
                            <a class="btn btn-success btn-xs" title="Book Valide">Valide</a>
                        @endif</td>
                    <td><a href="Gestionbook/{{  $myficher->id }}/edit" class="btn btn-success btn-xs">
                            <i class="fa fa-pencil"></i> Edit
                        </a>
                        <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal"
                                data-target="#delete{{ $myficher->id }}">
                            <i class="fa fa-times white"></i> Delete
                        </button></td>
                </tr>
                <div class="modal fade" id="delete{{ $myficher->id }}" tabindex="-1" role="dialog"
                     aria-labelledby="edit" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                </button>
                                <h4 class="modal-title custom_align" id="Heading">Delete this entry :
                                    <b class="label label-danger">{{ $myficher->id }}</b>
                                </h4>
                            </div>
                            <div class="modal-body">
                                <div class="alert alert-danger">
                                    <span class="glyphicon glyphicon-warning-sign"></span> Are you sure you
                                    want to delete this Book?
                                </div>
                            </div>
                            <div class="modal-footer ">
                                {!! Form::open(['method'=>'DELETE', 'route'=>['Gestionbook.destroy',$myficher->id]]) !!}
                                <button class="btn btn-success" type="submit">
                                    <span class="glyphicon glyphicon-ok-sign"></span> Yes
                                </button>
                                {!! Form::close() !!}
                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                    <span class="glyphicon glyphicon-remove"></span> No
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </tbody>
        </table>
        <div class="row text-center">
            <div class="col-md-12">
                {!! $fichier->render() !!}
            </div>
        </div>

    </div>
@endsection
