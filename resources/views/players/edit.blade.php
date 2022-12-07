@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4 id=create-form">

  <div class="row justify-content-center">

    <section class="col-md-5">
      <div class="card mb-3">
        <img src="https://wallpaperaccess.com/full/3278875.jpg" class="card-img-top" alt="Football Image">
        <div class="card-body">
          <h5 class="card-title">Edit {{ $player->firstName}}'s details</h5>

          <form method="POST" action="{{ route('players.update', $player->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-md-6">
              <label for="image" class="form-label">Upload Photo</label>
              <input type="file" class="form-control" name="image">
            </div>
            <div class="col-12 pt-2">
              <label for="firstName" class="form-label">First Name</label>
              <input type="text" class="form-control" name="firstName" value="{{ $player->firstName}}">
            </div>
            <div class="col-12 pt-2">
              <label for="surname" class="form-label">Surname</label>
              <input type="text" class="form-control" name="surname" value="{{ $player->surname}}">
            </div>
            <div class="col-md-6 pt-2">
              <label for="age" class="form-label">Age</label>
              <input type="text" class="form-control" name="age" value="{{ $player->age}}">
            </div>
            <div class="col-md-4 pt-2">
              <label for="position" class="form-label">Position</label>
              <select name="position" class="form-select">

                <option selected>{{ $player->position }}</option>
                <option>Goalkeeper</option>
                <option>Defender</option>
                <option>Midfielder</option>
                <option>Forward</option>
              </select>
            </div>

            <div class="col-12 mt-4">
              <input type="submit" class="btn btn-primary" value="Update"></input>
              <input type="reset" class="btn btn-warning" value="Reset"></input>
            </div>
          </form>
    </section>
  </div>
</div>

<!-- Display Errors -->
@if(count($errors) > 0 )
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <ul class="p-0 m-0" style="list-style: none;">
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </ul>
</div>
@endif
@endsection