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
"Food_ImagePath"=>$this->imagepath,
"Food_Image"=>$this->image,

"Food_Category"=>new CategoryResource($this->category)

       ];
    }
}
