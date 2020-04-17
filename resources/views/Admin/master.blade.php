<!DOCTYPE html>
<html>
@include('Admin.sections.head')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  @include('Admin.sections.navbar')

 
  @include('Admin.sections.sidebar')
 @yield('content')

 
  <!-- Content Wrapper. Contains page content -->
 
  <!-- /.content-wrapper -->
 
  <!-- /.control-sidebar -->

<!-- ./wrapper -->

<!-- jQuery -->
@include('Admin.sections.jqueryfiles')

</div>
</body>
</html>
