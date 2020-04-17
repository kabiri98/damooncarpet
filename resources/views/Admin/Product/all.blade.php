 @extends('Admin.master')

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
        <a href="{{ route('product.create') }}" class="btn btn-sm btn-primary ">اضافه کردن محصول جدید</a>
        <div class="table-responsive pt-3">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>نام محصول</th>
                    <th>کد محصول</th>
                    <th>تعداد نظرات</th>
                    <th>تعداد بازدید</th>
                    <th>موجودی انبار</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td><a href="{{ $product->path() }}">{{ $product->name }}</a></td>
                        <td>{{ $product->code }}</td>
                        <td>{{ $product->commentCount }}</td>
                        <td>{{ $product->viewCount }}</td>
                        <td>{{ $product->stockCount }}</td>
                        <td>
                            <form action="{{ route('products.destroy'  , ['id' => $product->id]) }}" method="post">
                                {{ method_field('delete') }}
                                {{ csrf_field() }}
                                <div class="btn-group btn-group-xs">
                                    <a href="{{ route('products.edit' , ['id' => $product->id]) }}"  class="btn btn-primary">ویرایش</a>
                                    <button type="submit" class="btn btn-danger">حذف</button>
                                </div>
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