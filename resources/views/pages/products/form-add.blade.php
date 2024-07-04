@extends('template')
@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Form Add Product</h5>
      <!-- Floating Labels Form -->
      <form class="row g-3" method="post" action="{{url('product/store')}}" enctype="multipart/form-data">
        @csrf
        <div class="row mt-3 mb-3">
            <label for="inputNumber" class="col-sm-2 col-form-label">Upload Image</label>
            <div class="col-sm-3 col-12">
                <input class="form-control" name="file[]" type="file" id="formFile" multiple required>
            </div>
        </div>
        <ol class="d-flex" id="imagePreview">
        </ol>
        <div class="col-md-3">
          <div class="form-floating">
            <input type="text" name="sku" class="form-control" id="floatingName" placeholder="Sku" required>
            <label for="floatingName">Sku</label>
          </div>
        </div>
        <div class="col-md-3">
            <div class="form-floating">
              <input type="text" name="productName" class="form-control" id="floatingName" placeholder="Product Name" required>
              <label for="floatingName">Product Name</label>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-floating mb-3">
                <select class="form-select" name="productCat" id="floatingSelect" aria-label="Floating label select example" required>
                  <option selected>Open this select Category Product</option>
                  @foreach ($categories as $cat )
                  <option value="{{$cat->id}}">{{$cat->name}}</option>
                  @endforeach
                </select>
                <label for="floatingSelect">Select Category</label>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-floating">
                <input type="text" class="form-control" name="productGroup" id="floatingName" placeholder="Product Group" required>
                <label for="floatingName">Product Group</label>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-floating">
                <input type="text" class="form-control" name="productType" id="floatingName" placeholder="Product Type" required>
                <label for="floatingName">Product Type</label>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-floating">
                <input type="text" class="form-control" name="price" id="floatingName" placeholder="Price" required>
                <label for="floatingName">Price</label>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-floating">
                <input type="text" class="form-control" name="discount" id="floatingName" placeholder="Discount">
                <label for="floatingName">Discount</label>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-floating">
                <input type="text" class="form-control" name="priceAfterDiscount" id="floatingName" placeholder="Price After Discount" required>
                <label for="floatingName">Price After Discount</label>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-floating">
                <input type="text" class="form-control" name="netWeight" id="floatingName" placeholder="Net Weight" required>
                <label for="floatingName">Net Weight</label>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-floating">
                <input type="text" class="form-control" name="grossWeight" id="floatingName" placeholder="Gross Weight" required>
                <label for="floatingName">Gross Weight</label>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-floating">
                <input type="text" class="form-control" name="uom" id="floatingName" placeholder="UOM" required>
                <label for="floatingName">UOM</label>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-floating">
                <input type="text" class="form-control" name="stock" id="floatingName" placeholder="Stock" required>
                <label for="floatingName">Stock</label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-floating">
                <input type="text" class="form-control" name="bpom" id="floatingName" placeholder="BPOM" required>
                <label for="floatingName">BPOM</label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-floating">
                <input type="text" class="form-control" name="halal" id="floatingName" placeholder="Halal Status" required>
                <label for="floatingName">Halal Status</label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-floating">
                <input type="text" class="form-control" name="slug" id="floatingName" placeholder="Slug" required>
                <label for="floatingName">Slug</label>
            </div>
        </div>
        <div class="col-12">
            <div class="form-floating">
              <textarea class="form-control" name="productDesc" placeholder="Address" id="floatingTextarea" style="height: 100px;" required></textarea>
              <label for="floatingTextarea">Product Description</label>
            </div>
        </div>

        <div class="text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form><!-- End floating Labels Form -->

    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script>
    $(document).ready(function(){
      var selectedFiles = []; // Array untuk menyimpan daftar file yang dipilih

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
                    <img src="${e.target.result}" class="img-fluid" width="100" />
                  </div>
                  <span class="deleteButton text-danger" style="margin:-10px 0 0 -10px"><i class="ri-delete-bin-5-line"></i></span>
                </li>
              `);
            }
            // Baca file sebagai URL data
            reader.readAsDataURL(file);
          }
        }
      });

      // Saat tombol hapus di klik
      $(document).on('click', '.deleteButton', function(){
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
    });
    </script>
@endsection
