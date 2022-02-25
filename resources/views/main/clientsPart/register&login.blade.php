@extends('main.index')
@section('mainBody')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_responsive.css') }}">
<div class="contact_form">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 offset-lg-1" >
                <div class="contact_form_container" style="border: 1px solid grey; padding:20px; border-radius: 25px;">
                    <div class="contact_form_title text-center">Sign In</div>

                    <form method="POST" action="{{ route('login') }}" id="contact_form">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter your email" required autofocus>
                        </div><!-- form-group -->
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter your password" required autocomplete="current-password" style="margin-bottom: 10px;">
                            @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">Forgot password?</a>
                            @endif
                        </div><!-- form-group -->
                        <button type="submit" class="btn btn-info">Sign In</button>
                    </form>
                    <br>
                    <button type="submit" class="btn btn-primary btn-block"><i class="fab fa-facebook-square"></i> Login with Facebook</button>
                    <button type="submit" class="btn btn-danger btn-block"><i class="fab fa-google"></i> Login with Google</button>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1" style="border: 1px solid grey; padding:20px; border-radius: 25px;">
                <div class="contact_form_container">
                    <div class="contact_form_title text-center">Sign Up</div>

                    <form method="POST" action="{{ route('register') }}" id="contact_form">
                        @csrf

                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter your fullname" required autofocus autocomplete="name">
                        </div><!-- form-group -->
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
                        </div><!-- form-group -->
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" required autocomplete="new-password" placeholder="Enter Password">
                        </div><!-- form-group -->
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                        </div><!-- form-group -->
                        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="mt-4">
                            <x-jet-label for="terms">
                                <div class="flex items-center">

                                    <div class="ml-2">
                                        <x-jet-checkbox name="terms" id="terms" />

                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                        ]) !!}
                                    </div>
                                </div>
                            </x-jet-label>
                        </div>
                        @endif
                        <button type="submit" class="btn btn-info">Sign Up</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="panel"></div>
</div>
@endsection