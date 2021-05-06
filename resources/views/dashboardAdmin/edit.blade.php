@extends('dashboardAdmin.master')

@section('content')
<div class="container p-5" style=" border-radius:5px;background-color: rgba(0,0,0,.03);">
    <div class="row">
        <div class="col-md-12">
            <br />
            <h3 align="center">{{__('master.edit')}}</h3>
            <br />
        </div>
    </div>
    <form method="POST" action="{{route('articles.update', [app()->getLocale(),$article['id']])}}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="form-group">
            <div class="col-4">
                <div class="row">
                    <div class="col">
                        <input type="hidden" id="image" value="{{$article['image']}}" name="image" class="form-control" placeholder="Add image" />
                        @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <img id="image-preview" src="{{$article['image']}}" width="300px" height="300px" />
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input id="lfm" style="width: 305px;" class="btn btn-outline-secondary" data-input="image" data-preview="image-preview" type="button" value="{{__('master.choise')}}" />
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <label class="txt"><span>{{__('master.slug')}}</span></label>
                <input type="text" name="slug"   class="form-control" placeholder="{{$article['slug']}}" />
                @error('slug')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <!--Experiment-->
            <div class="bs-example">
                <ul class="nav nav-tabs">
                    @foreach ($languages as $language)
                    <li class="nav-item">
                        <a href="#{{$language->slug}}" class="nav-link {{$loop->first ? 'active' : ''}}" data-toggle="tab">{{strtoupper($language->title)}}</a>
                    </li>
                    @endforeach
                </ul>
                <div class="tab-content">
                @foreach ($languages as $language)
						<div class="tab-pane fade  {{$loop->first ? ' show active ' : ''}} " id="{{$language->slug}}">
							<br>
							<div class="form-group">
								<input type="text" value='{{isset($article->getTranslations("title")["$language->slug"]) ? $article->getTranslations("title")["$language->slug"]: "" }}' name="title.{{$language->slug}}" class="form-control" placeholder="Enter title" />
								@error('title')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>

							<div class="form-group">
								<textarea placeholder="Add meta desription" name="meta_description.{{$language->slug}}"  class="form-control" id="exampleFormControlTextarea1" rows="3">{{isset($article->getTranslations("meta_description")["$language->slug"]) ? $article->getTranslations("meta_description")["$language->slug"]: "" }}</textarea>
								@error('meta_description')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class=" form-group">
								<textarea placeholder="Add desription"  id="description_{{$language->slug}}" name="description.{{$language->slug}}" class=" form-control myckeditor" rows="3">{!!isset($article->getTranslations("description")["$language->slug"]) ? $article->getTranslations("description")["$language->slug"]: "" !!}</textarea>
								@error('description')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<input type="text" value='{{isset($article->getTranslations("key_words")["$language->slug"]) ? $article->getTranslations("key_words")["$language->slug"]: "" }}' name="key_words.{{$language->slug}}" class="form-control" placeholder="Add key words" />
								@error('key_words')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
						@endforeach

                </div>
            </div>
            <!--End Experiment-->
            <div class="row mt-4 ">
                <div class="col offset-md-5">
                    <input type="submit" class="btn btn-outline-dark" value="{{__('master.edit1')}}" name="" class="btn btn-primary" />
                </div>
            </div>
    </form>
</div>
@endsection