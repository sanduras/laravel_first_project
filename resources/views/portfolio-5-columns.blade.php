@extends('masterstart')

@section('content')
      <section class="sec-padding">
        <div class="container">
          <div class="row">
            <div id="js-grid-juicy-projects" class="cbp">

              <!-- //////////////////////////Start items////////////////////////////////   -->
              @foreach ($members as $member)
              <div class="cbp-item graphic">
                <div class="cbp-caption">
                  <div class="cbp-caption-defaultWrap">
                    <img src="{{$member->image}}" alt="">
                  </div>
                  <div class="cbp-caption-activeWrap">
                    <div class="cbp-l-caption-alignCenter">
                      <div class="cbp-l-caption-body">
                        <a href="{{route('viewuser', [app()->getLocale(),$member->slug])}}" class=" cbp-l-caption-buttonRight" rel="nofollow">{{__('portfolio-5-columns.moreinfo')}}</a>
                        <a href="{{$member->image}}" class="cbp-lightbox cbp-l-caption-buttonRight">{{__('portfolio-5-columns.viewlarger')}}</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="cbp-l-grid-projects-title" style="text-align: center;">{{$member->title}}</div>
              </div>
              <!-- //////////////////////////End items////////////////////////////////   -->
              @endforeach

            </div>
          </div>
        </div>
      </section>
      <div class="container">
        <div class="row">
          <div class="col text-center">
            <ul class="pagination  ">
              <li class="page-item"><a class="page-link" href="{{$members->previousPageUrl()}}">{{__('portfolio-5-columns.previous')}}</a></li>
              @foreach(array_fill(0, $members->lastPage(), 1) as $index => $page)

              <li class="page-item {{$members->currentPage() === $index + 1 ? 'active' : ''}}">
                <a class="page-link" href="?page={{$index + 1}}">{{$index + 1}}</a>
              </li>
              @endforeach

              <li class="page-item"><a class="page-link" href="{{$members->nextPageUrl()}}">{{__('portfolio-5-columns.next')}}</a></li>

            </ul>
          </div>
        </div>
      </div>

      <div class="clearfix"></div>
      <!-- end section -->


      <!-- end section -->

     @endsection