@extends('admin.layouts.app')


@section('headSection')
<link rel="stylesheet" href="{{ asset ('/admin/bower_components/select2/dist/css/select2.min.css')}}">
@endsection

@section('main-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Text Editors
      <small>Advanced form element</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Forms</a></li>
      <li class="active">Editors</li>
    </ol>
  </section>
  
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        @include('include.messages')
        
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="title">Titles</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="{{ route('post.store') }}" method="post">
            {{ csrf_field() }}
            <div class="box-body">
              
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="title">Post Title</label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                </div>
                <div class="form-group" style="margin-top:20px">
                  <label for="subtitle">Post Sub Title</label>
                  <input type="text" class="form-control" name="subtitle" id="subtitle" placeholder="Sub Title">
                </div>
                
                <div class="form-group">
                  <label for="slug">Post Slug</label>
                  <input type="text" class="form-control" name="slug" id="slug" placeholder="slug">
                </div>
              </div>
              <div class="col-lg-6">
                {{-- supaya file input di kiri --}}
                <div class="pull-left" style="margin-top:5px">
                  <div class="form-group">
                    <label for="image">File input</label>
                    <input type="file" name="image" id="image">
                  </div>
                </div>
                {{-- supaya publish di kanan --}}
                <div class="pull-right" style="margin-top:20px;margin-right:85px">
                  <div class="checkbox" margin-right="70px">
                    <label>
                      <input type="checkbox" name="status" value="1" 
                      {{-- @if($post->status==1)
                        checked
                        @endif --}}> Publish
                      </label>
                    </div>
                  </div>
                  <br>
                  <br>
                  <br>
                  <br>
                  <div class="form-group">
                    <label>Select Tags</label>
                    <select class="form-control select2 select2-hidden-accessible" multiple="" 
                    data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true"
                    name="tags[]">
                    {{-- tags[] adalah berasal dari PostCcontroller.store $post->tags()(tags ini nama dari db)->sync($request->tags (tags ni adalah name yg kita set disini berupa array));  --}}
                    @foreach($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                    @endforeach  
                    {{-- <option>Alaska</option>
                      <option>California</option>
                      <option>Delaware</option>
                      <option>Tennessee</option>
                      <option>Texas</option>
                      <option>Washington</option> --}}
                    </select>
                  </div>
                  
                  <div class="form-group">
                    <label>Select Categories</label>
                    <select class="form-control select2 select2-hidden-accessible" multiple="" 
                    data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true" name="categories[]">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach  
                    {{--   
                      <option>Alabama</option>
                      <option>Alaska</option>
                      <option>California</option>
                      <option>Delaware</option>
                      <option>Tennessee</option>
                      <option>Texas</option>
                      <option>Washington</option> --}}
                    </select>
                  </div>
                  
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Write Post Body Here
                    <small>Simple and fast</small>
                  </h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                    <i class="fa fa-minus"></i></button>
                  </div>
                  <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">
                  <form>
                    <textarea name="body" style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="editor1"></textarea>
                  </form>
                </div> 
                
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a type="button" class="btn btn-warning" href="{{route('post.index')}}">Back</a>
                </div>
                
              </div>
            </form>
          </div>
          <!-- /.box -->        
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  
  @endsection
  
  @section('footerSection')
<script src="/admin/bower_components/ckeditor/ckeditor.js"></script>
{{-- <script src="/admin/ckeditor/ckeditor.js"></script> --}}
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>
<script src="/admin/bower_components/select2/dist/js/select2.full.min.js"></script>
  <script>
    $(document).ready(function() {    
      $(".select2").select2();
    });
  </script>
  @endsection