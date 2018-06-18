<?php
namespace App\Retrievers;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     *
     */

    protected $table = 'posts';

    protected $fillable = [

        'title', 'body'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    public function user(){

        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function comments(){

        return $this->hasMany('App\Retrievers\Comments', 'post_id');
    }

}