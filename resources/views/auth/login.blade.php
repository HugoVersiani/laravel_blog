@extends('layouts.app')

@section('content')
<section id="main-div" class="bg-light">
    <div class="login-div">
        <section class="login-div-2">
            <header class="">
                {{ __('Login') }}
            </header>
            <form class="" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="d-flex column align">
                    <label for="email" class="">
                        {{ __('E-Mail Address') }}:
                    </label>

                    <input id="input-login" type="email"
                        class=" @error('email') border-red-500 @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <p class="">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="d-flex column align">
                    <label for="password" class="">
                        {{ __('Password') }}:
                    </label>
                    <input id="input-login" type="password"
                        class=" @error('password') border-red-500 @enderror" name="password"
                        required>
                    @error('password')
                    <p class="text-red-500 ">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="d-flex column align">
                    <label class="" for="remember">
                        <input type="checkbox" name="remember" id="remember" class=""
                            {{ old('remember') ? 'checked' : '' }}>
                        <span class="ml-2">{{ __('Remember Me') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                    <a class=""
                        href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                </div>
                <div class="d-flex column align">
                    <button type="submit"
                    class="">
                        {{ __('Login') }}
                    </button>
                    @if (Route::has('register'))
                    <p class="">
                        <a class="" href="{{ route('register') }}">
                            {{ __('Fazer uma conta') }}
                        </a>
                    </p>
                    @endif
                </div>
            </form>
        </section>
      
    </div>
</section>
@endsection
