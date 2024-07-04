<div style="position:fixed; z-index:99999; width:100%; top:0">
    <div class="container-fluid bg-title">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="m-0 p-2 text-center"><img src="{{url('template-fe/img/assets/Vector.png')}}" /><b><small class="mx-3 fs-6 ">Gratis Ongkir</small></b><small>Setiap pembelian minimal 100rb</small></p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-white">
        <div class="container menu-dekstop">
            <nav class="navbar navbar-expand-lg fs-6">
                <div class="container-fluid">
                <a class="navbar-brand" href="{{url('/')}}">
                    <img src="{{url('template-fe/img/assets/logo-animate.png')}}" id="gambar1"/>
                    <img src="{{url('template-fe/img/assets/SSSKIN.png')}}" id="gambar2" class="ssskin" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item mx-3">
                        <a class="nav-link active" aria-current="page" href="{{route('our-products')}}">Product</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link active" aria-current="page" href="#">SSSKIN Stories</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link active" aria-current="page" href="#">Blog</a>
                    </li>
                    </ul>
                    <div class="form-group has-search">
                        <img src="{{url('template-fe/img/assets/search.png')}}" class="form-control-feedback" alt="" width="">
                        <div class="input-wrapper">
                            <input type="text" class="form-control p-2 searching" id="search-head">
                            <label for="search-input" class="placeholder-text">Placeholder Text</label>
                        </div>
                    </div>
                    <div class="d-flex" style="padding:10px 0">
                        <a href="#" class="mx-2 shooping" style="position: relative;">
                            <img src="{{url('template-fe/img/assets/shopping-bag.png')}}" />
                            <span class="badge text-bg-success" id="totcart" style="background:red; position: absolute; top: -10px; right:-5px"></span>
                        </a>
                        @if(Session::has('name'))
                            <div class="userProfile">
                                <a class="mx-2" href="{{url('login-user')}}" style="color:inherit; text-decoration:none; position: relative;">
                                    <img src="{{url('template-fe/img/assets/user.png')}}" class="userimage" />
                                    <span style="font-size:12px">{{session('name')}}</span>
                                </a>
                                <div class="subProfile">
                                    <div class="card" style="width: 13rem;">
                                        <ul class="list-group list-group-flush">
                                          <li class="list-group-item">
                                            <div>
                                                {{session('email')}}
                                                <small>
                                                    <a href="" style="padding:0;color:rgba(244, 119, 34, 1)">View Profile</a>
                                                </small>
                                            </div>
                                          </li>
                                          <li class="list-group-item"><a href="">My Order</a></li>
                                          <li class="list-group-item"><a href="">History</a></li>
                                        </ul>
                                        <div class="card-footer">
                                          <a href="{{url('logout-proses')}}" style="color:inherit; text-decoration:none">Logout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="userProfile">
                                <a class="mx-2" href="{{url('login-user')}}" style="color:inherit; text-decoration:none; position: relative; top:0px;">
                                    <img src="{{url('template-fe/img/assets/user.png')}}" class="userimage" />
                                    <span style="font-size:12px">Sign In</span>
                                </a>
                            </div>
                        @endif
                        {{-- <a href="{{url('logout-proses')}}" style="font-size:12px; padding-top:5px">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="20"
                                height="20"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                class="feather feather-log-out"
                                >
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                                <polyline points="16 17 21 12 16 7" />
                                <line x1="21" y1="12" x2="9" y2="12" />
                            </svg>
                        </a> --}}
                    </div>
                </div>
                </div>
            </nav>
        </div>
    </div>
</div>
