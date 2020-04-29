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
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-12 col-12">
            <!-- small box -->
            <div class="page-header head-section text-center">
            <h2>اضافه کردن محصول جدید</h2>
        </div>
        <form class="form-horizontal" action="{{ route('Product.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
@include('Admin.sections.errors')
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="name" class="control-label">نام محصول</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="نام محصول را وارد کنید" value="{{ old('name') }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="code" class="control-label">کد محصول</label>
                    <input type="text" class="form-control" name="code" id="code" placeholder="کد محصول را وارد کنید" value="{{ old('code') }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="price" class="control-label"> قیمت</label>
                    <input type="int" class="form-control" name="price" id="price" placeholder="قیمت محصول را وارد کنید" value="{{ old('price') }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="description" class="control-label">توضیحات کوتاه</label>
                    <textarea rows="5" class="form-control" name="description" id="description" placeholder="توضیحات را وارد کنید" value="{{ old('description') }}" ></textarea>
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="images" class="control-label">عکس های محصول</label>
                    <input type="file" class="form-control" name="images" id="images" placeholder="تصویر محصول را وارد کنید" value="{{ old('images') }}">
                </div>
                <div class="col-sm-6">
                    <label for="tags" class="control-label">تگ ها</label>
                    <input type="text" class="form-control" name="tags" id="tags" placeholder="تگ ها را وارد کنید" value="{{ old('tags') }}">
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