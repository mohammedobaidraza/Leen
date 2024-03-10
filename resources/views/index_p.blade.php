@extends('include.header')


@section('content')

    <div style="padding-bottom: 60px" class="container">
        <br>
        <br>

        <div class="col-4 col-md-4 col-lg-4 pt-1">

            <section id="demos" class="tags">

                <div class="row">
                    <div style="margin-left: 25%; margin-right: 25%">
                        <div class="large-12 columns py-5">
                            <div class="owl-carousel owl-carousel1  owl-theme">
                                <div class="item">
                                    <a href="#">Roommates</a>
                                </div>
                                <div class="item">
                                    <a href="#">Books</a>
                                </div>
                                <div class="item">
                                    <a href="#">Courses</a>
                                </div>
                                <div class="item">
                                    <a href="#">Events</a>
                                </div>
                                <div class="item">
                                    <a href="#">Advice</a>
                                </div>
                                <div class="item">
                                    <a href="#">Other</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>




    <div class="col-6 col-md-6 col-lg-4 d-flex justify-content-end align-items-center">

        <div class="rectangle">
            <div class="image">
                <!-- You can either use an <img> tag or use a background image with CSS -->
            </div>
            <div class="line"></div>
            <div class="text-content">
                <p>Loyola Community Platform centralizes roommate matching, book trading, and course discussions for
                    students. Replacing fragmented social media posts, it offers a cohesive, secure experience. Built
                    responsively, it ensures seamless access across devices.</p>
            </div>
        </div>
        @if (session('success'))
            <div class="col-6 col-md-6 col-lg-4 d-flex justify-content-end align-items-center">

                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            </div>
        @endif
        <div class="wrapper">

            <div class="left-section">
                <h2>Popular posts</h2>
                @if(isset($xmlArray['post']) && is_array($xmlArray['post']))

                    @foreach ($xmlArray['post'] as $post)

                        <div class="post">
                            <a href="{{route('view_post',$post['id'])}}"><h1>{{ $post['title'] ?? 'No Title' }}</h1></a>
                            <p>{{ Str::limit($post['content'] ?? 'No Content' ,100,'...')}}</p>
                            <div class="date-author">{{ $post['date'] ?? 'No Date' }} |
                                By {{ $post['author'] ?? 'Anonymous' }} | Likes {{ $post['likes'] ?? '0' }} |
                                Comments {{ $post['comments'] ?? '0' }} </div>
                            <div
                                class="tag @if(Str::lower($post['category']) =='events') {{Str::lower($post['category'])}}_cat @else {{Str::lower($post['category'])}}@endif">{{ $post['category'] ?? 'No Date' }}</div>
                        </div>
                    @endforeach
                @else
                    <p>No posts found.</p>
                @endif
            </div>

            <div class="right-section">

                <div class="new-posts">
                    <h2>New Posts</h2>

                    <!-- Sample post, you can duplicate for more -->
                    @if(isset($new_posts))

                        @foreach($new_posts as $data)
                            <div class="new-post">
                                <a href="{{route('view_post',$data->id)}}">
                                    <p>{{Str::limit($data->post_topic,25,'...')}}</p></a>
                                <div class="date-author">{{$data->created_at->format('F,j,Y')}}|
                                    By {{$data->writer->name}}</div>
                            </div>
                        @endforeach

                    @endif


                </div>
                <div class="new-posts">
                    <h2>Categories</h2>
                    <!-- Sample post, you can duplicate for more -->
                    <div class="new-post">
                        @if(isset($categories))

                        @foreach($categories as $cat_data)

                            <a href="{{route('category_id',$cat_data->id)}}">
                                <div
                                    class="tag @if(Str::lower($cat_data->name) == 'events'){{Str::lower($cat_data->name)}}_cat @else{{Str::lower($cat_data->name)}} @endif">{{Str::lower($cat_data->name)}}</div>
                            </a>
                        @endforeach
                        @endif

                    </div>


                </div>
            </div>
        </div>

    </div>
    </body>
    <script src="{{asset('js/bootstrap.bundle.js')}}"></script>
    <script src="{{asset('js/bootstrap-tagsinput.js')}}"></script>
    <script src="{{asset('js/bootstrap-tagsinput-angular.js')}}"></script>
    <script src="{{asset('owlcarousel/owl.carousel.js')}}"></script>
    <script src="{{asset('js/jquery-te-1.4.0.min.js')}}"></script>
    <script>


    </script>
    <script>
        $(document).ready(function () {
            var owl = $(".owl-carousel1");
            owl.owlCarousel({
                rtl: true,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 2500,
                autoplayHoverPause: true,
                nav: true,
                loop: true,
                responsive: {
                    0: {
                        items: 2,
                    },
                    600: {
                        items: 5,
                    },
                    1000: {
                        items: 8,
                    },
                },
            });
        });
    </script>
    @extends('include.footer')
@endsection

