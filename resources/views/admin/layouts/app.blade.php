<!DOCTYPE html>
<html lang="en">
<head>
@include('admin.layouts.head')
</head>
<body>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
@include('admin.layouts.header')
@section('main-content')
  @show
@include('admin.layouts.sidebar')
@include('admin.layouts.footer')
    
</body>
</html>