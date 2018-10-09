@extends('admin.layouts.app')

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

          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="title">Add Admin</h3>
            </div>
            @include('include.messages')
            <!-- /.box-header -->
            <!-- form start -->
            {{-- user.store karena pada web.php admin/user --}}
            <form role="form" action =" {{route('user.store')}} " method="post" >
            {{csrf_field()}}
              <div class="box-body">

              <div class="col-lg-offset-3 col-lg-6">
                <div class="form-group">
                    <label for="name">User Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="user name">
                  </div>

                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="email">
                  </div>
        
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="password">
                  </div>

                  <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm password">
                  </div>
                  
                  <div class="form-group">
                    <label for="role">Assign role</label>
                    <select name="role" id="role" class="form-control">
                      <option value="0">Editor</option>  
                      <option value="1">Publisher</option>  
                      <option value="3">Writer</option>  
                    </select>  
                  </div>
        
                  <div class="form-group">
                      <!-- kalo pake box-footer dia tombol submitnya kayak ada space kecil -->
                      <button type="submit" class="btn btn-primary">Submit</button>
                      <a type="button" class="btn btn-warning" href="{{route('user.index')}}">Back</a>
                  </div>
              </div>
              
              </div>
              </div>
              <!-- /.box-body -->
              
            
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

