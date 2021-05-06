@extends('masterstart')
@section('title')
{{$member->title}}
@stop

@section('description')
{{$member->meta_description}}
@stop
@section('key_words')
{{$member->key_words}}
@stop
@section('content')
<title></title>
    <meta name="meta_description" content=""> 
  
      <!--end header section -->
      <section class="sec-padding">
        <div class="container-fluid">
          <div class="row">

            <div class="col-md-10 col-centered">
              <div class="col-md-6">

                <div class="col-sm-12 nopadding">
                  <div class="sec-title-container less-padding-3 text-left">
                    <h2 class="font-weight-6 less-mar-1 line-height-4">{{$member->title}}<br /></h2>
                    <h5 class="font-weight-4 less-mar-1 line-height-4 text-primary">{{$member->created_at->format('d m Y')}}</h5>
                    <div class="ce-title-line align-left"></div>
                  </div>
                </div>
                <div class="clearfix"></div>
                <!--end title-->

                <br />
                {!!$member->description!!}<br />
                <br />
              </div>
              <!--end item-->

              <div class="col-md-6 margin-bottom " style="float: right;">
                <div class="ce-feature-box-51"><img src="{{$member->image}}" width="376px" height="371px;" alt="" class="img-responsive" /></div>
              </div>
              <!--end item-->

            </div>
            <!--end main col-->


          </div>
        </div>
      </section>
    @endsection