@extends('site.layouts.default')
@section('title')
	{{$title}}
@stop
@section('content')	
	@include('components.validationErrorMessage')

	<div class="container">
		<form action="/merchandise/colorsizeupdate/{{$choice}}" method="post" enctype="multipart/form-data" class="form-inline">
			{{method_field("PUT")}}
			<label class="sr-only" for="inlineFormInputName2">Name</label>
			  <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="" name="1">

			<label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
			<label class="sr-only" for="inlineFormInputName2">Name</label>
			  <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="可不填" name="2">

			<label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
			<label class="sr-only" for="inlineFormInputName2">Name</label>
			  <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="可不填" name="3">

			<label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
			
			<button type="submit" class="btn btn-primary">Submit</button>
			{!!csrf_field()!!}
		</form>
	</div>




@endsection