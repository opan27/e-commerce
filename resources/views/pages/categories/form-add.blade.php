@extends('template')
@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Form Add Categorie</h5>

      <!-- Floating Labels Form -->
      <form class="row g-3" method="post" action="{{url('categorie/store')}}">
        @csrf
        <div class="col-md-12">
          <div class="form-floating">
            <input type="text" class="form-control" name="name" id="floatingName" placeholder="Category Name" required>
            <label for="floatingName">Category Name</label>
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
