@extends('template')
@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Form Edit Categorie</h5>

      <!-- Floating Labels Form -->
      <form class="row g-3" method="post" action="{{url('categorie/edit')}}">
        @csrf
        <input type="hidden" name="id" value="{{$cat->id}}" />
        <div class="col-md-12">
          <div class="form-floating">
            <input type="text" class="form-control" name="name" value="{{$cat->name}}" id="floatingName" placeholder="Category Name" required>
            <label for="floatingName">Category Name</label>
          </div>
        </div>
        <div class="col-md-12">
            <div class="form-floating mb-3">
                <select class="form-select" name="status" id="floatingSelect"
                    aria-label="Floating label select example" required>
                        <option value="1" {{$cat->status == 1 ? 'selected' : ''}}>Active</option>
                        <option value="0" {{$cat->status == 0 ? 'selected' : ''}}>Not Active</option>
                </select>
                <label for="floatingSelect">Select Category</label>
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
