@extends('template')
@section('content')
<div class="pagetitle d-flex justify-content-between">
    <h1>Data Categories</h1>
    <a href="{{url('categorie/add')}}" class="btn btn-success"><i class="ri-add-circle-line"></i></a>
</div>
<section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Category Name</th>
                  <th>Created Time</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach($categori as $item)
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$item->name}}</td>
                  <td>{{$item->createdTime}}</td>
                  <td>{!!$item->status == 1 ? '<span class="badge rounded-pill bg-success">Active</span>' : '<span class="badge rounded-pill bg-danger">Not Active</span>' !!}</td>
                  <td>
                    <a href="{{url('categorie/show/'.$item->id)}}" class="btn btn-warning"><i class="ri-edit-2-line"></i></a>
                    <a href="{{url('categorie/delete/'.$item->id)}}" class="btn btn-danger" onclick="deleteCategory(event, {{$item->id}})"><i class="ri-delete-bin-5-line"></i></a>
                  </td>
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
    function deleteCategory(event, id) {
        event.preventDefault();
        Swal.fire({
            title: "Are you sure?",
            text: "Delete the category!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = `${baseUrl}/categorie/delete/${id}`;
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
