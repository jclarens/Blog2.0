<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    public function posts(){
        // belongsToMany karena manytomany--->1 post bisa banyak tag dan 1 tag bisa di banyak post
        return $this->belongsToMany('App\Model\user\post','category_posts')->orderBy('created_at','DESC')->paginate(5);
    }
    
    public function getRouteKeyName(){
        return 'slug';
    }

}
