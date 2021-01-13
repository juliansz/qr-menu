@extends('adminlte::page')

@section('title', 'Contents')

@section('content_header')
    <h1>Contents</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Contents for {{ $landing->name }}</h3>
                    <div class="card-tools">
                        <a class="btn btn-success btn-sm" href="{{ route('admin.contents.create', $landing) }}">New content</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Link</th>
                                <th>Actions</th>
                            </tr>
                            @foreach($contents as $content)
                                <tr>
                                    <td>{{ $content->id }}</td>
                                    <td>{{ $content->name }}</td>
                                    <td>{{ $content->type }}</td>
                                    <td><a href="{{ $content->link }}">link</a></td>
                                    <td>
                                        <div class="btn-toolbar">
                                        <a class="btn btn-info btn-sm" href="{{ route('admin.contents.edit', [$landing, $content]) }}"><i class="fas fa-fw fa-pen"></i> Edit</a>
                                        <a class="btn btn-danger btn-sm" href="{{ route('admin.contents.delete', [$landing, $content]) }}"><i class="fas fa-fw fa-times"></i> Delete</a>
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