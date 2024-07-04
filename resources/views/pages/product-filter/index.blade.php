@extends('template')
@section('content')
<div class="pagetitle d-flex justify-content-between">
    <h1>Data Products Filter</h1>
    <a href="#" class="btn btn-success"><i class="ri-add-circle-line"></i></a>
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
                    <th>Key</th>
                    <th>List Product</th>
                    <th>Status</th>
                </tr>
              </thead>
              <tbody>
                @php
                $no = 1;
                @endphp
                @foreach($productFilter as $filter)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$filter['status_product']}}</td>
                        <td>
                            @foreach($filter['data_product'] as $prod)
                            <div class="card mb-3">
                                <div class="row g-0">
                                  <div class="col-md-4">
                                    <img src="{{url('template-fe/img/assets/Rectangle 493.png')}}" class="img-fluid rounded-start" alt="...">
                                  </div>
                                  <div class="col-md-8">
                                    <div class="card-body">
                                      <h5 class="card-title">Card title</h5>
                                      <p class="card-text">.</p>
                                      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            @endforeach
                        </td>
                        <td>{{$filter['status'] == '1' ? 'Active' : 'Not Active'}}</td>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </section>
@endsection
