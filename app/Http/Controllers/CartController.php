<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;

class CartController extends Controller
{
    //return cart items
    Public function index(){
        return view("cart.index")->with([
            "items"=> \Cart::getContent()
        ]);
    }
    
    //add item to cart
    public function addProductToCart(Request $request,Product $product){

        \Cart::Add(array(

            'id' => $product->id, // inique row ID
            'name' => $product->title,
            'price' => $product->price,
            'quantity' => $request->qty,
            'attributes' => array(),
            'associatedModel' => $product
        ));

        return redirect()->route("cart.index");

    }

    //update item 
    public function UpdateProductOnCart(Request $request,Product $product){

        \Cart::update($product->id,array(

            'quantity' => array(
                'relative' => false,
                'value' => $request->qty,
            ),
        )
       
    
    );

    return redirect()->route("cart.index");

    }

        //remove item 
        public function RemoveProductFromCart(Request $request ,Product $product){

            \Cart::remove($product->id,array(
    
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->qty,
                ),
            )
           
        
        );
    
        return redirect()->route("cart.index");
    
        }
}
