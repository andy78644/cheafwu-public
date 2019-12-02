@extends('site.layouts.default')
@section('title')
	{{$title}}
@stop
@section('content')	
	@include('components.validationErrorMessage')
	<form action="/auth/sign-up" method="post">
			
		<div class="form-group">
			<label >Email address</label>
			<input type="email" class="form-control"  aria-describedby="emailHelp" placeholder="Enter email" name="email" value="{{old('email')}}">
		    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
		</div>
		<div class="form-group">
		     <label for="exampleInputPassword1">Password</label>
			 <input type="password" class="form-control"  placeholder="Password" name="password" value="{{old('password')}}">
		</div>
		<div class="form-group">
		     <label for="exampleInputPassword1">再次輸入password</label>
			 <input type="password" class="form-control"  placeholder="Password" name="password_confirmation" value="{{old('password')}}">
		</div>
		<div class="form-group">
			<label >帳號類型:</label>
		     <input class="form-control" type="text" placeholder="admin" readonly value="A" name="type">
		</div>
		<button type="submit" class="btn btn-primary">註冊</button>
		{!!csrf_field()!!}
	</form>
	



@endsection