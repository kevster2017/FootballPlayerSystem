@extends('layouts.app')

@section('content')

<div class="card mb-3">
  <img src="https://i.pinimg.com/736x/79/b5/21/79b521e4ab918650b8d614cbbd96d04c.jpg" class="card-img-top" alt="Football Stadium Image">
  <div class="card-body">
    <h5 class="card-title">List of Players</h5>
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Image</th>
          <th scope="col">First Name</th>
          <th scope="col">Surname</th>
          <th scope="col">Age</th>
          <th scope="col">Position</th>
          <th scope="col">Joined Team</th>
          <th scope="col">Buttons</th>
        </tr>
      </thead>
      <tbody>
        @foreach($players as $player)
        <tr>
          <td>{{ $player->id }}</td>
          <td><img src="{{ asset('storage/'.$player->image) }}" class="img-thumbnail" style="max-width:80px;" /></td>
          <td>{{ $player->firstName }}</td>
          <td>{{ $player->surname }}</td>
          <td>{{ $player->age }}</td>
          <td>{{ $player->position }}</td>
          <td>{{ $player->created_at->diffForHumans() }}</td>


          <td>

            <div class="d-flex">
              <div class="">
                <a href="{{ route('players.edit',$player->id) }}" class="btn btn-sm btn-warning">Edit</a>
              </div>

              <div class="ps-4">
                <a href="{{ route('players.show',$player->id) }}" class="btn btn-sm btn-info">View</a>
              </div>

              <div class="">
                <div class="ps-4">


                  <form action="{{ route('players.destroy', $player->id) }}" method="POST">
                    @method('DELETE')
                    @csrf

                    <button type="submit" class="btn btn-sm btn-danger" name="deleteUser">Delete</button>
                  </form>
                </div>

              </div>




            </div>



          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    <div class="">
      <strong>Total Players Registered: {{ $players->count() }}</strong>
    </div>

  </div>
</div>



@endsection