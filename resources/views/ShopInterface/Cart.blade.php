@extends('layout.main')


@section('content')
    <div class="table-responsive mt-5">
        <table class="table table-striped
        table-hover
        table-borderless
        align-middle">
            <thead class="table-light">
                <caption class="text-right">Total Belanja: {{ count((array) session('cart')) }}
                    <div>Total Bayar : @money($totalPrice) </div>


                </caption>
                <tr>
                    <th class="text-center">ID Produk</th>
                    <th class="text-center">Picture</th>
                    <th class="text-center">Nama Produk</th>
                    <th class="text-center">Brand</th>
                    <th class="text-center">Jumlah</th>
                    <th class="text-center">Harga</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @if (session('cart'))
                    @foreach (session('cart') as $id => $details)
                        <tr class="table-secondary" rowID='{{ $id }}'>
                            <td scope="row" class="text-center">{{ $id }}</td>
                            <td class="text-center">
                                <img src="{{ Storage::url('public/' . $details['picture']) }}" alt=""
                                    style="height: 80px">
                            </td>
                            <td class="text-center">{{ $details['product_name'] }}</td>
                            <td class="text-center">{{ $details['brand'] }}</td>
                            <td class="text-center">{{ $details['quantity'] }}</td>
                            <td class="text-center">@money($details['price'])</td>

                        </tr>
                    @endforeach
                @endif
            </tbody>
            <tfoot>

            </tfoot>
        </table>
    </div>
@endsection
