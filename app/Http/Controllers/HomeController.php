<?php

   

namespace App\Http\Controllers;

  

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class HomeController extends Controller

{

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()

    {

        //sthis->middleware('auth');

    }

  

    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Contracts\Support\Renderable

     */

    public function index()

    {
        return view('home')->with([
            "products" => Product::latest()->paginate(5),
            "category" => Category::has('products')->get(),
            
        ]);

    }

    public function GetProductsByCategory(Category $category)

    {
        
        $products = $category->products()->paginate(5);

        return view('home')->with([
            "products" => $products,
            "category" => Category::has('products')->get(),
            
        ]);

    }

  

    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Contracts\Support\Renderable

     */

    public function adminHome()

    {

        return view('adminHome');

    }

    

}