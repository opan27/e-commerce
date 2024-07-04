@extends('template')
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Form Edit Product</h5>
            <!-- Floating Labels Form -->
            <form class="row g-3" method="post" action="{{ url('product/edit/') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="id" value="{{ $data->id }}" />

                <div class="row mt-3 mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Upload Image</label>
                    <div class="col-sm-3">
                        <input class="form-control" name="file[]" type="file" id="formFile" multiple>
                    </div>
                </div>

                <ol class="d-flex" id="imagePreview">
                </ol>
                <span>Old Images</span>
                <ol class="d-flex" id="imagePreviewEdit">
                    @php
                        $imagearr = json_decode($data->productImage);
                    @endphp
                    @foreach ($imagearr as $image)
                        <li class="list-group-item d-flex justify-content-between align-items-start existing-image">
                            <div class="ms-2 me-auto">
                                <img src="{{ asset('productImage/' . $image->filename) }}" width="100" />
                            </div>
                            <span class="deleteButton text-danger" style="margin:-10px 0 0 -10px" data-filename="{{ $image->filename }}"><i
                                    class="ri-delete-bin-5-line"></i></span>
                        </li>
                    @endforeach
                </ol>

                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" name="sku" value="{{ $data->sku }}" class="form-control"
                            id="floatingName" placeholder="Sku" required>
                        <label for="floatingName">Sku</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" name="productName" value="{{ $data->productName }}" class="form-control"
                            id="floatingName" placeholder="Product Name" required>
                        <label for="floatingName">Product Name</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating mb-3">
                        <select class="form-select" name="productCat" id="floatingSelect"
                            aria-label="Floating label select example" required>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}" {{ $cat->id == $data->productCat ? 'selected' : '' }}>
                                    {{ $cat->name }}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Select Category</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" class="form-control" value="{{ $data->productGroup }}" name="productGroup"
                            id="floatingName" placeholder="Product Group" required>
                        <label for="floatingName">Product Group</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="productType" value="{{ $data->productType }}"
                            id="floatingName" placeholder="Product Type" required>
                        <label for="floatingName">Product Type</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="price" id="floatingName"
                            value="{{ $data->price }}" placeholder="Price" required>
                        <label for="floatingName">Price</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="discount" id="floatingName"
                            value="{{ $data->discount }}" placeholder="Discount">
                        <label for="floatingName">Discount</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="priceAfterDiscount" id="floatingName"
                            value="{{ $data->priceAfterDiscount }}" placeholder="Price After Discount" required>
                        <label for="floatingName">Price After Discount</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="netWeight" id="floatingName"
                            value="{{ $data->netWeight }}" placeholder="Net Weight" required>
                        <label for="floatingName">Net Weight</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="grossWeight" value="{{ $data->grossWeight }}"
                            id="floatingName" placeholder="Gross Weight" required>
                        <label for="floatingName">Gross Weight</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="uom" value="{{ $data->uom }}"
                            id="floatingName" placeholder="UOM" required>
                        <label for="floatingName">UOM</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="stock" id="floatingName"
                            value="{{ $data->stock }}" placeholder="Stock" required>
                        <label for="floatingName">Stock</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="bpom" id="floatingName"
                            value="{{ $data->bpom }}" placeholder="BPOM" required>
                        <label for="floatingName">BPOM</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="halal" id="floatingName"
                            value="{{ $data->halal }}" placeholder="Halal Status" required>
                        <label for="floatingName">Halal Status</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="slug" id="floatingName"
                            value="{{ $data->slug }}" placeholder="Slug" required>
                        <label for="floatingName">Slug</label>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-floating mb-3">
                        <select class="form-select" name="status" id="floatingSelect"
                            aria-label="Floating label select example" required>
                                <option value="1" {{$data->status == 1 ? 'selected' : ''}}>Active</option>
                                <option value="0" {{$data->status == 0 ? 'selected' : ''}}>Not Active</option>
                        </select>
                        <label for="floatingSelect">Select Status Product</label>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-floating">
                        <textarea class="form-control" name="productDesc" placeholder="Address" id="floatingTextarea" style="height: 100px;"
                            required>{{ $data->productDesc }}</textarea>
                        <label for="floatingTextarea">Product Description</label>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" onClick="window.location.href='{{ url('products') }}'">Cancel</button>
                </div>
            </form><!-- End floating Labels Form -->

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            var selectedFiles = [];
            var baseUrl = `${window.location.origin}`;

            // Saat input file berubah
            $('#formFile').change(function(){
                $('#imagePreview').empty(); // Kosongkan div sebelumnya
                selectedFiles = []; // Kosongkan daftar file yang dipilih
                var files = $(this)[0].files;
                if(files.length > 0){
                // Loop melalui setiap file yang dipilih
                for(var i=0; i<files.length; i++){
                    var file = files[i];
                    selectedFiles.push(file); // Tambahkan file ke dalam daftar file yang dipilih
                    // Buat objek FileReader untuk membaca file
                    var reader = new FileReader();
                    reader.onload = function(e){
                    // Tambahkan gambar yang dipilih ke dalam div preview
                    $('#imagePreview').append(`
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <img src="${e.target.result}" width="100" />
                        </div>
                        <span class="deleteButtonImgNew text-danger" style="margin:-10px 0 0 -10px"><i class="ri-delete-bin-5-line"></i></span>
                        </li>
                    `);
                    }
                    // Baca file sebagai URL data
                    reader.readAsDataURL(file);
                }
                }
            });

            // Saat tombol hapus di klik
            $(document).on('click', '.deleteButtonImgNew', function(){
                var index = $(this).parent().index();
                selectedFiles.splice(index, 1); // Hapus file yang dipilih dari daftar
                $(this).parent().remove(); // Hapus elemen gambar dari pratinjau

                // Buat objek DataTransfer untuk memperbarui nilai input file
                var dataTransfer = new DataTransfer();
                for (var i = 0; i < selectedFiles.length; i++) {
                dataTransfer.items.add(selectedFiles[i]);
                }
                document.getElementById('formFile').files = dataTransfer.files;
            });

            // Saat tombol hapus di klik
            $(document).on('click', '.deleteButton', function() {
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        var $parent = $(this).parent();
                        if ($parent.hasClass('existing-image')) {
                            // Untuk gambar yang sudah ada di database
                            var filename = $(this).data('filename');
                            // Buat logika untuk menangani penghapusan gambar dari database jika diperlukan
                            var id = $('#id').val()
                            UpdateImage(filename, id)
                            $parent.remove(); // Hapus elemen gambar dari pratinjau
                        } else {
                            // Untuk gambar baru yang diunggah
                            var index = $parent.index('.new-image');
                            selectedFiles.splice(index, 1); // Hapus file yang dipilih dari daftar
                            $parent.remove(); // Hapus elemen gambar dari pratinjau

                            // Buat objek DataTransfer untuk memperbarui nilai input file
                            var dataTransfer = new DataTransfer();
                            for (var i = 0; i < selectedFiles.length; i++) {
                                dataTransfer.items.add(selectedFiles[i]);
                            }
                            document.getElementById('formFile').files = dataTransfer.files;
                        }
                        Swal.fire({
                            title: "Deleted!",
                            text: "Your file has been deleted.",
                            icon: "success"
                        });
                    } else {
                        Swal.fire({
                            title: "Deleted!",
                            text: "Cancel Deleted.",
                            icon: "warning"
                        });
                    }
                });
                if (conf) {

                } else {
                    alert('Cancel delete image')
                }

            });

            function UpdateImage(img, id) {
                $.ajax({
                    url: `${baseUrl}/product/editImage/${id}/${img}`,
                    success: function(response) {
                        console.log(response)
                    }
                })
            }
        });
    </script>
@endsection
