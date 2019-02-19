<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddressBook extends Model
{
    protected $table = 'address_books';

    protected $fillable = ['firstname', 'lastname', 'address1', 'address2', 'city', 'state', 'country', 'zipCode', 'telNo', 'default'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
