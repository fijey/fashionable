@extends('layout.home')
@section('title', 'UMKM KITA')
@section('content')
<section id="slider">

    <style>
        h4 {
            color: black;
        }
    </style>
    <!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-6">
                                <h1>Fashionable</h1>
                                <h2>Apa itu Fashionable?</h2>
                                <p>Fashionable adalah nama Web yang diciptakan untuk para UMKM di sektor Fashion </p>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{ asset('img/girl.svg')}}" class="girl img-responsive" alt="" />
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-6">
                                <h2>Untuk apa Fashionable dibuat?</h2>
                                <p>Memudahkan Para UMKM dibidang Fashion untuk mengiklankan produknya di web ini
                                    dengan adanya web ini diharapkan dapat membantu kalian semua mendapatkan traffic
                                    lebih ke
                                    toko E-Commerce kalian </p>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{ asset('img/shoping2.svg')}}" class="girl img-responsive" alt="" />
                            </div>
                        </div>

                        <div class="item">
                            <div class="col-sm-6">
                                <h2>Kamu Memiliki Usaha dibidang Fashion dan Ingin Beriklan juga?</h2>
                                <p>Yuk Gabung disini dan dapatkan Traffic Sebanyak-banyaknya ke E-Comerce Kalian </p>
                                <button type="button" class="btn btn-default get">Gabung Sekarang</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{ asset('img/goingup.svg')}}" class="girl img-responsive" alt="" />
                            </div>
                        </div>

                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>
<!--/slider-->

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Category</h2>
                    <div class="panel-group category-products" id="accordian">
                        <!--category-productsr-->
                        <div class="panel panel-default">
                            @foreach ($category as $c )
                            <div class="panel-heading">


                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordian" href="#{{ $c->id_category }}">
                                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                        {{ $c->category_name }}
                                    </a>
                                </h4>
                            </div>

                            <div id="{{ $c->id_category }}" class="panel-collapse collapse">

                                <div class="panel-body">
                                    <ul>
                                        @foreach ($subcategory as $sub )


                                        <li><a href="/{{ $c->id_category }}/{{ $sub->id_subcategory }}">{{ $sub->subcategory_name }}
                                            </a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!--/category-products-->




                    <div class=" text-center">
                        <!--shipping-->
                        <img style="width: 250px; height:300px;" src="{{ asset('img/posterputih.png') }}" alt="" />
                    </div>
                    <!--/shipping-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <!--features_items-->
                    <h2 class="title text-center">List Produk</h2>
                    <div class="row">
                        @foreach ($product as $p )
                        <div class="col-sm-6">
                            <a
                                href="/{{ $p->id_category }}/{{ $p->id_subcategory }}/{{ $p->id_product }}/{{ $p->store_id }}">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo">
                                            <img src="{{ asset($p->product_img1) }}" class="col-xs-12" height="400px"
                                                width="250px" alt="" />
                                            <h2 class="text-center">RP. {{ number_format($p->product_price,2,',','.') }}
                                            </h2>
                                            <h4 class="text-center">{{ $p->product_name }}</h4>
                                            <h4 class="" style="margin-left: 16px"><i
                                                    class="fa fa-tags"></i>{{ $p->category_name }}</h4>
                                            <h4 class="" style="margin-left: 16px"><i
                                                    class="fa fa-tags"></i>{{ $p->subcategory_name }}</h4>
                                        </div>
                                    </div>
                            </a>
                            <div class="choose mt-5 text-center">
                                <ul class="nav nav-pills nav-justified">
                                    <li><i class="fas fa-store mr-3"></i><span class="ml-3">{{ $p->store_name }}</span>
                                    </li>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>
                <div class="d-flex p-2">

                    {{  $product->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection