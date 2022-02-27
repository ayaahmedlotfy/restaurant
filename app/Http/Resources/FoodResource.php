<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FoodResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
       return[
"Food_Name"=>$this->name,
"Food_Price"=>$this->price,
"Food_Description"=>$this->description,
"Food_Category_Name"=>new CategoryResource($this->category)

       ];
    }
}
