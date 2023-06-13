@extends('layouts.app')
@section('content')
    <div class="jumbotron p-5 bg-light rounded-3 vh_100 d-flex align-items-center justify-content-center bg_color">
        <div class="container py-5 d-flex flex-wrap align-items-center justify-content-center">
            <div class=" text-end pe-3 ghost col-sm-6">
                <img src="{{ asset('img/photo.jpg') }}" alt="DC Logo" height="300" class="rounded-4 shadow">
            </div>

            <div class="info_contaienr p-2 col-sm-6 text-center text-sm-start">
                <h1 id="myText">
                    <span class="fade_in position-relative fs-1 text_shadow">Hi, I'm Damiano</span>

                </h1>

                <p class="ghost text_shadow"><i>
                        My job is to create <b>tailor-made sites</b> for <span class="text-primary">you</span>,
                    </i></p>
            </div>
        </div>
    </div>
    <div id="portfolio" class="info_contaienr ps-4 vh_100 d-flex align-items-center justify-content-center">
        <h1 class="">Projects </h1>






    </div>
@endsection
