<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(request $request, $id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        return view('product')->with('product', $product);
    }

    public function ChangeStep(Request $request, $product)
    {
        $id = Auth::user()->id;
        $product = DB::table('product_users')->select()
        ->where('product_id', '=', $product)
        ->where('user_id', '=', $id)
        ->where('isValidate', '=', 1)
        ->get()->first();
        if(!empty($product)){
            $step = (int) $product->step;
            $nextStep = $step + 1;
            DB::table('product_users')->update(['step' => $nextStep, 'isValidate' => 0, 'updated_at' => now()]);
            return redirect('home')->with('success', 'Vous avez bien validé votre étape !');
        }
        return redirect('home')->withErrors(['Product_not_for_users' => 'Vous n\'avez pas la permission !']);
    }

    public function ChangeStepPost(Request $request)
    {

        $data = $request->all();
        $rules = 
        [
            'product' => 'required|integer',
            'information' => 'required|string',
        ];
        $messages = 
        [
            'product' => 'Le produit n\'est pas valide !',
            'information' => 'Les informations ne sont pas valide !',
        ];
        $validate = Validator::make($data, $rules, $messages)->validate();

        $id = Auth::user()->id;
        $prod_id = $request->input('product');
        $information = 'N de commande : \''. $request->input('information') .'\'';
        $product = DB::table('product_users')->select()
        ->where('product_id', '=', $prod_id)
        ->where('user_id', '=', $id)
        ->where('isValidate', '=', 1)
        ->get()->first();
        if(!empty($product)){
            $step = (int) $product->step;
            $nextStep = $step + 1;
            DB::table('product_users')->update(['step' => $nextStep, 'information' => $information, 'isValidate' => 0, 'updated_at' => now()]);
            return redirect('home')->with('success', 'Vous avez bien validé votre étape !');
        }
        return redirect('home')->withErrors(['Product_not_for_users' => 'Vous n\'avez pas la permission !']);  
    }

    public static function getProductForUser(int $id_user)
    {
        $products = DB::table('product_users')
        ->join('products', 'product_users.product_id', '=', 'products.id')->where('user_id', '=', $id_user)->get()->toArray();
        return $products;
    }
}
