@extends('dashboardAdmin.master')

@section('content')
<div class="container"  style=" padding:20px; border-radius:5px;background-color: rgba(0,0,0,.03);">
    <div class="row mt-5">
        <div class="col-3  justify-content-md-center">
        <img width="260px" height="260px" style="border-radius:8px; box-shadow: 0 0 5px rgba(0,0,0,0.25);" src="{{$member->image}}">
       </div>
        <div class="col">
            <div class="row">
                <div class="col">
                    {{$member->title}}
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <span class="fw-light">{{$member->created_at->format('d m Y')}}</span>    
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                {!!$member->description!!}
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5 ml-3">
        <div class="col">
            <a type="button" href="{{route('viewlist',app()->getLocale())}}" class="btn btn-success" >
                <i class="bi bi-back"></i> Back
            </a>
        </div>
    </div>
</div>


@endsection