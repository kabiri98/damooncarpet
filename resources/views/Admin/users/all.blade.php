@extends('Admin.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid text-center">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-12 col-12">
            <!-- small box -->
            <div class="page-header head-section ">
            <h2 class="mt-2">کاربران</h2>
        </div>
        <div class="btn-group">
        <a href="{{ route('roles.index') }}" class="btn btn-sm btn-success mb-3 ">سطوح دسترسی</a>
        <a href="/admin/users/level" class="btn btn-sm btn-primary mb-3 ">کاربران مدیریت</a>

        <div class="table-responsive pt-2.5">
        @foreach (['danger', 'warning', 'success', 'info'] as $key)
 @if(Session::has($key))
     <p class="alert alert-{{ $key }}">{{ Session::get($key) }}</p>
 @endif
@endforeach
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>نام کاربر</th>
                    <th>ایمیل</th>
                    <th>وضعیت ایمیل</th>
                    <th>حذف کاربر</th>
                </tr>
                </thead>
                <tbody>
               
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>0</td>
                        
                        
                        
                        <td>
                        <form action="{{route ('users.destroy', [$user])}}" method="post" class="nav-link"> 
                        {{ method_field('delete') }}
                                {{ csrf_field() }}    
                        <button type="submit" class="btn btn-danger "><i class="fas fa-times"></i></button>
                       
                        </form>
                        </td>
                       
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@endsection 