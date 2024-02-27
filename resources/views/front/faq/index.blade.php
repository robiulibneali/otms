@extends('front.master')

@section('title' , 'Contact')

@section('body')
    <div class="site-breadcrumb">
        <div class="hero-shape-area">
            <img class="hero-shape-1" src="{{ asset('/') }}front/assets/img/shape/shape-1.png" alt>
            <img class="hero-shape-2" src="{{ asset('/') }}front/assets/img/shape/shape-3.png" alt>
            <img class="hero-shape-3" src="{{ asset('/') }}front/assets/img/shape/shape-6.png" alt>
            <img class="hero-shape-4" src="{{ asset('/') }}front/assets/img/shape/shape-4.png" alt>
        </div>
        <div class="container">
            <h2 class="breadcrumb-title">Faq</h2>
            <ul class="breadcrumb-menu">
                <li><a href="{{ route('front.home') }}">Home</a></li>
                <li class="active">Faq</li>
            </ul>
        </div>
    </div>


    <div class="faq-area py-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="faq-right">
                        <div class="site-heading mb-3">
                            <h2 class="site-title my-3">General frequently <span>asked questions</span></h2>
                        </div>
                        <p class="about-text">There are many variations of passages of Lorem Ipsum available,
                            but the majority have suffered alteration in some form, by injected humour, or
                            randomised words which don't look even.</p>
                        <p>It is a long established fact that a reader will be distracted by the readable content of
                            a page when looking at its layout. </p>
                        <a href="#" class="theme-btn mt-5">Ask Your Question <i class="far fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <span><i class="far fa-question"></i></span> Do I Need A Business Plan ?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    We denounce with righteous indignation and dislike men who
                                    are so beguiled and demoralized by the charms of pleasure of the moment, so
                                    blinded by desire.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <span><i class="far fa-question"></i></span> How Long Should A Business Plan Be
                                    ?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    We denounce with righteous indignation and dislike men who
                                    are so beguiled and demoralized by the charms of pleasure of the moment, so
                                    blinded by desire.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <span><i class="far fa-question"></i></span> What Payment Gateway You Support ?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    We denounce with righteous indignation and dislike men who
                                    are so beguiled and demoralized by the charms of pleasure of the moment, so
                                    blinded by desire.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
