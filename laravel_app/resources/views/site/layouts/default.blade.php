<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	  <link href="{{ URL::asset('css/normal.css') }}" rel="stylesheet">
    <link rel="Shortcut Icon" type="image/x-icon" href="{{URL::asset('img/company.ico')}}" />
    <meta name="Keywords" content="巧福手套 巧福口罩 包裝材料 工業用品 口罩 手套 無塵布 無塵室 無塵紙 無塵衣 圍裙袖套 PE PP 工安 PE膜 PVC膜 打包帶 清潔 雨鞋 膠帶">
    <meta name="description" content="">
	@yield('info')
   <title>@yield('title')</title>
  </head>
  <body>
	<!--<script src="header.js"></script>
	<include src="./header.html"></include>-->
	
	@include('site.layouts.navbar')
 
	 <div class=" container" id="banner">
	   
	 </div>
  
	<div class="container">
		@yield('position')
	</div>
	<div class="container">
        @yield('content')
    </div>	
	
	
	@include('site.layouts.footer')
	
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ URL::asset('js/normal.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/include.js') }}"></script>
  </body>
</html>