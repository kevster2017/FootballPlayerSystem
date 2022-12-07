@extends('layouts.app')

@section('content')


<div class="ps-5 pt-3">
    <div class="card mb-3" style="max-width: 1080px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ asset('storage/'.$player->image) }}" class="img-fluid rounded-start" alt="Profile Image">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Name: {{ $player->firstName }} {{ $player->surname }} </h5>
                    <p class="card-text">Age: {{ $player->age }}</p>
                    <p class="card-text">Position: {{ $player->position }}</p>

                    <p class="card-text"><small class="text-muted">Joined Team: {{ $player->created_at->diffForHumans() }}</small></p>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection