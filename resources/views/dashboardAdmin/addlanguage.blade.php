@extends('dashboardAdmin.master')

@section('content')

<div style="padding: 20px; border-radius:5px;background-color: rgba(0,0,0,.03);">
    <div class="row">
        <div class="col-md-12">
            <br />
            <h3 align="center">Add Language </h3>
            <br />
            <form method="post" action="{{url(app()->getLocale().'/languages')}}">
                {{csrf_field()}}
                <div class="form-group">
                    <input type="text" name="title" class="form-control" placeholder="Title" />
                    @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" name="details" class="form-control" placeholder="Details" />
                    @error('details')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="text" name="slug" class="form-control" placeholder="Slug" />
                    @error('slug')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="submit" name="" value="Add" class="btn btn-outline-dark" />
                </div>
            </form>
        </div>
    </div>
</div>
@endsection