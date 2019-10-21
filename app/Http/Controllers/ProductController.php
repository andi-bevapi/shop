<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    public function saveUsersOrder(Request $request){
        if($request->ajax()){
            
            $data = $request->all();

            
             $owner = $data['__owner'] ;
            foreach($data['__products'] as $product){
                $productModel = new Product();
                $productModel->car_id = $product['id'];
                $productModel->user_id = $product['user_id'];
                $productModel->owner_id = $owner;
                $productModel->price = $product['price'];
                $productModel->quantity = 1;
                $productModel->save();
            }

            return 'the data are saved';


            // $product = new Product();
            // $product->car_id = $request->car_id;
            // $product->user_id = $request->user_id;
            // $product->owner_id = $request->owner_id;
            // $product->price = $request->price;
            // $product->quantity = $request->quantity;
            // $product->save();

        }
    }
}
