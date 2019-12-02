<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testcontroller extends Controller
{
    //
    public function index()
    {
        return '這是最新消息的首頁';
    }
    public function create(){
    	return '新增一筆資料';
	}
	public function hello(){
		return view('hello');
	}
	public function bladetest(){
		return view('site.bladetest');
		
	}
	public function show_id($id){
		return view('hello')->with('id',$id);
		return view('hello',compact('id',$id));
	}
	public function store()
	{
	    $input = Input::all();
	    return $input['title'];
	}
	public function showdata(){
		$data = \App\Users::paginate(2);	
		//$data = \App\Users::all();
		return view('site.show')->with('user',$data);
	}
}
