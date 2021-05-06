@extends('dashboardAdmin.master')

@section('content')

<div style="padding: 20px; border-radius:5px;background-color: rgba(0,0,0,.03);">
	<div class="row">
		<div class="col-md-12">
			<br />
			<h3 align="center">{{__('master.add')}}</h3>
			<br />
			<form method="post" action="{{url(app()->getLocale(),'articles')}}">
				{{csrf_field()}}
				<div class="form-group">
					<input type="hidden" id="image" name="image" class="form-control" placeholder="Add image" />
					@error('image')
					<div class="alert alert-danger">{{ $message }}</div>
					@enderror
				</div>
				<img id="image-preview" src="https://artgalleryofballarat.com.au/wp-content/uploads/2020/06/placeholder-image.png" width="100px" height="100px" />
				<div class="form-group">
					<input id="lfm" data-input="image" class="btn btn-outline-secondary" data-preview="image-preview" type="button" value="{{__('master.choise')}}" />
				</div>
				<div class="form-group">
					<input type="text" name="slug" class="form-control" placeholder="{{__('master.addslug')}}" />
					@error('slug')
					<div class="alert alert-danger">{{ $message }}</div>
					@enderror
				</div>
				<!--Experiment-->
				<div class="bs-example" style="display: inline-block;">
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
								<input type="text" name="title.{{$language->slug}}" class="form-control" placeholder="Enter title" />
								@error('title')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>

							<div class="form-group">
								<textarea placeholder="Add meta desription" name="meta_description.{{$language->slug}}" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
								@error('meta_description')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class=" form-group">
								<textarea placeholder="Add desription" id="description_{{$language->slug}}" name="description.{{$language->slug}}" class=" form-control myckeditor" rows="3"></textarea>
								@error('description')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
							<div class="form-group">
								<input type="text" name="key_words.{{$language->slug}}" class="form-control" placeholder="Add key words" />
								@error('key_words')
								<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
						@endforeach

						<div class=" form-group">
							<input type="submit" name="" value="{{__('master.inser')}}" class="btn btn-outline-dark" />
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
