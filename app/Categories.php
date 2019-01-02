<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SubCategory;

class Categories extends Model
{
    protected $fillable = ['name', 'type', 'image', 'call_to_action'];

    public function subCategories()
    {
        return $this->hasMany('App\SubCategory', 'categories_id');
    }
}
