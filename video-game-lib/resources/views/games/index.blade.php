@extends('layouts.master')

<div class="container text-center">
    <h1 class="text-white display-3">Browse Games</h1>

    <div class="row">
        @foreach ($categories as $category)
            <div class="col">
                <a class="btn btn-outline-light" href="#{{ $category }}">{{ $category }}</a>
            </div>
        @endforeach
    </div>

    @foreach ($categories as $category)
        <section id="{{ $category }}" class="mt-5">
            <h2 class="text-white text-decoration-none">Category: {{ $category }}</h2>
            <ul class="list-unstyled text-decoration-none">
                @forelse ($gamesByCategory[$category] as $game)
                    <li class="text-white"><a class="btn btn-outline-light" href="{{ route('showGame', $game->id) }}">{{ $game->name }}</a></li>
                @empty
                    <li class="text-white">No games available in this category.</li>
                @endforelse
            </ul>
        </section>
    @endforeach
</div>
