<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\user\post;
use App\Model\user\tag;
use App\Model\user\category;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    // #23-2
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = post::all();
        return view('admin.post.show',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = tag::all();
        $categories = category::all();
        return view('admin.post.post',compact('tags','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();

        $this->validate($request,[
            'title'=>'required',
            'subtitle'=>'required',
            'slug'=>'required',
            'body'=>'required',
            'image'=>'required'

        ]);

        if ($request->hasFile('image')){
            $imageName = $request->image->store('public');
            return 'yes';
        }

        $post = new post;
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->slug = $request->slug;
        $post->body = $request->body;        
        $post->status = $request->status;
        $post->save();

        //setelah post save kalo gak error logic nya harus save dulu baru create tags
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories); 


        return redirect (route('post.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // return $id;
        // with tags dan cartegories kita ingin saat edit  
        $post = post::with('tags','categories')->where('id',$id)->first();
        $tags = tag::all();
        $categories = category::all();
        return view('admin.post.edit',compact('tags','categories','post'));

        // return view('admin.post.edit',compact('post'));
       //return view('admin.post.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //  return $request->all();
       $this->validate($request,[
        'title'=>'required',
        'subtitle'=>'required',
        'slug'=>'required',
        'body'=>'required',
        'image'=>required
        ]);
        if ($request->hasFile('image')){
            // return 'yes';
            //lokasi public di storage-app-public
            //ctrl+p uploadFiles inside http foundation **** getClientOriginalName(); utk dapatkan nama image sebenarnya
            // $request->image->getClientOriginalName();
            $imageName = $request->image->store('public');
            return 'yes';
        }
        $post = post::find($id);
        $post->image = $imageName;
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->slug = $request->slug;
        $post->body = $request->body;
        $post->status = $request->status;

        // $post->tags()->sync($request->tags);
        // $post->categories()->sync($request->categories);
        $post->save();
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories); 

        return redirect (route('post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        post::where('id',$id)->delete();
        return redirect()->back();
    }
}
