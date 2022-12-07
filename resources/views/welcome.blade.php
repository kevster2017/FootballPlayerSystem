@extends('layouts.app')

@section('content')

<style>
    .bg {
        /* The image used */
        background-image: url("https://w0.peakpx.com/wallpaper/694/864/HD-wallpaper-football-goal-soccer-ball-soccer-field-stadium-concepts-football.jpg");
        /* Full height */
        height: 100%;
        width: 100%;
        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>



<div class="bg">
    <div class="text-left ms-5 py-5">
        <h1>Welcome to the Football Player System</h1>
        <p>Upload your players to our application</p>
    </div>

    <div class="text-left ms-5 py-5">

        <a href="{{ route('register') }}" class="btn btn-lg btn-primary">Sign Up</a>
        <a href="{{ route('login') }}" class="btn btn-lg btn-info ms-3">Login</a>
    </div>

</div>


@endsection