<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\News; //引入news這個model


/*Route::get('/', function () {
    return view('welcome');
});
//Route::post('/','testcontroller@store');

/*Route::get('about', function () {
return 'this is about!';
});
Route::get('/abc', function ( ) {
	$color ="紅";
	$abc = \App\color::where('color','=',$color)->take(1)->get();
	return $abc[0]["id"];
});
Route::get('about', function ( ) {
return "fuck";
});
Route::get('/user/{id}',function($id){
    return 'user_id:'.$id;
});
Route::resource('news','testcontroller');
Route::get('/hello','testcontroller@hello');
Route::get('/new/{id}','testcontroller@show_id');
Route::get('/insert',function(){
   DB::insert('insert into roles(name) values(?)',['admin']);
   DB::insert('insert into roles(name) values(?)',['normal']);


	//$posts = news::all();
});
route::get('/bladetest','testcontroller@bladetest');
Route::get('/read',function(){
    $posts = News::all();
    
    foreach($posts as $post){
        return $post->title;
    };
});
Route::get('/update',function(){
    /*Schema::table('merchandise_color', function($table)
	{
	    $table->integer('merch_id');
	    $table->integer('color_id');
	});*/
	/*$color = new \App\color;
	$color->color = '黃';
	$color->save(); 
	$size = new \App\size;
	$size->size = 'L';
	$size->save(); 

    return 1;
});
Route::get('/delete',function(){
	$delete = DB::delete('delete from news where id=?',[1]);
	return $delete;
});
Route::get('/find',function(){
	$find = News::find(2); 
	return $find;
});
Route::get('/find2',function(){
	$find = \App\Users::find(2);
	return $find;
});
Route::get('/users/{id}/role',function($id){
    $user = \App\Users::find($id);

    foreach($user->roles as $role){
        return $role->name;
    }
});


Route::get('/showdata','testcontroller@showdata');
route::get('/contact',function(){
	return view('site.contact');
});

route::get('/edit',function(){
	return view('site.products.editMerchandise');
});
*/

//正式的

Route::get('/','HomeController@indexPage');
route::get('/about','HomeController@aboutPage');
Route::get('/contactus','HomeController@contactPage');


Route::group(['prefix'=>'merchandise'],function(){

	Route::get('/','MerchandiseController@listPage');
	Route::group(['middleware'=>['auth.admin']],function(){
		
		Route::get('/create','MerchandiseController@createPage');    //創建新商品
		
		/*Route::get('/{merchandise_type}/{merchandise_id}','MerchandiseController@itemlistPage');   //列出單項商品*/
		Route::get('/{merchandise_id}/edit','MerchandiseController@editPage')->where('merchandise_id', '[0-9]+');  //編輯更新
		Route::put('/{merchandise_id}','MerchandiseController@update');
		route::get('/manage','MerchandiseController@managelistpage');
		route::get('/createcolorsize/{choice}','MerchandiseController@newcolor_size');
		route::get('/manageindex','MerchandiseController@indexPage');
		route::put('/colorsizeupdate/{choice}','MerchandiseController@colorsizeupdate');
		route::get('/delete/{merchandise_id}','MerchandiseController@delete');
	});
	Route::get('/{merchandise_type}','MerchandiseController@typelistPage');    //列出商品
	Route::get('/{merchandise_type}/{merchandise_id}','MerchandiseController@itemlistPage')->where('merchandise_id', '[0-9]+'); 
});

Route::group(['prefix'=>'auth'],function(){
	route::get('sign-in','rootsign@signinPage');
	route::get('sign-out','rootsign@signout');
	Route::post('sign-in','rootsign@signin');
	Route::get('sign-up','rootsign@signupPage')->middleware(['auth.admin']);
	Route::post('sign-up','rootsign@signup');

});