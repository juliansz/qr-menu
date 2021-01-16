@extends('adminlte::page')

@section('title', 'Landings')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3 col-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">{{ $landing->name }}</h3>
                    <p>{{ $landing->description }}</p>
                </div>
                @foreach($landing->contents as $content)
                    <a href="{{ $content->link }}" download>
                        @if($content->thumbnail_path)<img class="img-fluid" src="{{ $content->thumbnail_url }}" />@endif
                        <h4>{{ $content->name }}</h4>
                        <p>{{ $content->description }}</p>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop