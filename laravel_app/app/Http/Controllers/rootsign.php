<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Hash;
use Mail;
class rootsign extends Controller
{
    //
	public function signinPage(){
		$binding=[
			'title' => '巧福手套股份有限公司'
		];
		return view('site.auth.signin',$binding);
	}
	public function signin(){
		$input = request()->all();


		$rules=[
			'email'=>[
				'required',
				'max:150',
				'email',
			],
			'password'=>[
				'required',
				'min:6',
			],
		];
		$validator = Validator::make($input,$rules);
		if($validator->fails()){
			return redirect('/auth/sign-in')
				->withErrors($validator)
				->withIuput($input);
		}
		$manager = \App\Manager::where('email',$input['email'])->firstOrFail();
		//return $manager;
		$password_check = Hash::check($input['password'],$manager->password);
		//return $password_check;
		if(!$password_check){
			$error_message =[
				'msg'=>['密碼錯誤',],
			];
			return redirect('/auth/sign-in')
				->withErrors($error_message)
				->withIuput($input);
		}
		session()->put('manager_id',$manager->id);
		return redirect()->intended('/');

	}
	public function signout(){
		session()->forget('manager_id');
		return redirect('/');
	}
	public function signupPage(){
		$binding=[
			'title' => '帳號註冊'
		];
		return view('site.auth.signup',$binding);
	}
	public function signup(){
		$input= request()->all();
		$rules=[
			'email'=>[
				'required',
				'max:150',
				'email',
			],
			'password'=>[
				'required',
				'same:password_confirmation',
				'min:6',
			],
			'password_confirmation'=>[
				'required',
				'min:6',

			],
		];
		$validator = Validator::make($input,$rules);
		if($validator->fails()){
			return redirect('/auth/sign-in')
				->withErrors($validator)
				->withIuput($input);
		}
		$input['password'] =Hash::make($input['password']);
		
		$managers =\App\Manager::create($input);
		$mail_binding = [
			'nickname' => 'hello',
		];
		Mail::send('site.email.signUpEmailNotification',$mail_binding,function($mail) use ($input){
			$mail->to($input['email']);
			$mail->from('andy690100391@gmail.com');
			$mail->subject('註冊成功');
		});
		return redirect('/');

	}
}
