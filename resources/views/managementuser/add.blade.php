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
        Isi setidaknya satu link profile menuju e-commerce milik kalian
      </div>
    </div>
    @endif
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah User</h1>
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
    <form action="/managementuser/add" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Info User</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Nama <span class="text-danger">*</span></label> <br>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Nama " class="form-control">
                @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
              </div>
              <div class="form-group">
                <label for="inputName">Email <span class="text-danger">*</span></label>
                <input type="text" name="email" value="{{ old('email') }}" placeholder="Email" class="form-control">
                @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
              </div>
              <div class="form-group">
                <label for="inputName">Password <span class="text-danger">*</span></label>
                <input type="password" id="inputName" name="password" value="{{ old('password') }}"
                  class="form-control">
                @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
              </div>
              <div class="form-group">
                <label for="inputName">retype_password <span class="text-danger">*</span></label>
                <input type="password" id="inputName" name="retype_password" value="{{ old('retype_password') }}"
                  class="form-control">
                @if ($errors->has('retype_password'))
                <span class="text-danger">{{ $errors->first('retype_password') }}</span>
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
              <h3 class="card-title">Profile Pengguna</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="address">Alamat</label>
                <input type="text" id="lazada" name="address" value="{{ old('address') }}" placeholder="alamat"
                  class="form-control">
                @if ($errors->has('address'))
                <span class="text-danger">{{ $errors->first('address') }}</span>
                @endif
              </div>
              <div class="form-group">
                <label for="address">Handphone</label>
                <input type="text" id="lazada" name="handphone" value="{{ old('handphone') }}" placeholder="alamat"
                  class="form-control">
                @if ($errors->has('address'))
                <span class="text-danger">{{ $errors->first('handphone') }}</span>
                @endif
              </div>
              <div class="form-group">
                <label for="age">Umur</label>
                <input type="text" id="age" name="age" value="{{ old('age') }}" placeholder="umur" class="form-control">
                @if ($errors->has('age'))
                <span class="text-danger">{{ $errors->first('age') }}</span>
                @endif
              </div>
              <div class="form-group">
                <label for="Kota">Kota</label>
                <input type="text" id="Kota" name="city" placeholder="Kota" value="{{ old('city') }}"
                  class="form-control">
                @if ($errors->has('city'))
                <span class="text-danger">{{ $errors->first('city') }}</span>
                @endif
              </div>
              <div class="form-group">
                <label for="lazada">Gambar Profile</label>
                <input type="file" id="lazada" name="img_profile" placeholder="bukalapak"
                  value="{{ old('img_profile') }}" class="form-control">
                @if ($errors->has('img_profile'))
                <span class="text-danger">{{ $errors->first('img_profile') }}</span>
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
              <h3 class="card-title">Info Toko</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Nama Toko <span class="text-danger">*</span></label>
                <input type="text" id="inputName" name="store_name" value="{{ old('store_name') }}"
                  placeholder="Nama Produk" class="form-control"><br>
                @if ($errors->has('store_name'))
                <span class="text-danger">{{ $errors->first('store_name') }}</span>
                @endif
              </div>
              <div class="form-group">
                <label for="inputName">Alamat Toko</label>
                <input class="form-control" type="text" id="inputName" name="store_address"
                  value="{{ old('store_address') }}" placeholder="Nama Produk"><br>
                @if ($errors->has('store_address'))
                <span class="text-danger">{{ $errors->first('store_address') }}</span>
                @endif
              </div>
              <div class="form-group">
                <label for="inputName">Tentang Toko</label>
                <input class="form-control" type="text" id="inputName" name="store_about"
                  value="{{ old('store_about') }}" placeholder="Nama Produk"><br>
                @if ($errors->has('store_about'))
                <span class="text-danger">{{ $errors->first('store_about') }}</span>
                @endif
              </div>
              <div class="form-group">
                <label for="inputName">Gambar Profile Toko</label>
                <input class="form-control" type="file" id="inputName" name="store_img" value="{{ old('store_img') }}"
                  placeholder="Nama Produk"><br>
                @if ($errors->has('store_img'))
                <span class="text-danger">{{ $errors->first('store_img') }}</span>
                @endif
              </div>
              <div class="form-group">
                <label for="inputName">Alamat Profile Toko Lazada</label>
                <input class="form-control" type="text" id="inputName" name="store_lazada"
                  value="{{ old('store_lazada') }}" placeholder="Nama Produk"><br>
                @if ($errors->has('store_lazada'))
                <span class="text-danger">{{ $errors->first('store_lazada') }}</span>
                @endif
              </div>
              <div class="form-group">
                <label for="inputName">Alamat Profile Toko Tokopedia</label>
                <input class="form-control" type="text" id="inputName" name="store_tokopedia"
                  value="{{ old('store_tokopedia') }}" placeholder="Nama Produk"><br>
                @if ($errors->has('store_tokopedia'))
                <span class="text-danger">{{ $errors->first('store_tokopedia') }}</span>
                @endif
              </div>
              <div class="form-group">
                <label for="inputName">Alamat Profile Toko Bukalapak</label>
                <input class="form-control" type="text" id="inputName" name="store_bukalapak"
                  value="{{ old('store_bukalapak') }}" placeholder="Nama Produk"><br>
                @if ($errors->has('store_bukalapak'))
                <span class="text-danger">{{ $errors->first('store_bukalapak') }}</span>
                @endif
              </div>
              <div class="form-group">
                <label for="inputName">Alamat Profile Toko Shopee</label>
                <input class="form-control" type="text" id="inputName" name="store_shopee"
                  value="{{ old('store_shopee') }}" placeholder="Nama Produk"><br>
                @if ($errors->has('store_shopee'))
                <span class="text-danger">{{ $errors->first('store_shopee') }}</span>
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
          <input type="submit" value="Buat User" class="btn btn-success float-right">
        </div>
      </div>
    </form>
  </section>
</div>
<!-- /.content -->
<!-- /.content-wrapper -->
@endsection