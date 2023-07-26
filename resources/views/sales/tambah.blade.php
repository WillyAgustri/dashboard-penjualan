@extends('layout.main')



@section('content')
    <div class="text-center mt-3">
        <h2><strong>Tambah Data Penjualan</strong></h2>
    </div>
    <div class="container mt-4 d-flex justify-content-center ">
        <div class="col-sm-12 col-lg-4 mr-auto ml-auto border p-4">
            <form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label><strong>Kode Produk</strong></label>
                    <div class="custom-file pb-5">

                        <input type="number" multiple class="custom-file-input form-control" id="product_id"
                            placeholder="Masukan Nama Produk" name="product_id">
                    </div>
                    <label><strong>Nama Produk</strong></label>
                    <div class="custom-file pb-5">

                        <input type="text" multiple class="custom-file-input form-control" id="product_name"
                            placeholder="Masukan Nama Produk" name="product_name">
                    </div>
                    <label><strong>Merek Produk</strong></label>
                    <div class="custom-file pb-5">

                        <input type="text" multiple class="custom-file-input form-control" id="brand"
                            placeholder="Masukan Merek Produk" name="brand">
                    </div>
                    <label><strong>Jumlah Produk</strong></label>
                    <div class="custom-file pb-5">

                        <input type="number" multiple class="custom-file-input form-control" id="quantity"
                            placeholder="Masukan Jumlah Produk" name="quantity">
                    </div>
                    <label><strong>Harga Produk</strong></label>
                    <div class="custom-file pb-5">

                        <input type="text" multiple class="custom-file-input form-control" id="price"
                            placeholder="Masukan Harga Produk" name="price">
                    </div>
                    <div class="custom-file">
                        <input type="file" name="picture" multiple class="custom-file-input form-control" id="picture">
                        <label class="custom-file-label text-danger" for="customFile">Format File : Jpg/png</label>
                    </div>
                </div>
                <div class="form-group d-flex justify-content-center">
                    <button type="" value="upload" id="upload" class="btn btn-block btn-dark"><i
                            class="fa fa-fw fa-upload"></i> Upload</button>
                </div>
            </form>
        </div>
    @endsection
