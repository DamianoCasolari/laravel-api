@extends('layouts.admin')
@section('title', 'tags index')
@section('content')

    <div class="banner py-2 shadow-sm">
        <h1 class="px-2 text-primary">Show tag table</h1>

        <form action="{{ route('admin.tags.store') }}" method="post">
            @csrf
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><button tag="submit"
                        class="border border-0 bg-transparent"><i class="fa fa-plus" aria-hidden="true"></i></button> </span>
                <input tag="text" class="form-control" id="name" name="name"
                    placeholder="Type the name of the new tag" aria-label="Username" aria-describedby="basic-addon1">
            </div>
        </form>

        @include('profile.partials.session_message')
    </div>


    <div class="table-responsive">
        <table class="table table-striped 
    table-hover	
    table-borderless
    align-middle text-center">
            <thead class="table-light">
                <caption class="ms-1">Technology Index</caption>
                <tr class="table-info">
                    <th>Id</th>
                    <th>Name</th>
                    {{-- <th>Slug</th> --}}
                    <th>N° of Projects with this language</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($tags as $tag)
                    <tr class="">
                        <td scope="row"> {{ $tag->id }}</td>
                        <td scope="row"> <b>{{ $tag->name }}</b> </td>
                        {{-- <td scope="row"> {{ $tag->slug }}</td> --}}
                        <td scope="row">
                            <div class="badge py-2 px-3 bg-primary">{{ $tag->projects()->count() }}</div>
                        </td>
                        <td scope="row">
                            <a class="show_button text-decoration-none btn" href="{{ route('admin.tags.show', $tag) }}">
                                <i class="fa-regular fa-eye fa-fw"></i>
                            </a>
                            <button tag="button" class="btn btn-danger fs_13" data-bs-toggle="modal"
                                data-bs-target="#modalId-{{ $tag->id }}">
                                <i class="fa-regular fa-trash-can"></i>
                            </button>

                        </td>

                    </tr>
                    <!-- MODAL -->

                    <div class="modal fade" id="modalId-{{ $tag->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="modalTitleId-{{ $tag->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalTitleId-{{ $tag->id }}">{{ __('Warning') }}</h5>
                                    <button tag="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        Are you sure you delete the tag class : <b>{{ $tag->name }}</b> ?
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button tag="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <form action="{{ route('admin.tags.destroy', $tag->slug) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button tag="submit" class="btn btn-danger m-1">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>

        </table>
    </div>

    <script>
        var modalId = document.getElementById('modalId');

        modalId.addEventListener('show.bs.modal', function(event) {
            // Button that triggered the modal
            let button = event.relatedTarget;
            // Extract info from data-bs-* attributes
            let recipient = button.getAttribute('data-bs-whatever');

            // Use above variables to manipulate the DOM
        });
    </script>


@endsection
