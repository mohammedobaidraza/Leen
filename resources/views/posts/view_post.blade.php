@extends('include.header')
<style>
    .container {
        padding-top: 0px;
    }

    textarea#comment {
        width: 100%;
        resize: vertical; /* Allows vertical resize, not horizontal */
    }

    .btn-custom {
        width: fit-content;
        height: fit-content;
    }


    .social-actions {
        display: flex;
    }

    .like-button,
    .share-button {
        background-color: #73233f;
        color: #ffffff;
        border: none;
        padding: 5px 10px;
        margin-left: 5px;
        cursor: pointer;
    }

</style>
@section('content')

    <div style="padding-bottom: 60px" class="container">


        <div class="col-4 col-md-4 col-lg-4 pt-1">

            <section id="demos" class="tags">

                <div class="row">
                    <div style="margin-left: 25%; margin-right: 25%">
                        <div class="large-12 columns py-5">
                            <div class="owl-carousel owl-carousel1  owl-theme">
                                @foreach($categories as $cat_data)
                                    <div class="item">
                                        <a href="{{route('category_id',$cat_data->id)}}">{{Str::lower($cat_data->name)}}</a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>


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
{{--    @if (session('success'))--}}
{{--        <div class="col-6 col-md-6 col-lg-4 d-flex justify-content-end align-items-center">--}}

{{--            <div class="alert alert-success">--}}
{{--                {{ session('success') }}--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    @endif--}}
    <div class="wrapper">

        <div class="left-section">

            <h2>{{$post->post_topic}}</h2>
            <div class="post">
                <p>{{$post->post_content}}</p>
                <div class="date-author">

                    {{$post->created_at->format('F,j,Y')}} | By {{$post->writer->name}}
                </div>
                <br>

                <div class="social-actions p-2">

                    @php($is_found = 0)

                    @if($like_post != null)
                        @foreach($like_post->likes as $like_data)

                            @if($like_data->user->name == auth()->user()->name)
                                @php($is_found = 1)
                            @endif
                        @endforeach
                        @if($is_found == 0)
                            <form id="LikeID" method="POST" action="{{ route('likes.like', $post->id) }}">
                                @csrf
                                <a id="LikeID" onclick="LikeID" type="submit">
                                    <i style="color: darkred" class="fa-regular fa-heart fa-xl"></i> {{$post->post_likes}}
                                </a>
                            </form>
                            @else
                                <form id="LikeID" method="POST" action="{{ route('likes.unlike', $post->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <a id="LikeID" onclick="LikeID" type="submit">
                                        <i style="color: darkred" class="fa-solid fa-heart fa-xl"></i> {{$post->post_likes}}
                                    </a>
                                </form>
                        @endif
                    @endif
                </div>
                <br>
                <div class="tag {{strtolower($post->category->name)}}">{{$post->category->name}}
                </div>

            </div>

        </div>
    </div>
    <div class="wrapper-comment">

        <div class="left-section-comment">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <h2 class="text-center">Comments</h2>
                        <form method="POST" action="{{route('comments_store',$post->id)}}">
                            @csrf
                            <div class="form-group">
                                <textarea name="body" class="form-control border rounded-1  p-4 bg-input" id="comment"
                                          rows="3" placeholder="Add a new comment"></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-custom">Add Comment</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="wrapper-comment">

        <div class="left-section-comment">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <h2 class="text-center">All Comments</h2>
                        @if($comment != null)

                            @foreach($comment->comments as $comment_data)
                                <div class="post">
                                    <p>{{$comment_data->user->name}} replied:</p>
                                    <h3>[ {{$comment_data->body}} ]</h3>
                                    <div class="date-author">

                                    </div>
                                </div>

                            @endforeach

                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>


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
    <script>
        document.getElementById("LikeID").onclick = function () {
            document.getElementById("LikeID").submit();
        }
    </script>
@endsection
@extends('include.footer')
