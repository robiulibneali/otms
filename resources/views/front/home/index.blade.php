@extends('front.master')

@section('title' , 'Home')

@section('body')
    <div class="hero-section">
        <div class="hero-single">
            <div class="hero-shape-area">
                <img class="hero-shape-1" src="{{ asset('/') }}front/assets/img/shape/shape-1.png" alt>
                <img class="hero-shape-2" src="{{ asset('/') }}front/assets/img/shape/shape-3.png" alt>
                <img class="hero-shape-3" src="{{ asset('/') }}front/assets/img/shape/shape-6.png" alt>
                <img class="hero-shape-4" src="{{ asset('/') }}front/assets/img/shape/shape-4.png" alt>
            </div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-8 col-lg-6">
                        <div class="hero-content">
                            <h6 class="hero-sub-title wow animate__animated animate__fadeInUp" data-wow-duration="1s" data-wow-delay=".25s">Start To New Journey</h6>
                            <h1 class="hero-title wow animate__animated animate__fadeInUp" data-wow-duration="1s" data-wow-delay=".50s">
                                Best learning <span>platform that take</span> you next level
                            </h1>
                            <p class="wow animate__animated animate__fadeInUp" data-wow-duration="1s" data-wow-delay=".75s">
                                There are many variations of passages available but the majority have suffered
                                alteration in some humour.
                            </p>
                            <div class="hero-search">
                                <form action="#">
                                    <div class="form-group">
                                        <i class="far fa-search"></i>
                                        <input type="text" class="form-control" placeholder="Search Your Course Today...">
                                        <button type="submit">Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <div class="hero-img" style="background-image: url({{ asset('/') }}front/assets/img/hero/hero.jpg)"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="category-area py-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="site-heading text-center">
                        <h2 class="site-title">Browse with <span>top category</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($courseCategories as $courseCategory)
                    <div class="col-md-6 col-lg-4 col-xl-3">
                    <a href="{{ route('front.course-category', ['category_id' => $courseCategory->id, 'name' => $courseCategory->name]) }}" class="d-block">
                        <div class="category-item category-color-1">
                            <div class="category-item-icon">
                                @if($courseCategory->image)
                                    <img src="{{ asset($courseCategory->image) }}" alt="{{ $courseCategory->name }}" style="height: 60px; border-radius: 5px; margin-top: -6px"  />
                                @else
                                    <i class="fad fa-laptop-code"></i>
                                @endif
                            </div>
                            <div class="category-item-content">
                                <h6>{{ $courseCategory->name }}</h6>
                                <span>{{ count($courseCategory->courses) }} Courses</span>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <div class="text-center">
                <a href="" class="theme-btn mt-5"><span class="fad fa-sync-alt"></span> Explore All Course Category</a>
            </div>
        </div>
    </div>


    <div class="course-area bg py-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="site-heading text-center mb-3">
                        <h2 class="site-title mb-2">Explore Our <span>Courses</span></h2>
                        <p>It is a long established fact that a reader will be distracted by the readable.</p>
                    </div>
                </div>
            </div>
            <div class="filter-controls">
                <ul class="filter-btns">
                    <li class="active" data-filter="*">See All</li>
                    @foreach($courseCategories as $courseCategory)
                        <li data-filter=".cat{{ $courseCategory->id }}">{{ $courseCategory->name }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="row filter-box">
                @foreach($courseCategories as $courseCategory)
                    @foreach($courseCategory->courses as $course)
                        <div class="col-md-6 col-lg-6 col-xl-4 filter-item cat{{ $courseCategory->id }}">
                    <div class="course-item">
                        <span class="course-tag course-tag-1">{{ $courseCategory->name }}</span>
                        <div class="course-img">
                            <a href="{{ route('front.course-details', [ 'course_id' => $course->id, 'title' => str_replace(' ', '-', $course->title) ]) }}"><img src="{{ asset($course->image ? $course->image : 'front/assets/img/course/01.jpg') }}" alt="{{ $course->title }}" style="height: 300px; width: 351px;" /></a>
{{--                            @if($course->image)--}}
{{--                                <img src="{{ asset($course->image) }}" alt="{{ $course->title }}"   />--}}
{{--                            @else--}}
{{--                                <a href="#"><img src="{{ asset('/') }}front/assets/img/course/01.jpg" alt=""></a>--}}
{{--                            @endif--}}
                        </div>
                        <div class="course-content">
                            <div class="course-meta">
                                <span class="course-category course-category-1">{{ $courseCategory->name }}</span>
{{--                                <div class="course-rate">--}}
{{--                                    <i class="fas fa-star"></i>--}}
{{--                                    <i class="fas fa-star"></i>--}}
{{--                                    <i class="fas fa-star"></i>--}}
{{--                                    <i class="fas fa-star"></i>--}}
{{--                                    <i class="fas fa-star"></i>--}}
{{--                                    <span>(40)</span>--}}
{{--                                </div>--}}
                            </div>
                            <a href="{{ route('front.course-details', [ 'course_id' => $course->id, 'title' => str_replace(' ', '-', $course->title) ]) }}"><h4 class="course-title">{{ $course->title }}</h4></a>
                            <div class="course-info">
                                <ul>
                                    <li class="course-lecture"><i class="fad fa-book-open"></i>{{ $course->total_class }} Lectures</li>
                                    <li class="course-duration"><i class="fad fa-clock"></i>{{ $course->total_hours }} Hours</li>
                                </ul>
                            </div>
                            <div class="course-bottom">
                                <a href="javascript:void(0)">
                                    <div class="course-instructor">
                                        <img src="{{ asset($course->user->profile_photo_path ? $course->user->profile_photo_path : 'front/assets/img/course/ins-1.jpg') }}" alt="{{ $course->user->name }}" style="height: 40px" />
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
                    @endforeach
                @endforeach
            </div>
            <div class="text-center">
                <a href="" class="theme-btn mt-5"><span class="fad fa-sync-alt"></span> Browse All Courses</a>
            </div>
        </div>
    </div>


    <div class="feature-area py-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="site-heading text-center">
                        <h2 class="site-title mb-2">Why You Learn <span>With Eduhub</span></h2>
                        <p>It is a long established fact that a reader will be distracted by the readable.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="feature-item">
                        <div class="feature-icon feature-icon-1">
                            <i class="far fa-book-open"></i>
                        </div>
                        <div class="feature-content">
                            <h4>320k Online Course</h4>
                            <p>It is a long established fact that a reader will be distracted by the readable
                                content of a page when looking at its layout.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="feature-item active">
                        <div class="feature-icon feature-icon-2">
                            <i class="far fa-users"></i>
                        </div>
                        <div class="feature-content">
                            <h4>Expert Instructors</h4>
                            <p>It is a long established fact that a reader will be distracted by the readable
                                content of a page when looking at its layout.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="feature-item">
                        <div class="feature-icon feature-icon-3">
                            <i class="far fa-clock"></i>
                        </div>
                        <div class="feature-content">
                            <h4>Lifetime Access</h4>
                            <p>It is a long established fact that a reader will be distracted by the readable
                                content of a page when looking at its layout.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="step-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="step-content">
                        <div class="site-heading">
                            <h2 class="site-title mb-10">Eduhub Learning <span>Steps For You</span></h2>
                            <p>
                                It is a long established fact that a reader will be distracted by the readable
                                content of a page when looking at its layout.
                            </p>
                        </div>
                        <div class="step-content-wrapper">
                            <div class="step-item">
                                <div class="step-count">
                                    <span>01.</span>
                                </div>
                                <div class="step-item-info">
                                    <h3>Find Best Course With Filter</h3>
                                    <p>There are many variations of passages of Lorem Ipsum available but the
                                        majority have suffered alteration.</p>
                                </div>
                            </div>
                            <div class="step-item">
                                <div class="step-count">
                                    <span>02.</span>
                                </div>
                                <div class="step-item-info">
                                    <h3>Enroll To Your Course</h3>
                                    <p>There are many variations of passages of Lorem Ipsum available but the
                                        majority have suffered alteration.</p>
                                </div>
                            </div>
                            <div class="step-item">
                                <div class="step-count">
                                    <span>03.</span>
                                </div>
                                <div class="step-item-info">
                                    <h3>Become Master in Your Field</h3>
                                    <p>There are many variations of passages of Lorem Ipsum available but the
                                        majority have suffered alteration.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="step-img">
                        <div class="video-wrapper">
                            <a class="play-btn popup-youtube" href="https://www.youtube.com/watch?v=ckHzmP1evNU">
                                <i class="fas fa-play"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="pricing-area py-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="site-heading text-center">
                        <h2 class="site-title">Pricing <span>Plan</span></h2>
                        <p>
                            It is a long established fact that a reader will be distracted by the readable.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="pricing-item">
                        <div class="pricing-header-wrapper">
                            <div class="pricing-header">
                                <h5>Starter Plan</h5>
                                <p>subscription</p>
                            </div>
                            <div class="pricing-amount">
                                <strong>$159</strong>
                            </div>
                            <div class="pricing-amount-type">
                                <span>Monthly Pricing Plan</span>
                            </div>
                        </div>
                        <div class="pricing-feature">
                            <ul>
                                <li><i class="far fa-check"></i>50 HD Videos</li>
                                <li><i class="far fa-check"></i>5 Personal Instructor</li>
                                <li><i class="far fa-check"></i>1,500 Active Members</li>
                                <li><i class="far fa-times text-danger"></i>Unlimited Courses</li>
                                <li><i class="far fa-times text-danger"></i>600 Quiezzes</li>
                            </ul>
                        </div>
                        <div class="pricing-footer">
                            <a href="#" class="theme-btn">Get Started Now <i class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="pricing-item">
                        <div class="pricing-header-wrapper">
                            <div class="pricing-header">
                                <h5>Advance Plan</h5>
                                <p>subscription</p>
                            </div>
                            <div class="pricing-amount">
                                <strong>$259</strong>
                            </div>
                            <div class="pricing-amount-type">
                                <span>Monthly Pricing Plan</span>
                            </div>
                        </div>
                        <div class="pricing-feature">
                            <ul>
                                <li><i class="far fa-check"></i>50 HD Videos</li>
                                <li><i class="far fa-check"></i>5 Personal Instructor</li>
                                <li><i class="far fa-check"></i>1,500 Active Members</li>
                                <li><i class="far fa-check"></i>Unlimited Courses</li>
                                <li><i class="far fa-times text-danger"></i>600 Quiezzes</li>
                            </ul>
                        </div>
                        <div class="pricing-footer">
                            <a href="#" class="theme-btn">Get Started Now <i class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="pricing-item">
                        <div class="pricing-header-wrapper">
                            <div class="pricing-header">
                                <h5>Premium Plan</h5>
                                <p>subscription</p>
                            </div>
                            <div class="pricing-amount">
                                <strong>$459</strong>
                            </div>
                            <div class="pricing-amount-type">
                                <span>Monthly Pricing Plan</span>
                            </div>
                        </div>
                        <div class="pricing-feature">
                            <ul>
                                <li><i class="far fa-check"></i>50 HD Videos</li>
                                <li><i class="far fa-check"></i>5 Personal Instructor</li>
                                <li><i class="far fa-check"></i>1,500 Active Members</li>
                                <li><i class="far fa-check"></i>Unlimited Courses</li>
                                <li><i class="far fa-check"></i>600 Quiezzes</li>
                            </ul>
                        </div>
                        <div class="pricing-footer">
                            <a href="#" class="theme-btn">Get Started Now <i class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="partner-area bg pt-120 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mx-auto">
                    <div class="site-heading text-center">
                        <h2 class="site-title">We collaborate with <span>250+ companies</span></h2>
                        <p>
                            There are many variations of passages orem psum available but the majority have suffered alteration in some form by injected humour.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-2">
                    <div class="partner-item">
                        <img src="{{ asset('/') }}front/assets/img/partner/01.png" alt="partner">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="partner-item">
                        <img src="{{ asset('/') }}front/assets/img/partner/02.png" alt="partner">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="partner-item">
                        <img src="{{ asset('/') }}front/assets/img/partner/03.png" alt="partner">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="partner-item">
                        <img src="{{ asset('/') }}front/assets/img/partner/04.png" alt="partner">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="partner-item">
                        <img src="{{ asset('/') }}front/assets/img/partner/05.png" alt="partner">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="partner-item">
                        <img src="{{ asset('/') }}front/assets/img/partner/06.png" alt="partner">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="partner-item">
                        <img src="{{ asset('/') }}front/assets/img/partner/07.png" alt="partner">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="partner-item">
                        <img src="{{ asset('/') }}front/assets/img/partner/08.png" alt="partner">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="partner-item">
                        <img src="{{ asset('/') }}front/assets/img/partner/09.png" alt="partner">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="instructor-area py-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="site-heading text-center">
                        <h2 class="site-title">Meet Our Best <span>Instructor</span></h2>
                        <p>
                            It is a long established fact that a reader will be distracted by the readable.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($teachers as $teacher)
                    <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="instructor-item">
                        <div class="instructor-img">
                            <a href="#"><img src="{{ asset($teacher->profile_photo_path ? $teacher->profile_photo_path : 'front/assets/img/instructor/01.jpg') }}" alt="{{ $teacher->name }}" style="height: 150px" /></a>
                        </div>
                        <div class="instructor-content">
                            <span class="instructor-tag">Trainer</span>
                            <a href="#" class="d-block"><h5 class="instructor-name">{{ $teacher->name }}</h5></a>
{{--                            <div class="instructor-rate">--}}
{{--                                <i class="fas fa-star"></i>--}}
{{--                                <i class="fas fa-star"></i>--}}
{{--                                <i class="fas fa-star"></i>--}}
{{--                                <i class="fas fa-star"></i>--}}
{{--                                <i class="fas fa-star"></i>--}}
{{--                                <span>(22 Reviews)</span>--}}
{{--                            </div>--}}
{{--                            <span class="instructor-enroll"><i class="far fa-user-friends"></i> 7.9k Students Enrolled</span>--}}
                            <div class="instructor-social">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-behance"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>


    <div class="testimonial-area bg py-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="site-heading text-center">
                        <h2 class="site-title">What Our <span>Students Say's</span></h2>
                        <p>
                            It is a long established fact that a reader will be distracted by the readable.
                        </p>
                    </div>
                </div>
            </div>
            <div class="testimonial-slider owl-carousel owl-theme">
                <div class="testimonial-single">
                    <div class="testimonial-quote">
                        <span class="testimonial-quote-icon"><i class="fal fa-quote-right"></i></span>
                        <p>
                            "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage."
                        </p>
                    </div>
                    <div class="testimonial-content">
                        <div class="testimonial-author-img">
                            <img src="{{ asset('/') }}front/assets/img/testimonial/01.png" alt>
                        </div>
                        <div class="testimonial-author-info">
                            <h4>Sylvia H Green</h4>
                            <p>Student</p>
                            <div class="testimonial-rate">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-single">
                    <div class="testimonial-quote">
                        <span class="testimonial-quote-icon"><i class="fal fa-quote-right"></i></span>
                        <p>
                            "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage."
                        </p>
                    </div>
                    <div class="testimonial-content">
                        <div class="testimonial-author-img">
                            <img src="{{ asset('/') }}front/assets/img/testimonial/02.png" alt>
                        </div>
                        <div class="testimonial-author-info">
                            <h4>Gordon D Novak</h4>
                            <p>Student</p>
                            <div class="testimonial-rate">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-single">
                    <div class="testimonial-quote">
                        <span class="testimonial-quote-icon"><i class="fal fa-quote-right"></i></span>
                        <p>
                            "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage."
                        </p>
                    </div>
                    <div class="testimonial-content">
                        <div class="testimonial-author-img">
                            <img src="{{ asset('/') }}front/assets/img/testimonial/03.png" alt>
                        </div>
                        <div class="testimonial-author-info">
                            <h4>Reid E Butt</h4>
                            <p>Student</p>
                            <div class="testimonial-rate">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testimonial-single">
                    <div class="testimonial-quote">
                        <span class="testimonial-quote-icon"><i class="fal fa-quote-right"></i></span>
                        <p>
                            "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage."
                        </p>
                    </div>
                    <div class="testimonial-content">
                        <div class="testimonial-author-img">
                            <img src="{{ asset('/') }}front/assets/img/testimonial/04.png" alt>
                        </div>
                        <div class="testimonial-author-info">
                            <h4>Parker Jimenez</h4>
                            <p>Student</p>
                            <div class="testimonial-rate">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="blog-area pt-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="site-heading text-center">
                        <h2 class="site-title">Latest News & <span>Blog</span></h2>
                        <p>
                            It is a long established fact that a reader will be distracted by the readable.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
{{--                @foreach($blogCategories as $blogCategory)--}}
                @foreach($blogs as $blog)
                    <div class="col-md-6 col-lg-4">
                    <div class="blog-item">
                        <div class="blog-item-img">
                            <img src="{{ asset($blog->image ? $blog->image : 'front/assets/img/blog/01.jpg') }}" alt="{{ $blog->title }}" style="height: 350px; width: 371px;" />
                        </div>
                        <div class="blog-item-info">
                            <div class="blog-item-meta">
                                <ul>
                                    <li><a href="#"><i class="far fa-user-circle"></i> By Alicia Davis</a></li>
                                    <li><a href="#"><i class="far fa-calendar-alt"></i> {{ $blog->created_at->format('M d, Y') }}</a></li>
                                </ul>
                            </div>
                            <h4 class="blog-title">
                                <a href="{{ route('front.blog-details', [ 'blog_id' => $blog->id, 'title' => str_replace(' ', '-', $blog->title) ]) }}">{{ $blog->title }}</a>
                            </h4>
                            <a class="blog-btn" href="{{--{{ route('front.blog-category', ['category_id' => $blogCategory->id, 'title' => $blogCategory->title]) }}--}}">Read More<i class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
{{--                @endforeach--}}
            </div>
        </div>
    </div>


    <div class="cta-area  py-120">
        <div class="container">
            <div class="cta-wrapper">
                <div class="cta-arrow-shape"><img src="{{ asset('/') }}front/assets/img/shape/shape-arrow.svg" alt></div>
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <div class="cta-content">
                            <h2>
                                Start today and get certified in Fundamentals of digital marketing
                            </h2>
                            <p>
                                Get unlimited access to 3,550+ of our top courses for your team.
                            </p>
                            <a href="#" class="cta-btn">Get Started Now</a>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="cta-img">
                            <img src="{{ asset('/') }}front/assets/img/cta/cta.jpg" alt>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
