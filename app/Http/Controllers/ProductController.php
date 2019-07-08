<?php

namespace App\Http\Controllers;


use App\Events\MyChartEvent;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class ProductController extends Controller
{
    //poluchenie dannyh
    public function index()
    {
        $products = Product::orderBy('year')->get();

        return response()->json($products);
    }
//vstavka dannyh
    public function store(Request $request)
    {
        DB::table('products')->insert(
            ['name' => $request['name'], 'year'=>$request['year'],'price'=>$request['price']]
        );



        event(new MyChartEvent('123'));


        return response()->json(['success'=>'yes']);
    }

    public function test()
    {

        return view('test');
    }
}
