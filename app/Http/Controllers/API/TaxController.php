<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Tax as TaxResources;
use App\Tax;
use Exception;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return ResponseFactory|Response
     */
    public function index()
    {
        $allTax = Tax::all();
        return response(TaxResources::collection($allTax));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $tax = Tax::create($request->all());

        return response()->json($tax, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Tax $tax
     * @return Tax
     */
    public function show(Tax $tax)
    {
        return $tax;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Tax $tax
     * @return JsonResponse
     */
    public function update(Request $request, Tax $tax)
    {
        $tax->update($request->all());

        return response()->json($tax, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Tax $tax
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Tax $tax)
    {
        $tax->delete();

        return response()->json(null, 204);
    }
}
