@extends('include.header')


@section('content')

    <div class="profile-card">
        <div class="card-header">
            <div class="profile-image">
                <img src="{{asset('img/boy.png')}}" alt="Marie Horwitz"/>
            </div>


            <h2>{{auth()->user()->name}}</h2>
            <p>{{auth()->user()->major_in_university}}</p>
        </div>
        <form class=" overflow-hidden" method="POST" action="{{route('user_update')}}">
            @csrf
            <div class="row">
            <div class="card-body">
                <h3>Information</h3>
                <div class="info">
                    <div class="email">
                        <span>Name</span>
                        <div class="form-group">
                            <input name="name" style="padding-right: 35px;"  class="border rounded-2" placeholder="{{auth()->user()->name}}"
                                   type="text" value="{{auth()->user()->name}}">
                        </div>
                    </div>
                    <div class="email">
                        <span>Email</span>
                        <div class="form-group">
                        <input name="email" style="padding-right: 35px;" class="border rounded-2" placeholder="{{auth()->user()->email}}"
                               type="text" value="{{auth()->user()->email}}">
                        </div>
                    </div>
                </div>
                <h3>Major</h3>
                <div class="projects">
                    <span>@if(auth()->user()->major_in_university != null) {{auth()->user()->major_in_university}} @endif</span>
                    <div class="form-group">
                    <input name="major_in_university" style="padding-right: 35px;" class="border rounded-2" placeholder="{{auth()->user()->major_in_university}}"
                           type="text" @if(auth()->user()->major_in_university != null) value="{{auth()->user()->major_in_university}}" @endif>
                    </div>
                </div>

                <div class="social-links">

                    <button type="submit">Update Profile</button>


                </div>

    </div>
            </div>
        </form>
    </div>


    {{--    @if()--}}

    {{--    @endif--}}
    <script>
        document.getElementById('imageUpload').addEventListener('change', function (event) {
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('profileImage');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        });

    </script>
@endsection
@extends('include.footer')

