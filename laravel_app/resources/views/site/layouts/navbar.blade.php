 <nav class="navbar navbar-expand-lg  navbar-light bg-light">
	  <div class="container">
		  <a class="navbar-brand" href={{url('/')}} >巧福手套</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav ml-auto">
		      <li class="nav-item active">
		        <a class="nav-link" href={{url('/')}}>首頁 <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href={{url('/about')}}>關於公司</a>
		      </li>
		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="products.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          產品介紹
		        </a>

		        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
		        	<a class="dropdown-item" href="{{url('/merchandise/口罩')}}">口罩</a>
		         	<a class="dropdown-item" href="{{url('/merchandise/手套')}}">手套</a>
		          	<a class="dropdown-item" href="{{url('/merchandise/圍裙袖套')}}">圍裙袖套</a>
		        	<a class="dropdown-item" href="{{url('/merchandise/手指套')}}">手指套</a>
		        	<a class="dropdown-item" href="{{url('/merchandise/無塵室')}}">無塵室</a>
		        	<a class="dropdown-item" href="{{url('/merchandise/PE/PP')}}">PE/PP</a>
		        	<a class="dropdown-item" href="{{url('/merchandise/PE膜')}}">PE膜</a>
		        	<a class="dropdown-item" href="{{url('/merchandise/PVC膜')}}">PVC膜</a>
		        	<a class="dropdown-item" href="{{url('/merchandise/工安')}}">工安</a>
		        	<a class="dropdown-item" href="{{url('/merchandise/太空袋')}}">太空袋</a>
		        	<a class="dropdown-item" href="{{url('/merchandise/包裝材料')}}">包裝材料</a>
		        	<a class="dropdown-item" href="{{url('/merchandise/打包帶')}}">打包帶</a>
		        	<a class="dropdown-item" href="{{url('/merchandise/清潔')}}">清潔</a>
		        	<a class="dropdown-item" href="{{url('/merchandise/雨鞋')}}">雨鞋</a>
		        	<a class="dropdown-item" href="{{url('/merchandise/膠帶')}}">膠帶</a>
		        	<div class="dropdown-divider"></div>
		          	<a class="dropdown-item" href="{{url('/merchandise')}}">所有產品</a>
		        	
		        </div>
		       <!-- <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
		        
		          <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#">口罩</a>
		          
		          	<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				        <a class="dropdown-item" href="#">Action</a>
				        <a class="dropdown-item" href="#">Another action</a>
				    </div>
				  </li>
		          <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="{{url('/merchandise/手套')}}">手套</a></li>
		          <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="{{url('/merchandise/圍裙袖套')}}">圍裙袖套</a></li>
		          <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="{{url('/merchandise/手指套')}}">手指套</a></li>
		          <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="{{url('/merchandise/無塵室')}}">無塵室</a></li>
		          <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="{{url('/merchandise/PE/PP')}}">PE/PP</a></li>
		          <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="{{url('/merchandise/PE膜')}}">PE膜</a></li>
		          <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="{{url('/merchandise/PVC膜')}}">PVC膜</a></li>
		          <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="{{url('/merchandise/工安')}}">工安</a></li>
		          <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="{{url('/merchandise/太空袋')}}">太空袋</a></li>
		          <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="{{url('/merchandise/包裝材料')}}">包裝材料</a></li>
		          <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="{{url('/merchandise/打包帶')}}">打包帶</a></li>
		          <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="{{url('/merchandise/雨鞋')}}">雨鞋</a></li>
		          <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="{{url('/merchandise/清潔')}}">清潔</a></li>
		          <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="{{url('/merchandise/膠帶')}}">膠帶</a></li>
		          
		          <div class="dropdown-divider"></div>
		          <a class="dropdown-item" href="products.html">所有產品</a>
		        </ul>-->
		      </li>
		      <li class="nav-item">
		        <a class="nav-link " href={{url('/contactus')}}>聯絡我們</a>
		      </li>
		      @if(session()->has('manager_id'))
		      	<li class="nav-item">
		        	<a class="nav-link " href={{url('/merchandise/manageindex')}}>管理員介面</a>
		       	</li>
		      @endif
		      <li class="nav-item">
		      	@if(session()->has('manager_id'))
		        	<a class="nav-link " href={{url('/auth/sign-out')}}>登出</a>
		        @else
		        	<a class="nav-link " href={{url('/auth/sign-in')}}>管理員登入</a>
		        @endif
		      </li>
		    </ul>
		  </div>
	    <!--
	    <form class="form-inline my-2 my-lg-0">
	      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
	      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
	    </form>
		-->
	 </div>
	  
	</nav>