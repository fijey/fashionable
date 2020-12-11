@extends('layout.dashboard')
@section('content')
<div class="card">
  <div class="card-header">
    @if (session('success'))
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h5><i class="icon fas fa-check"></i> Berhasil!</h5>
      {{ session('success') }}
    </div>
    @endif
    <h1 class="card-title">My Product</h1> <br>
    <a href="/addproduct" class="btn btn-primary mt-2 text-white"> Tambah Product</a>
    <div class="card-tools">
      <div class="input-group input-group-sm" style="width: 150px;">
        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

        <div class="input-group-append">
          <button type="submit" class="btn btn-default">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <thead>
        <tr>
          <th>Id Product</th>
          <th>Nama Product</th>
          <th>Category</th>
          <th>Harga</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($product_user as $pu )
        <tr>
          <td>{{ $pu->id_product }}</td>
          <td>{{ $pu->product_name }}</td>
          <td>{{ $pu->category_name }}</td>
          <td>{{ $pu->product_price }}</td>
          <td>
            <a href="/editproduct/{{ $pu->id_product }}" class="btn btn-warning text-white"><i
                class="fa fa-edit"></i></a>
            <a href="/deleteproduct/{{ $pu->id_product }}" class="btn btn-danger text-white"><i
                class="fa fa-trash"></i></a>

          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->

@endsection