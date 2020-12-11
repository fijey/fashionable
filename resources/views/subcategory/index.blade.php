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
        <h1 class="card-title">Management SubCategory</h1> <br>
        <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#modal-default">
            Tambah Sub Kategori Baru
        </button>
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
                    <th>Nama SubCategory</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subcategory as $pu )
                <tr>
                    <td>{{ $pu->subcategory_name }}</td>
                    <td>
                        <a href="/subcategory/delete/{{ $pu->id_subcategory }}" class="btn btn-danger text-white"><i
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



<div class="modal fade" id="modal-default">
    <form action="/subcategory/add" method="POST">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Kategori Baru</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <table>
                        <tr>
                            <td>
                                <label> Nama SubKategori </label>
                                <input type="text" name="subcategory_name" class="form-control"></td>
                        </tr>
                    </table>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a><button type="submit" class="btn btn-primary">Tambahkan</button>
                </div>
            </div>
    </form>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->


@endsection