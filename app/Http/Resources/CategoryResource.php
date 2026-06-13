<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [ 
        "Identity"=>$this->id,
        "Image"=>$this->cate_img,
        "Title"=>$this->title_en,
        "Title_ar"=>$this->title_ar,
        "Description"=>$this->description_en,
        "Description_ar"=>$this->description_ar,

        ];
    }
}
