@extends('layout.main')



@section('content')
    <div class="text-center mt-3">
        <h2><strong>Edit Data Penjualan</strong></h2>
    </div>
    <div class="container mt-4 d-flex justify-content-center ">
        <div class="col-sm-12 col-lg-4 mr-auto ml-auto border p-4">
            <form action="{{ route('proses-edit', $data->product_id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <div class="text-center mt-3 mb-3 ">
                        <label class="text-center">ID :</label>
                        <div> {{ $product_id }}</div>


                    </div>
                    <label><strong>Nama Produk</strong></label>
                    <div class="custom-file pb-5">

                        <input type="text" multiple class="custom-file-input form-control" id="product_name"
                            name="product_name" placeholder="Masukan Nama Produk" value="{{ $data->product_name }}">
                    </div>
                    <label><strong>Merek Produk</strong></label>
                    <div class="custom-file pb-5">

                        <input type="text" multiple class="custom-file-input form-control" id="brand" name="brand"
                            placeholder="Masukan Merek Produk" value="{{ $data->brand }}">
                    </div>
                    <label><strong>Jumlah Produk</strong></label>
                    <div class="custom-file pb-5">

                        <input type="text" multiple class="custom-file-input form-control" id="quantity" name="quantity"
                            placeholder="Masukan Jumlah Produk" value="{{ $data->quantity }}">
                    </div>
                    <label><strong>Harga Produk</strong></label>
                    <div class="custom-file pb-5">

                        <input type="text" multiple class="custom-file-input form-control" id="price" name="price"
                            placeholder="Masukan Harga Produk" value="{{ $data->price }}">
                    </div>
                    <div class="custom-file">
                        <input type="file" name="picture" multiple class="custom-file-input form-control" id="picture">
                        <script>
                            var pictureUrls = ['{{ Storage::url('public/' . $data->picture) }}']; // Masukkan URL gambar default di sini
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
                    <button type="submit" name="submit" id="submit" class="btn btn-block btn-dark text-warning"><i
                            class="fa fa-fw fa-upload"></i>Reupload</button>
                </div>
            </form>
        </div>
    @endsection
