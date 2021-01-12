@extends('layout')

@section('title', 'Sign Up for an Account')

@section('content')
<div class="container">
    <div class="auth-pages">
        <div>
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
            <h2>Create Account</h2>
            <div class="spacer"></div>
                <form action="{{ route('register') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Your name"
                               required autofocus>
                    </div>
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
                        <label for="confirm-password">Password</label>
                        <input type="password" class="form-control" id="password" name="password_confirmation" value="{{ old('password') }}"
                               placeholder="Confirm Password" required>
                    </div>
                    <div class="form-group">
                        <div class="login-container">
                            <p> <button type="submit" class="btn btn-primary btn-md right">Create Account</button>
                                <strong>Already have an account?</strong>
                                <a href="{{ route('login') }}">Login</a></p>
                        </div>
                    </div>



                </form>
        </div>

    </div> <!-- end auth-pages -->
</div>
@endsection
