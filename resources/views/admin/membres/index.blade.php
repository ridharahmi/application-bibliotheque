@extends('layouts.admin')

@section('content')
    @include('message.flash-message')
    <div class="panel panel-primary filterable">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-bar-chart"></i> List Membres</h3>
            <div class="pull-right">
                <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-search"></span>
                    Rechercher
                </button>
            </div>
        </div>
        <table class="table">
            <thead>
            <tr class="filters">
                <th><input type="text" class="form-control" placeholder="Name" disabled></th>
                <th><input type="text" class="form-control" placeholder="Email" disabled></th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach( $membre as $mymembre)
                <tr>
                    <td>{{ $mymembre->name }}</td>
                    <td>{{ $mymembre->email }}</td>
                    <td>
                        <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal"
                                data-target="#delete{{ $mymembre->id }}">
                            <i class="fa fa-times white"></i> Delete
                        </button></td>
                </tr>
                <div class="modal fade" id="delete{{ $mymembre->id }}" tabindex="-1" role="dialog"
                     aria-labelledby="edit" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                </button>
                                <h4 class="modal-title custom_align" id="Heading">Delete this entry :
                                    <b class="label label-danger">{{ $mymembre->id }}</b>
                                </h4>
                            </div>
                            <div class="modal-body">
                                <div class="alert alert-danger">
                                    <span class="glyphicon glyphicon-warning-sign"></span> Are you sure you
                                    want to delete this Membre?
                                </div>
                            </div>
                            <div class="modal-footer ">
                                {!! Form::open(['method'=>'DELETE', 'route'=>['GestionMembre.destroy',$mymembre->id]]) !!}
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
                {!! $membre->render() !!}
            </div>
        </div>

    </div>
@endsection
