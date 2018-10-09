<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    public function tags(){
        // belongsToMany karena manytomany--->1 post bisa banyak tag dan 1 tag bisa di banyak post
        return $this->belongsToMany('App\Model\user\tag','post_tags')->withTimestamps();
    }

    public function categories(){
        // belongsToMany karena manytomany--->1 post bisa banyak tag dan 1 tag bisa di banyak post
        return $this->belongsToMany('App\Model\user\category','category_posts')->withTimestamps();
    }
//hey laravel i want to get post from slug
    public function getRouteKeyName(){
        return 'slug';
    }
}


