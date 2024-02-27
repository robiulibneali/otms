@extends('front.master')

@section('title' , 'Blog Details')

@section('body')
    <div class="site-breadcrumb">
            <div class="hero-shape-area">
                <img class="hero-shape-1" src="{{ asset('/') }}front/assets/img/shape/shape-1.png" alt>
                <img class="hero-shape-2" src="{{ asset('/') }}front/assets/img/shape/shape-3.png" alt>
                <img class="hero-shape-3" src="{{ asset('/') }}front/assets/img/shape/shape-6.png" alt>
                <img class="hero-shape-4" src="{{ asset('/') }}front/assets/img/shape/shape-4.png" alt>
            </div>
            <div class="container">
                <h2 class="breadcrumb-title">Blog Details</h2>
                <ul class="breadcrumb-menu">
                    <li><a href="{{ route('front.home') }}">Home</a></li>
                    <li class="active">{{ $blog->title }}</li>
                    <li class="active">Blog Details</li>
                </ul>
            </div>
        </div>


        <div class="blog-single-area pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="blog-single-wrapper">
                            <div class="blog-single-content">
                                <div class="blog-thumb-img">
                                    <img src="{{ asset($blog->image ?? 'front/assets/img/blog/single.jpg') }}" alt="{{ $blog->title }}" style="height: 511px; width: 766px;" />
                                </div>
                                <div class="blog-info">
                                    <div class="blog-meta">
                                        <div class="blog-meta-left">
                                            <ul>
                                                <li><i class="far fa-user"></i><a href="#">Author Name</a></li>
                                                <li><i class="far fa-comments"></i>3.2k Comments</li>
                                                <li><i class="far fa-thumbs-up"></i>1.4k Like</li>
                                            </ul>
                                        </div>
                                        <div class="blog-meta-right">
                                            <a href="#" class="share-btn"><i class="far fa-share-alt"></i>Share</a>
                                        </div>
                                    </div>
                                    <div class="blog-details">
                                        <h3 class="blog-details-title mb-20">{{ $blog->title }}</h3>
                                        <blockquote class="blockqoute">
                                            {{ $blog->short_description }}
                                            <h6 class="blockqoute-author">Author Name</h6>
                                        </blockquote>
                                        <p class="mb-20">
                                            {!! $blog->long_description !!}
                                        </p>
                                        <div class="row">
                                            <div class="col-md-6 mb-20">
                                                <img src="{{ asset('/') }}front/assets/img/blog/01.jpg" alt>
                                            </div>
                                            <div class="col-md-6 mb-20">
                                                <img src="{{ asset('/') }}front/assets/img/blog/02.jpg" alt>
                                            </div>
                                        </div>
                                        <hr class="blog-single-hr">
                                        <div class="blog-details-tags pb-20">
                                            <h5>Tags : </h5>
                                            <ul>
                                                <li><a href="#">Design</a></li>
                                                <li><a href="#">Education</a></li>
                                                <li><a href="#">App</a></li>
                                                <li><a href="#">Online</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="blog-author">
                                        <div class="blog-author-img">
                                            <img src="{{ asset('/') }}front/assets/img/blog/author.jpg" alt>
                                        </div>
                                        <div class="author-info">
                                            <h6>Author</h6>
                                            <h3 class="author-name">Roger D Duque</h3>
                                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout that it has a more less.</p>
                                            <div class="author-social">
                                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                                <a href="#"><i class="fab fa-twitter"></i></a>
                                                <a href="#"><i class="fab fa-instagram"></i></a>
                                                <a href="#"><i class="fab fa-whatsapp"></i></a>
                                                <a href="#"><i class="fab fa-youtube"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="blog-comments">
                                    <h3>Comments (20)</h3>
                                    <div class="blog-comments-wrapper">
                                        <div class="blog-comments-single">
                                            <img src="{{ asset('/') }}front/assets/img/blog/com-1.jpg" alt="thumb">
                                            <div class="blog-comments-content">
                                                <h5>Jesse Sinkler</h5>
                                                <span><i class="far fa-clock"></i> 11 May, 2023</span>
                                                <p>There are many variations of passages the majority have suffered in some injected humour or randomised words which don't look even slightly believable.</p>
                                                <a href="#"><i class="far fa-reply"></i> Reply</a>
                                            </div>
                                        </div>
                                        <div class="blog-comments-single blog-comments-reply">
                                            <img src="{{ asset('/') }}front/assets/img/blog/com-2.jpg" alt="thumb">
                                            <div class="blog-comments-content">
                                                <h5>Daniel Wellman</h5>
                                                <span><i class="far fa-clock"></i> 11 May, 2023</span>
                                                <p>There are many variations of passages the majority have suffered in some injected humour or randomised words which don't look even.</p>
                                                <a href="#"><i class="far fa-reply"></i> Reply</a>
                                            </div>
                                        </div>
                                        <div class="blog-comments-single">
                                            <img src="{{ asset('/') }}front/assets/img/blog/com-3.jpg" alt="thumb">
                                            <div class="blog-comments-content">
                                                <h5>Kenneth Evans</h5>
                                                <span><i class="far fa-clock"></i> 11 May, 2023</span>
                                                <p>There are many variations of passages the majority have suffered in some injected humour or randomised words which don't look even slightly believable.</p>
                                                <a href="#"><i class="far fa-reply"></i> Reply</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="blog-comments-form">
                                        <h3>Leave A Comment</h3>
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="Your Name*">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="email" class="form-control" placeholder="Your Email*">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <textarea class="form-control" rows="5" placeholder="Your Comment*"></textarea>
                                                    </div>
                                                    <button type="submit" class="theme-btn"><i class="far fa-paper-plane"></i> Post Comment</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <aside class="sidebar">

                            <div class="widget search">
                                <h5 class="widget-title">Search</h5>
                                <form class="search-form">
                                    <input type="text" class="form-control" placeholder="Search Here...">
                                    <button type="submit"><i class="far fa-search"></i></button>
                                </form>
                            </div>

                            <div class="widget category">
                                <h5 class="widget-title">Category</h5>
                                <div class="category-list">
                                    <a href="#"><i class="far fa-angle-double-right"></i>Online Education<span>(10)</span></a>
                                    <a href="#"><i class="far fa-angle-double-right"></i>Business<span>(15)</span></a>
                                    <a href="#"><i class="far fa-angle-double-right"></i>Video And Tips<span>(20)</span></a>
                                    <a href="#"><i class="far fa-angle-double-right"></i>UI/UX Design<span>(25)</span></a>
                                    <a href="#"><i class="far fa-angle-double-right"></i>Web Development<span>(30)</span></a>
                                </div>
                            </div>

                            <div class="widget recent-post">
                                <h5 class="widget-title">Recent Post</h5>
                                <div class="recent-post-single">
                                    <div class="recent-post-img">
                                        <img src="{{ asset('/') }}front/assets/img/blog/bs-1.jpg" alt="thumb">
                                    </div>
                                    <div class="recent-post-bio">
                                        <h6><a href="#">It is a long established fact that a reader</a></h6>
                                        <span><i class="far fa-clock"></i>11 May, 2023</span>
                                    </div>
                                </div>
                                <div class="recent-post-single">
                                    <div class="recent-post-img">
                                        <img src="{{ asset('/') }}front/assets/img/blog/bs-2.jpg" alt="thumb">
                                    </div>
                                    <div class="recent-post-bio">
                                        <h6><a href="#">It is a long established fact that a reader</a></h6>
                                        <span><i class="far fa-clock"></i>11 May, 2023</span>
                                    </div>
                                </div>
                                <div class="recent-post-single">
                                    <div class="recent-post-img">
                                        <img src="{{ asset('/') }}front/assets/img/blog/bs-3.jpg" alt="thumb">
                                    </div>
                                    <div class="recent-post-bio">
                                        <h6><a href="#">It is a long established fact that a reader</a></h6>
                                        <span><i class="far fa-clock"></i>11 May, 2023</span>
                                    </div>
                                </div>
                            </div>

                            <div class="widget social-share">
                                <h5 class="widget-title">Follow Us</h5>
                                <div class="social-share-link">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-dribbble"></i></a>
                                    <a href="#"><i class="fab fa-whatsapp"></i></a>
                                    <a href="#"><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>

                            <div class="widget sidebar-tag">
                                <h5 class="widget-title">Popular Tags</h5>
                                <div class="tag-list">
                                    <a href="#">Education</a>
                                    <a href="#">Course</a>
                                    <a href="#">Skills</a>
                                    <a href="#">Development</a>
                                    <a href="#">Videos</a>
                                    <a href="#">App</a>
                                    <a href="#">Online</a>
                                    <a href="#">Performance</a>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
@endsection
