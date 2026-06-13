<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();
        $categories = DB::table("categories")->select("id","cate_img","title_".app()->getLocale()." as banga" ,"description_".app()->getLocale()." as dodo")->get();
        $products = Product::all();
        $orders = Order::all();
        return view('home',["users"=>$users,"category"=>$categories,"products"=>$products,"orders"=>$orders]);
    }
}
