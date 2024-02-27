@extends('front.master')

@section('title' , 'Courses')

@section('body')
    <div class="site-breadcrumb">
        <div class="hero-shape-area">
            <img class="hero-shape-1" src="{{ asset('/') }}front/assets/img/shape/shape-1.png" alt>
            <img class="hero-shape-2" src="{{ asset('/') }}front/assets/img/shape/shape-3.png" alt>
            <img class="hero-shape-3" src="{{ asset('/') }}front/assets/img/shape/shape-6.png" alt>
            <img class="hero-shape-4" src="{{ asset('/') }}front/assets/img/shape/shape-4.png" alt>
        </div>
        <div class="container">
            <h2 class="breadcrumb-title">Courses</h2>
            <ul class="breadcrumb-menu">
                <li><a href="{{ route('front.home') }}">Home</a></li>
                <li class="active">{{ $category->name }}</li>
                <li class="active">Courses</li>
            </ul>
        </div>
    </div>


    <div class="course-area course-area-list py-120">
        <div class="container">
            <div class="row">
                @foreach($courses as $course)
                    <div class="col-md-6 col-lg-12">
                    <div class="course-item">
                        <div class="row">
                            <div class="col-lg-6 col-xl-4">
                                <span class="course-tag course-tag-1">{{ $category->name }}</span>
                                <div class="course-img">
                                    <a href="#"><img src="{{ asset($course->image ? $course->image : 'front/assets/img/course/01.jpg') }}" alt="" style="height: 255px; width: 364px"></a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-8">
                                <div class="course-content">
                                    <div class="course-meta">
                                        <span class="course-category course-category-1">{{ $category->name }}</span>
{{--                                        <div class="course-rate">--}}
{{--                                            <i class="fas fa-star"></i>--}}
{{--                                            <i class="fas fa-star"></i>--}}
{{--                                            <i class="fas fa-star"></i>--}}
{{--                                            <i class="fas fa-star"></i>--}}
{{--                                            <i class="fas fa-star"></i>--}}
{{--                                            <span>(40)</span>--}}
{{--                                        </div>--}}
                                    </div>
                                    <a href="{{ route('front.course-details', [ 'course_id' => $course->id, 'title' => str_replace(' ', '-', $course->title) ]) }}">
                                        <h4 class="course-title">{{ $course->title }}</h4>
                                    </a>
                                    <p>{{ $course->short_description }}</p>
                                    <div class="course-info">
                                        <ul>
                                            <li class="course-lecture"><i class="fad fa-book-open"></i>{{ $course->total_class }} Lectures
                                            </li>
                                            <li class="course-duration"><i class="fad fa-clock"></i>{{ $course->total_hours }} Hours</li>
{{--                                            <li class="course-enrolled"><i class="fad fa-user-friends"></i>40.7k--}}
{{--                                                Enrolled--}}
{{--                                            </li>--}}
                                        </ul>
                                    </div>
                                    <div class="course-bottom">
                                        <a href="#">
                                            <div class="course-instructor">
                                                <img src="{{ asset( $course->user->profile_photo_path ? $course->user->profile_photo_path : 'front/assets/img/course/ins-1.jpg') }}" alt="" style="height: " />
                                                <h6>{{ $course->user->name }}</h6>
                                            </div>
                                        </a>
                                        <div class="course-price">
                                            <span>BDT {{ $course->price }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center">
                <a href="#" class="theme-btn mt-5"><span class="fad fa-sync-alt"></span> Load More Courses</a>
            </div>
        </div>
    </div>
@endsection
