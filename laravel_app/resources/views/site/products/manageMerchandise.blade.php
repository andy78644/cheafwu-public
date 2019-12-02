@extends('site.layouts.default')
@section('title')
	{{$title}}
@stop
@section('content')	
	@include('components.validationErrorMessage')
	<table class="table">
		<tr>
			<th>id</th>
			<th>名字</th>
			<th>分類</th>		
			<th>編號</th>	
			<th>圖片</th>	
			<th>顏色</th>	
			<th>尺寸</th>
			<th>說明</th>	
	
	
	@foreach($merchandises as $colorsize =>$merchandise)
		<tr>
			<td>
				<a href="/merchandise/{{$merchandise->id}}/edit">{{$merchandise->id}}</a>
			</td>
			<td>
				{{$merchandise->name}}
			</td>
			<td>
				{{$merchandise->type}}-{{$merchandise->stype}}
			</td>
			<td>
				{{$merchandise->number}}
			</td>
			<td>
				<img src="{{$merchandise->photo}}">
			</td>
			<td>
				@foreach($colors[$colorsize] as $color)
					{{$color["color"]}}
				@endforeach
			</td>
			<td>
				
				@foreach($sizes[$colorsize] as $size)
					{{$size["size"]}}
				@endforeach
			</td>
			<td>
				{{$merchandise->discript}}
			</td>
			<td>
				<a href="/merchandise/delete/{{$merchandise->id}}">刪除</a>
			</td>
			
		</tr>

	@endforeach
	</table>
	{{$merchandises->links()}}
@endsection