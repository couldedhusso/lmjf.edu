@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('userFirstName') ? ' has-error' : '' }}">
                            <label for="userFirstName" class="col-md-4 control-label">Nom</label>

                            <div class="col-md-6">
                                <input id="userFirstName" type="text" class="form-control" name="userFirstName" value="{{ old('userFirstName') }}" required autofocus>

                                @if ($errors->has('userFirstName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('userFirstName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="userLastName" class="col-md-4 control-label">Prenoms</label>

                            <div class="col-md-6">
                                <input id="userLastName" type="text" class="form-control" name="userLastName" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('userLastName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('userLastName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('userContact') ? ' has-error' : '' }}">
                            <label for="userContact" class="col-md-4 control-label">Contact</label>

                            <div class="col-md-6">
                                <input id="userContact" type="text" class="form-control" name="userContact" value="{{ old('userContact') }}" required autofocus>

                                @if ($errors->has('userContact'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('userContact') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <input type="hidden" name="userRole" value="2">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
