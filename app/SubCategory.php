<?php

namespace App;

use App\Categories;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = ['categories_id', 'data', 'title'];

    public function category()
    {
        return $this->belongsTo('App\Categories');
    }
}
