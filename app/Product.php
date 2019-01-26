<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use CyrildeWit\EloquentViewable\Viewable;
use CyrildeWit\EloquentViewable\Contracts\Viewable as ViewableContract;

class Product extends Model implements ViewableContract
{
	use Searchable;
	use Viewable;

	protected $table = 'products';

	protected $fillable = [
		'advertised', 'live', 'name', 'slug', 'cat_id', 'sub_id', 'description', 'price', 'discount', 'sku', 'weight', 'length', 'width', 'height',
		'purpose', 'stock'
	];

	public function presentPrice()
	{
		return money_format('$%i', $this->price / 100);
	}

	public function scopeMightAlsoLike($query)
	{
		return $query->inRandomOrder()->take(20);
	}

	public function category()
	{
		return $this->belongsTo('App\ProductCategory', 'cat_id');
	}

	public function subcategory()
	{
		return $this->belongsTo('App\Subcategory', 'sub_id');
	}

	public function subclassification()
	{
		return $this->belongsTo('App\SubClassification', 'subclass_id');
	}
}
