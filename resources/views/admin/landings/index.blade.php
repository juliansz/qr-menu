@extends('adminlte::page')

@section('title', 'Landings')

@section('content_header')
    <h1>Landings</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Landing pages</h3>
                    <div class="card-tools">
                        <a class="btn btn-success btn-sm" href="{{ route('admin.landings.create') }}">New landing page</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Link</th>
                                <th>QR</th>
                                <th>Contents</th>
                                <th>Actions</th>
                            </tr>
                            @foreach($landings as $landing)
                                <tr>
                                    <td>{{ $landing->id }}</td>
                                    <td>{{ $landing->name }}</td>
                                    <td><a href="{{ $landing->link }}">link</a></td>
                                    <td><a href="{{ route('admin.landings.qr', $landing) }}"><i class="fas fa-fw fa-qrcode"></i></a></td>
                                    <td><a class="btn btn-success btn-sm" href="{{ route('admin.contents.index', $landing) }}"><i class="fas fa-fw fa-copy"></i> Edit ({{ $landing->contents->count() }})</a></td>
                                    <td>
                                        <div class="btn-toolbar">
                                        <a class="btn btn-info btn-sm" href="{{ route('admin.landings.edit', $landing) }}"><i class="fas fa-fw fa-pen"></i> Edit</a>
                                        <a class="btn btn-danger btn-sm" href="{{ route('admin.landings.delete', $landing) }}"><i class="fas fa-fw fa-times"></i> Delete</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop