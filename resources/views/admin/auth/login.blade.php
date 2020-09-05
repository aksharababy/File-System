@extends('layouts.admin.auth-app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-group">
                <div class="card p-4">
                    <div class="card-body">
                        <h1>Login</h1>
                        <p class="text-muted">Sign In to your account</p>
                        <form method="POST" action="{{ route('admin.login.submit') }}">

                            {{ csrf_field() }}
                                <div class="row mb-2 ml-1">
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-addon"><i class="icon-user"></i></span>
                                    <input type="text" name="email" value="{{ old('email') }}" class="form-control" required
                                           autofocus placeholder="email">
                                </div>
                                <div class="input-group mb-4">
                                    <span class="input-group-addon"><i class="icon-lock"></i></span>
                                    <input type="password" name="password" class="form-control" placeholder="Password"
                                           required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary px-4 ml-3">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection