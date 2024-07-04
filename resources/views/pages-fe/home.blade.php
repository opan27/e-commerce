@extends('index')
@section('content')
<div class="slider">
    <div>
        <img src="{{url('template-fe/img/slider/slide1.png')}}" alt="">
        <div class="caption1">
            <img src="{{url('template-fe/img/slider/Group 279.png')}}" class="img-fluid" />
        </div>
    </div>
    <div>
        <img src="{{url('template-fe/img/slider/slide2.png')}}" alt="">
        <div class="caption1">
            <img src="{{url('template-fe/img/slider/Group 280.png')}}" class="img-fluid" />
        </div>
    </div>
</div>
<div class="flash-promo">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <img src="{{url('template-fe/img/assets/big-flash-promo-png2.png')}}" />
            </div>
            <div class="col-md-4 d-flex align-items-end justify-content-end lihat-semua">
                <p><span class="badge rounded-pill bg-danger me-3"><img src="{{url('template-fe/img/assets/time-outline.png')}}"  class="me-2"/>06:06:29</span><a href="{{route('our-products')}}" style="color:black; text-decoration:none">Lihat semua</a></p>
            </div>
        </div>
        <div class="row align-items-stretch">
            <div class="owl-carousel owl-carousel-1 mb-3">
                @foreach ( $productFilter as $itemDisc )
                    @if ($itemDisc['status_product'] == 'Discount')
                        @foreach ($itemDisc['data_product'] as $prod )
                            @php
                                $img = json_decode($prod['productImage'], true);
                                if (is_array($img) && isset($img[0]['filename'])) {
                                    $imgUrl = asset('productImage/' . $img[0]['filename']);
                                }
                            @endphp
                            <div class="h-100">
                                <a href="{{url('product/'. $prod->slug)}}" class="link-card-custom">
                                    <div class="card h-100">
                                        <img src="{{$imgUrl}}" class="card-img-top" alt="{{$prod['productName']}}">
                                        <div class="bg-promo-special p-2">
                                        <p class="card-text">Promo Spesial</p>
                                        </div>
                                        <div class="card-body">
                                        <p class="desc">{{$prod->productName}}</p>
                                        <p><span class="diskon text-danger p-1">{{$prod->discount * 100}}%</span> <span><del>{{number_format($prod->price)}}</del></span></p>
                                        <p class="price">Rp {{number_format($prod->priceAfterDiscount)}}</p>
                                        <img src="{{url('template-fe/img/assets/star.png')}}" style="display:inline"/><span>5.0</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="best-seller">
    <div class="container-fluid">
        <div class="container pt-5">
            <h3 class="text-center">Best Seller</h3>
        </div>
        <div class="container">
            <div class="row align-items-stretch">
                <div class="owl-carousel owl-carousel-2">
                    @foreach ( $productFilter as $itemDisc )
                        @if ($itemDisc['status_product'] == 'Best Seller')
                            @foreach ($itemDisc['data_product'] as $prod )
                                @php
                                    $img = json_decode($prod['productImage'], true);
                                    if (is_array($img) && isset($img[0]['filename'])) {
                                        $imgUrlBest = asset('productImage/' . $img[0]['filename']);
                                    }
                                @endphp
                                <a href="{{url('product/'. $prod->slug)}}" class="link-card-custom">
                                    <div  class="h-100">
                                        <div class="card h-100">
                                            <img src="{{url($imgUrlBest)}}" class="card-img-top" alt="...">
                                            <div class="card-body">
                                            <p class="desc">{{$prod->productName}}</p>
                                            <p class="price">Rp {{number_format($prod->price)}}</p>
                                            <p><img src="{{url('template-fe/img/assets/star.png')}}"/><span>5.0</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div class="button-lihat-semua p-4">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <a href="{{url('products/best-seller')}}" class="btn px-5 py-2 text-white btn-lihat-semua">Lihat Semua</a>
            </div>
        </div>
    </div>
</div>
<div class="recomendation">
    <div class="container-fluid">
        <div class="container py-5">
            <h3 class="text-center">Recomendation</h3>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="controls">
                        <button type="button" class="control btn btn-link px-5 me-5 my-2" data-filter="all">All</button>
                        @foreach ( $dataCategory as $cat )
                        <button type="button" class="control btn btn-link me-5 my-2" data-filter=".{{str_replace(' ', '', $cat->name)}}">{{$cat->name}}</button>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="containers mt-5">

                <div class="container">
                    <div class="row">
                        @foreach ( $productFilter as $itemDisc )
                            @if ($itemDisc['status_product'] == 'Recomended')
                                @foreach ($itemDisc['data_product'] as $prod )
                                    @php
                                        $imgReco = json_decode($prod['productImage'], true);
                                        if (is_array($imgReco) && isset($imgReco[0]['filename'])) {
                                            $imgUrlReco = asset('productImage/' . $imgReco[0]['filename']);
                                        }
                                    @endphp
                                    <div class="mix mb-3 {{str_replace(' ', '', $prod->name)}} col-12 col-md-3 col-lg-3">
                                        <a href="{{url('product/'. $prod->slug)}}" class="link-card-custom">
                                            <div class="card h-100">
                                                <img src="{{url($imgUrlReco)}}" class="card-img-top" alt="...">
                                                <div class="card-body">
                                                <p class="desc">{{$prod->productName}}</p>
                                                <p class="price">Rp {{number_format($prod->price)}}</p>
                                                <img src="{{url('template-fe/img/assets/star.png')}}"/><span class="rat">5.0</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            @endif
                        @endforeach




                        {{-- @foreach ( $productFilter as $itemDisc )
                            @if ($itemDisc['status_product'] == 'recomended')
                                @foreach ($itemDisc['data_product'] as $prod )
                                    @php
                                        $imgReco = json_decode($prod['productImage'], true);
                                        if (is_array($imgReco) && isset($imgReco[0]['filename'])) {
                                            $imgUrlReco = asset('productImage/' . $imgReco[0]['filename']);
                                        }
                                    @endphp

                                @endforeach
                            @endif
                        @endforeach
                        @foreach ($productFilter as $itemDisc)
                            @foreach ( $itemDisc['Recomended'] as $recomendation )
                                @if ($recomendation['status_product'] == 'Recomended')
                                    @foreach ($recomendation['data_product'] as $prod )
                                        @php
                                            $img = json_decode($prod['productImage'], true);
                                            if (is_array($img) && isset($img[0]['filename'])) {
                                                $imgUrlBest = asset('productImage/' . $img[0]['filename']);
                                            }
                                        @endphp
                                        <div class="mix mb-3 {{str_replace(' ', '', $recomendation->name)}} col-12 col-md-3 col-lg-3">
                                            <a href="{{url('detail-product/'. $recomendation->slug)}}" class="link-card-custom">
                                                <div class="card h-100">
                                                    <img src="{{url($imgUrlBest)}}" class="card-img-top" alt="...">
                                                    <div class="card-body">
                                                    <p class="desc">{{$recomendation->productName}}</p>
                                                    <p class="price">Rp {{number_format($recomendation->price)}}</p>
                                                    <img src="{{url('template-fe/img/assets/star.png')}}"/><span class="rat">5.0</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                @endif
                            @endforeach
                        @endforeach --}}
                    </div>
                </div>

        </div>


    </div>
</div>
<div class="button-lihat-semua p-4">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <a href="{{url('products/recomendation')}}" class="btn px-5 py-2 text-white btn-lihat-semua">Lihat Semua</a>
            </div>
        </div>
    </div>
</div>
<div class="title-video mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center text-title-video">SSSKIN Has Helped 500.000+ People Transform Their Skin</h3>
            </div>
        </div>
    </div>
</div>
<div class="container vd mt-5 pb-5">
    <div class="row">
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
            <video controls class="w-100">
                <source src="{{url('template-fe/vidio/2 - Directive ngForm.mp4')}}" type="video/mp4">
                Browser Anda tidak mendukung pemutar video HTML5.
            </video>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
            <video controls class="w-100">
                <source src="{{url('template-fe/vidio/2 - Directive ngForm.mp4')}}" type="video/mp4">
                Browser Anda tidak mendukung pemutar video HTML5.
            </video>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
            <video controls class="w-100">
                <source src="{{url('template-fe/vidio/2 - Directive ngForm.mp4')}}" type="video/mp4">
                Browser Anda tidak mendukung pemutar video HTML5.
            </video>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
            <video controls class="w-100">
                <source src="{{url('template-fe/vidio/2 - Directive ngForm.mp4')}}" type="video/mp4">
                Browser Anda tidak mendukung pemutar video HTML5.
            </video>
        </div>
    </div>
</div>

<div class="percent-price mt-5 pt-5">
    <div class="container">
        <div class="row text-center pb-5">
            <div class="col-md-4">
                <p class="percent-price-p1">96%</p>
                <p class="percent-desc">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deserunt, illum odio </p>
            </div>
            <div class="col-md-4">
                <p class="percent-price-p1">94%</p>
                <p class="percent-desc">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deserunt, illum odio </p>
            </div>
            <div class="col-md-4">
                <p class="percent-price-p1">93%</p>
                <p class="percent-desc">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deserunt, illum odio </p>
            </div>
        </div>
        <div class="row py-5">
            <p class="text-center">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Autem velit aspernatur expedita, rem libero praesentium! Quasi illo totam optio quo laborum ullam? </p>
        </div>
    </div>
</div>
@endsection

@section('contentmobile')
<div style="position:fixed; z-index:99; width:100%; top:0;background:white">
    <div class="container-fluid bg-title">
        <div class="container">
            <div class="row">
                <div class="col-md-12 fs-6">
                    <p class="m-0 p-2 text-center"><img src="{{url('template-fe/img/assets/Vector.png')}}" /><b><small class="mx-3 fs-6 ">Gratis Ongkir</small></b><small>Setiap pembelian min 100rb</small></p>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg fs-6" style="height:70px">
        <div class="container-fluid">
            <a href="#">
                <img src="{{url('template-fe/img/assets/logo-animate.png')}}" id="gambar1m"/>
                <img src="{{url('template-fe/img/assets/SSSKIN.png')}}" style="background:black; padding:5px" id="gambar2m" class="ssskin" />
            </a>
            <div class="d-flex order-2">
                @if(session('email'))
                <a href="" class="mx-1 mt-1 myprofile">
                <img src="{{url('template-fe/img/assets/user.png')}}" style="margin-top:2px" />
                </a>
                @endif
                <a href="#" class="shooping mt-1" style="position: relative">
                    <img src="{{url('template-fe/img/assets/shopping-bag.png')}}" style="margin-top:2px" />
                    <span class="badge text-bg-success" id="totcartm" style="background:red; position: absolute; top: 0px; right:-5px"></span>
                </a>
                <button class="navbar-toggler overlay order-1 p-1" style="margin-top:2px" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <img src="{{url('template-fe/img/assets/Burger menu.png')}}" alt="">
                    </span>
                </button>
            </div>
        </div>
    </nav>
</div>

<div class="overlay-menu container" id="overlayMenu">
    <div class="row pt-4" style="height:3em">
        <div class="col-8">
            <a href="#">
                <img src="{{url('template-fe/img/assets/SSSKIN.png')}}" style="background:black; padding:5px" id="gambar2over" class="ssskin" />
            </a>
        </div>
        <div class="col-4">
            <span class="close-btn" id="closeBtn">&times;</span>
        </div>
    </div>
    <div class="form-group has-search" style="margin-top:1em">
        <img src="{{url('template-fe/img/assets/search.png')}}" class="form-control-feedback" alt="" width="">
        <div class="input-wrapper">
            <input type="text" class="form-control p-2 searching" id="search-inputs">
            <label for="search-input" class="placeholder-text">Placeholder Text</label>
        </div>
    </div>
    <div class="row">
        <ul>
            <li class="px-2 py-4"><a href="{{url('products')}}" style="color:black; text-decoration:none">Product</a></li>
            <li class="px-2 py-4"><a href="" style="color:black; text-decoration:none">SSSKIN Stories</a></li>
            <li class="px-2 py-4"><a href="" style="color:black; text-decoration:none">Blog</a></li>
        </ul>
    </div>
</div>

<div class="container pt-4 mb-4">
    <div class="form-group has-search">
        <img src="{{url('template-fe/img/assets/search.png')}}" class="form-control-feedback" alt="" width="">
        <div class="input-wrapper">
            <input type="text" class="form-control p-2 searching" id="search-input">
            <label for="search-input" class="placeholder-text">Placeholder Text</label>
        </div>
    </div>
</div>
<div class="slider">
    <div>
        <img src="{{url('template-fe/img/slider/slide1.png')}}" alt="">
    </div>
    <div>
        <img src="{{url('template-fe/img/slider/slide2.png')}}" alt="">
    </div>
</div>

<div class="flash-promo">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-6">
                <img src="{{url('template-fe/img/assets/flash-promo-png2.png')}}" class="img-fluid mt-2"/>
            </div>
            <div class="col-md-2 col-6 text-end lihat-semua">
                <p class="text-promo"><span class="badge rounded-pill bg-danger"><img src="{{url('template-fe/img/assets/time-outline.png')}}"  class="me-2"/><span class="mt-1">06 : 20 : 21</span></span></p>
            </div>
        </div>
        <div class="row">
            <div class="owl-carousel owl-carousel-mobile-flash">
                @foreach ( $productFilter as $itemDisc )
                    @if ($itemDisc['status_product'] == 'Discount')
                        @foreach ($itemDisc['data_product'] as $prod )
                            @php
                                $img = json_decode($prod['productImage'], true);
                                if (is_array($img) && isset($img[0]['filename'])) {
                                    $imgUrl = asset('productImage/' . $img[0]['filename']);
                                }
                            @endphp
                            <div class="h-100">
                                <a href="{{url('product/'. $prod->slug)}}" class="link-card-custom">
                                    <div class="card">
                                        <img src="{{$imgUrl}}" class="card-img-top" alt="{{$prod['productName']}}">
                                        <div class="card-body bg-promo-special p-2">
                                        <p class="card-text">Promo Spesial</p>
                                        </div>
                                        <div class="card-body">
                                        <p class="desc m-0">{{$prod->productName}}</p>
                                        <p class="m-0"><span class="diskon text-danger p-1">{{$prod->discount * 100}}%</span> <span><del>{{number_format($prod->price)}}</del></span></p>
                                        <p class="price mb-0">Rp {{number_format($prod->priceAfterDiscount)}}</p>
                                        <p class="mb-0 d-flex"><img src="{{url('template-fe/img/assets/star.png')}}"/><span>5.0</span></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endif
                @endforeach

            </div>
        </div>
        <div class="row">
            <div>
                <p class="text-center" style="border-radius:10px;"><a href="{{url('products')}}" class="btn btn-sm forn-control text-white" style="background:white; color:rgba(244, 119, 34, 1) !important; display:block; border-radius:10px">Lihat Semua</a></p>
            </div>
        </div>
    </div>
</div>
<div class="best-seller">
    <div class="container-fluid">
        <div class="container pt-5">
            <div class="row">
                <div class="col-6">
                    <h3>Best Seller</h3>
                </div>
                <div class="col-6">
                    <p class="text-end">Lihat Semua</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="owl-carousel owl-carousel-mobile-best">
                @foreach ( $productFilter as $itemDisc )
                    @if ($itemDisc['status_product'] == 'Best Seller')
                        @foreach ($itemDisc['data_product'] as $prod )
                            @php
                                $img = json_decode($prod['productImage'], true);
                                if (is_array($img) && isset($img[0]['filename'])) {
                                    $imgUrlBest = asset('productImage/' . $img[0]['filename']);
                                }
                            @endphp
                            <a href="{{url('product/'. $prod->slug)}}" class="link-card-custom">
                                <div>
                                    <div class="card mb-3">
                                        <div class="row g-0">
                                        <div class="col-6">
                                            <img src="{{url($imgUrlBest)}}" class="img-fluid rounded-start" alt="{{$prod['productName']}}">
                                        </div>
                                        <div class="col-6">
                                            <div class="card-body">
                                                <p class="desc">{{$prod['productName']}}</p>
                                                <p class="price">Rp {{number_format($prod->price)}}</p>
                                                <p><img src="{{url('template-fe/img/assets/star.png')}}"/><span>5.0</span></p>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    @endif
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div class="best-seller recomendation">
    <div class="container-fluid">
        <div class="container">
            <h3>Recomendation</h3>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="controls">
                        <button type="button" class="control btn btn-link px-5 me-2 my-2" data-filter="all">All</button>
                        @foreach ( $dataCategory as $cat )
                        <button type="button" class="control btn btn-link me-2 my-2" data-filter=".{{str_replace(' ', '', $cat->name)}}">{{$cat->name}}</button>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="owl-carousel owl-carousel-6">
                    @foreach ( $productFilter as $itemDisc )
                            @if ($itemDisc['status_product'] == 'Recomended')
                                @foreach ($itemDisc['data_product'] as $prod )
                                    @php
                                        $imgReco = json_decode($prod['productImage'], true);
                                        if (is_array($imgReco) && isset($imgReco[0]['filename'])) {
                                            $imgUrlReco = asset('productImage/' . $imgReco[0]['filename']);
                                        }
                                    @endphp
                                    <div class="mix mb-3 {{str_replace(' ', '', $prod->name)}} col-12 col-md-3 col-lg-3">
                                        <a href="{{url('product/'. $prod->slug)}}" class="link-card-custom">
                                            <div class="card h-100">
                                                <img src="{{url($imgUrlReco)}}" class="card-img-top" alt="...">
                                                <div class="card-body">
                                                <p class="desc">{{$prod->productName}}</p>
                                                <p class="price">Rp {{number_format($prod->price)}}</p>
                                                <img src="{{url('template-fe/img/assets/star.png')}}"/><span class="rat">5.0</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="look-all-btn">
        <a href="" class="btn btn-sm form-control">Lihat Semua</a>
    </div>
</div>


<div class="title-video mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-title-video fs-5">SSSKIN Has Helped 500.000+ People Transform Their Skin</h3>
            </div>
        </div>
    </div>
</div>
<div class="container vd mt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="owl-carousel owl-carousel-10">
                <div>
                    <div class="card">
                        <video controls class="w-100">
                            <source src="{{url('template-fe/vidio/2 - Directive ngForm.mp4')}}" type="video/mp4">
                            Browser Anda tidak mendukung pemutar video HTML5.
                        </video>
                    </div>
                </div>
                <div>
                    <div class="card">
                        <video controls class="w-100">
                            <source src="{{url('template-fe/vidio/2 - Directive ngForm.mp4')}}" type="video/mp4">
                            Browser Anda tidak mendukung pemutar video HTML5.
                        </video>
                    </div>
                </div>
                <div>
                    <div class="card">
                        <video controls class="w-100">
                            <source src="{{url('template-fe/vidio/2 - Directive ngForm.mp4')}}" type="video/mp4">
                            Browser Anda tidak mendukung pemutar video HTML5.
                        </video>
                    </div>
                </div>
                <div>
                    <div class="card">
                        <video controls class="w-100">
                            <source src="{{url('template-fe/vidio/2 - Directive ngForm.mp4')}}" type="video/mp4">
                            Browser Anda tidak mendukung pemutar video HTML5.
                        </video>
                    </div>
                </div>
                <div>
                    <div class="card">
                        <video controls class="w-100">
                            <source src="{{url('template-fe/vidio/2 - Directive ngForm.mp4')}}" type="video/mp4">
                            Browser Anda tidak mendukung pemutar video HTML5.
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="newslater">
    <div class="container">
        <div class="row">
            <p class="langganan-news">Langganan Newslatter</p>
            <form class="d-flex form-new-latter">
                <input class="form-control me-2" type="search" placeholder="Enter Your Email" aria-label="Search">
                <button class="btn" type="submit">Subscribe</button>
            </form>
        </div>
    </div>
</div>

<div class="foot my-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h6 class="text-center">
                    <span class="logo-image-foot">
                        <img src="{{url('template-fe/img/assets/SSSKIN.png')}}"/>
                    </span>
                </h6>
                <h6 class="text-center">Pt Abil Mannaf Perkasa</h6>
                <p class="text-center">SSSKIN Headquarters</p>
                <p class="text-center">Jl. K.H. Wahid Hasyim No.161, RT.1/RW.5, Kb. Kacang, Kecamatan Tanah Abang, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10240</p>
                <div class="row">
                    <div class="col-6">
                        <ul style="list-style:none;font-size: 13px;">
                            <li><b>Perusahaan</b></li>
                            <li>Blog</li>
                            <li>Korporasi</li>
                            <li>Karier</li>
                            <li>Afiliasi</li>
                            <li>Programmer Reseller</li>
                            <li>SSSKIN Rewords</li>
                            <li>Gift Card</li>
                        </ul>
                    </div>
                    <div class="col-6">
                        <ul style="list-style:none; font-size: 13px;">
                            <li><b>Layanan Konsumen</b></li>
                            <li>Layanan Pengaduan</li>
                            <li>Konsumen</li>
                            <li>FAQ</li>
                            <li>Pengiriman & Penukaran</li>
                            <li>Kebijakan Privasi</li>
                            <li>Syarat & Ketentuan</li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <ul style="list-style:none; font-size:13px">
                            <li><b>Product</b></li>
                            <li>Karir</li>
                            <li>Afiliasi</li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p class="text-center fw-bold">Hubungi Kami</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <p class="m-0">WhatsApp</p>
                        <p class="m-0">(+62)851-5600-5881</p>
                    </div>
                    <div class="col-6">
                        <p class="m-0">Email</p>
                        <p class="m-0">info@ssgroup.id</p>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="text-center">
                        <p class="fw-bold">Media Sosial</p>
                        <img src="{{url('template-fe/img/assets/instagram.png')}}" width="30" class="mx-2" />
                        <img src="{{url('template-fe/img/assets/Vector (1).png')}}" width="30" class="mx-2" />
                        <img src="{{url('template-fe/img/assets/Vector (2).png')}}" width="30" class="mx-2"/>
                        <img src="{{url('template-fe/img/assets/Vector (3).png')}}" width="30" class="mx-2"/>
                        <img src="{{url('template-fe/img/assets/Frame.png')}}" width="30" class="mx-2"/>
                    </div>
                </div>
                <div class="row mt-4">
                    <p>Partner Pembayaran</p>
                    <img src="{{url('template-fe/img/assets/partner pembayaran.png')}}" />
                </div>
                <div class="row mt-4">
                    <p>Partner Logistik</p>
                    <img src="{{url('template-fe/img/assets/partner logistik.png')}}" />
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('customjs')
<script>
    $(document).ready(function(){

        $('.overlay').on('click', function() {
            $('#overlayMenu').fadeIn();
        });

        $(document).on('click', '#closeBtn', function() {
            $('#overlayMenu').fadeOut();
        });

        var slider = $('.slider').bxSlider({
            controls: false,
            auto: true,
            speed:500,
            responsive: true,
            infiniteLoop: true,
            mode: 'fade',
            pager: true
        });


        $(".owl-carousel-1").owlCarousel({
            items: 4, // Tampilkan 4 item per slide
            loop: false,
            margin: 20,
            nav: true,
            navText: ["<", ">"],
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 4
                }
            },
            onInitialized: function() {
                $('.owl-item').css('height', '530px'); // Menetapkan tinggi tetap
            }
        });

        $(".owl-carousel-mobile-flash").owlCarousel({
            items: 4, // Tampilkan 4 item per slide
            loop: false,
            margin: 20,
            nav: true,
            navText: ["<", ">"],
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 4
                }
            }
        });

        $(".owl-carousel-2").owlCarousel({
            items: 4, // Tampilkan 4 item per slide
            loop: false,
            margin: 20,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 4
                }
            },
            onInitialized: function() {
                $('.owl-item').css('height', '530px'); // Menetapkan tinggi tetap
            }
        });

        $(".owl-carousel-mobile-best").owlCarousel({
            items: 4, // Tampilkan 4 item per slide
            loop: false,
            margin: 20,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 4
                }
            }
        });

        $(".owl-carousel-6").owlCarousel({
            items: 4, // Tampilkan 4 item per slide
            loop: true,
            margin: 20,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 4
                }
            }
        });
        $(".owl-carousel-10").owlCarousel({
            items: 4, // Tampilkan 4 item per slide
            loop: true,
            margin: 20,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 4
                }
            }
        });

        $('.owl-carousel-mobile').owlCarousel({
            center: true,
            items: 2,
            loop: true,
            autoplay:true,
            margin: 10,
            stagePadding: 20,
            responsive: {
                0: {
                    items: 1,
                    stagePadding: 20,
                },
                1200: {
                    items: 2 ,
                    stagePadding: 0,
                }
            }
        });

        $(".owl-carousel-mobile-recomendation").owlCarousel({
            items: 2,
            margin: 10,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 4
                },
                1000: {
                    items: 6
                }
            }
        });

        $(".owl-carousel").owlCarousel({
            items: 2,
            loop: true,
            margin: 10,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 4
                },
                1000: {
                    items: 4
                }
            }
        });

        $('.owl-carousel-mobile-skin-type').owlCarousel({
            loop:true,
            items:2,
            margin:10,
            responsive:{
                0:{
                    items:2.5
                },
                600:{
                    items:3
                },
                1000:{
                    items:5
                }
            }
        });


        var mixer = mixitup('.containers', {
            selectors: {
                target: '.mix'
            },
            animation: {
                duration: 300
            },
            layout: {
                containerClassName: 'row' // memastikan layout menggunakan grid sistem bootstrap
            }
        });

        $(document).on('click', '.shooping', function(event) {
            event.preventDefault();
            $('#shoppingContent').addClass('active');
        });

        $(document).on('click', '.myprofile', function(event){
            event.preventDefault();
            $('.profile-content').addClass('active')
        })


        $(document).on('click', '.close-btn', function() {
            $('#shoppingContent').removeClass('active');
        });

        $('body').click(function(){
            $('.profile-content').removeClass('active')
        })


        var placeholder = [
            'Voucher',
            'Apa yang anda cari ?',
            'DISCOUNT UP TO 30% VOUCHER'
        ];

        var currentIndex = 0;

        setInterval(function(){
            $('.placeholder-text').slideUp(500, function() {
                $(this).text(placeholder[currentIndex]).slideDown(500);
            });
            currentIndex = (currentIndex + 1) % placeholder.length;
        }, 2000);


        $('#gambar1').hide()
        $('#gambar2').show()
        $('#gambar1m').hide()
        $('#gambar2m').show()

        function toggleImages() {
            if ($('#gambar1').is(':visible')) {
                $('#gambar1').fadeOut(500, function() {
                    $('#gambar2').fadeIn(500);
                });
            } else {
                $('#gambar2').fadeOut(500, function() {
                    $('#gambar1').fadeIn(500);
                });
            }
        }

        function toggleImages2() {
            if ($('#gambar1m').is(':visible')) {
                $('#gambar1m').fadeOut(500, function() {
                    $('#gambar2m').fadeIn(500);
                });
            } else {
                $('#gambar2m').fadeOut(500, function() {
                    $('#gambar1m').fadeIn(500);
                });
            }
        }


        setInterval(toggleImages, 3000);
        setInterval(toggleImages2, 3000);

    });

</script>
@endsection
