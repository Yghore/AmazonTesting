<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;

class HomeController extends Controller
{
    public function index()
    {
        $data = ProductController::getProductForUser(Auth::user()->id);
        return view('home')
        ->with('products_user', $data);
    }
}
