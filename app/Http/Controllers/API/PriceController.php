<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Price as PriceResource;
use App\Price;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        $price = Price::all();
        return PriceResource::collection($price);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $price = Price::create($request->all());
        return response()->json($price , 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Price $price
     * @return Price
     */
    public function show(Price $price)
    {
        return $price;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Price $price
     * @return JsonResponse
     */
    public function update(Request $request, Price $price)
    {
        $price->update($request->all());
        return response()->json($price ,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Price $price
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Price $price)
    {
        $price->delete();

        return response()->json(null, 204);
    }
}
