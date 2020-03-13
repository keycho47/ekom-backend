<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Price;
use App\Stock;

class ReportController extends Controller
{
    public function getCurrentState(){
        $current_state = 0;

        $entityState = Stock::where('entity_id' , 1)->get();
        foreach ($entityState as $stock) {
            $productPrice = Price::where('product_id', $stock->product_id)->first();
            $current_state = $current_state - ($productPrice->price_without_tax * $stock->quantity);
        }

        $entityState = Stock::where('entity_id' , 2)->get();
        foreach ($entityState as $stock) {
            $productPrice = Price::where('product_id', $stock->product_id)->first();
            $current_state = $current_state + ($productPrice->price_without_tax * $stock->quantity);
        }

        $entityState = Stock::where('entity_id' , 3)->get();
        foreach ($entityState as $stock) {
            $productPrice = Price::where('product_id', $stock->product_id)->first();
            $current_state = $current_state + ($productPrice->price_without_tax * $stock->quantity);
        }

        $entityState = Stock::where('entity_id' , 4)->get();
        foreach ($entityState as $stock) {
            $productPrice = Price::where('product_id', $stock->product_id)->first();
            $current_state = $current_state - ($productPrice->price_without_tax * $stock->quantity);
        }


        return response(['current_state' => $current_state,]);

    }
}
