<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubClassification extends Model
{
    protected $table = 'subclassifications';

    protected $fillable = ['subcategory_id', 'name', 'slug', 'description', 'status'];

    public function subcategory()
    {
    	return $this->belongsTo('App\Subcategory', 'subcategory_id');
    }
}
