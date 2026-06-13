<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
       protected $fillable = [
        'id',
        'title_en',
        'title_ru',
        'title_ar',
        'cate_img',
        'description_en',
        'description_ru',
        'description_ar',
        'role',
        'status',
    ];

    public function products()
{
    return $this->hasMany(Product::class, 'category_id');
}

}
