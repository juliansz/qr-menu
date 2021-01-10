@extends('adminlte::page')

@section('title', 'Landings')

@section('content_header')
    <h1>Landings</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Landing pages</h3>
                </div>
                <div class="box-body no-padding">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Link</th>
                                <th>Contents</th>
                                <th>Actions</th>
                            </tr>
                            @foreach($landings as $landing)
                                <tr>
                                    <td>{{ $landing->id }}</td>
                                    <td>{{ $landing->name }}</td>
                                    <td>{{ $landing->link }}</td>
                                    <td>{{ $landing->contents->count() }}</td>
                                    <td>{{ route('landingEdit', $landing) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop