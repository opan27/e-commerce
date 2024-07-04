@extends('index')
@section('content')
    <div class="design-login" style="padding-top:200px;background:rgba(208, 184, 134, 1)">
        <div class="container">
            <div class="row">
                <p class="text-center text-white fs-3">Login</p>
            </div>
        </div>
    </div>
    <div class="container" style="padding:10vh">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="box-form">
                    <form method="post" action="{{url('proses-login-user-fe')}}">
                        @csrf
                        <div class="mb-4">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="email" placeholder="Enter your email" name="email" class="form-control p-3" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-4">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <label for="exampleInputPassword1" class="form-label float-end" style="color:rgba(244, 119, 34, 1)">Forgot Password</label>
                            <input type="password" name="password" placeholder="Enter your password" class="form-control p-3" id="exampleInputPassword1">
                        </div>
                        <button type="submit" class="btn text-white form-control p-3" style="background-color:rgba(244, 119, 34, 1);">Login</button>
                        <p class="mt-2 text-center">Don’t have an account? <a href="{{url('register-user')}}" style="color:rgba(244, 119, 34, 1)">Register</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('customjs')
<script>
    @if(Session::has('message'))
        Swal.fire({
            title: "Success!",
            text: "{{ Session('message') }}",
            icon: "success"
        });
    @endif

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


</script>
@endsection
