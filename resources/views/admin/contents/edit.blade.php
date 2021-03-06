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
                    <h3 class="card-title">{{ isset($content) ? 'Edit content' : 'Create content' }}</h3>
                    <div class="card-tools">
                        <a class="btn btn-danger btn-sm" href="{{ route('admin.contents.index', $landing) }}">Return</a>
                    </div>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form role="form" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Content name" value="{{ isset($content) ? $content->name : '' }}" required>
                        </div>
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select class="form-control" name="type" id="type">
                                <option value="{{ App\Models\Content::PDF_TYPE }}">{{ App\Models\Content::PDF_TYPE }}</option>
                                <option value="{{ App\Models\Content::FILE_TYPE }}">{{ App\Models\Content::FILE_TYPE }}</option>
                                <option value="{{ App\Models\Content::IMAGE_TYPE }}">{{ App\Models\Content::IMAGE_TYPE }}</option>
                                <option value="{{ App\Models\Content::EMBEDDED_TYPE }}" disabled>{{ App\Models\Content::EMBEDDED_TYPE }}</option>
                                <option value="{{ App\Models\Content::LINK_TYPE }}" disabled>{{ App\Models\Content::LINK_TYPE }}</option>
                                <option value="{{ App\Models\Content::HTML_TYPE }}" disabled>{{ App\Models\Content::HTML_TYPE }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control" id="description" placeholder="Content description">{{ isset($content) ? $content->description : '' }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" class="form-control" id="slug" placeholder="Write a unique slug or leave it empty for a random auto-generated one"  value="{{ isset($content) ? $content->slug : '' }}" @if(isset($content)) required @endif>
                        </div>
                        <div class="form-group">
                            <label for="file">File input</label>
                            <input type="file" id="file" name="file">
                            <p class="help-block">Upload your file here</p>
                            @if(isset($content) && $content->file_path)<a href="{{ $content->link }}" download >Download file</a>@endif
                        </div>

                        <div class="form-group">
                            <label for="file">Thumbnail</label>
                            <input type="file" id="thumbnail" name="thumbnail">
                            <p class="help-block">Upload a thumbnail for preview the content</p>
                            @if(isset($content) && $content->thumbnail_path)<img class="img-thumbnail col-3" src="{{ $content->thumbnail_url }}" />@endif
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop