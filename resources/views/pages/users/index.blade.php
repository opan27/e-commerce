@extends('template')
@section('content')
<div class="pagetitle d-flex justify-content-between">
    <h1>Data Users</h1>
    <a href="{{url('user/add')}}" class="btn btn-success"><i class="ri-add-circle-line"></i></a>
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
                  <th>
                    <b>N</b>ame
                  </th>
                  <th>Ext.</th>
                  <th>City</th>
                  <th data-type="date" data-format="YYYY/DD/MM">Start Date</th>
                  <th>Completion</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Unity Pugh</td>
                  <td>9958</td>
                  <td>Curicó</td>
                  <td>2005/02/11</td>
                  <td>37%</td>
                  <td>
                    <a href="{{url('user/show')}}" class="btn btn-warning"><i class="ri-edit-2-line"></i></a>
                    <a href="/rute-tujuan" class="btn btn-danger"><i class="ri-delete-bin-5-line"></i></a>
                  </td>
                </tr>
                <tr>
                  <td>Theodore Duran</td>
                  <td>8971</td>
                  <td>Dhanbad</td>
                  <td>1999/04/07</td>
                  <td>97%</td>
                  <td>
                    <a href="{{url('user/show')}}" class="btn btn-warning"><i class="ri-edit-2-line"></i></a>
                    <a href="/rute-tujuan" class="btn btn-danger"><i class="ri-delete-bin-5-line"></i></a>
                  </td>
                </tr>
                <tr>
                  <td>Kylie Bishop</td>
                  <td>3147</td>
                  <td>Norman</td>
                  <td>2005/09/08</td>
                  <td>63%</td>
                  <td>
                    <a href="{{url('user/show')}}" class="btn btn-warning"><i class="ri-edit-2-line"></i></a>
                    <a href="/rute-tujuan" class="btn btn-danger"><i class="ri-delete-bin-5-line"></i></a>
                  </td>
                </tr>
                <tr>
                  <td>Willow Gilliam</td>
                  <td>3497</td>
                  <td>Amqui</td>
                  <td>2009/29/11</td>
                  <td>30%</td>
                  <td>
                    <a href="{{url('user/show')}}" class="btn btn-warning"><i class="ri-edit-2-line"></i></a>
                    <a href="/rute-tujuan" class="btn btn-danger"><i class="ri-delete-bin-5-line"></i></a>
                  </td>
                </tr>
              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>
@endsection
