<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class AdminController extends Controller
{
    public function index()
    {
        $img_list = ImageController::arrayImages();
        $users_list = DB::table('users')->get()->toArray();
        $products_list = DB::table('products')->where('isHidden', '=', 0)->get()->toArray();
        $validate_list = DB::table('product_users')
        ->join('users', 'product_users.user_id', '=', 'users.id')
        ->join('products', 'product_users.product_id', '=', 'products.id')
        ->select(['users.name as username', 'products.name as productname', 'product_users.id', 'products.img', 'step', 'product_users.updated_at', 'information'])
        ->where('isValidate', '=', 0)->get()->toArray();
        return view('admin.index')
        ->with('img_list', $img_list)
        ->with('users_list', $users_list)
        ->with('products_list', $products_list)
        ->with('validate_list', $validate_list);
    }


    protected function validatorProduct(array $data)
    {
        $rules = 
        [
            'name' => 'required|string|max:100',
            'price' => 'required',
            'keywords' => 'required|string',
            'reference' => 'required|string|max:100',
            'desc_product' => 'required|string',
            'img' => 'required|max:100',
        ];
        $messages = 
        [
            'name' => 'Le nom n\'est pas valide !',
            'price' => 'Le prix n\'est pas valide !',
            'keywords' => 'Les mots clés n\'est pas valide !',
            'reference' => 'La référence n\'est pas valide !',
            'desc_product' => 'La descrption n\'est pas valide !',
            'img' => 'L\'image n\'est pas valide !',
        ];
        return Validator::make($data, $rules, $messages)->validate();
    }

    protected function validatorProductForUsers(array $data)
    {
        $rules = 
        [
            'user_id' => 'required|integer',
            'product_id' => 'required|integer',
        ];
        $messages = 
        [
            'user_id' => 'L\'utilisateur n\'est pas valide !',
            'product_id' => 'Le produit n\'est pas valide !',
        ];
        return Validator::make($data, $rules, $messages)->validate();
    }

    public function addProduct(request $request)
    {

        $data = $request->all();
        unset($data['_token']);
        $validate = $this->validatorProduct($data);
        DB::table('products')->insert($data);
        $with = [
            'success' => 'Le produit à bien été ajouté !',
        ];
        return redirect('admin')->with($with);
        
    }


    public function addProductForUser(request $request)
    {
        $data = [
            'user_id' => $request->input('user'),
            'product_id' => $request->input('product'),
            'step' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ];
        $validate = $this->validatorProductForUsers($data);
        DB::table('product_users')->insert($data);
        $with = [
            'success' => 'Le produit à bien été ajouté pour l\'utilisateur !',
        ];
        return redirect('admin')->with($with);
        
    }

    public function validateStep(int $productuser)
    {
        DB::table('product_users')->where('id', '=', $productuser)->update(['isValidate' => 1]);
        $with = [
            'success' => 'Vous avez bien validé l\'étape',
        ];
        return redirect('admin')->with($with);
    }

    public function errorStep(int $productuser)
    {
        DB::table('product_users')->where('id', '=', $productuser)->update(['isValidate' => 1, 'step' => 4]);
        $with = [
            'success' => 'l\'étape à bien été erronée',
        ];
        return redirect('admin')->with($with);
    }

}
