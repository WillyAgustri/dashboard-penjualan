@extends('layout.main')

<link rel="stylesheet" href="{{ asset('/') }}assets/dist/css/ShopHome.css">

@section('content')
    <nav class="product-filter">

        <form action="" class="mt-3 mb-3 " style="width:50%;">
            <label for="search">Search</label>
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Asus ROG Strix G15" aria-label="Asus ROG Strix G15"
                    aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        Search
                    </button>
                </div>
            </div>
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
        <div class="d-flex mb-2" style="width : 90%;">
            <div class=" ">

                <a href="#" class=" me-2 btn card">
                    <i class="fa-solid fa-ticket"></i>
                    Coupon Code
                </a>
            </div>

            <div class="me-2 ">
                <a href="#" class=" btn card">
                    <i class="fa-solid fa-hand-holding-dollar"></i>
                    Top Up
                </a>
            </div>

            <div class="me-2 ">
                <a href="#" class=" btn card">
                    <i class="fa-solid fa-people-group"></i>
                    Join Reseller
                </a>
            </div>

            <div class="me-2 ">
                <a href="#" class=" btn card">
                    <i class="fa-solid fa-users-line"></i>
                    Join Community
                </a>
            </div>

            <div class="me-2 ">
                <a href="#" class=" btn card">
                    <i class="fa-solid fa-square-phone"></i>
                    Contact Us
                </a>
            </div>

            <div class="me-2 ">
                <a href="#" class=" btn card">
                    <i class="fa-solid fa-angles-right"></i>
                    Lainnya
                </a>
            </div>

        </div>

    </nav>

    <section class="products">
        @foreach ($data_penjualan as $item)
            <div class="product-card mb-4">
                <div class="product-image" style="">
                    <img src="{{ Storage::url('public/' . $item->picture) }}" </div>
                    <div class="product-info">
                        <h5>{{ $item->product_name }}</h5>
                        <h6>{{ $item->formatRupiah('price') }}</h6>
                        <div class="d-flex"></div>
                        <button class="btn btn-sm btn-danger"><i class="fa-solid fa-bag-shopping"></i>BUY</button>
                        <button class="btn btn-sm btn-warning"><i class="fa-solid fa-cart-shopping"></i>Cart</button>
                    </div>

                </div>
            </div>
        @endforeach
    </section>
    <div class="d-flex  justify-content-start me-2">
        {{ $data_penjualan->links('pagination::bootstrap-5') }}
    </div>
@endsection
