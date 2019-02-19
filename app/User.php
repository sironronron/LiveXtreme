<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends \TCG\Voyager\Models\User implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'avatar', 'name', 'email', 'password', 'birthday', 'gender_id', 'phone','facebook_id', 'subscribed'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function addNew($input)
    {
        $check = static::where('facebook_id', $input['facebook_id'])->first();

        if(is_null($check)) {
            return static::create($input);
        }

        return $check;
    }

    public function addresses()
    {
        return $this->hasMany('App\AddressBook');
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

}
