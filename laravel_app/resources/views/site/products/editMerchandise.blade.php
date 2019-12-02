@extends('site.layouts.default')
@section('title')
	{{$title}}
@stop
@section('content')	

	<form action="/merchandise/{{$Merchandise->id}}"
		method="post"
		enctype="multipart/form-data"
	>
		{{method_field("PUT")}}
		@include('components.validationErrorMessage')
		<div class="form-group">
			<label >商品種類:
				<select class="form-control " name="type" value={{old('type',$Merchandise->type)}}>
	  				<option>口罩</option>
	  				<option>手套</option>
	  				<option>手指套</option>
	  				<option>無塵室</option>
	  				<option>PE/PP</option>
	  				<option>PE膜</option>
	  				<option>PVC膜</option>
	  				<option>工安</option>
	  				<option>太空袋</option>
	  				<option>包裝材料</option>
	  				<option>打包帶</option>
	  				<option>雨鞋</option>
	  				<option>清潔</option>
	  				<option>膠帶</option>
				</select>

			</label>
		</div>
		<div class="form-group">
			<label>商品種類2:
				<input class="form-control" type="text" placeholder="商品種類2" name="stype"  value={{old('stype',$Merchandise->stype)}}>
			</label>
		</div>
		<div class="form-group">
			<label>編號:
				<input class="form-control" type="text" placeholder="編號" name="number"  value={{old('number',$Merchandise->number)}}>
			</label>
		</div>
		<div class="form-group">
			<label>商品名稱:
				<input class="form-control" type="text" placeholder="編號" name="name" value={{old('name',$Merchandise->name)}}>
			</label>
		</div>
		<div class="form-group">
			<label>商品照片:
				<div class="input-group mb-3">
				  <div class="custom-file">
				  
				    
    				<input type="file" class="form-control-file" id="exampleFormControlFile1" name="photo" >
    				<img src="{{$Merchandise->photo or '/assets/images/dafault-merchandise.png'}}"
				  </div>
				</div>
			</label>
		</div>
		<div class="form-group">
			<label>顏色:
				<br/>
				@php $i=0; @endphp 
				@foreach($Color as $colors)
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="{{$colors->color}}" name="color[]" value={{old('color[]',$Merchandise->color)}}>
					  <label class="form-check-label" for="inlineCheckbox1">{{$colors->color}}</label>
					</div>
					@php
						$i++;
						if($i==10){
							echo '<br/>';
							$i=0;
						}
					@endphp
				@endforeach
				<br/>
				<a class="btn btn-primary" href="{{url('/merchandise/createcolorsize/1')}}" role="button">新增顏色</a>
			</label>
		</div>
		<div class="form-group">
			<label>尺寸:
				<br/>
				@php $i=0; @endphp 
				@foreach($Size as $sizes)
					<div class="form-check form-check-inline">
					  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value={{$sizes->size}} name="size[]" value={{old('size[]',$Merchandise->size)}}>
					  <label class="form-check-label" for="inlineCheckbox1">{{$sizes->size}}</label>
					</div>
					@php
						$i++;
						if($i==10){
							echo '<br/>';
							$i=0;
						}
					@endphp
				@endforeach
				<br/>
				<a class="btn btn-primary" href="{{url('/merchandise/createcolorsize/2')}}" role="button">新增尺寸</a>
			</label>
		</div>
		<div class="form-group">
		    <label for="exampleFormControlTextarea1">說明:</label>
		    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="discript" >{{old('discript',$Merchandise->discript)}}</textarea>
		</div>
		<button type="submmit" class="btn btn-outline-dark">
			更新商品資訊
		</button>
		{{csrf_field()}}
	</form>
			
		
@stop