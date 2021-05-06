@extends('dashboardAdmin.master')

@section('content')
<div class="container p-5" style=" border-radius:5px;background-color: rgba(0,0,0,.03);">
    <div class="row">
        <div class="col-md-12">
            <br />
            <h3 align="center">Edit languages</h3>
            <br />
        </div>
    </div>
    <div class="border border-warning">
        <div class="row mt-1 px-2">
            <form action="{{route('deletelanguage', [app()->getLocale(), $language['id']]) }}" class="rmv" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}

                <button type="submit" style="width: 40px; height: 40px; " class="btn btn-icon btn-danger pull-right">
                    <i style="color:#fff;" class="bi bi-trash"></i>
                </button>
            </form>
        </div>
        <div class="row mt-4 px-2">
            <form method="POST" action="{{route('updatelanguage', [app()->getLocale(),$language['id']])}}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="form-group" style="margin-top: 20px;">
                    <input type="text" name="title" value="{{$language['title']}}" class="form-control " placeholder="Title" />
                    @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" name="details" value="{{$language['details']}}" class="form-control" placeholder="Details" />
                    @error('details')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" name="slug" value="{{$language['slug']}}" class="form-control" placeholder="Slug" />
                    @error('slug')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group d-flex justify-content-center">
                    <input type="submit" name="" value="Update" class="btn btn-outline-dark" />
                </div>
        </div>
        </form>
    </div>
</div>
@endsection