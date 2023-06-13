@extends('layouts.admin')

@section('title', __('View tag'))

@section('content')
    {{-- dd($tag->projects);  --}}
    <div class="banner d-flex justify-content-end p-4 shadow-sm">
        <a href="{{ route('admin.tags.index') }}" type="button"
            class="btn btn-dark my_button position-sticky top-0 shadow-sm">
            <i class="fa-solid fa-house"></i> Back to tags</a>
    </div>
    <div class="show_page d-flex justify-content-center ">
        <div class="card col-12 border-0 overflow-hidden">
            <div class="fs-1 text-primary bg-light p-3 text-center">Language</div>
            <div class="card-body bg-light text-dark">

                <div class="text-center mb-5">
                    <div type="button" class="badge text-bg-primary fs-5">
                        {{ $tag->name }}
                    </div>
                </div>
                <h4> <b class="text-danger">N° of projects : {{ $tag->projects->count() }} </b></h4>
                @if ($tag->projects->count() > 0)

                    @forelse ($tag->projects as $project)
                        <div class="list-unstyled">
                            <div class="card p-3 border border-0">
                                <div class=" fs-5"><b>title: </b> <span class="stle-italic">{{ $project->title }}</span>
                                </div>
                                <div class=" fs-5"><b>Languages: </b>
                                    @foreach ($project->tags as $technologies)
                                        @if ($technologies->name == $tag->name)
                                            <span class="fw-bold text-danger">{{ $technologies->name }} </span>
                                        @else
                                            <span class="">{{ $technologies->name }} </span>
                                        @endif
                                        @if (!$loop->last)
                                            <span>,</span>
                                        @endif
                                    @endforeach
                                </div>

                                <div class=" fs-5"><b>link: </b> <a href="{{ $project->link }}">{{ $project->link }}</a>
                                </div>

                            </div>
                        </div>
                        <br>
                    @empty
                        <li>
                            <h5>No one</h5>
                        </li>
                    @endforelse
                @endif
            </div>
        </div>
    </div>
@endsection
