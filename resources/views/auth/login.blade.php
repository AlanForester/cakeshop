@extends('layout')

@section('title', 'Login')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                @if (session()->has('success_message'))
                    <div class="alert alert-success">
                        {{ session()->get('success_message') }}
                    </div>
                @endif @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h2>Returning Customer</h2>
                <div class="spacer"></div>

                <form action="{{ route('login') }}" method="POST">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="email">EMail</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="client@mail.ru"
                               required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}"
                               placeholder="*****" required>
                    </div>
                        <div class="form-group">
                        <div class="login-container">
                            <button type="submit" class="btn btn-primary btn-md right">Login</button>
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember
                                Me
                            </label>
                        </div>
                    </div>


                    <a href="{{ route('password.request') }}">
                        Forgot Your Password?
                    </a>

                </form>
            </div>

            <div class="col-md-6">
                <h2>New Customer?</h2>
                <div class="spacer"></div>
                <p><strong>Save time now.</strong></p>
                <p>You don't need an account to checkout.</p>
                <a href="{{ route('guestCheckout.index') }}" class="btn btn-warning btn-md right">Continue as Guest</a>
                <p></p>
                <p><strong>Save time later.</strong></p>
                <p>Create an account for fast checkout and easy access to order history.</p>
                <a href="{{ route('register') }}" class="btn btn-success btn-md">Create Account</a>

            </div>
        </div>
    </div>
@endsection
