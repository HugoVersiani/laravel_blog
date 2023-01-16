@extends('layouts.app')

@section('content')
<section id="main-div" class="bg-light">
        <section class="login-div">
            <form class="form_login" method="POST" action="{{ route('login') }}">
                @csrf
                    <div>
                        <label for="email" class="">
                            {{ __('E-mail') }}:
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
                    <div >
                        <label for="password" class="">
                            {{ __('Senha') }}:
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
                    {{-- <div >
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
                    </div> --}}
                <div class="login-div-buttons">
                    @if (Route::has('register'))
                        <p class="">
                            <a class="" href="{{ route('register') }}">
                                {{ __('Fazer uma conta') }}
                            </a>
                        </p>
                    @endif
                     <button type="submit"
                        class="border-red">
                        <a class="link-style-red">
                        {{ __('Login') }}
                        </a>
                    </button>
                </div>
            </form>
        </section>
</section>
@endsection
