@extends('layout')
@section('title', 'Reset Password')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            @if (session()->has('status'))
            <div class="alert alert-success">
                {{ session()->get('status') }}
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
            <h2>Forgot Password?</h2>

            <form action="{{ route('password.email') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                <input type="email" id="email" name="email"  class="form-control" value="{{ old('email') }}" placeholder="Email" required autofocus>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-md">Send Password Reset Link</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

