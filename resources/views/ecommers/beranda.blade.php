@extends('ecommers.Layout.index')

@section('content')
    <div class="carousel swiper">
        <div class="swiper-wrapper">
            @foreach ($benner as $item)
            <img class="swiper-slide" src="{{asset('assets/images/galery/'.$item->image.'')}}" alt="">
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-scrollbar"></div>
    </div>
    <div class="promosi-product" style="width:1500px">
        <h2>Promosi Product</h2>
        <div class="swipper swipperPromosi">
            <div class="swiper-wrapper">
                @foreach ($promosi as $item)
                <div class="card swiper-slide">
                        <div class="card-head">
                            <img src="{{ asset('assets/images/product/' . $item->images . '') }}"
                                style="width:100%; height:100%; border-radius:20px" alt="">
                        </div>
                        <h5>{{ $item->nama_barang }}</h5>
                        <div class="card-body">
                            @auth
                                <p>Rp. {{ number_format($item->harga_barang) }}</p>
                                <h3>Rp. {{ number_format($item->harga_barang - $item->harga_barang * 0.1) }}</h3>
                            @else
                                {{-- <p>Rp. {{ number_format($item->harga_barang) }}</p> --}}
                                <h3>Rp. {{ number_format($item->harga_barang) }}</h3>
                            @endauth
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
    </div>
    <div class="product-baru" style="width:1500px">
        <h2>Product Baru</h2>
        <div class="swipper swipperPromosi">
            <div class="swiper-wrapper">
                @foreach ($new as $item)
                    <div class="card swiper-slide">
                        <div class="card-head">
                            <img src="{{ asset('assets/images/product/' . $item->images . '') }}"
                                style="width:100%; height:100%; border-radius:20px" alt="">
                        </div>
                        <h5>{{ $item->nama_barang }}</h5>
                        <div class="card-body">
                            @auth
                                <p>Rp. {{ number_format($item->harga_barang) }}</p>
                                <h3>Rp. {{ number_format($item->harga_barang - $item->harga_barang * 0.1) }}</h3>
                            @else
                                {{-- <p>Rp. {{ number_format($item->harga_barang) }}</p> --}}
                                <h3>Rp. {{ number_format($item->harga_barang) }}</h3>
                            @endauth
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="product-list">
        <p>Product List</p>
        <div class="card-list-product">
            @foreach ($allProduct as $item)
                <div class="card-list">
                    <div class="card-list-head">
                        <img src="{{ asset('assets/images/product/' . $item->images . '') }}"
                            style="width:100%; height:100%; border-radius:20px;" alt="">
                    </div>
                    <div class="card-list-body">
                        <p class="title">{{ $item->nama_barang }}</p>
                        <div class="harga">
                            @auth
                                <p>Rp. {{ number_format($item->harga_barang) }}</p>
                                <h3>Rp. {{ number_format($item->harga_barang - $item->harga_barang * 0.1) }}</h3>
                            @else
                                {{-- <p>Rp. {{ number_format($item->harga_barang) }}</p> --}}
                                <h3>Rp. {{ number_format($item->harga_barang) }}</h3>
                            @endauth
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
