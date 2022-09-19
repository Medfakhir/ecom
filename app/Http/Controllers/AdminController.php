<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    //
    public function __construct()
    {
   
        $this->middleware('auth:admin')
        ->except(["showAdminLoginForm", "adminLogin"]);
    }

    public function index()
    {
        return view("admin.index");
    }

    public function showAdminLoginForm()
    {
        return view("admin.auth.login");
    }

    public function adminLogin(Request $request)
    {
        
       /* $validated = $request->validate([

            'email' => 'required|email|max:255',
            'password' => 'required|max:8|min:4',
        ]);*/

        $validated = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'password' => 'required|max:8|min:4',
           
        ]);

        //dd($validated,$request);
        if($validated->fails()) {
            return redirect()->back()->withErrors($validated)->withInput();
        }


        if (auth()->guard("admin")->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ], $request->get("remember"))) {
            return redirect("/admin");
        } else {
            return redirect()->route("admin.login");
        }
    }

    public function adminLogout()
    {
        auth()->guard("admin")->logout();
        return redirect()->route("admin.login");
    }


}