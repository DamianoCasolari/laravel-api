@if ($errors->any())
    <div class="alert alert-danger m-4 d-flex justify-content-between align-items-center" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <div>
            <i class="fa-solid fa-xl fa-triangle-exclamation flash"></i>
        </div>
    </div>
@endif
