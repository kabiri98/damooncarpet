@extends('Admin.master')
@section('script')

<script>
        $(document).ready(function () {
            $('#permission_id').selectpicker();
        })
    </script>
    @endsection
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
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-12 col-12">
            <!-- small box -->
            <div class="page-header head-section text-center">
            <h2>اضافه کردن  مقام</h2>
        </div>
        <form class="form-horizontal" action="{{ route('roles.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
@include('Admin.sections.errors')
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="name" class="control-label">نام مقام</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="نام مقام را وارد کنید" value="{{ old('name') }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="label" class="control-label">توضیحات</label>
                    <input type="text" class="form-control" name="label" id="label" placeholder="توضیحات این مقام  را وارد کنید" value="{{ old('label') }}">
                </div>
            </div>

            

            <div class=" form-group form-group-lg">
                <div class="col-sm-12">
                <label  for="permission_id" class="control-label">دسترسی ها</label>
                <select class="form-control" name="permission_id[]" id="permission_id" multiple>
                        @foreach(\App\Permission::latest()->get() as $permission)
                            <option value="{{ $permission->id }}">{{ $permission->name }} - {{ $permission->label }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            
            <div class="form-group">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-danger">ارسال</button>
                </div>
            </div>
        </form>
        
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