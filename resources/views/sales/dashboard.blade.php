@extends('layout.main')

@section('content')

    <div class="dashboard-products">
        <div class="dashboard-table-headline d-flex">

            <form id="product-sort-form" action="#">
                <div id="block" class="d-flex  my-5">
                    <a href="dashboard/tambah" class="btn btn-sm btn-primary me-5 "> <i class="fa-solid fa-plus"></i>Tambah
                        Data</a>
                    <div id="dashboard-product-table-sort text-center">
                        <i class="fa-solid fa-arrow-up-wide-short"></i>Urutkan Berdasarkan
                    </div>
                    <div id="sort-dropdown-span">
                        <select name="#" id="sort-dropdown" class="form-select">
                            <option class="sort-selection">Merek: Alpabet</option>
                            <option class="sort-selection" selected="selected">Harga: Besar ke kecil</option>
                            <option class="sort-selection">Harga: Kecil ke Besar</option>
                            <option class="sort-selection">Jumlah: Besar ke Kecil</option>
                            <option class="sort-selection">Jumlah: Kecil ke Besar</option>
                        </select>
                    </div>
                    <a href="" class="mx-5  btn btn-sm btn-secondary"><i class="fa-solid fa-table"></i>Import
                        Data</a>
                    <a href="" class="btn btn-sm btn-secondary"><i class="fa-solid fa-print"></i>Cetak Data</a>
                </div>
            </form>
        </div>
        <br>
        <div class="table-container">
            <table class="table dashboard-product-table">
                <thead>
                    <tr>
                        <th class="table-image-col text-secondary text-center">NO</th>
                        <th class="table-image-col text-secondary text-center">Gambar</th>
                        <th class="table-name-col text-secondary text-center">Nama Produk</th>
                        <th class="table-brand-col text-secondary text-center">Merek</th>
                        <th class="table-qty-col text-secondary text-center">Jumlah</th>
                        <th class="table-price-col text-secondary text-center">Harga</th>
                        <th class="table-action-col text-secondary text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php

                        $number_incre = 1;
                    @endphp
                    @foreach ($data_penjualan as $item)
                        <tr>
                            <td class="table-number-col">
                                @php
                                    echo $number_incre++;
                                @endphp
                            </td>
                            <td class="table-image-col">
                                <img src="{{ Storage::url('public/' . $item->picture) }}" alt=""
                                    style="height: 80px">
                            </td>
                            <td class="table-name-col text-center">
                                {{ $item->product_name }}
                            </td>
                            <td class="table-brand-col text-center">
                                {{ $item->brand }}
                            </td>
                            <td class="table-qty-col text-center">
                                {{ $item->quantity }}
                            </td>
                            <td class="table-customers-col text-center">
                                {{ $item->formatRupiah('price') }}
                            </td>

                            <td>
                                <div class="action d-flex justify-content-center align-self-center">
                                    <a class="btn btn-sm btn-warning text-white me-1 "
                                        href="{{ route('show', $item->product_id) }}"><i
                                            class="fa-solid fa-pen-to-square"></i>Edit</a>
                                    <form action="{{ route('destroy', $item->product_id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-danger"><i
                                                class="fa-solid fa-trash"></i>Hapus</button>
                                    </form>

                                </div>
                            </td>

                        </tr>
                    @endforeach

                </tbody>

            </table>
            {{ $data_penjualan->links('pagination::bootstrap-5') }}

        </div>
    </div>

    <script src="{{ asset('/') }}assets/dist/js/dashboard.js"></script>
@stop
