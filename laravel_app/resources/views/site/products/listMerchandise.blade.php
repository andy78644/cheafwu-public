@extends('site.layouts.default')
@section('title')
	{{$title}}
@stop
@section('position')
	@if($typelist==0)
		<nav aria-label="breadcrumb">
		  <ol class="breadcrumb">
		     <li class="breadcrumb-item active" aria-current="page">全部商品</li>
		  </ol>
		</nav>
	@else
		<ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="{{url('/merchandise')}}">全部商品</a></li>
		    <li class="breadcrumb-item active" aria-current="page">{{$type}}</li>
		</ol>
	@endif

@endsection
@section('content')	
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
	{{$merchandises->links()}}




@endsection