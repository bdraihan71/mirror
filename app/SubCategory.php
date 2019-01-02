<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Categories;

class SubCategory extends Model
{
    protected $fillable = ['categories_id', 'data', 'title'];

    public function category()
    {
        return $this->belongsTo('App\Categories', 'categories_id');
    }
}
