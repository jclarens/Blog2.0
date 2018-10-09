<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\tag;
use App\Model\user\post;
use App\Model\user\category;

class HomeController extends Controller
{
    public function index(){
        // $posts = post::where('status',1)->get();
        $posts = post::where('status',1)->paginate(2);
        return view('user.blog',compact('posts'));
        
    }

    public function tag(tag $tag){
        //sama cem catgr
        $posts = $tag->posts();
        return view('user.blog',compact('posts'));
    }
    //parameter category adalah model lalu dalam model category bikin func get
    public function category(category $category){
        // $category = category::where('slug',$slug)->get();
        //kita telah buat relasi antara category dgn post dan post dengan category (dalam MOdeL) jadi tinggal return kyk dibawah ini
        // return $category->posts->paginate(); gak bisa paginate maka buat paginate di dalam model categry
        //posts() berupa function karena tidak mereturn array in object dalam model ctgr maka harus buat jadi posts();
        $posts = $category->posts();
        return view('user.blog',compact('posts'));
    }

}
