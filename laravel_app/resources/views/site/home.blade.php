@extends('site.layouts.default')
@section('title')
	{{$title}}
@stop
@section('info')
	<link href="{{ URL::asset('css/index.css') }}" rel="stylesheet">
@stop
@section('content')	
	<div  class="products">
		<p>熱門商品</p>	
	

		<div class="container row">
			@foreach($merchandises as $merchandise)
				<figure class="figure  col-md-4">
					<a href="/merchandise/{{$merchandise->type}}/{{$merchandise->id}}">
				  		<img src="{{$merchandise->photo}}" class="figure-img img-fluid rounded" alt="{{$merchandise->name}}">
				  	</a>
				  	<a href="/merchandise/{{$merchandise->type}}/{{$merchandise->id}}">
						<figcaption class="figure-caption text-right">{{$merchandise->name}}</figcaption>
					</a>
				</figure>
			@endforeach
		</div>
	</div>
@stop