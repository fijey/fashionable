@extends('layout.home')
<!DOCTYPE html>


<style>
    .share {
        width: 200px;
        height: 200px;
    }

    img.profiletoko.share.img-responsive {
        display: inline;
    }
</style>

<body>
    @section('content')

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
                                        <a data-toggle="collapse" data-parent="#accordian"
                                            href="#{{ $c->id_category }}">
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

                        <div class="text-center">
                            <!--shipping-->
                            <img style="width: 250px" height="300px" src="{{ asset('img/posterputih.png') }}" alt="" />
                        </div>

                    </div>
                </div>

                <div class="col-sm-9 padding-right">
                    <div class="product-details">
                        <!--product-details-->
                        <div class="col-sm-5">
                            <div class="view-product">
                                <img src="{{asset($product->product_img1)}}" alt="" />
                            </div>
                            <div id="similar-product" class="carousel slide" data-ride="carousel">

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <a href=""><img style="width:60px; height:60px;"
                                                src="{{asset($product->product_img1)}}" alt=""></a>
                                        <a href=""><img style="width:60px; height:60px;"
                                                src="{{asset($product->product_img2)}}" alt=""></a>
                                        <a href=""><img style="width:60px; height:60px;"
                                                src="{{asset($product->product_img3)}}" alt=""></a>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="col-sm-7">
                            <div class="product-information">
                                <!--/product-information-->
                                <img src="img/product-details/new.jpg" class="newarrival" alt="" />
                                <i class="fas fa-store">{{ $product->store_name }}</i>
                                <h2>{{ $product->product_name }}</h2>
                                <p>{{ $product->id_product }}</p>
                                <img src="img/product-details/rating.png" alt="" />
                                <span style="font-size: 40px; color: green;">RP.
                                    {{ number_format($product->product_price,2,',','.') }}</span>
                                <br>
                                <span><b><i class="fas fa-tags"></i></b> {{ $product->category_name }}</span>
                                <span><b><i class="fas fa-tag"></i></b> {{ $product->subcategory_name }}</span>
                                <br>
                                <span><b>Kondisi Produk</b> {{ $product->product_condition }}</span><br>
                                <span> Klik link berikut untuk berbelanja langsung </span>

                                @if ( $product->product_lazada != NULL )

                                <a href="https://{{ $product->product_lazada }}">
                                    <img src="{{ asset('img/lazada.png')}}" class="profiletoko share img-responsive"
                                        alt="Link menuju Lazada" />
                                </a>

                                @else
                                <img src="{{ asset('img/lazadanull.png')}}" class="profiletoko share img-responsive"
                                    alt="Link menuju Lazada" />

                                @endif

                                @if ( $product->product_bukalapak != null )

                                <a href="https://{{ $product->product_bukalapak }}">
                                    <img src="{{ asset('img/bukalapak.png')}}" class="profiletoko share img-responsive"
                                        alt="Link menuju Lazada" />
                                </a>
                                @else
                                <img src="{{ asset('img/bukalapaknull.png')}}" class="profiletoko share img-responsive"
                                    alt="Link menuju Lazada" />
                                @endif

                                @if ( $product->product_tokopedia )

                                <a href="https://{{ $product->product_tokopedia }}">
                                    <img src="{{ asset('img/tokopedia.png')}}" class="profiletoko share img-responsive"
                                        alt="Link menuju Lazada" />
                                </a>

                                @else
                                <img src="https://{{ asset('img/tokopedianull.png')}}" class="profiletoko share img-responsive"
                                    alt="Link menuju Lazada" />
                                @endif

                                @if ($product->product_shopee != null)

                                <a href="https://{{ $product->product_shopee }}">
                                    <img src="{{ asset('img/shopee.png')}}" class="profiletoko share img-responsive"
                                        alt="Link menuju Lazada" />
                                </a>

                                @else
                                <img src="{{ asset('img/shopeenull.png')}}" class="profiletoko share img-responsive"
                                    alt="Link menuju Lazada" />
                                @endif
                            </div>
                            <!--/product-information-->
                        </div>
                    </div>
                    <!--/product-details-->

                    <div class="category-tab shop-details-tab">
                        <!--category-tab-->
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs">
                                <li><a href="#details" data-toggle="tab">Deskripsi Produk</a></li>
                                <li><a href="#companyprofile" data-toggle="tab">Tentang Toko</a></li>
                                <li><a href="#tag" data-toggle="tab">Tentang Penjual</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane active in" id="details">
                                <p>{{ $product->product_description }}</p>
                            </div>

                            <div class="tab-pane fade" id="companyprofile">
                                @if ($product->store_about == NULL)
                                <table class="table table-striped">
                                    <tr>
                                        <th>Nama Toko</th>
                                        <th>Alamat Toko</th>
                                    </tr>
                                    <tr>
                                        <td>{{ $product->store_name }}</td>
                                        <td>{{ $product->store_address }}</td>
                                    </tr>
                                </table>

                                @endif
                                <p>{{ $product->store_about }}</p>
                            </div>

                            <div class="tab-pane fade" id="tag">
                                ini untuk tag
                            </div>

                        </div>
                    </div>
                    <h3>KUNJUNGI TOKO KAMI</h3>
                    @if ( $product->product_lazada != NULL )

                    <a href="https://{{ $product->store_lazada }}">
                        <img src="{{ asset('img/lazada.png')}}" class="profiletoko share img-responsive"
                            alt="Link menuju Lazada" />
                    </a>

                    @else
                    <img src="{{ asset('img/lazadanull.png')}}" class="profiletoko share img-responsive"
                        alt="Link menuju Lazada" />

                    @endif

                    @if ( $product->product_bukalapak != null )

                    <a href="https://{{ $product->store_bukalapak }}">
                        <img src="{{ asset('img/bukalapak.png')}}" class="profiletoko share img-responsive"
                            alt="Link menuju Lazada" />
                    </a>
                    @else
                    <img src="{{ asset('img/bukalapaknull.png')}}" class=" profiletoko share img-responsive"
                        alt="Link menuju Lazada" />
                    @endif

                    @if ( $product->product_tokopedia )

                    <a href="https://{{ $product->store_tokopedia }}">
                        <img src="{{ asset('img/tokopedia.png')}}" class="profiletoko share img-responsive"
                            alt="Link menuju Lazada" />
                    </a>

                    @else
                    <img src="{{ asset('img/tokopedianull.png')}}" class=" profiletoko share img-responsive"
                        alt="Link menuju Lazada" />
                    @endif

                    @if ($product->product_shopee != null)

                    <a href="https://{{ $product->store_shopee }}">
                        <img src="{{ asset('img/shopee.png')}}" class="profiletoko share img-responsive"
                            alt="Link menuju Lazada" />
                    </a>

                    @else
                    <img src="{{ asset('img/shopeenull.png')}}" class=" profiletoko share img-responsive"
                        alt="Link menuju Lazada" />
                    @endif
                    <!--/category-tab-->

                    <div class="recommended_items" style="margin-top: 30px;">
                        <!--recommended_items-->
                        <h2 class="title text-center">Cek juga yang Lainnya di {{ $product->store_name }}</h2>

                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="item active">
                                    @foreach ($rekomendasi as $r )
                                    <div class="col-sm-4">
                                        <a
                                            href="/{{ $r->id_category }}/{{ $r->id_subcategory }}/{{ $r->id_product }}/{{ $r->store_id }}">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <img src="{{asset($r->product_img1) }}" alt="" />
                                                        <h2>RP. {{ number_format($r->product_price,2,',','.') }}</h2>
                                                        <p>{{ $r->product_name }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/recommended_items-->

                </div>
            </div>
        </div>
    </section>
    @endsection



    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/price-range.js')}}"></script>
    <script src="{{asset('js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
</body>

</html>