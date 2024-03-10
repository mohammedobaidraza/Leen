@extends('include.header')



@section('content')
    <div class="profile-card">
        <div class="card-header">
            <div class="profile-image">
                <img src="{{asset('img/boy.png')}}" alt="Marie Horwitz" />
            </div>
            <h2>{{auth()->user()->name}}</h2>
            <p>{{auth()->user()->major_in_university}}</p>
        </div>
        <div class="card-body">
            <h3>Information</h3>
            <div class="info">
                <div class="email">
                    <span>Email</span>
                    <span>{{auth()->user()->email}}</span>
                </div>
            </div>
            @if(auth()->user()->role == 1)
            <h3>Admin Control</h3>
            <div class="info">
                <div class="email">
                    <a href="{{route('home2')}}">display XML for popular posts</a>
                </div>
            </div>
            @endif
            <div class="social-links">

                <a href="{{route('profile_update')}}" class="social-link">Update</a>

            </div>
        </div>
    </div>


{{--    @if()--}}

{{--    @endif--}}
    <script>
        document.getElementById('imageUpload').addEventListener('change', function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('profileImage');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        });

    </script>
@endsection
