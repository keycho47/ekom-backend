<?php

namespace App\Http\Controllers\API;

use App\Entity;
use \App\Http\Resources\Entity as EntityResource;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use function GuzzleHttp\Promise\all;

class EntityController extends Controller
{
    /**
 * Display a listing of the resource.
 *
 * @return AnonymousResourceCollection
 */
    public function index()
    {
        $entity = Entity::all();
        return EntityResource::collection($entity);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $newEntity = Entity::create($request->all());
        return response()->json($newEntity , 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Entity $entity
     * @return Entity
     */
    public function show(Entity $entity)
    {
        return $entity;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Entity $entity
     * @return JsonResponse
     */
    public function update(Request $request, Entity $entity)
    {
        $entity->update($request->all());
        return response()->json($entity ,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Entity $entity
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Entity $entity)
    {
        $entity->delete();

        return response()->json(null, 204);
    }
}
