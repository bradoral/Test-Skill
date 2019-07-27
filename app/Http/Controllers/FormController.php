<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class FormController extends Controller
{
    //
    function saveData(Request $request){

        $data = $request->all();


		$validator = Validator::make($data,[

			"product_name" => 'required|max:100',
            "quantity" => 'required',
            "item_price" => 'required',

        ]);


		if ($validator->fails()) {

			return redirect()->back()->withInput()->with('message',$validator->errors());
        }
        $oldjson = file_get_contents(base_path('public/files/main.json'));

        $olddata = json_decode($oldjson, true);

        unset($data["_token"]);
        unset($data["submit"]);

        $data['dateTimeSubmited'] = now();
        if($olddata != null){
            array_push($olddata,$data);
            $stringJson = json_encode($olddata, JSON_PRETTY_PRINT);
        }else{
            $mainArr = array ();
            array_push($mainArr,$data);
            $stringJson = json_encode($mainArr, JSON_PRETTY_PRINT);
        }




        file_put_contents(base_path('public/files/main.json'), stripslashes($stringJson));

        $maindata = json_decode(file_get_contents(base_path('public/files/main.json')), true);

        return View::make('form')->with('maindata', $maindata);

    }
}
