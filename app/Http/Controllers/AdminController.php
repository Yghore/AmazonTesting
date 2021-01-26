<?php

namespace App\Http\Controllers;

use App\Mail\ErrorCommand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewCommands;
use App\Mail\ReceivedCommand;
use App\Mail\ValidCommand;

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


    public function users_list()
    {
        $users_list = DB::table('users')->get()->toArray();
        return view('admin.users_list')->with('users_list', $users_list);
    }

    public function user_add()
    {
        return view('admin.add_user');
    }

    public function user_add_product()
    {   
        $products_list = DB::table('products')->where('isHidden', '=', 0)->get()->toArray();
        $users_list = DB::table('users')->get()->toArray();
        return view('admin.add_product_for_user')
        ->with('users_list', $users_list)
        ->with('products_list', $products_list);
    }

    public function product_add()
    {
        $img_list = ImageController::arrayImages();
        return view('admin.add_product')
        ->with('img_list', $img_list);
    }

    public function products_list()
    {
        $products_list = DB::table('products')->where('isHidden', '=', 0)->get()->toArray();
        return view('admin.products_list')
        ->with('products_list', $products_list);
    }

    public function images_list()
    {
        $img_list = ImageController::arrayImages();
        return view('admin.images_list')
        ->with('img_list', $img_list);
    }

    public function image_add()
    {
        return view('admin.add_image');
    }

    public function waiting_list()
    {

        $validate_list = DB::table('product_users')
        ->join('users', 'product_users.user_id', '=', 'users.id')
        ->join('products', 'product_users.product_id', '=', 'products.id')
        ->select(['users.name as username', 'products.name as productname', 'product_users.id', 'products.img', 'step', 'product_users.isValidate', 'product_users.updated_at', 'information'])
        ->where('isValidate', '=', 0)->orWhere('step', '=', 2)->get()->toArray();
        return view('admin.waiting_list')
        ->with('validate_list', $validate_list);
    }

    public function manager_product()
    {
        $product = DB::table('product_users')
        ->join('users', 'product_users.user_id', '=', 'users.id')
        ->join('products', 'product_users.product_id', '=', 'products.id')
        ->select(['users.name as username', 'products.name as productname', 'product_users.id', 'products.img', 'step', 'product_users.updated_at', 'information'])
        ->get()->toArray();
        return view('admin.manager_product')
        ->with('products', $product);
    }

    public function deleteProductUser(int $id)
    {

        DB::table('product_users')->delete($id);
        return redirect(route('manager_product'))->with(['success' => 'Suprresion du produit pour l\'utilisateur effectué !']);
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
        return redirect(route('products_list'))->with($with);
        
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
        $user = DB::table('users')->select(['email'])->where('id', '=', $request->input('user'))->first();
        DB::table('product_users')->insert($data);
        Mail::to($user->email)->send(new NewCommands());
        $with = [
            'success' => 'Le produit à bien été ajouté pour l\'utilisateur !',
        ];
        return redirect(route('waiting_list'))->with($with);
        
    }

    public function validateStep(int $productuser)
    {
        
        $step = DB::table('product_users')->where('product_users.id', '=', $productuser)
        ->join('users', 'product_users.user_id', '=', 'users.id')
        ->select(['step', 'users.email', 'isValidate'])->first();
        if($step->step == 2 && $step->isValidate == 1){
            DB::table('product_users')->where('id', '=', $productuser)->update(['step' => 3]);
        }
        else 
        {
            DB::table('product_users')->where('id', '=', $productuser)->update(['isValidate' => 1]);
        }
        switch ($step->step) {
            case 1:
                Mail::to($step->email)->send(new ValidCommand());
                break;
            case 2:
                Mail::to($step->email)->send(new ReceivedCommand());
                break;
        }
        $with = [
            'success' => 'Vous avez bien validé l\'étape',
        ];
        return redirect(route('waiting_list'))->with($with);
    }

    public function errorStep(int $productuser)
    {
        DB::table('product_users')->where('id', '=', $productuser)->update(['isValidate' => 1, 'step' => 4]);
        $step = DB::table('product_users')->where('product_users.id', '=', $productuser)
        ->join('users', 'product_users.user_id', '=', 'users.id')
        ->select(['step', 'users.email'])->first();
        $with = [
            'success' => 'l\'étape à bien été erronée',
        ];
        
        Mail::to($step->email)->send(new ErrorCommand());
        return redirect(route('waiting_list'))->with($with);
    }

}
