@extends('template')
@section('content')
<div class="pagetitle d-flex justify-content-between">
    <h1>Data Products</h1>
    <a href="{{url('product/add')}}" class="btn btn-success"><i class="ri-add-circle-line"></i></a>
</div>
<section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body" style="overflow-x: auto;white-space: nowrap;">
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                    <th>No</th>
                    <th>Action</th>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Status Product</th>
                    <th>Best Seller</th>
                    <th>Recomended</th>
                    <th>SKU</th>
                    <th>Product Description</th>
                    <th>Product Category</th>
                    <th>Product Group</th>
                    <th>Product Type</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Price After Discount</th>
                    <th>Net Weight</th>
                    <th>Gross Weight</th>
                    <th>UOM</th>
                    <th>Stock</th>
                    <th>BPOM</th>
                    <th>Halal</th>
                    <th>Product Video</th>
                    <th>Slug</th>
                    <th>Created Time</th>
                    <th>Status</th>
                </tr>
              </thead>
              <tbody>
                @php
                $no = 1;
                @endphp
                @foreach($data as $item)
                <tr>
                  <td>{{$no++}}</td>
                  <td>
                    <a href="{{url('product/show/'.$item->id)}}" class="btn btn-warning"><i class="ri-edit-2-line"></i></a>
                    <a href="{{url('product/delete/'.$item->id)}}" class="btn btn-danger delete" onclick="deleteProduct(event, {{$item->id}})"><i class="ri-delete-bin-5-line"></i></a>
                  </td>
                  <td>
                    @php
                        $images = json_decode($item->productImage);
                    @endphp
                    @if(is_array($images))
                        @foreach ($images as $image)
                            <img src="{{asset('productImage/'.$image->filename)}}" alt="{{$image->filename}}" width="40%" class="img-fluid mb-2"><br>
                        @endforeach
                    @else
                        Empty
                    @endif
                  </td>
                  <td>{{$item->productName}}</td>
                  <td>{!!$item->status == 1 ? '<span class="badge rounded-pill bg-success">Active</span>' : '<span class="badge rounded-pill bg-danger">Not Active</span>' !!}</td>
                  <td>{!!$item->bestSeller == 1 ? '<span class="badge rounded-pill bg-success">Best Seller</span>' : '<span class="badge rounded-pill bg-danger">Not Best Seller</span>'!!}</td>
                  <td>{!!$item->recomended == 1 ? '<span class="badge rounded-pill bg-success">Recomended</span>' : '<span class="badge rounded-pill bg-danger">Not Recomended</span>'!!}</td>
                  <td>{{$item->sku}}</td>
                  <td>{{substr($item->productDesc, 0, 50)}}......</td>
                  <td>{{$item->productCat}}</td>
                  <td>{{$item->productGroup}}</td>
                  <td>{{$item->productType}}</td>
                  <td>Rp.{{number_format($item->price)}}</td>
                  <td>{{$item->discount}}%</td>
                  <td>Rp.{{number_format($item->priceAfterDiscount)}}</td>
                  <td>{{$item->netWeight}}</td>
                  <td>{{$item->grossWeight}}</td>
                  <td>{{$item->uom}}</td>
                  <td>{{$item->stock}}</td>
                  <td>{{$item->bpom}}</td>
                  <td>{{$item->halal}}</td>
                  <td>{{$item->productVideo}}</td>

                  <td>{{$item->slug}}</td>
                  <td>{{$item->createdTime}}</td>
                  <td>{{$item->status}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    var baseUrl = `${window.location.origin}`;
    function deleteProduct(event, id) {
        event.preventDefault();
        Swal.fire({
            title: "Are you sure?",
            text: "Delete the product!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = `${baseUrl}/product/delete/${id}`;
            }
        });
    }
    @if(Session::has('message'))
        Swal.fire({
            title: "Success!",
            text: "{{ Session('message') }}",
            icon: "success"
        });
    @endif
</script>
@endsection
