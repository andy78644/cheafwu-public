@extends('site.layouts.default')
@section('title')
	{{$title}}
@stop
@section('content')	
	@include('components.validationErrorMessage')

	<div class="container">
		<form action="/auth/sign-in" method="post">
			
			<div class="form-group">
			    <label >Email address</label>
			    <input type="email" class="form-control"  aria-describedby="emailHelp" placeholder="Enter email" name="email" value="{{old('email')}}">
			    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
			</div>
			<div class="form-group">
			    <label for="exampleInputPassword1">Password</label>
			    <input type="password" class="form-control"  placeholder="Password" name="password" value="{{old('password')}}">
			</div>
			
			<button type="submit" class="btn btn-primary">Submit</button>
			{!!csrf_field()!!}
		</form>
	</div>



@endsection