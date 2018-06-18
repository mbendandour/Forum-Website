<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'users';

    protected $usertype = [
        'is_admin' => 'boolean',
    ];

    protected $fillable = [

        'name', 'admin', 'username' , 'email', 'password', 'bio'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts(){

        return $this->hasMany('App\Retrievers\Posts', 'post_id');

    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeIsAdmin($query){

       //return $query->where('role', 'admin');

    }

    public function isAdmin()
    {
        return $this->admin; // this looks for an admin column in your users table
    }
}
