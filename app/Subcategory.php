<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $table = 'subcategories';

    protected $fillable = ['category_id', 'name', 'slug', 'description'];

    public function category()
    {
    	return $this->belongsTo('App\ProductCategory');
    }

    public function subclassifications()
    {
        return $this->hasMany('App\SubClassification', 'subcategory_id');
    }

    public function products()
    {
    	return $this->hasMany('App\Product', 'pro_subcatId');
    }
}
