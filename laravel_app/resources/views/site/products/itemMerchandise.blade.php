@extends('site.layouts.default')
@section('title')
	{{$title}}
@stop
@section('position')
	

	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="{{url('/merchandise')}}">全部商品</a></li>
	    <li class="breadcrumb-item"><a href="{{url('/merchandise/'.$Merchandise->type)}}">{{$Merchandise->type}}</a></li>
	    <li class="breadcrumb-item active" aria-current="page">{{$Merchandise->name}}</li>
	  </ol>
	</nav>

@endsection
@section('content')	
	<div class="column">
		<div class="column-md-2 offset-md-1">
			<img src="{{$Merchandise->photo}}" class="figure-img img-fluid rounded" alt="{{$Merchandise->name}}"> 
		</div>
		<div class="column-md-6 offset-md-1 item">
			<p>商品名稱: {{$Merchandise->name}}</p>
			<p>分類: {{$Merchandise->type}}</p>
			<p>顏色:
				 @foreach($colors as $color)
					{{$color["color"]}}
				@endforeach
			</p>
			<p>尺寸: 
				@foreach($sizes as $size)
					{{$size["size"]}}
				@endforeach
			</p>
			
			<div class="column">
				<div>商品說明: </div>
				<br />
				<div>
					<pre>{{$Merchandise->discript}}</pre>
				</div>
			</div>

		</div>
	</div>




@endsection