@extends('dashboardAdmin.master')

@section('content')

<div class="">
    @foreach ($members as $member)

    <div class="card mt-5  mx-5">
        <div class="card-body" style="position: relative;">
            <div class="d-flex flex-row align-items-start">
                <div class="me-5">
                    <img width="300px" height="300px" style="border-radius:8px; box-shadow: 0 0 5px rgba(0,0,0,0.25);" src="{{$member->image}}">
                </div>
                <div class="col">
                    <h2>{{$member->title}}</h2>
                    <p class="fw-light"> {{$member->created_at->format('d m Y')}}</p>
                    <p>{!! substr($member->description, 0, 400) !!}</p>

                    <div>
                        <a href="{{route('articles.show', [app()->getLocale(),$member->id])}}" class="btn btn-primary">{{__('master.view1')}}</a>
                        <a href="{{route('articles.edit',[app()->getLocale(),$member->id])}}" class="btn btn-outline-warning">{{__('master.edit1')}} <i class="bi bi-pencil-square"></i></a>
                    </div>
                </div>
            </div>
            <form action="{{ route('destroy', [app()->getLocale(),$member->id]) }}" class="rmv" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}

                <button type="submit" style="width: 40px; height: 40px; " class="btn btn-icon btn-danger">
                    <i style="color:#fff;" class="bi bi-trash"></i>
                </button>
            </form>
        </div>
    </div>

    @endforeach
</div>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-2 .offset-md-2">
            <nav class="mt-3">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="{{$members->previousPageUrl()}}">{{__('portfolio-5-columns.previous')}}</a></li>
                    @foreach(array_fill(0, $members->lastPage(), 1) as $index => $page)

                    <li class="page-item {{$members->currentPage() === $index + 1 ? 'active' : ''}}">
                        <a class="page-link" href="?page={{$index + 1}}">{{$index + 1}}</a>
                    </li>
                    @endforeach

                    <li class="page-item"><a class="page-link" href="{{$members->nextPageUrl()}}">{{__('portfolio-5-columns.next')}}</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>


<style>
    .rmv {
        position: absolute;
        right: 20px;
        top: 20px;
    }
</style>

@endsection