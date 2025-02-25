@extends('template')
@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Form Edit User</h5>

      <!-- Floating Labels Form -->
      <form class="row g-3">
        <div class="col-md-12">
          <div class="form-floating">
            <input type="text" class="form-control" id="floatingName" placeholder="Your Name">
            <label for="floatingName">Your Name</label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-floating">
            <input type="email" class="form-control" id="floatingEmail" placeholder="Your Email">
            <label for="floatingEmail">Your Email</label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
          </div>
        </div>
        <div class="col-12">
          <div class="form-floating">
            <textarea class="form-control" placeholder="Address" id="floatingTextarea" style="height: 100px;"></textarea>
            <label for="floatingTextarea">Address</label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="col-md-12">
            <div class="form-floating">
              <input type="text" class="form-control" id="floatingCity" placeholder="City">
              <label for="floatingCity">City</label>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-floating mb-3">
            <select class="form-select" id="floatingSelect" aria-label="State">
              <option selected>New York</option>
              <option value="1">Oregon</option>
              <option value="2">DC</option>
            </select>
            <label for="floatingSelect">State</label>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-floating">
            <input type="text" class="form-control" id="floatingZip" placeholder="Zip">
            <label for="floatingZip">Zip</label>
          </div>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form><!-- End floating Labels Form -->

    </div>
  </div>
@endsection
