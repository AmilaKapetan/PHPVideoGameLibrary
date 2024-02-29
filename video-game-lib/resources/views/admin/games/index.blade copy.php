@extends('layouts.master')
@include('layouts.topbar')

<hr class="text-white mx-3 my-4">
<div class="container text-center text-white">
    <h1 class="text-white display-3">Edit Games and Categories</h1>
    <div>
        <a class="btn btn-dark text-white border-light col" href="{{ route('admin.showCategories') }}">Manage Categories</a>
        <a class="btn btn-dark text-white border-light col"  href="{{ route('admin.addGame') }}">Add New Game</a>
    </div>

    <br><br>
    @foreach ($games as $game)
        <div class="row mt-2 mb-2">
            <h2 class="col text-white">{{ $game->name }}</h2>
            <a class="col btn btn-dark text-white border-light" href="{{ route('admin.editGame', $game->id) }}">Edit</a>
            <form class="col" action="{{ route('admin.deleteGame', $game->id) }}" method="post">
                @csrf
                <button class="col btn btn-dark text-white border-light" type="submit">Delete</button>
            </form>
        </div>
        <hr class="text-white mx-3 my-4">
    @endforeach
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if(session('success'))
            alert("{{ session('success') }}");
            @endif
        });
    </script>
</div>
