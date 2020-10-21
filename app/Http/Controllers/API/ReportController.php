<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Price;
use App\Product;
use App\Stock;
use App\Http\Resources\Stock as StockResources;

class ReportController extends Controller
{
    public function getCurrentState($date){
        $current_state = 0;

        $stockListByDate = Stock::where('created_at',$date)->get();


        $entityState = $stockListByDate->where('entity_id' , 1);
        foreach ($entityState as $stock) {
            $product = Product::where('id', $stock->product_id)->first();
            $current_state = $current_state - ($product->price * $stock->quantity);
        }

        $entityState = $stockListByDate->where('entity_id' , 2);
        foreach ($entityState as $stock) {
            $product = Product::where('id', $stock->product_id)->first();
            $current_state = $current_state + ($product->price * $stock->quantity);
        }

        $entityState = $stockListByDate->where('entity_id' , 3);
        foreach ($entityState as $stock) {
            $product = Product::where('id', $stock->product_id)->first();
            $current_state = $current_state + ($product->price * $stock->quantity);
        }

        $entityState = $stockListByDate->where('entity_id' , 4);
        foreach ($entityState as $stock) {
            $product = Product::where('id', $stock->product_id)->first();
            $current_state = $current_state - ($product->price * $stock->quantity);
        }
        $entityState = $stockListByDate->where('entity_id' , 5);
        foreach ($entityState as $stock) {
            $product = Product::where('id', $stock->product_id)->first();
            $current_state = $current_state - ($product->pricex * $stock->quantity);
        }
        $entityState = $stockListByDate->where('entity_id' , 6);
        foreach ($entityState as $stock) {
            $product = Product::where('id', $stock->product_id)->first();
            $current_state = $current_state + ($product->price * $stock->quantity);
        }
        $entityState = $stockListByDate->where('entity_id' , 7);
        foreach ($entityState as $stock) {
            $product = Product::where('id', $stock->product_id)->first();
            $current_state = $current_state - ($product->price * $stock->quantity);
        }
        $entityState = $stockListByDate->where('entity_id' , 8);
        foreach ($entityState as $stock) {
            $product = Product::where('id', $stock->product_id)->first();
            $current_state = $current_state + ($product->price * $stock->quantity);
        }
        $entityState = $stockListByDate->where('entity_id' , 9);
        foreach ($entityState as $stock) {
            $product = Product::where('id', $stock->product_id)->first();
            $current_state = $current_state - ($product->price * $stock->quantity);
        }


        return response(['current_state' => $current_state,'stock' => StockResources::collection($stockListByDate)]);

    }
    public function getStockByUseId($id){
        $stock = Stock::where('user_id', $id)->get();
        return response(StockResources::collection($stock));
    }
    public function getProductPrice($id){
        $productPrice = Price::where('product_id', $id)->first();

        return response()->json($productPrice, 200);
    }
}
