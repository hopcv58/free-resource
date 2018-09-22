@extends('auth.master')

@section('content')
    <div class="form-main-login">
        <p class="name-logo">
            <img src="{{asset('/images/logo.png')}}" height="30px" width="200px">
        </p>
        <div class="row" style="padding: 0 50px">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                {{csrf_field()}}
                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <input id="username" type="text" class="form-control" name="username"
                               value="{{ old('username') }}" required autofocus placeholder="Username">

                        @if ($errors->has('username'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <input id="name" type="text" class="form-control" name="name"
                               value="{{ old('name') }}" required autofocus placeholder="Company name">
                        @if ($errors->has('name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <input id="email" type="email" class="form-control" name="email"
                               value="{{ old('email') }}" required placeholder="E-Mail Address">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <input id="phone" type="text" class="form-control" name="phone"
                               value="{{ old('phone') }}" required autofocus placeholder="Phone">

                        @if ($errors->has('phone'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <input id="address" type="text" class="form-control" name="address"
                               value="{{ old('address') }}" required autofocus placeholder="Address">

                        @if ($errors->has('address'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <input id="password" type="password" class="form-control" name="password" required placeholder="Password">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <input id="password-confirm" type="password" class="form-control"
                               name="password_confirmation" required placeholder="Confirm Password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-0">
                        <a href="{{route('login')}}"><button type="button" class="btn btn-primary btn-facebook" style="width: 100%">Back to Login</button></a>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary" style="width: 100%">
                            Register
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
    {{--<div class="example">--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-8 col-md-offset-2">--}}
                {{--<div class="panel panel-default">--}}
                    {{--<div class="panel-heading">Register</div>--}}
                    {{--<div class="panel-body">--}}
                        {{--<form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">--}}
                            {{--{{ csrf_field() }}--}}

                            {{--<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">--}}
                                {{--<label for="username" class="col-md-4 control-label">Username</label>--}}

                                {{--<div class="col-md-6">--}}
                                    {{--<input id="username" type="text" class="form-control" name="username"--}}
                                           {{--value="{{ old('username') }}" required autofocus>--}}

                                    {{--@if ($errors->has('username'))--}}
                                        {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('username') }}</strong>--}}
                                    {{--</span>--}}
                                    {{--@endif--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">--}}
                                {{--<label for="name" class="col-md-4 control-label">Company name</label>--}}

                                {{--<div class="col-md-6">--}}
                                    {{--<input id="name" type="text" class="form-control" name="name"--}}
                                           {{--value="{{ old('name') }}" required autofocus>--}}

                                    {{--@if ($errors->has('name'))--}}
                                        {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('name') }}</strong>--}}
                                    {{--</span>--}}
                                    {{--@endif--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
                                {{--<label for="email" class="col-md-4 control-label">E-Mail Address</label>--}}

                                {{--<div class="col-md-6">--}}
                                    {{--<input id="email" type="email" class="form-control" name="email"--}}
                                           {{--value="{{ old('email') }}" required>--}}

                                    {{--@if ($errors->has('email'))--}}
                                        {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('email') }}</strong>--}}
                                    {{--</span>--}}
                                    {{--@endif--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">--}}
                                {{--<label for="phone" class="col-md-4 control-label">Phone</label>--}}

                                {{--<div class="col-md-6">--}}
                                    {{--<input id="phone" type="text" class="form-control" name="phone"--}}
                                           {{--value="{{ old('phone') }}" required autofocus>--}}

                                    {{--@if ($errors->has('phone'))--}}
                                        {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('phone') }}</strong>--}}
                                    {{--</span>--}}
                                    {{--@endif--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">--}}
                                {{--<label for="address" class="col-md-4 control-label">Address</label>--}}

                                {{--<div class="col-md-6">--}}
                                    {{--<input id="address" type="text" class="form-control" name="address"--}}
                                           {{--value="{{ old('address') }}" required autofocus>--}}

                                    {{--@if ($errors->has('address'))--}}
                                        {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('address') }}</strong>--}}
                                    {{--</span>--}}
                                    {{--@endif--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}
                                {{--<label for="password" class="col-md-4 control-label">Password</label>--}}

                                {{--<div class="col-md-6">--}}
                                    {{--<input id="password" type="password" class="form-control" name="password" required>--}}

                                    {{--@if ($errors->has('password'))--}}
                                        {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                                    {{--@endif--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group">--}}
                                {{--<label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>--}}

                                {{--<div class="col-md-6">--}}
                                    {{--<input id="password-confirm" type="password" class="form-control"--}}
                                           {{--name="password_confirmation" required>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group">--}}
                                {{--<div class="col-md-6 col-md-offset-4">--}}
                                    {{--<button type="submit" class="btn btn-primary">--}}
                                        {{--Register--}}
                                    {{--</button>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</form>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
@endsection
