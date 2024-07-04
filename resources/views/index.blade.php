<!doctype html>
<html lang="en">
  <head>
    @include('partials-fe.head')
  </head>
  <body>
<div class="dekstop">
	@include('partials-fe.head-nav')

    @yield('content')

	@include('partials-fe.foot')

</div>

<div class="shopping-content" id="shoppingContent" style="overflow: scroll;">
	<div style="position:relative; height:100%">
        <button class="close-btn" id="closeBtn">&times;</button>
        <h2>My Bag</h2>
        <p class="my-3">Total item ( <span id="totitm"></span> ) : <span id="totprice"></span></p>
        <hr/>
        <div class="card mb-3" style="font-size:13px">
            <div class="row g-0" id="dataCartitem" style="height:400px; overflow:scroll">

            </div>
        </div>
        <div class="checkout-foot">
            <hr/>
            <a href="#" class="btn btn-info tmbl-checkout form-control">Checkout</a>
            <p class="text-center mt-4 text-white"><a href="" class="continue-shop"> Continue Shopping</a></p>
        </div>
    </div>
</div>
<div class="profile-content">
    <ul class="list-group">
        <li class="list-group-item border-0 p-5">
            <div class="d-flex">
                <img src="{{url('template-fe/img/assets/p.png')}}" class="me-2" style="width:100%"/>
                <div>
                    <p class="mb-0 mt-2">{{session('name')}}</p>
                    <p class="mb-0">{{session('email')}}</p>
                </div>
            </div>
        </li>
        <li class="list-group-item border-0 text-white" style="background:rgba(154, 136, 97, 1)">Akun Saya</li>
        <li class="list-group-item border-0 p-3"><img src="{{url('template-fe/img/assets/usersmall.png')}}" class="me-2"/>Profile</li>
        <li class="list-group-item border-0 p-3"><img src="{{url('template-fe/img/assets/icon-direction.png')}}" class="me-2"/>Alamat</li>
        <li class="list-group-item border-0 p-3"><img src="{{url('template-fe/img/assets/iconlocking.png')}}" class="me-2"/>Ubah Password</li>
        <li class="list-group-item border-0 text-white" style="background:rgba(154, 136, 97, 1)">Pesanan Saya</li>
        <li class="list-group-item border-0 p-3"><img src="{{url('template-fe/img/assets/shopping-cart.png')}}" class="me-2"/>Pesanan</li>
        <li class="list-group-item border-0 text-white" style="background:rgba(154, 136, 97, 1)">Pengaturan</li>
        <li class="list-group-item border-0 p-3"><img src="{{url('template-fe/img/assets/shopping-cart.png')}}" class="me-2"/>Notifikasi</li>
    </ul>
</div>

<div class="toast align-items-center text-white border-0" id="sessionToast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body">
        Hello, world! This is a toast message.
      </div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
  </div>


	<div class="hp">
        @yield('contentmobile')
	</div>

    @include('partials-fe.footerjs')
	@yield('customjs')

    <script>
        @if(Session::has('message'))
            Swal.fire({
                title: "Success!",
                text: "{{ Session('message') }}",
                icon: "success"
            });
        @endif
        var baseUrl = "{{ url('/') }}";

        function formatRupiah(number) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(number);
        }

        function showToast(message) {
            $('#sessionToast .toast-body').text(message);
            var toast = new bootstrap.Toast($('#sessionToast'));
            toast.show();
        }

        $('#add-cart').on('click', function(){
            var idprod = $(this).attr('id-product')
            var qty = $('#quantity').val()
            var usrid = $('#usrid').val()
            if(usrid){
                $.ajax({
                    url : baseUrl + '/addCart',
                    data : {
                        id_product : idprod,
                        quantity : qty,
                        iduser : usrid,
                    },
                    success : function(response){
                        $('#dataCartitem').html('')
                        showToast('Item successfully added to cart');
                        getCartNew()
                    }
                })
            }else{
                $.ajax({
                    url : baseUrl + '/addCartSession',
                    data : {
                        id_product : idprod,
                        quantity : qty,
                    },
                    success : function(response){
                        $('#dataCartitem').html('')
                        showToast('Item successfully added to cart');
                        getCartNew()
                    }
                })
            }

        })

        $('#add-cart-m').on('click', function(){
            var idprod = $(this).attr('id-product')
            var qty = 1;
            var usrid = $('#usrid').val()
            if(usrid){
                $.ajax({
                    url : baseUrl + '/addCart',
                    data : {
                        id_product : idprod,
                        quantity : qty,
                        iduser : usrid,
                    },
                    success : function(response){
                        $('#dataCartitem').html('')
                        showToast('Item successfully added to cart');
                        getCartNew()
                    }
                })
            }else{
                $.ajax({
                    url : baseUrl + '/addCartSession',
                    data : {
                        id_product : idprod,
                        quantity : qty,
                    },
                    success : function(response){
                        $('#dataCartitem').html('')
                        showToast('Item successfully added to cart');
                        getCartNew()
                    }
                })
            }

        })


        function getCartNew()
        {
            $('#dataCartitem').html('')

            $.ajax({
                url : baseUrl + '/getCart',
                success : function(response){
                    var totalitem = 0;
                    var totalprice = 0;
                    var totalproduk = 0;
                    if(response){
                        var dataArr = response.dataCart;
                        dataArr.forEach(function(val,i){
                            var total = 0;
                            if(val.discount){
                                total = val.priceAfterDiscount * val.qty
                            }else{
                                total = val.price * val.qty
                            }
                            totalitem += parseInt(val.qty)
                            totalprice += parseInt(total)
                            totalproduk++;
                        })
                    }
                    if(totalproduk > 0){
                        $('#totcart').fadeIn('1000')
                        $('#totcartm').fadeIn('1000')
                        $('#totcart').text(totalproduk)
                        $('#totcartm').text(totalproduk)
                    }else{
                        $('#totcart').css('display', 'none')
                        $('#totcartm').css('display', 'none')

                    }
                    $('#totitm').text(totalitem)
                    $('#totprice').text(formatRupiah(totalprice))
                    if(response){
                        if(dataArr.length > 0){
                            dataArr.forEach(function(v, i){
                                var img = JSON.parse(v.productImage)
                                var discountHtml = '';
                                var priceHtml = '';

                                if (v.discount) {
                                    discountHtml = `
                                        <span>Discount : </span><span class="badge bg-success">${v.discount * 100}%</span>
                                        <p class="mt-3"><del><span>${formatRupiah(v.price)}</span></del> | <span>${formatRupiah(v.priceAfterDiscount)}</span></p>
                                    `;
                                    priceHtml = `<p>${formatRupiah(v.priceAfterDiscount)}</p>`;
                                } else {
                                    priceHtml = `<p>${formatRupiah(v.price)}</p>`;
                                }

                                $('#dataCartitem').append(`
                                    <div class="p-item d-flex">
                                    <div class="col-md-3 pt-3 ps-3 pb-3">
                                        <img src="${baseUrl}/productImage/${img[0].filename}" id="img-cart" class="img-fluid rounded-start" alt="${v.productName}">
                                    </div>
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-8">
                                                <div class="card-body">
                                                    <p class="card-text" id="pName">${v.productName}</p>
                                                    <div id="dsc">
                                                        ${discountHtml}
                                                    </div>
                                                    <p></p>
                                                    <div class="d-flex">
                                                        <span class="qty">Qty</span>
                                                        <div class="quantity-input">
                                                            <button type="button" class="btn-sm fs-5 minusBtn">-</button>
                                                            <input type="text" class="quantityInput" value="${v.qty}">
                                                            <button type="button" class="btn-sm fs-5 plusBtn">+</button>
                                                        </div>
                                                        <div class="p-2">
                                                            <img src="{{url('template-fe/img/assets/deletchart.png')}}" id-cart="${v.id_cart}" class="dellcart" alt="" width="15" height="15">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4 pt-4">
                                                <div id="disck">
                                                    ${priceHtml}
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    </div>
                                `)
                            })
                        }else{
                            $('#dataCartitem').text('Empty Cart')
                        }
                    }
                }
            })
        }
        getCartNew();

        $(document).on('click', '.minusBtn',function() {
            // let quantity = parseInt($('#quantityInput').val());
            var elem = $(this).next()
            let quantity = parseInt($(this).next().val())
            if (quantity > 1) {
            $(elem).val(quantity - 1);
            }
        });

        $(document).on('click', '.plusBtn', function() {
            let elem = $(this).prev();
            let quantity = parseInt($(this).prev().val());
            $(elem).val(quantity + 1);
        });

        $(document).on('click', '.dellcart', function(){
            var parent = $(this).closest('.p-item')
            var idcart = $(this).attr('id-cart')
            $.ajax({
                url : baseUrl + '/dellCart/' + idcart,
                success : function(ress){
                    parent.remove();
                    getCartNew()
                }
            })

        })

    </script>
  </body>
</html>
