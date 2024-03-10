@extends('layouts.post_layout')

@section('content')


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="wrapper signin">
            <div class="left-section">
                <div class="text-center">
                    <h1>Create a new Post</h1>
                    <form class=" overflow-hidden p-5" method="POST" action="{{route('create_post')}}">
                        @csrf
                        <div class="row">
                            <div class="title col-10 px-7 d-flex justify-content-between ">
                            <div class="form-group">
                                <label for="Title">{{__('Title')}}</label>
                                <input class="border rounded-2 p-3 bg-input @error('name') is-invalid @enderror"
                                       type="text" name="post_topic" id="name">
                            </div>
                            </div>

                            <div class="col-md-12 signup-form px-7 my-4">
                            <div class="form-group">
                                <label >{{ __('Category') }}</label>
                                <select name="category_id" class="border rounded-2 p-5 bg-input w-100">
                                    @if($category != null)
                                        <option name="category_id"  class="border rounded-2 p-3 bg-input " selected  >Open this select menu</option>
                                    @foreach($category as $cate=> $value)
                                            <option name="category_id" value="{{$value->id}}" class="border rounded-2 p-3 bg-input "  >{{$value->name}}</option>
                                        @endforeach
                                    @else
                                        <option name="category_id"  class="border rounded-2 p-3 bg-input " selected  >Open this select menu</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="email">{{ __('Content') }}</label>
                                <textarea name="post_content" style="height: 250px;" class="border rounded-1  p-4 bg-input "  placeholder="Write your post content here" id="floatingTextarea2" style="height: 100px"></textarea>

                            </div>
                                <button type="submit" class="btn btn-lg"> {{ __('Create') }}</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- You can add your right-section here as per your needs -->

        </div>

{{--    <div class="wrapper signin">--}}
{{--        <div class="left-section">--}}
{{--            <h1>Write a new post</h1>--}}

{{--            <main role="main" class="container profile-page">--}}
{{--                <div class="row ">--}}
{{--                    <div class="title col-10 px-7 d-flex justify-content-between ">--}}
{{--                    </div>--}}
{{--                    <div class="col-md-10 signup-form px-7 my-4">--}}
{{--                        <div class="form-group">--}}
{{--                            <input class="border rounded-2 p-3 bg-input w-100" type="text" name="title" id="story-name"--}}
{{--                                   placeholder="Title">--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="exampleFormControlSelect1"></label>--}}
{{--                            <select name="category_id" class="border rounded-2 p-3 bg-input w-100"--}}
{{--                                    id="exampleFormControlSelect1">--}}
{{--                                <!-- BUG No Category To Display -->--}}
{{--                                <option value="" class="border rounded-2 p-3 bg-input w-100">Category 1</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                    <button type="submit" class="btn btn-sm btn-dark rounded-2  px-4 py-2">Create</button>--}}


{{--                </div>--}}


{{--            </main>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    </form>--}}

@endsection
@extends('include.footer')
