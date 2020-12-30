<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Player extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'country' => $this->country,
            'attack_level' => $this->attack_level,
            'defense_level' => $this->defense_level,
            'is_goalkeeper' => $this->is_goalkeeper,
            'price' => $this->price,
        ];
    }
}
