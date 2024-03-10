
@extends('layouts.app')

@section('content')
    <div class="wrapper signin">
        <div class="left-section">
            <div class="text-center">
                <form class=" overflow-hidden p-5" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="row">
                        <div class="form-group">
                            <label for="username">{{__('Name')}}</label>
                            <input class="border rounded-2 p-3 bg-input @error('name') is-invalid @enderror"
                                   type="text" name="name" id="name">
                        </div>

                        <div class="form-group">
                            <label for="email">{{ __('Email Address') }}</label>
                            <input class="border rounded-2 p-3 bg-input @error('email') is-invalid @enderror"
                                   type="email" name="email" id="email" placeholder="name@example.com">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>
                            <input class="border rounded-2 p-3 bg-input @error('password') is-invalid @enderror"
                                   name="password" type="password" id="password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="border rounded-2 p-3 bg-input"
                                   name="password_confirmation">
                        </div>

                        <button type="submit" class="btn btn-sm"> {{ __('Register') }}</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- You can add your right-section here as per your needs -->

    </div>
@endsection
