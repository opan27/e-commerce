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
                                Best Seller
                            </button>
                          </h2>
                          <div id="collapseOne" class="accordion-collapse collapse show p-3" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                  Default checkbox
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                  Default checkbox
                                </label>
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                              By Category
                            </button>
                          </h2>
                          <div id="collapseTwo" class="accordion-collapse collapse p-3" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                  Default checkbox
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                  Default checkbox
                                </label>
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                              By Concern
                            </button>
                          </h2>
                          <div id="collapseThree" class="accordion-collapse collapse p-3" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                  Default checkbox
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                  Default checkbox
                                </label>
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                By Skin Type
                              </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse p-3" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                              <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                  <label class="form-check-label" for="flexCheckDefault">
                                    Default checkbox
                                  </label>
                              </div>
                              <div class="form-check">
                                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                  <label class="form-check-label" for="flexCheckDefault">
                                    Default checkbox
                                  </label>
                              </div>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 p-0">
                <div class="container p-0">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="p-0 mb-0 mt-3">Total Products {{$allDataProduct}} item</p>
                        </div>
                        <div class="col-md-6 p-3">
                            <div class="row">
                                <div class="col-6 text-end">
                                    <span>Sort By</span>
                                </div>
                                <div class="col-6">
                                    <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                                        <option selected>All Products</option>
                                        <option value="">Recomended</option>
                                        <option value="" selected>Best Seller</option>
                                        <option value="">Discount</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ( $dataProductBestSeller as $product )
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
                        <ul class="pagination justify-content-center">
                            {{ $dataProductBestSeller->links() }}
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

</script>
@endsection
