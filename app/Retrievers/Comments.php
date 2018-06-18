<?php
namespace App\Retrievers;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     *
     */

    protected $table = 'comments';

    protected $fillable = [

        'post_id', 'body'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    public function comments(){

        return $this->belongsTo('App\Retrievers\Posts');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');

    }

}