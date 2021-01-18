@extends('adminlte::page')

@section('title', 'Contents')

@section('content_header')
    <h1>Contents</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="alert alert-danger">
                <p>You are about to delete this content: <a href="{{ $content->link }}" target="_blank">{{ $content->name }}</a>.<br> Are you sure?</p>
                <form action="{{ route('admin.contents.delete', [$landing, $content]) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-warning">DELETE</button>
                    <a href="{{ route('admin.contents.index', $landing) }}" class="btn btn-info">Return</a>
                </form>
            </div>
        </div>
    </div>
@stop