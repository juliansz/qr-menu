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
                    <h3 class="card-title">{{ isset($landing) ? 'Edit landing' : 'Create landing' }}</h3>
                    <div class="card-tools">
                        <a class="btn btn-danger btn-sm" href="{{ route('admin.landings.index') }}">Return</a>
                    </div>
                </div>
                <div class="card-body">
                    <form role="form" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Landing page name" value="{{ isset($landing) ? $landing->name : '' }}" required>
                        </div>
                        {{--<div class="form-group">
                            <label for="type">Type</label>
                            <select class="form-control">
                                <option></option>
                            </select>
                        </div>--}}
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control" id="description" placeholder="Landing page description">{{ isset($landing) ? $landing->description : '' }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" class="form-control" id="slug" placeholder="Write a unique slug or leave it empty for a random auto-generated one"  value="{{ isset($landing) ? $landing->slug : '' }}" @if(isset($landing)) required @endif>
                        </div>
                        {{--<div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <input type="file" id="exampleInputFile">
                            <p class="help-block">Example block-level help text here.</p>
                        </div>--}}

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop