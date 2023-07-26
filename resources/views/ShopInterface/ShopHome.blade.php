@extends('layout.main')

<link rel="stylesheet" href="{{ asset('/') }}assets/dist/css/ShopHome.css">

@section('content')
    <nav class="product-filter">

        <form action="" class="mt-3 mb-3">
            <label for="search">Search</label>
            <input type="text" class="form-control" placeholder="Search..">
            <button type="submit" name="search" class="btn btn-sm btn-primary mt-2">Search</button>
        </form>

        <div class="sort mb-3">
            <div class="collection-sort">
                <label>Filter by:</label>
                <select>
                    <option value="/">All Product</option>
                    <option value="/">Laptop</option>
                    <option value="/">PC</option>
                    <option value="/">VGA</option>
                    <option value="/">Phone</option>
                    <option value="/">Accessory</option>

                </select>
            </div>

            <div class="collection-sort">
                <label>Sort by:</label>
                <select>
                    <option value="/">Featured</option>
                    <option value="/">Best Selling</option>
                    <option value="/">Alphabetically, A-Z</option>
                    <option value="/">Alphabetically, Z-A</option>
                    <option value="/">Price, low to high</option>
                    <option value="/">Price, high to low</option>
                    <option value="/">Date, new to old</option>
                    <option value="/">Date, old to new</option>
                </select>
            </div>
        </div>
    </nav>

    <section class="products">
        @foreach ($data_penjualan as $item)
            <div class="product-card">
                <div class="product-image" style="">
                    <img src="{{ Storage::url('public/' . $item->picture) }}" </div>
                    <div class="product-info">
                        <h5>{{ $item->product_name }}</h5>
                        <h6>Rp. {{ $item->price }}</h6>
                        <div class="d-flex"></div>
                        <button class="btn btn-sm btn-danger"><i class="fa-solid fa-bag-shopping"></i>BUY</button>
                        <button class="btn btn-sm btn-warning"><i class="fa-solid fa-cart-shopping"></i>Cart</button>
                    </div>

                </div>
            </div>
        @endforeach
    </section>
@endsection
