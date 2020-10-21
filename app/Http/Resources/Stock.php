<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Stock extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $date = date('d-m-Y H:i:s', strtotime($this->created_at));
        return [
            'id' => $this->id,
            'client_name' => $this->client->name,
            'product_name' => $this->product->name,
            'user_name' => $this->user->name,
            'entity_name' => $this->entity->name,
            'description' => $this->description,
            'quantity' => $this->quantity,
            'time' => $date,
        ];
    }
}
