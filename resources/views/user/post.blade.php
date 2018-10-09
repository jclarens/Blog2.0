@extends('user/app')

{{-- @section('bg-img', asset('user/img/post-bg.jpg')) --}}
@section('bg-img',Storage::disk('local')->url($post->image))
@section('head')
<link rel="stylesheet" href="{{asset('/user/css/prism.css') }}">
@endsection
@section('title',$slug->title)
@section('subHeadingTitle',$slug->subtitle)


@section('main-content')
<!-- Post Content -->

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.0&appId=299588413911316&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<article>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <small>Created at {{$slug->created_at->diffForHumans()}}</small>
        
        {{-- ========CATEGORY======= --}}
        {{-- kita menghubungkan(relational db) model post dgn function categories maknya menggunakan $slug->categories--}}
        {{-- loop karena banyak kategory --}}
        @foreach ($slug->categories as $category)
        <small class="pull-right" style="margin-right:20px">
        <a href="{{route('category',$category->slug)}}"> {{$category->name}} </a>
        </small>
        @endforeach
        {{-- $slug ini dari controllernya user/postController --}}
        {!! htmlspecialchars_decode($slug->body) !!}
        
        {{-- ================TAG============= --}}
        <h3>Tag Clouds</h3>
        @foreach ($slug->tags as $tag)
        <a href="{{route('tag',$tag->slug)}}">
          <small class="pull-left" style="margin-right:20px; border-radius:5px; border:1px solid gray; padding:5px;">
            {{$tag->name}}
          </small>
        </a>
        @endforeach
      </div>
      {{-- <div class="fb-comments" data-href="https://localhost:8000" data-numposts="5"></div> --}}
      <div class="fb-comments" data-href="{{ Request::url() }}" data-numposts="5"></div>
    </div>
  </div>
</article>

<hr>
@endsection


@section('footer')
<script src="/user/js/prism.js"></script>
@endsection