@extends('index')
@section('content')
    <div class="design-login" style="padding-top:200px;background:rgba(208, 184, 134, 1)">
        <div class="container">
            <div class="row">
                <p class="text-center text-white fs-3">Register</p>
            </div>
        </div>
    </div>
    <div class="container" style="padding:10vh">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="box-form">
                    <form action="{{url('proses-register-user')}}" method="post">
                        @csrf
                        <div class="mb-4 d-flex">
                            <div class="me-2">
                                <label for="fname" class="form-label">First Name</label>
                                <input type="text" name="fname" placeholder="Enter your last name" class="form-control p-3" id="exampleInputEmail1">
                            </div>
                            <div>
                                <label for="lname" class="form-label">Last Name</label>
                                <input type="text" name="lname" placeholder="Enter your last name" class="form-control p-3" id="exampleInputEmail2">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="email" name="email" placeholder="Enter your email" class="form-control p-3" >
                        </div>
                        <div class="mb-4">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" name="tlp" placeholder="Enter your Phone" class="form-control p-3" >
                        </div>
                        <div class="mb-4">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" name="password" placeholder="Enter your password" class="form-control p-3" id="pass">
                        </div>
                        <div class="mb-4">
                            <label for="exampleInputPassword1" class="form-label">Retype Password</label>
                            <input type="password" placeholder="Confirm Your Password" class="form-control p-3" id="re-pass">
                        </div>
                        <div class="mb-4">
                            <label for="exampleFormControlTextarea1" class="form-label">Alamat Lengkap</label>
                            <textarea class="form-control" placeholder="Alamat Lengkap" name="alamat" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="exampleFormControlTextarea1" class="form-label">Kode POS</label>
                            <input type="number" name="kodepos" placeholder="Kode POS" class="form-control p-3" id="exampleInputEmail3">
                        </div>
                        <button type="submit" class="btn text-white form-control regist-btn p-3" disabled style="background-color:rgba(244, 119, 34, 1);"">Register</button>
                        <p class="mt-2 text-center">Don’t have an account? <a href="{{url('login-user')}}" style="color:rgba(244, 119, 34, 1)">Login</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('customjs')
<script>
    $(document).ready(function(){
        @if(Session::has('message'))
            Swal.fire({
                title: "Success!",
                text: "{{ Session('message') }}",
                icon: "success"
            });
        @endif
    })

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


        $('#re-pass').on('input', function(){
            var pass = $('#pass').val()
            var repass = $('#re-pass').val()
            if(pass == repass){
                $('.regist-btn').attr('disabled', false)
            }else{
                $('.regist-btn').attr('disabled', true)
            }
        })

</script>
@endsection
