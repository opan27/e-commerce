@extends('index')

@section('content')

<div class="banner-product text-center">
    <img src="{{url('template-fe/img/assets/Luminous_Banner 1 (1).png')}}" alt="" class="img-fluid" >
</div>

<div class="product-item">
    <div class="container">
        <div class="row py-5 my-5">
            <div class="col-md-4">
                <div class="title-list-filter p-3">
                    <img src="{{url('template-fe/img/assets/filter.png')}}" class="me-2" /> Filter
                </div>
                <div class="icon-f">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Harga
                            </button>
                          </h2>
                          <div id="collapseOne" class="accordion-collapse collapse show p-3" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="value-display">
                                <span><span id="min-value"></span></span> ->
                                <span><span id="max-value"></span></span>
                            </div>
                            <div class="slider-container">
                                <div id="slider"></div>
                                <input type="hidden" id="min-input" name="min">
                                <input type="hidden" id="max-input" name="max">
                            </div>
                            <button class="mt-2 btn form-control btn-sm text-white" style="background:rgba(244, 119, 34, 1);" id="filter-harga">Terapkan</button>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                              By Category
                            </button>
                          </h2>
                          <div id="collapseTwo" class="accordion-collapse collapse show p-3" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            @foreach($category as $cat)
                                <div class="form-check">
                                    <input class="form-check-input" name="categoryfilter[]" value="{{$cat->id}}" type="checkbox">
                                    <label class="form-check-label" for="flexCheckDefault">
                                    {{$cat->name}}
                                    </label>
                                </div>
                            @endforeach
                          </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 p-0">
                <div class="container p-0">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="p-0 mb-0 mt-3">Total Products <span id="totalp">{{count($allDataProduct)}}<span> item</p>
                        </div>
                        <div class="col-md-6 p-3">
                            <div class="row">
                                <div class="col-6 text-end">
                                    <span>Sort By</span>
                                </div>
                                <div class="col-6">
                                    <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                                        <option selected>All Products</option>
                                        <option value="1">Recomended</option>
                                        <option value="1">Best Seller</option>
                                        <option value="1">Discount</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" id="dprod">
                    @foreach ( $dataProduct as $product )
                        @php
                            $img = json_decode($product->productImage, true);
                            if (is_array($img) && isset($img[0]['filename'])) {
                                $imgUrl = asset('productImage/' . $img[0]['filename']);
                            }
                        @endphp
                        <div class="col-md-4 mb-3">
                            <a href="{{url('detail-product/'. $product->slug)}}" class="link-card-custom">
                                <div class="card mb-3 h-100">
                                    <img src="{{$imgUrl}}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                    <p class="desc">{{$product->productName}}</p>
                                    <p class="price">Rp {{number_format($product->price)}}</p>
                                    <p><img src="{{url('template-fe/img/assets/star.png')}}"/><span>5.0</span></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="row mt-5">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center" id="paginate">
                            {{ $dataProduct->links() }}
                        </ul>
                    </nav>

                </div>

            </div>
        </div>
    </div>
</div>

<div class="pencarian-terkait">
    <div class="container">
        <div class="row">
            <hr>
            <div class="col-md-6">
                <div class="pencarian-terkait-1 mb-5">
                    <h6>Pencarian terkait</h6>
                    <p>
                        Serum Wajah | Cleanser Wajah | Krim Wajah | Kertas Minyak | Krim Mata | Face Oil | Paket Perawatan Wajah | Scrub Wajah | Serum Bulu Mata & Alis | Serum Mata | Skincare Tools | Toner Wajah | Sunblock wajah | Face Mist
                    </p>
                </div>
            </div>
            <div class="col-md-6"></div>
            <div class="col-md-6">
                <div class="pencarian-terkait-2 mb-5">
                    <h6>Lebih Cerah dan Sehat dengan Rutin Memakai Serum Wajah</h6>
                    <p>
                        Serum wajah adalah salah satu produk skincare yang memiliki kegunaan untuk menutrisi kulit. Serum umumnya memiliki bahan aktif yang lebih tinggi dibanding pelembab biasa. Beberapa bahan aktif tersebut diantaranya adalah asam glikolat dan vitamin C. Serum wajah memiliki molekul yang sangat kecil dan ringan, sehingga mudah diserap oleh pori-pori. Rutin memakai serum juga membuat kulit lebih bersih dan sehat. Serum memiliki banyak manfaat. Beberapa diantaranya adalah menghidrasi kulit sehingga kulit tetap lembab dan menghilangkan bekas jerawat.
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="pencarian-terkait-3 mb-5">
                    <h6>Cari Berbagai Keperluan Skincare di SSSKIN</h6>
                    <p>
                        Selain serum wajah, kamu juga bisa menemukan berbagai pilihan skincare secara lengkap di Tokopedia. Untuk perawatan maksimal pada wajah kamu bisa aplikasikan pelembab wajah, face mist, dan juga cleansing oil untuk membersihkan sisa make up. Segera cek aplikasi Tokopedia sekarang juga dan nikmati pengalaman menyenangkan & lebih hemat untuk berbelanja kebutuhan skincare dengan pilihan pengiriman yang sampai dihari yang sama, bebas ongkir, bisa bayar ditempat (COD), dan fitur bisa cicilan 0% dari berbagai bank di Indonesia.
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="pencarian-terkait-3 mb-5">
                    <h6>Cari Berbagai Keperluan Skincare di SSSKIN</h6>
                    <p>
                        Selain serum wajah, kamu juga bisa menemukan berbagai pilihan skincare secara lengkap di Tokopedia. Untuk perawatan maksimal pada wajah kamu bisa aplikasikan pelembab wajah, face mist, dan juga cleansing oil untuk membersihkan sisa make up. Segera cek aplikasi Tokopedia sekarang juga dan nikmati pengalaman menyenangkan & lebih hemat untuk berbelanja kebutuhan skincare dengan pilihan pengiriman yang sampai dihari yang sama, bebas ongkir, bisa bayar ditempat (COD), dan fitur bisa cicilan 0% dari berbagai bank di Indonesia.
                    </p>
                </div>
            </div>
            <div class="col-md-6"></div>
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

<div class="banner-product text-center">
    <img src="{{url('template-fe/img/assets/Luminous_Banner 1 (1).png')}}" alt="" class="img-fluid" >
</div>

<div class="our-product mt-4">
    <div class="text-product-kami container">
        <h5 class="my-2">Our Product</h5>
    </div>
    <div class="product-kami container" style="font-size:14px">
        <div class="row">
            @foreach ( $dataProduct as $product )
                @php
                    $img = json_decode($product->productImage, true);
                    if (is_array($img) && isset($img[0]['filename'])) {
                        $imgUrl = asset('productImage/' . $img[0]['filename']);
                    }
                @endphp
                <div class="col-6 mb-3">
                    <a href="{{url('product/'. $product->slug)}}" class="link-card-custom">
                        <div class="card p-2 h-100" style="box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;border: none !important;">
                            <img src="{{$imgUrl}}" class="card-img-top" alt="...">
                            <div class="card-body">
                            <p class="desc">{{$product->productName}}</p>
                            <p class="price">Rp {{$product->price}}</p>
                            <p><img src="{{url('template-fe/img/assets/star.png')}}"/><span>5.0</span></p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <div class="row mt-5">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
            </ul>
        </nav>
    </div>
</div>
@endsection

@section('customjs')
<script>
    var baseUrl = "{{ url('/') }}";
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

        $(document).on('click', '.shooping', function(event) {
            event.preventDefault();
            $('#shoppingContent').addClass('active');
        });

        $(document).on('click', '#closeBtn', function() {
            $('#shoppingContent').removeClass('active');
        });

        $('#minusBtn').on('click', function() {
            let quantity = parseInt($('#quantityInput').val());
            if (quantity > 1) {
            $('#quantityInput').val(quantity - 1);
            }
        });

        $('#plusBtn').on('click', function() {
            let quantity = parseInt($('#quantityInput').val());
            $('#quantityInput').val(quantity + 1);
        });


        $('#gambar1').hide()
        $('#gambar2').show()

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

        setInterval(toggleImages, 3000);

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
    });

    var slider = document.getElementById('slider');

    noUiSlider.create(slider, {
        start: [0, 0], // Initial values for the handles
        connect: true,
        range: {
            'min': 0,
            'max': 1000000
        }
    });

    // Get the span elements to display the values
    var minValueSpan = document.getElementById('min-value');
    var maxValueSpan = document.getElementById('max-value');

    var minInput = $('#min-input');
    var maxInput = $('#max-input');

    // Update the span values when the slider is moved
    slider.noUiSlider.on('update', function (values, handle) {
        var minValue = Math.floor(parseFloat(values[0]));
        var maxValue = Math.floor(parseFloat(values[1]));

        minValueSpan.textContent = formatRupiah(Math.floor(parseFloat(values[0])));
        maxValueSpan.textContent = formatRupiah(Math.floor(parseFloat(values[1])));

        minInput.val(minValue);
        maxInput.val(maxValue);
    });


    function formatRupiah(value) {

        return 'Rp ' + Number(value).toLocaleString('id-ID', {
            minimumFractionDigits: 0,
            maximumFractionDigits: 0
        });
    }

    $(document).on('click', '#filter-harga', function() {
        loadFilteredData();
    });

    // Tangani klik pada pagination
    $(document).on('click', '.pagination a', function(e) {
        e.preventDefault(); // Mencegah navigasi default
        var url = $(this).attr('href'); // Ambil URL dari link pagination
        loadPageData(url);
    });

    function loadFilteredData(page = 1) {
        var minPrice = $('#min-input').val();
        var maxPrice = $('#max-input').val();

        var checkedValues = [];
        $('input[name="categoryfilter[]"]:checked').each(function() {
            checkedValues.push($(this).val());
        });

        $.ajax({
            url: `${baseUrl}/search`, // Endpoint pencarian
            data: {
                min: minPrice,
                max: maxPrice,
                cat: checkedValues.length > 0 ? checkedValues : '',
                page: page // Sertakan parameter page
            },
            beforeSend : function(){
                $('#dprod').html(`
                    <div class="d-flex justify-content-center mt-5">
                        <div class="spinner-border text-secondary me-3" role="status"></div>
                        <span class="mt-1">Loading...</span>
                    </div>
                `)
                $('#paginate').html('')
            },
            success: function(response) {
                $('#totalp').text(response.allproduct.length);
                $('#dprod').html('');
                if(response.allproduct.length != 0){
                    response.data.data.forEach(function(val) {
                    var prodimg = JSON.parse(val.productImage);
                        $('#dprod').append(`
                            <div class="col-md-4 mb-3">
                                <a href="${baseUrl}/detail-product/${val.slug}" class="link-card-custom">
                                    <div class="card mb-3 h-100">
                                        <img src="${baseUrl}/productImage/${prodimg[0].filename}" class="card-img-top" alt="${val.productName}">
                                        <div class="card-body">
                                            <p class="desc">${val.productName}</p>
                                            <p class="price">${val.price}</p>
                                            <p><img src="${baseUrl}/template-fe/img/assets/star.png" alt="Star Rating"/><span>5.0</span></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        `);
                    });

                    // Memperbarui pagination dengan URL yang benar
                    $('#paginate').html(response.paginate);
                }else{
                    $('#dprod').html('<h6>Product does not exist..</h6>')
                }

            },
            error: function(xhr) {
                console.error('Error:', xhr.responseText);
            }
        });
    }

    function loadPageData(url) {
        // Menyertakan parameter pencarian di URL pagination
        var minPrice = $('#min-input').val();
        var maxPrice = $('#max-input').val();

        var checkedValues = [];
        $('input[name="categoryfilter[]"]:checked').each(function() {
            checkedValues.push($(this).val());
        });

        $.ajax({
            url: url, // URL pagination yang dipilih
            method: 'GET',
            data: {
                min: minPrice,
                max: maxPrice,
                cat: checkedValues.length > 0 ? checkedValues : '',
            },
            success: function(response) {
                $('#totalp').text(response.allproduct.length);
                $('#dprod').html('');

                response.data.data.forEach(function(val) {
                    var prodimg = JSON.parse(val.productImage);
                    $('#dprod').append(`
                        <div class="col-md-4 mb-3">
                            <a href="${baseUrl}/detail-product/${val.slug}" class="link-card-custom">
                                <div class="card mb-3 h-100">
                                    <img src="${baseUrl}/productImage/${prodimg[0].filename}" class="card-img-top" alt="${val.productName}">
                                    <div class="card-body">
                                        <p class="desc">${val.productName}</p>
                                        <p class="price">${val.price}</p>
                                        <p><img src="${baseUrl}/template-fe/img/assets/star.png" alt="Star Rating"/><span>5.0</span></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    `);
                });

                // Memperbarui pagination dengan URL yang benar
                $('#paginate').html(response.paginate);
            },
            error: function(xhr) {
                console.error('Error:', xhr.responseText);
            }
        });
    }

    $('input[name="categoryfilter[]"]').on('change', function(){
        var minPrice = $('#min-input').val();
        var maxPrice = $('#max-input').val();

        var checkedValues = [];
        $('input[name="categoryfilter[]"]:checked').each(function() {
            checkedValues.push($(this).val());
        });

        page = 1;

        $.ajax({
            url: `${baseUrl}/search`, // Endpoint pencarian
            data: {
                min: minPrice,
                max: maxPrice,
                cat: checkedValues.length > 0 ? checkedValues : '',
                page: page // Sertakan parameter page
            },
            success : function(ress){
                $('#totalp').text(ress.allproduct.length);
                $('#dprod').html('');
                loadFilteredData()
            }
        })
    })

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

</script>
@endsection
