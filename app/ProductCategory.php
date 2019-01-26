<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $table = 'product_categories';

    protected $fillable = ['name', 'slug', 'description'];

    public function products()
    {
    	return $this->hasManyThrough(
    		'App\Product', 'App\Subcategory',
    		'category_id', 'pro_subcatId', 'id'
    	);
    }

	public function subcategory()
	{
		return $this->hasMany('App\Subcategory', 'category_id');
	}    
}
