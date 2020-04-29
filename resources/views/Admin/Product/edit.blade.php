@extends('Admin.master')
@section('script')
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script>
  CKEDITOR.replace('description',{
    filebrowserUploadUrl:'/admin/panel/upload-image',
filebrowserImageUploadUrl:'/admin/panel/upload-image',
  });
</script>
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
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
            <h2>محصولات</h2>
        </div>
        <form class="form-horizontal" action="{{ route('Product.update',[$product]) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{method_field('PATCH')}}
@include('Admin.sections.errors')
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="name" class="control-label">نام محصول</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$product->name}}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="code" class="control-label">کد محصول</label>
                    <input type="text" class="form-control" name="code" id="code" value="{{ $product->code }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="price" class="control-label"> قیمت</label>
                    <input type="int" class="form-control" name="price" id="price"  value="{{ $product->price }}">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="description" class="control-label">توضیحات کوتاه</label>
                    <textarea rows="5" class="form-control" name="description" id="description" >{{ $product->description }}</textarea>
                </div>
            </div>
            <div class="form-group">
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="images" class="control-label">تصویر مقاله</label>
                    <input type="file" class="form-control" name="images" id="images" placeholder="تصویر مقاله را وارد کنید">
                </div>
                <div class="col-sm-12">
                    <div class="row">
                        @foreach( $product->images['images'] as $key => $image)
                            <div class="col-sm-2">
                                <label class="control-label">
                                    {{ $key }}
                                    <input type="radio" name="imagesThumb" value="{{ $image }}" {{ $product -> images['thumb'] == $image ? 'checked' : '' }} />
                                    <a href="{{ $image }}" target="_blank"><img src="{{ $image }}" width="100%"></a>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
                <div class="col-sm-6">
                    <label for="tags" class="control-label">تگ ها</label>
                    <input type="text" class="form-control" name="tags" id="tags" placeholder="تگ ها را وارد کنید" value="{{ $product->tags}}">
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