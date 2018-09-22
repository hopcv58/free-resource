@extends('auth.master')

@section('content')
    <div class="form-main-login">
        <p class="name-logo">
            <img src="{{asset('/images/logo.png')}}" height="30px" width="200px">
        </p>
        <div class="row" style="padding: 0 50px">
            <form action="{{route('login')}}" method="post" class="form-horizontal">
                {{csrf_field()}}
                <div class="form-group has-feedback {{$errors->has('username') ? ' has-error' : ''}}">
                    <div class="col-md-12">
                        <input type="username" class="form-control" placeholder="Username" name="username"
                               value="{{old('username')}}">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        @if($errors->has('username'))
                            <span class="help-block">
                                    <strong>{{$errors->first('username')}}</strong>
                                </span>
                        @endif
                    </div>

                </div>
                <div class="form-group has-feedback {{$errors->has('password') ? ' has-error' : ''}}">
                    <div class="col-md-12">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        @if($errors->has('password'))
                            <span class="help-block">
                                <strong>{{$errors->first('password')}}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                @if(session('login_fail'))
                    <span class="col-md-offset-0 text-danger"><strong>{{session('login_fail')}}</strong></span>
                @endif
                <div class="form-group">
                    <div class="col-md-12 col-md-offset-0">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" name="remember" {{old('remember')? 'checked' : ''}}> Remember
                                Me
                            </label>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-0">
                        <button type="submit" class="btn btn-primary btn-facebook" style="width: 100%">Sign In</button>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('register')}}"><button type="button" class="btn btn-success" style="width: 100%">or Register</button></a>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection