@extends('index')
@section('content')
@php
    $imgUrl = '';
    $img = json_decode($detailProduct['productImage'], true);
    if(is_array($img) && isset($img[0]['filename'])){
        $imgUrl = asset('productImage/' . $img[0]['filename']);
    }
@endphp
@php
    // function formatNumber($num) {
    //     if ($num >= 1000 && $num < 1000000) {
    //         return intval($num / 1000, 1) . 'k';
    //     } elseif ($num >= 1000000 && $num < 1000000000) {
    //         return intval($num / 1000000, 1) . 'M';
    //     } elseif ($num >= 1000000000 && $num < 1000000000000) {
    //         return intval($num / 1000000000, 1) . 'B';
    //     } elseif ($num >= 1000000000000) {
    //         return intval($num / 1000000000000, 1) . 'T';
    //     }
    //     return $num;
    // }
@endphp
<div class="container mb-5" style="margin-top:12%">
    <div class="row">
        <div class="col-md-6">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">Home</li>
                  <li class="breadcrumb-item">Product</li>
                  <li class="breadcrumb-item active" aria-current="page">{{$detailProduct->productName}}</li>
                </ol>
            </nav>
            <div class="d-prod">
                <div class="row">
                    <div class="col-md-2">
                        @foreach ( $img as $gambar )
                            <img src="{{asset('productImage/'.$gambar['filename'])}}" class="img-fluid img-small mb-2"/>
                        @endforeach
                    </div>
                    <div class="col-md-10">
                        <span class='zoom' id='ex1'>
                            <img src="{{$imgUrl}}" class="img-fluid" id="img-big" />
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="p-5">
                <span>{{$detailProduct->name}}</span>
                <h2 class="mb-2">{{$detailProduct->productName}}</h2>
                <p class="my-4">Terjual 1rb . <img src="{{url('template-fe/img/assets/star.png')}}" width="15" />123 reviews . stok {{$detailProduct->stock}}</p>
                <h4>Rp {{number_format($detailProduct->priceAfterDiscount)}} <img src="{{url('template-fe/img/assets/image 22.png')}}" alt=""></h4>
                <p class="my-4">
                    <span style="padding:5px;background-color: rgba(208, 184, 134, 1); border-radius: 4px;">{{$detailProduct->discount * 100}}%</span>
                    <span class="text-decoration-line-through">Rp {{number_format($detailProduct->price)}}</span>
                    <span style="padding:5px;background-color: rgba(236, 53, 95, 0.2); border-radius: 4px;">Hemat Rp {{number_format($detailProduct->price - $detailProduct->priceAfterDiscount)}}</span>
                </p>
                {!! $detailProduct->productDesc !!}
                <p class="mt-4 mb-0">Jumlah</p>
                <div class="quantity-input2 mt-1">
                    <button type="button" onclick="changeQuantity(-1)">-</button>
                    <input type="number" id="quantity" name="quantity" value="1" min="1" max="100">
                    <button type="button" onclick="changeQuantity(1)">+</button>
                </div>
                <input type="hidden" name="usrid" id="usrid" value="{{session('userId')}}">
                <button class="btn mt-3 px-5 py-3" id="add-cart" id-product="{{$detailProduct->id}}" style="background:rgba(244, 119, 34, 1); color:white">Add To Cart</button>
            </div>
        </div>
    </div>
</div>

<div class="tabs-cust" id="tabs-cust" style="height: 690px;">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="container mt-5" style="background: white;border-radius: 10px;padding: 20px;">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"  data-img="img/assets/image 32.png">Description</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false"  data-img="img/assets/image 3222.png">How To Use</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false"  data-img="img/assets/image 3223.png">Ingredients</button>
                      </li>
                    </ul>
                    <div class="tab-content pt-4" id="myTabContent">
                      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h4>Title 1</h4>
                        <p>
                            Membantu melindungi kulit wajah dari sengatan sinar matahari dan membantu kulit wajah tampak lebih cerah dan bebas dari noda bekas jerawat. Di gunakan pada pagi dan siang hari.
                        </p>
                        <p>Manfaat</p>
                        <p>
                            Sebagai humectant, vitamin dan sebagai moisturizer Sunscreen / UV filter A dan B Pelembab wajah. Kaya akan protein, kalsium, vitamin A, C, dan E untuk menghilangkan bekas jerawat, melembabkan kulit, dan meremajakan kulit. Menyerap sinar UVB selain itu dapat melindungi produk sunscreen dari sinar matahari sehingga efektivitas produk pun tetap terjaga.
                            radikal bebas dan risiko kanker kulit. Merangsang produksi kolagen pada kulit sehingga noda hitam bekas jerawat jadi tersamarkan     Menjaga kadar air dan membantu mengurangi kerutan dan garis halus.
                        </p>
                        <p>Lorem</p>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, quis impedit sit rem culpa numquam hic ducimus suscipit reiciendis amet labore est iure quae rerum praesentium minus omnis blanditiis recusandae!
                        </p>
                      </div>
                      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <h4>Title 2</h4>
                        <p>
                            Membantu melindungi kulit wajah dari sengatan sinar matahari dan membantu kulit wajah tampak lebih cerah dan bebas dari noda bekas jerawat. Di gunakan pada pagi dan siang hari.
                        </p>
                        <p>Manfaat</p>
                        <p>
                            Sebagai humectant, vitamin dan sebagai moisturizer Sunscreen / UV filter A dan B Pelembab wajah. Kaya akan protein, kalsium, vitamin A, C, dan E untuk menghilangkan bekas jerawat, melembabkan kulit, dan meremajakan kulit. Menyerap sinar UVB selain itu dapat melindungi produk sunscreen dari sinar matahari sehingga efektivitas produk pun tetap terjaga.
                            radikal bebas dan risiko kanker kulit. Merangsang produksi kolagen pada kulit sehingga noda hitam bekas jerawat jadi tersamarkan     Menjaga kadar air dan membantu mengurangi kerutan dan garis halus.
                        </p>
                        <p>Lorem</p>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, quis impedit sit rem culpa numquam hic ducimus suscipit reiciendis amet labore est iure quae rerum praesentium minus omnis blanditiis recusandae!
                        </p>
                      </div>
                      <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <h4>Title 3</h4>
                        <p>
                            Membantu melindungi kulit wajah dari sengatan sinar matahari dan membantu kulit wajah tampak lebih cerah dan bebas dari noda bekas jerawat. Di gunakan pada pagi dan siang hari.
                        </p>
                        <p>Manfaat</p>
                        <p>
                            Sebagai humectant, vitamin dan sebagai moisturizer Sunscreen / UV filter A dan B Pelembab wajah. Kaya akan protein, kalsium, vitamin A, C, dan E untuk menghilangkan bekas jerawat, melembabkan kulit, dan meremajakan kulit. Menyerap sinar UVB selain itu dapat melindungi produk sunscreen dari sinar matahari sehingga efektivitas produk pun tetap terjaga.
                            radikal bebas dan risiko kanker kulit. Merangsang produksi kolagen pada kulit sehingga noda hitam bekas jerawat jadi tersamarkan     Menjaga kadar air dan membantu mengurangi kerutan dan garis halus.
                        </p>
                        <p>Lorem</p>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi, quis impedit sit rem culpa numquam hic ducimus suscipit reiciendis amet labore est iure quae rerum praesentium minus omnis blanditiis recusandae!
                        </p>
                      </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</div>

<div class="our-new p-5">
    <div class="top text-center">
        <h3>Our new & improved Activating Serum</h3>
        <p>
            Light, all-natural serum and designed to boost your Solawave Wand experience like never before.
        </p>
    </div>
    <div class="container boot">
        <div class="row mt-5">
          <div class="col-md-2"></div>
          <div class="col-md-8 d-flex align-items-center">
            <img src="{{url('template-fe/img/assets/Mask group.png')}}" class="me-3" alt="Mask Image" />
            <div>
              <h5>Longer Lasting</h5>
              <p style="font-size:16px">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                Lorem ipsum dolor sit, amet consectetur adipisicing elit.
              </p>
            </div>
          </div>
          <div class="col-md-2"></div>
        </div>
        <div class="row mt-5">
        <div class="col-md-2"></div>
        <div class="col-md-8 d-flex align-items-center">
            <img src="{{url('template-fe/img/assets/Mask group.png')}}" class="me-3" alt="Mask Image" />
            <div>
            <h5>Longer Lasting</h5>
            <p style="font-size:16px">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                Lorem ipsum dolor sit, amet consectetur adipisicing elit.
            </p>
            </div>
        </div>
        <div class="col-md-2"></div>
        </div>
        <div class="row mt-5">
        <div class="col-md-2"></div>
        <div class="col-md-8 d-flex align-items-center">
            <img src="{{url('template-fe/img/assets/Mask group.png')}}" class="me-3" alt="Mask Image" />
            <div>
            <h5>Longer Lasting</h5>
            <p style="font-size:16px">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                Lorem ipsum dolor sit, amet consectetur adipisicing elit.
            </p>
            </div>
        </div>
        <div class="col-md-2"></div>
        </div>
    </div>
</div>

<div class="percent-price pt-5">
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
	<div class="contaner p-3">
		<div class="d-flex justify-content-between align-items-center">
			<a href="{{url()->previous()}}"><img src="{{url('template-fe/img/assets/Group 277.png')}}" /></a>
			<span class="mx-auto">{{$detailProduct->productName}}</span>
			<a href=""><img src="{{url('template-fe/img/assets/shared.png')}}"></a>
            <a href="#" class="shooping mt-1" style="position: relative">
                <img src="{{url('template-fe/img/assets/shopping-bag.png')}}" style="width:20px; margin-bottom:5px"/>
                <span class="badge text-bg-success" id="totcartm" style="background:red; position: absolute; top: -10px; right:-5px"></span>
            </a>
		</div>
	</div>
	<div class="bg-abu-abu">
		<div class="container" style="position: relative;">
			<div class="big-img-mobile pt-0 pb-0">
				<img src="{{$imgUrl}}" class="img-fluid" style="border-radius:10px" />
			</div>
			<div class="owl-carousel owl-carousel-detail-prod owl-theme p-3">
                @foreach($img as $gbr)
				<div class="item">
					<img src="{{asset('productImage/' . $gbr['filename'])}}" alt="{{asset('productImage/' . $gbr['filename'])}}" class="img-fluid">
				</div>
                @endforeach
			</div>
			<div class="custom-nav">
				<img src="{{url('template-fe/img/assets/left.png')}}" alt="" class="custom-prev">
				<img src="{{url('template-fe/img/assets/right.png')}}" alt="" class="custom-next">
			</div>
		</div>
		<div class="container">
			<div class="row p-3">
				<div class="card p-2 text-center">
					<div class="card-body d-flex justify-content-between bg-danger text-white rounded">
						<img src="{{url('template-fe/img/assets/petirsmall.png')}}" class="petir-img" alt="">
						<div class="text-flash">
							<p class="m-0">Flash sale</p>
							<p class="m-0">Segera berakhir</p>
						</div>
						<div class="berakhir-dlm">
							<p class="m-0">Berakhir dalam</p>
							<span style="background-color: white; color:black; padding:5px 10px; display: inline-block; border-radius: 10px; font-weight: bold;">10:10:10</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row p-3">
				<div class="col-12">
					<span>{{$detailProduct->name}}</span>
                    <h2 class="mb-2">{{$detailProduct->name}}</h2>
                    <p class="my-4">Terjual 1rb . <img src="{{url('template-fe/img/assets/star.png')}}" width="15" />123 reviews . stok 245</p>
                    <h4>Rp {{$detailProduct->discount === NULL ? number_format($detailProduct->price) : number_format($detailProduct->priceAfterDiscount)}} <img src="{{url('template-fe/img/assets/image 22.png')}}" alt=""></h4>
                    @if($detailProduct->discount !== NULL)
                    <p class="my-4">
                        <span style="padding:5px;background-color: rgba(208, 184, 134, 1); border-radius: 4px;">20%</span>
                        <span class="text-decoration-line-through">Rp 100.000</span>
                        <span style="padding:5px;background-color: rgba(236, 53, 95, 0.2); border-radius: 4px;">Hemat Rp 20.000</span>
                    </p>
                    @endif()
                    <p>
                        {!! $detailProduct->productDesc !!}
                    </p>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid p-3">
		<div class="d-flex justify-content-between align-items-center">
			<p>Pilih opsi</p>
			<span>30ML ></span>
		</div>
	</div>

	<div style="height:20px; background:rgba(243, 243, 243, 1)"></div>

	<div class="tabs-cust" id="tabs-cust">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="container mt-2" style="background: white;border-radius: 10px;padding: 10px;">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item" role="presentation">
                            <button class="nav-link active p-2" id="m-home-tab" data-bs-toggle="tab" data-bs-target="#m-home" type="button" role="tab" aria-controls="home" aria-selected="true"  data-img="img/assets/image 32.png">Description</button>
                          </li>
                          <li class="nav-item" role="presentation">
                            <button class="nav-link p-2" id="m-profile-tab" data-bs-toggle="tab" data-bs-target="#m-profile" type="button" role="tab" aria-controls="profile" aria-selected="false"  data-img="img/assets/image 3222.png">How To Use</button>
                          </li>
                          <li class="nav-item" role="presentation">
                            <button class="nav-link p-2" id="m-contact-tab" data-bs-toggle="tab" data-bs-target="#m-contact" type="button" role="tab" aria-controls="contact" aria-selected="false"  data-img="img/assets/image 3223.png">Ingredients</button>
                          </li>
                        </ul>
                        <div class="tab-content pt-4" id="myTabContent">
                          <div class="tab-pane fade show active" id="m-home" role="tabpanel" aria-labelledby="m-home-tab">
                            <h4>Title 1</h4>
							<p>
                                Membantu melindungi kulit wajah dari sengatan sinar matahari dan membantu kulit wajah tampak lebih cerah dan bebas dari noda bekas jerawat. Di gunakan pada pagi dan siang hari.
                            </p>
							<p>Manfaat</p>
                            <p>
                                Sebagai humectant, vitamin dan sebagai moisturizer Sunscreen / UV filter A dan B Pelembab wajah. Kaya akan protein, kalsium, vitamin A, C, dan E untuk menghilangkan bekas jerawat, melembabkan kulit, dan meremajakan kulit. Menyerap sinar UVB selain itu dapat melindungi produk sunscreen dari sinar matahari sehingga efektivitas produk pun tetap terjaga.
                                radikal bebas dan risiko kanker kulit. Merangsang produksi kolagen pada kulit sehingga noda hitam bekas jerawat jadi tersamarkan     Menjaga kadar air dan membantu mengurangi kerutan dan garis halus.
                            </p>
                          </div>
                          <div class="tab-pane fade" id="m-profile" role="tabpanel" aria-labelledby="m-profile-tab">
                            <h4>Title 2</h4>
							<p>
                                Membantu melindungi kulit wajah dari sengatan sinar matahari dan membantu kulit wajah tampak lebih cerah dan bebas dari noda bekas jerawat. Di gunakan pada pagi dan siang hari.
                            </p>
							<p>Manfaat</p>
                            <p>
                                Sebagai humectant, vitamin dan sebagai moisturizer Sunscreen / UV filter A dan B Pelembab wajah. Kaya akan protein, kalsium, vitamin A, C, dan E untuk menghilangkan bekas jerawat, melembabkan kulit, dan meremajakan kulit. Menyerap sinar UVB selain itu dapat melindungi produk sunscreen dari sinar matahari sehingga efektivitas produk pun tetap terjaga.
                                radikal bebas dan risiko kanker kulit. Merangsang produksi kolagen pada kulit sehingga noda hitam bekas jerawat jadi tersamarkan     Menjaga kadar air dan membantu mengurangi kerutan dan garis halus.
                            </p>
                          </div>
                          <div class="tab-pane fade" id="m-contact" role="tabpanel" aria-labelledby="m-contact-tab">
                            <h4>Title 3</h4>
							<p>
                                Membantu melindungi kulit wajah dari sengatan sinar matahari dan membantu kulit wajah tampak lebih cerah dan bebas dari noda bekas jerawat. Di gunakan pada pagi dan siang hari.
                            </p>
							<p>Manfaat</p>
                            <p>
                                Sebagai humectant, vitamin dan sebagai moisturizer Sunscreen / UV filter A dan B Pelembab wajah. Kaya akan protein, kalsium, vitamin A, C, dan E untuk menghilangkan bekas jerawat, melembabkan kulit, dan meremajakan kulit. Menyerap sinar UVB selain itu dapat melindungi produk sunscreen dari sinar matahari sehingga efektivitas produk pun tetap terjaga.
                                radikal bebas dan risiko kanker kulit. Merangsang produksi kolagen pada kulit sehingga noda hitam bekas jerawat jadi tersamarkan     Menjaga kadar air dan membantu mengurangi kerutan dan garis halus.
                            </p>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </div>

	<div class="our-new p-5">
        <div class="top">
            <h3>Our new & improved Activating Serum</h3>
            <p>
                Light, all-natural serum and designed to boost your Solawave Wand experience like never before.
            </p>
        </div>
        <div class="container boot">
            <div class="row mt-2">

              <div class="col-12">
				<div class="row">
					<div class="col-2 p-0">
						<img src="{{url('template-fe/img/assets/Mask group.png')}}" class="me-3" alt="Mask Image" />
					</div>
					<div class="col-10 p-0">
						<h5>Longer Lasting</h5>
						<p style="font-size:16px">
							Lorem ipsum dolor sit, amet consectetur adipisicing elit.
							Lorem ipsum dolor sit, amet consectetur adipisicing elit.
						</p>
					</div>
				</div>
              </div>
            </div>
            <div class="row mt-2">
				<div class="col-12">
					<div class="row">
						<div class="col-2 p-0">
							<img src="{{url('template-fe/img/assets/Mask group.png')}}" class="me-3" alt="Mask Image" />
						</div>
						<div class="col-10 p-0">
							<h5>Longer Lasting</h5>
							<p style="font-size:16px">
								Lorem ipsum dolor sit, amet consectetur adipisicing elit.
								Lorem ipsum dolor sit, amet consectetur adipisicing elit.
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-12">
					<div class="row">
						<div class="col-2 p-0">
							<img src="{{url('template-fe/img/assets/Mask group.png')}}" class="me-3" alt="Mask Image" />
						</div>
						<div class="col-10 p-0">
							<h5>Longer Lasting</h5>
							<p style="font-size:16px">
								Lorem ipsum dolor sit, amet consectetur adipisicing elit.
								Lorem ipsum dolor sit, amet consectetur adipisicing elit.
							</p>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>

    <div class="percent-price pt-5">
		<div class="container">
			<div class="row p-3">
				<div class="col-4">
					<p class="percent-price-p1 fw-bold">93%</p>
				</div>
				<div class="col-8">
					<p class="percent-desc">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
				</div>
			</div>
			<div class="row p-3">
				<div class="col-4">
					<p class="percent-price-p1 fw-bold">94%</p>
				</div>
				<div class="col-8">
					<p class="percent-desc">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
				</div>
			</div>
			<div class="row p-3">
				<div class="col-4">
					<p class="percent-price-p1 fw-bold">95%</p>
				</div>
				<div class="col-8">
					<p class="percent-desc">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
				</div>
			</div>
		</div>
	</div>

	<div class="related-product-detail my-4">
		<div class="container">
			<h4 class="fw-bold">Related Product</h4>
			<div class="owl-carousel owl-carousel-related">
                @foreach($relatedProduct as $related)
                @php
                    $imgUrlrelated = '';
                    $imgrelated = json_decode($related->productImage, true);
                    if(is_array($imgrelated) && isset($imgrelated[0]['filename'])){
                        $imgUrlrelated = asset('productImage/' . $imgrelated[0]['filename']);
                    }
                @endphp
				<div>
					<div class="card">
						<img src="{{$imgUrlrelated}}" class="card-img-top" alt="{{$imgUrlrelated}}">
						<div class="card-body">
						  <p class="desc">{{$related->productName}}</p>
						  <p class="price">Rp {{number_format($related->price)}}</p>
						  <p class="d-flex"><img src="{{url('template-fe/img/assets/star.png')}}"/><span>5.0</span></p>
						</div>
					</div>
				</div>
                @endforeach()
			</div>
		</div>
	</div>

	<div class="icon-icon d-flex p-4 text-center">
		<div>
			<img src="{{url('template-fe/img/assets/iconThum.png')}}" alt="">
			<p style="font-size:14px">Asli & 100% BPOM</p>
		</div>
		<div>
			<img src="{{url('template-fe/img/assets/iconThum.png')}}" alt="">
			<p style="font-size:14px">Asli & 100% BPOM</p>
		</div>
		<div>
			<img src="{{url('template-fe/img/assets/iconThum.png')}}" alt="">
			<p style="font-size:14px">Asli & 100% BPOM</p>
		</div>
	</div>

	<div class="m-news-later p-3" style="background-color: rgba(254, 245, 247, 1);">
		<p class="langganan-news fw-bold">Langganan Newslatter</p>
		<form class="d-flex form-new-latter">
			<input class="form-control me-2" type="search" placeholder="Enter Your Email" aria-label="Search">
			<button class="btn" type="submit">Search</button>
		</form>
	</div>

	<div class="foot py-4" style="background-color: rgba(254, 245, 247, 1);">
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

	<div class="fix-detail-prod">
		<div class="container">
			<div class="row p-3">
				<div class="card p-2">
					<div class="card-body d-flex text-white rounded" stylw="position:relative">
                        <a href="" class="btn text-white" style="background:rgba(244, 119, 34, 1); width:88%; margin-right:5px">Beli Sekarang</a>
                        <button class="btn" id="add-cart-m" id-product="{{$detailProduct->id}}" style="border:1px solid rgba(244, 119, 34, 1)"><img src="{{url('template-fe/img/assets/bag.png')}}"/></button>
                        <span class="badge text-bg-success" id="totcartmbottm" style="background:red; position: absolute; top: 0px; right:-5px"></span>
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

        $('#ex1').zoom({magnify : 2});

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


        $('.img-small').on('click', function(){
            $('#img-big').attr('src', $(this).attr('src'))

            $('#ex1').trigger('zoom.destroy');

            $('#ex1').zoom({magnify:2});
        })


        $('#tabs-cust').css('background-image', 'url("{{ url('template-fe/img/assets/image 32.png') }}")');

        $('.tabs-cust .nav-link').on('click', function(){
            event.preventDefault();
            var img = $(this).attr('data-img');
            var imgUrl = "{{ url('template-fe') }}/" + img;
            $('#tabs-cust').css('background-image', 'url("' + imgUrl + '")');
        })

        $('.owl-carousel-detail-prod').owlCarousel({
            loop:false,
            margin:10,
            nav: false,
            responsive:{
                0:{
                    items:5
                },
                600:{
                    items:3
                },
                1000:{
                    items:5
                }
            }
        })

        $('.bg-abu-abu .custom-next').click(function() {
            owl.trigger('next.owl.carousel');
        })
        $('.bg-abu-abu .custom-prev').click(function() {
            owl.trigger('prev.owl.carousel');
        })

        $(".owl-carousel-related").owlCarousel({
            items: 4, // Tampilkan 4 item per slide
            margin: 20,
            responsive: {
                0: {
                    items: 2.5
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 4
                }
            }
        });

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

    function changeQuantity(amount) {
        var quantityInput = document.getElementById('quantity');
        var currentQuantity = parseInt(quantityInput.value);
        var newQuantity = currentQuantity + amount;

        if (newQuantity < quantityInput.min) {
            newQuantity = quantityInput.min;
        } else if (newQuantity > quantityInput.max) {
            newQuantity = quantityInput.max;
        }

        quantityInput.value = newQuantity;
    }

    $(document).on('click', '.shooping', function(event) {
        event.preventDefault();
        $('#shoppingContent').addClass('active');
    });

    $(document).on('click', '.close-btn', function() {
        $('#shoppingContent').removeClass('active');
    });


</script>
@endsection
