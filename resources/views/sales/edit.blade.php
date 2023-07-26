@extends('layout.main')



@section('content')
    <div class="text-center mt-3">
        <h2><strong>Edit Data Penjualan</strong></h2>
    </div>
    <div class="container mt-4 d-flex justify-content-center ">
        <div class="col-sm-12 col-lg-4 mr-auto ml-auto border p-4">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="text-center mt-3">
                        {{ $product_id }}
                    </div>
                    <label><strong>Nama Produk</strong></label>
                    <div class="custom-file pb-5">

                        <input type="text" multiple class="custom-file-input form-control" id="customFile"
                            placeholder="Masukan Nama Produk" value="{{ $product_name }}">
                    </div>
                    <label><strong>Merek Produk</strong></label>
                    <div class="custom-file pb-5">

                        <input type="text" multiple class="custom-file-input form-control" id="customFile"
                            placeholder="Masukan Merek Produk" value="{{ $brand }}">
                    </div>
                    <label><strong>Jumlah Produk</strong></label>
                    <div class="custom-file pb-5">

                        <input type="text" multiple class="custom-file-input form-control" id="customFile"
                            placeholder="Masukan Jumlah Produk" value="{{ $quantity }}">
                    </div>
                    <label><strong>Harga Produk</strong></label>
                    <div class="custom-file pb-5">

                        <input type="text" multiple class="custom-file-input form-control" id="customFile"
                            placeholder="Masukan Harga Produk" value="{{ $price }}">
                    </div>
                    <div class="custom-file">
                        <input type="file" name="files[]" multiple class="custom-file-input form-control"
                            id="customFile">
                        <script>
                            var pictureUrls = ['{{ Storage::url('public/' . $picture) }}']; // Masukkan URL gambar default di sini
                            var fileInput = document.getElementById('customFile');

                            for (var i = 0; i < pictureUrls.length; i++) {
                                var url = pictureUrls[i];
                                var file = new File([url], url.split('/').pop()); // Buat objek File dari URL gambar
                                fileInput.files.push(file); // Tambahkan objek File ke inputan file
                            }
                        </script>

                        <label class="custom-file-label text-danger" for="customFile">Format File : Jpg/png</label>
                    </div>
                </div>
                <div class="form-group d-flex justify-content-center">
                    <button type="button" name="upload" value="upload" id="upload"
                        class="btn btn-block btn-dark text-warning"><i class="fa fa-fw fa-upload"></i>Reupload</button>
                </div>
            </form>
        </div>
    @endsection
