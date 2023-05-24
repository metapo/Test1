@extends('layout')

@section('style')
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-signin input {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
@endsection

@section('content')

<main class="form-signin">
    <ul class="text-danger text-sm-start">
        @error('email')
        <li> <strong>{{ $message }}</strong></li>
        @enderror

        @error('password')
        <li> <strong>{{ $message }}</strong></li>
        @enderror
    </ul>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-floating">
            <input type="email" name="email"  class="form-control" id="floatingInput" placeholder="name@example.com" value="{{ old('email') }}" required>
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
            <input type="password" name="password" required class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>

        <div class="form-check mb-2">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

            <label class="form-check-label" for="remember">
                {{ __('Remember Me') }}
            </label>
        </div>

        <div>
            <button class="w-50 btn btn-lg btn-primary" type="submit">{{ __('Login') }}</button>
            <a class=" btn btn-link" href="{{ route('register') }}">
                {{ __('Register') }}
            </a>
        </div>

    </form>
</main>

@endsection
