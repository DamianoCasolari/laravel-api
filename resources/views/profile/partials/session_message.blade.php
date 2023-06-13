@if (session('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><i class="fa-regular fa-circle-check me-2 text-success"></i> {{ session('message') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
