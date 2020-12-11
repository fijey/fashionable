@extends('layout.dashboard')
<!-- Select2 -->

@section('content')
<!-- Content Wrapper. Contains page content -->
<!-- Content Header (Page header) -->
<div class="container">
  <section class="content-header">
    @if (session('danger'))
    <div class="card-body">
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-ban"></i> Alert!</h5>
        {{ session('danger') }}
      </div>
    </div>
    @else
    <div class="card-body">
      <div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-info"></i> Mohon Perhatikan</h5>
        Isi setidaknya satu link menuju e-commerce milik kalian
      </div>
    </div>
    @endif
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambahkan Produk</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Project Add</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content mb-5">
    <form action="/postproduct" method="post" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Info Product</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label>Kategori Product</label>
                <select class="form-control select2" value="{{ old('id_category') }}" name="id_category"
                  style="width: 100%;">
                  @foreach($category as $ct)
                  <option value="{{ $ct->id_category }}">{{ $ct->category_name }}</option>
                  @endforeach

                </select>
              </div>
              <div class="form-group">
                <label>Sub Kategori Product</label>
                <select class="form-control select2" value="{{ old('id_subcategory') }}" name="id_subcategory"
                  style="width: 100%;">
                  @foreach($subcategory as $ct)
                  <option value="{{ $ct->id_subcategory }}">{{ $ct->subcategory_name }}</option>
                  @endforeach

                </select>
              </div>
              <div class="form-group">
                <label for="inputName">Nama Produk</label> <br>
                <input type="text" id="inputName" name="product_name" value="{{ old('product_name') }}"
                  placeholder="Nama Produk" class="form-control">
                @if ($errors->has('product_name'))
                <span class="text-danger">{{ $errors->first('product_name') }}</span>
                @endif
              </div>
              <div class="form-group">
                <label for="inputName">Produk Brand</label>
                <input type="text" id="inputName" name="product_brand" value="{{ old('product_brand') }}"
                  placeholder="Nama Produk" class="form-control">
                @if ($errors->has('product_brand'))
                <span class="text-danger">{{ $errors->first('product_brand') }}</span>
                @endif
              </div>
              <div class="form-group">
                <label for="inputName">Kondisi Produk</label>
                <select name="product_condition" id="" class="form-control">
                  <option value="baru">Baru</option>
                  <option value="second">Second</option>
                </select>
                @if ($errors->has('product_condition'))
                <span class="text-danger">{{ $errors->first('product_condition') }}</span>
                @endif
              </div>
              <div class="form-group">
                <label for="inputName">Harga Produk (tanpa titik)</label>
                <input type="number" id="inputName" name="product_price" placeholder="15000"
                  value="{{ old('product_price') }}" class="form-control uang">
                @if ($errors->has('product_price'))
                <span class="text-danger">{{ $errors->first('product_price') }}</span>
                @endif

              </div>
              <div class="form-group">
                <label for="inputDescription">Product Description</label>
                <textarea id="inputDescription" name="product_description" placeholder="Masukan Deskripsi"
                  class="form-control" rows="4">{{ old('product_condition') }}</textarea>
                @if ($errors->has('product_description'))
                <span class="text-danger">{{ $errors->first('product_description') }}</span>
                @endif
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-6">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Link Product E-Commerce</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="lazada">Link Product Lazada</label>
                <input type="text" id="lazada" name="product_lazada" value="{{ old('product_lazada') }}"
                  placeholder="lazada" class="form-control">
                @if ($errors->has('product_lazada'))
                <span class="text-danger">{{ $errors->first('product_lazada') }}</span>
                @endif
              </div>
              <div class="form-group">
                <label for="lazada">Link Product Tokopedia</label>
                <input type="text" id="lazada" name="product_tokopedia" value="{{ old('product_tokopedia') }}"
                  placeholder="tokopedia" class="form-control">
                @if ($errors->has('product_tokopedia'))
                <span class="text-danger">{{ $errors->first('product_tokopedia') }}</span>
                @endif
              </div>
              <div class="form-group">
                <label for="lazada">Link Product Shopee</label>
                <input type="text" id="lazada" name="product_shopee" placeholder="shopee"
                  value="{{ old('product_shopee') }}" class="form-control">
                @if ($errors->has('product_shopee'))
                <span class="text-danger">{{ $errors->first('product_shopee') }}</span>
                @endif
              </div>
              <div class="form-group">
                <label for="lazada">Link Product Bukalapak</label>
                <input type="text" id="lazada" name="product_bukalapak" placeholder="bukalapak"
                  value="{{ old('product_bukalapak') }}" class="form-control">
                @if ($errors->has('product_bukalapak'))
                <span class="text-danger">{{ $errors->first('product_bukalapak') }}</span>
                @endif
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Gambar Product</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Gambar 1</label>
                <input type="file" id="inputName" name="product_img1" placeholder="Nama Produk"><br>
                @if ($errors->has('product_img1'))
                <span class="text-danger">{{ $errors->first('product_img1') }}</span>
                @endif
              </div>
              <div class="form-group">
                <label for="inputName">Gambar 2</label>
                <input type="file" id="inputName" name="product_img2" placeholder="Nama Produk"><br>
                @if ($errors->has('product_img2'))
                <span class="text-danger">{{ $errors->first('product_img2') }}</span>
                @endif
              </div>
              <div class="form-group">
                <label for="inputName">Gambar 3</label>
                <input type="file" id="inputName" name="product_img3" placeholder="Nama Produk"><br>
                @if ($errors->has('product_img3'))
                <span class="text-danger">{{ $errors->first('product_img3') }}</span>
                @endif
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <a href="{{ URL::previous() }}" class="btn btn-secondary">Cancel</a>
          <input type="submit" value="Publikasikan Produk" class="btn btn-success float-right">
        </div>
      </div>
    </form>
  </section>
</div>
<!-- /.content -->
<!-- /.content-wrapper -->
@endsection