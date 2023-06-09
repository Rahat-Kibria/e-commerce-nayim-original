<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Http\Controllers\Controller;

class ProductStockController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function ProductStock(){
        $product=Product::all();
        return view('admin.stock.stock',compact('product'));

    }
}
