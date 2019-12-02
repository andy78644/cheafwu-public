@extends('site.layouts.default')
@section('title')
	{{$title}}
@stop
@section('content')	
	<a class="btn btn-primary" href="{{url('/merchandise/create')}}" role="button">新增</a>
	<br/><br/>
	<a class="btn btn-primary" href="{{url('/merchandise/manage')}}" role="button">管理商品</a>
	<br/><br/>
	<a class="btn btn-primary" href="{{url('/auth/sign-up')}}" role="button">註冊新帳號</a>
	<br/><br/>
	<a class="btn btn-primary" href="#" role="button">Link</a>





@endsection