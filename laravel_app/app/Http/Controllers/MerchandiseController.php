<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Image;
use DB;
class MerchandiseController extends Controller
{
    //
    public function createPage(){
    	
    	$merchandisedata=[
    		'type' => '',
    		'stype'=> '',
    		'number'=>'',
    		'name'=>'',
    		'discript'=>'',
    		'photo'=>'',
    	];
    	$Merchandise = \App\Merchandise::create($merchandisedata);
    	
    	return redirect('/merchandise/'.$Merchandise->id.'/edit');
    }
    public function editPage($merchandise_id){
    	
    	$Merchandise = \App\Merchandise::findOrFail($merchandise_id);
    	$Color = \App\color::all();
    	$Size = \App\size::all();
    	if(!is_null($Merchandise->photo)){
    		$Merchandise->photo = url($Merchandise->photo);
    	};
    	$binding = [
    		'title' => '巧福手套股份有限公司',
    		'Merchandise'=>$Merchandise,
    		'Color'=>$Color,
    		'Size'=>$Size,
    	];
    	return view('site.products.editMerchandise',$binding);
    }
    
    public function typelistPage($merchandise_type){
    	$row_per_page = 9;
    	$MerchandisePaginate = \App\Merchandise::where("type",$merchandise_type)
    							->paginate($row_per_page);
    	foreach($MerchandisePaginate as $Merchandise){
    		if(!is_null($Merchandise->photo)){
    			$Merchandise->photo = url($Merchandise->photo);
    		}
    	}					
    	$binding = [
    		'title' => "巧福手套股份有限公司",
    		'merchandises' => $MerchandisePaginate,
    		'typelist' => 1,
    		'type' => $merchandise_type,
    	];		    	
    	return view('site.products.listMerchandise',$binding);
    }
    public function itemlistPage($merchandise_type,$merchandise_id){
    	
    	$Merchandise = \App\Merchandise::findOrFail($merchandise_id);
    	$Merchandise = \App\Merchandise::where("id",$merchandise_id)->take(1)->get();
    	
    	//$colors = array();
    	foreach($Merchandise as $merchandise){
    		//array_push($colors, $merchandise->color);
    		$colors = $merchandise->color;
    	}

    	//$sizes = array();
    	foreach($Merchandise as $merchandise){
    		//array_push($sizes, $merchandise->size);
    		$sizes =$merchandise->size;
    	}
    	foreach($Merchandise as $merchandise){
    		if(!is_null($merchandise->photo)){
    			$merchandise->photo = url($merchandise->photo);
    		}
    	}

    	$binding=[
    		'title' => '巧福手套股份有限公司',
    		'Merchandise' => $Merchandise[0],
    		'colors'=> $colors,
    		'sizes'=>$sizes,
    	];
    	
    	return view('site.products.itemMerchandise',$binding);
    }
    public function indexPage(){
    	$binding=[
    		'title' => '商品管理',
    		
    	];
    	return view('site.products.manageindex',$binding);
    }
    public function managelistpage(){
    	$row_per_page = 10;
    	$MerchandisePaginate = \App\Merchandise::orderBy('type')
    							->paginate($row_per_page);
    	/*$colors = \App\color::get();
    	$sizes = \App\size::get();*/
    	$merchandise=\App\Merchandise::find(1);
    	
    	$colors = array();
    	foreach($MerchandisePaginate as $Merchandise){
    		array_push($colors, $Merchandise->color);
    	}
    	$sizes = array();
    	foreach($MerchandisePaginate as $Merchandise){
    		array_push($sizes, $Merchandise->size);
    	}
    	//return $colors[0];
    	foreach($MerchandisePaginate as $Merchandise){
    		if(!is_null($Merchandise->photo)){
    			$Merchandise->photo = url($Merchandise->photo);
    		}
    	}

    	$binding = [
    		'title' => "巧福手套股份有限公司",
    		'merchandises' => $MerchandisePaginate,
    		'colors'=> $colors,
    		'sizes'=>$sizes,

    	];
    	return view('site.products.manageMerchandise',$binding);
    }
    
    public function listPage(){
    	$row_per_page = 9;
    	$MerchandisePaginate = \App\Merchandise::orderBy('type')
    							->paginate($row_per_page);
    	foreach($MerchandisePaginate as $Merchandise){
    		if(!is_null($Merchandise->photo)){
    			$Merchandise->photo = url($Merchandise->photo);
    		}
    	}
					
    	$binding = [
    		'title' => "巧福手套股份有限公司",
    		'merchandises' => $MerchandisePaginate,
    		'typelist' => 0,
    	];

    	return view('site.products.listMerchandise',$binding);
    }
    public function update($merchandise_id){
    	$Merchandise = \App\Merchandise::findOrFail($merchandise_id);
    	$input = request()->except('color','size');
    	$input2 =request()->only('color');  //須將value也改成所需要的值 不然會全部變成一樣的
    	$input3 =request()->only('size');
    	$rules = [
    		'type'=>[
    			'required',
    		],
    		'stype'=>[
    			'required',
    			'max:10',
    		],
    		'number'=>[
    			'required',
    			'max:20',
    		],
    		'name'=>[
    			'required',
    			'max:50',
    		],
    		'discript'=>[
    			
    			'max:1000',
    		],
    		'photo'=>[
    			
    			'file',
    			'image',
    			'max:10240',
    		]
    	];
    	$rules2 = [
    		/*"color"=>['required',]*/
    	];
    	$rules3 = [
    		/*"size"=>['required',]*/
    	];
    	$validator = Validator::make($input,$rules);
    	$validator2 = Validator::make($input2,$rules2);
    	$validator3 = Validator::make($input3,$rules3);
    	if($validator->fails()){
    		return redirect('/merchandise/'.$Merchandise->id.'/edit')
    			
    			->withIuput(request()->all)
    			->withErrors($validator2)
    			->withErrors($validator3)
				->withErrors($validator);
    	}
    	if($validator2->fails()){
    		return redirect('/merchandise/'.$Merchandise->id.'/edit')
    			->withErrors($validator2)
    			->withErrors($validator3)
				->withErrors($validator)
    			->withIuput(request()->all );
    	}
    	if($validator3->fails()){
    		return redirect('/merchandise/'.$Merchandise->id.'/edit')
    			->withErrors($validator2)
    			->withErrors($validator3)
				->withErrors($validator)
    			->withIuput(request()->all);
    	}
    	if(isset($input['photo'])){
    		$photo =$input['photo'];
    		$file_extension=$photo->getClientOriginalExtension();
    		$file_name = uniqid().'.'.$file_extension;
    		$file_relative_path ='img/merchandise'.$file_name;
    		$file_path = public_path($file_relative_path);
    		//$image =Image::make($photo)->resize(450,300)->save($file_path);
    		$image =Image::make($photo)->resize(450,300,function($constraint){$constraint->aspectRatio();})->resizeCanvas(450, 300,'center', false)->save($file_path);
    		$input['photo'] = $file_relative_path;

    	}
    	else{
    	    $input["photo"] = $Merchandise->photo;
    	}
    	$Merchandise->update($input);
    	$Merchandise->stype=$input["stype"];
    	$Merchandise->number=$input["number"];
    	$Merchandise->name=$input["name"];
    	$Merchandise->discript=$input["discript"];
    	$Merchandise->photo=$input["photo"];
    	$Merchandise->save();
    	
    	
    	$recreate = DB::table('merchandise_color')->select('id')->where('merch_id',$merchandise_id)->delete();	
    	foreach($input2 as $colors){
    		foreach($colors as $color){
	    		$color_id = \App\color::where('color','=',$color)->select('id')->take(1)->get();
	    		/*$recreate = DB::table('merchandise_color')->select('id')->where('merch_id',$merchandise_id)
	    													->where('color_id',$color_id[0]["id"])->get();*/
	    		
	    												    													
	    		/*if($recreate->isEmpty()){*/
		    		DB::table('merchandise_color')->insert(
		    		 	['merch_id'=>$merchandise_id,'color_id'=>$color_id[0]["id"]]
		    		);
	    		/*}*/
    		}
    		
    		
    	}
    	
    	$recreate2 = DB::table('merchandise_size')->select('id')->where('merch_id',$merchandise_id)->delete();	
    	foreach($input3 as $sizes){
    		foreach($sizes as $size){
	    		$size_id = \App\size::where('size','=',$size)->select('id')->take(1)->get();
	    		/*$recreate = DB::table('merchandise_size')->select('id')->where('merch_id',$merchandise_id)
	    													->where('size_id',$size_id[0]["id"])->get();*/
	    		
	    		//session()->flash('flash_message','a');									    		
	    		/*if($recreate->isEmpty()){*/
		    		DB::table('merchandise_size')->insert(
		    			['merch_id'=>$merchandise_id,'size_id'=>$size_id[0]["id"]]
		    		);
	    		/*}*/
	    	}
    	}
    	
    	return redirect('/merchandise/'.$Merchandise->id.'/edit');

    }
    public function newcolor_size($choice){
        $binding = [
            'title' => "新增顏色尺寸",
            'choice' => $choice,
            
        ];

        return view('site.products.newcolorsize',$binding);
    }
    public function colorsizeupdate($choice){
        $input = request()->all();
        
        if($choice==1){
            for($i =1;$i<=3;$i++){
                $check = \App\color::where('color',$input[$i])->get();
                
               
                if($input[$i] and $check->isEmpty()){
                    $colordata = [
                        'color' => $input[$i],    
                    ];
                    //return $colordata;
                    \App\color::create($colordata);
                }
            }
        }
        if($choice==2){
            for($i =1;$i<=3;$i++){
                 $check = \App\size::where('size',$input[$i])->get();
                if($input[$i] and $check->isEmpty()){
                    $sizedata = [
                        'size' => $input[$i],    
                    ];
                    //return $colordata;
                    \App\size::create($sizedata);
                }
            }
        }
        return redirect()->back();

    }
    public function delete($merchandise_id){
        $merchdise = \App\Merchandise::where("id","=",$merchandise_id)->delete();
        return redirect()->back();
    }


}
