@extends('layouts.admin')

@section('title', __('View type'))

@section('content')
    {{-- dd($type->projects);  --}}
    <div class="banner d-flex justify-content-end p-4 shadow-sm">
        <a href="{{ route('admin.types.index') }}" type="button"
            class="btn btn-dark my_button position-sticky top-0 shadow-sm">
            <i class="fa-solid fa-house"></i> Back to types</a>
    </div>
    <div class="show_page d-flex justify-content-center ">
        <div class="card col-12 border-0 overflow-hidden">
            <div class="fs-1 text-primary bg-light p-3 text-center">Type of project</div>
            <div class="card-body bg-light text-dark">

                <div class="text-center mb-5">
                    <div type="button" class="badge text-bg-primary fs-5">
                        {{ $type->name }}
                    </div>
                </div>
                <h4> <b class="text-danger">N° of projects : {{ $type->projects->count() }} </b></h4>
                @if ($type->projects->count() > 0)
                    @forelse ($type->projects as $project)
                        <div class="list-unstyled">
                            <div class="card p-3 border border-0">
                                <div class="list-unstyled fs-5"><b>title: </b> <span
                                        class="stle-italic">{{ $project->title }}</span>
                                </div>
                                <div class="list-unstyled fs-5"><b>link: </b> <a
                                        href="{{ $project->link }}">{{ $project->link }}</a> </div>

                            </div>
                        </div>
                        <br>
                    @empty
                        <div>
                            <h5>No one</h5>
                        </div>
                    @endforelse
                @endif
            </div>
        </div>
    </div>
@endsection
