<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\post;

class PostController extends Controller
{
    // parameter $slug disini harus sama dengan yg di route post/{slug}
    public function post(post $slug){
        // return $slug;
        return view('user.post',compact('slug'));
    }
}
