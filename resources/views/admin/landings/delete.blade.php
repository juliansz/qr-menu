@extends('adminlte::page')

@section('title', 'Landings')

@section('content_header')
    <h1>Landings</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="alert alert-danger">
                <p>You are about to delete this landing: <a href="{{ $landing->link }}" target="_blank">{{ $landing->name }}</a>.<br> Are you sure?</p>
                <form action="{{ route('admin.landings.delete', [$landing]) }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-warning">DELETE</button>
                    <a href="{{ route('admin.landings.index') }}" class="btn btn-info">Return</a>
                </form>
            </div>
        </div>
    </div>
@stop