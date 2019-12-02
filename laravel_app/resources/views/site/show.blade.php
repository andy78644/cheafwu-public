@extends('site.layouts.default')
	
@section('content')	
	@foreach($user as $users)
		<li>{{$users->id}}:{{$users->name }}
	@endforeach
	
	{!! $user->links() !!}
	{!! $user->render() !!}
@stop