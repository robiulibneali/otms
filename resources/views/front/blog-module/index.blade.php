@extends('front.master')

@section('title' , 'Blogs')

@section('body')
    <div class="site-breadcrumb">
            <div class="hero-shape-area">
                <img class="hero-shape-1" src="{{ asset('/') }}front/assets/img/shape/shape-1.png" alt>
                <img class="hero-shape-2" src="{{ asset('/') }}front/assets/img/shape/shape-3.png" alt>
                <img class="hero-shape-3" src="{{ asset('/') }}front/assets/img/shape/shape-6.png" alt>
                <img class="hero-shape-4" src="{{ asset('/') }}front/assets/img/shape/shape-4.png" alt>
            </div>
            <div class="container">
                <h2 class="breadcrumb-title">Our Blog</h2>
                <ul class="breadcrumb-menu">
                    <li><a href="{{ route('front.home') }}">Home</a></li>
                    <li class="active">{{ $category->title }}</li>
                    <li class="active">Blog</li>
                </ul>
            </div>
        </div>


        <div class="blog-area py-120">
            <div class="container">
                <div class="row">
                    @foreach($blogs as $blog)
                        <div class="col-md-6 col-lg-4">
                        <div class="blog-item">
                            <div class="blog-item-img">
                                <img src="{{ asset($blog->image ? $blog->image : 'front/assets/img/blog/01.jpg') }}" alt="{{ $blog->title }}" style="height: 260px; width: 371px;" />
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
                                <a class="blog-btn" href="#">Read More<i class="far fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="pagination-area">
                    <div aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true"><i class="far fa-angle-double-left"></i></span>
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true"><i class="far fa-angle-double-right"></i></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
@endsection
