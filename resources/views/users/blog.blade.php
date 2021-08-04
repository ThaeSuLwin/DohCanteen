@extends('users.layouts.master')
@section('content')
 <div id="content">

    <!-- Page Title -->
    <div class="page-title bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-4">
                    <h1 class="mb-0">Blog</h1>
                    <h4 class="text-muted mb-0">Some informations about our restaurant</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Page Content -->
    <div class="page-content bg-light">

        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <!-- Post / Item -->
                    @foreach ($blogs as $blog)
                        
                   {{-- {{dd($blogArray)}} --}}
                    <article class="post post-wide animated" data-animation="fadeIn">
                        <div class="post-image"><img src="{{asset('storage/blog_images/'.$blog->image)}}" alt=""></div>
                        <div class="post-content">
                            <ul class="post-meta">
                                <li>{{$blog->date}}</li>
                                <li>
                                    From {{ Carbon\Carbon::parse($blog->start_time)->format('g:i A')}}
                                    To   {{ Carbon\Carbon::parse($blog->end_time)->format('g:i A')}}
                                </li>
                               
                                <li>by {{$blog->organization_name}}</li>
                            </ul>
                            <h4><a href="blog-post.html">{{$blog->title}}</a></h4>
                            <p>{{$blog->description}}</p>

                        </div>
                    </article>

                    @endforeach
                    
                    <!-- Pagination -->
                    <nav aria-label="Page navigation" class="mt-5">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                {{$blogs}}
                            </li>
                            {{-- <li class="page-item"><a class="page-link active" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <i class="ti ti-arrow-right"></i>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li> --}}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

    </div>

    <!-- Footer -->
    <footer id="footer" class="bg-dark dark">

        <div class="container">
            <!-- Footer 1st Row -->
            <div class="footer-first-row row">
                <div class="col-lg-3 text-center">
                    <a href="index.html"><img src="assets/img/logo-light.svg" alt="" width="88" class="mt-5 mb-5"></a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h5 class="text-muted">Latest news</h5>
                    <ul class="list-posts">
                        <li>
                            <a href="blog-post.html" class="title">How to create effective webdeisign?</a>
                            <span class="date">February 14, 2015</span>
                        </li>
                        <li>
                            <a href="blog-post.html" class="title">Awesome weekend in Polish mountains!</a>
                            <span class="date">February 14, 2015</span>
                        </li>
                        <li>
                            <a href="blog-post.html" class="title">How to create effective webdeisign?</a>
                            <span class="date">February 14, 2015</span>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-5 col-md-6">
                    <h5 class="text-muted">Subscribe Us!</h5>
                    <!-- MailChimp Form -->
                    <form action="//suelo.us12.list-manage.com/subscribe/post-json?u=ed47dbfe167d906f2bc46a01b&amp;id=24ac8a22ad" id="sign-up-form" class="sign-up-form validate-form mb-5" method="POST">
                        <div class="input-group">
                            <input name="EMAIL" id="mce-EMAIL" type="email" class="form-control" placeholder="Tap your e-mail..." required>
                            <span class="input-group-btn">
                                <button class="btn btn-primary btn-submit" type="submit">
                                    <span class="description">Subscribe</span>
                                    <span class="success">
                                        <svg x="0px" y="0px" viewBox="0 0 32 32"><path stroke-dasharray="19.79 19.79" stroke-dashoffset="19.79" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="square" stroke-miterlimit="10" d="M9,17l3.9,3.9c0.1,0.1,0.2,0.1,0.3,0L23,11"/></svg>
                                    </span>
                                    <span class="error">Try again...</span>
                                </button>
                            </span>
                        </div>
                    </form>
                    <h5 class="text-muted mb-3">Social Media</h5>
                    <a href="#" class="icon icon-social icon-circle icon-sm icon-facebook"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="icon icon-social icon-circle icon-sm icon-google"><i class="fa fa-google"></i></a>
                    <a href="#" class="icon icon-social icon-circle icon-sm icon-twitter"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="icon icon-social icon-circle icon-sm icon-youtube"><i class="fa fa-youtube"></i></a>
                    <a href="#" class="icon icon-social icon-circle icon-sm icon-instagram"><i class="fa fa-instagram"></i></a>
                </div>
            </div>
            <!-- Footer 2nd Row -->
            <div class="footer-second-row">
                <span class="text-muted">Copyright Soup 2020©. Made with love by Suelo.</span>
            </div>
        </div>

        <!-- Back To Top -->
        <button id="back-to-top" class="back-to-top"><i class="ti ti-angle-up"></i></button>

    </footer>
    <!-- Footer / End -->

</div>

@endsection