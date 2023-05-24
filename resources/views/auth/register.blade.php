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

        .form-register {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }

        .form-register .checkbox {
            font-weight: 400;
        }

        .form-register .form-floating:focus-within {
            z-index: 2;
        }

        .form-register input {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
@endsection

@section('content')

    <main class="form-register">
        <ul class="text-danger text-sm-start">
            @error('name')
            <li> <strong>{{ $message }}</strong></li>
            @enderror

            @error('email')
            <li> <strong>{{ $message }}</strong></li>
            @enderror

            @error('password')
            <li> <strong>{{ $message }}</strong></li>
            @enderror
        </ul>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-floating">
                <input type="text" name="name"  class="form-control" id="floatingName" placeholder="Name"  value="{{ old('name') }}" required>
                <label for="floatingName">Name</label>
            </div>
            <div class="form-floating">
                <input type="email" name="email"  class="form-control" id="floatingInput" placeholder="Email address" value="{{ old('email') }}" required>
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" name="password" required class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <div class="form-floating">
                <input type="password" name="password_confirmation" required class="form-control" id="floatingPasswordConfirm" placeholder="Password confirm">
                <label for="floatingPasswordConfirm">Password confirm</label>
            </div>

            <div>
                <button class="w-50 btn btn-lg btn-primary" type="submit">{{ __('Register') }}</button>
                <a class=" btn btn-link" href="{{ route('login') }}">
                    {{ __('Login') }}
                </a>
            </div>

        </form>
    </main>

@endsection
