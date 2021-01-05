<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(request $request, $id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        return view('product')->with('product', $product);
    }

    public static function getProductForUser(int $id_user)
    {
        $products = DB::table('product_users')
        ->join('products', 'product_users.product_id', '=', 'products.id')->where('user_id', '=', $id_user)->get()->toArray();
        return $products;
    }
}
