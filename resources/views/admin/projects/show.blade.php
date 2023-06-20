@extends('layouts.admin')

@section('title', $project->title)
@section('content')
    <div class="banner d-flex justify-content-end p-4 shadow-sm">
        <a href="{{ route('admin.projects.index') }}" type="button"
            class="btn btn-dark my_button position-sticky top-0 shadow-sm">
            <i class="fa-solid fa-house"></i> Back to index</a>
    </div>
    <div class="container d-flex flex-column justify-content-around">
        <h3 class="my-4 text-center">{{ $project->title }}</h3>
        <a href="{{ $project->link }}">
            <p class="card-text text-center">{{ $project->link }}</p>
        </a>

        <div class="img_cotainer m-4 text-center">
            <img class="img-fluid drop_shadow border rounded-4" src="{{ asset('storage/' . $project->logo) }}"
                alt="{{ $project->title }}">

        </div>
        <div class="info_container text-dark py-3 ">
            <h6 class="card-subtitle mb-3 text-muted"><b> Type :</b> <br>
                <span class="ms-3 d-inline-block my-2">{{ $project->type->name ?? 'nothing' }}</span>

            </h6>
            <h6 class="card-subtitle mb-3 text-muted"><b> Tecnologies :</b> <br>

                @forelse ($project->tags as $tag)
                    <span class="ms-3 d-inline-block my-2">{{ $tag->name }}</span>
                @empty
                    <span class="ms-3 ">{{ 'No one' }}</span>
                @endforelse
            </h6>

            </h6>
            <ul class="card-subtitle mb-2 text-muted list-unstyled">
                <li><b> Description :</b> </li>
                <li class="ms-3 "> {{ $project->functionality }}</li>
            </ul>

            <hr>
            <h5 class="card-title text-end ">{{ $project->price }}</h5>
        </div>
    </div>
@endsection
