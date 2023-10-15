<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

            'article'=>$this->article,
            'name'=>$this->name,
            'status'=>$this->status,
            'DATA'=> $this->DATA,
        ];
    }
}
