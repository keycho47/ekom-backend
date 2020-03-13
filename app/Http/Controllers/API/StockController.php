<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Stock as StockResources;
use App\Stock;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function index()
    {
        $allStock = Stock::all();
        return response(StockResources::collection($allStock));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $stock = Stock::create($request->all());

        return response()->json($stock, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Stock $stock
     * @return Stock
     */
    public function show(Stock $stock)
    {
        return $stock;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Stock $stock
     * @return JsonResponse
     */
    public function update(Request $request, Stock $stock)
    {
        $stock->update($request->all());

        return response()->json($stock, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Stock $stock
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Stock $stock)
    {
        $stock->delete();

        return response()->json(null, 204);
    }
}
