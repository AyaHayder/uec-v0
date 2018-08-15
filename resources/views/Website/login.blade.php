@extends('Layout.master')
@section('title')
    Login
@endsection

@section('message')
    @if(Session::has('message'))
        <div class="alert alert-info text-center">{{ Session::get('message') }}</div>
    @endif
    @if(Session::has('updated'))
        <div class="alert alert-success text-center">
            <span class="glyphicon glyphicon-ok"></span>
            {{ Session::get('updated') }}
        </div>
    @endif
    @if(Session::has('failed'))
        <div class="alert alert-warning text-center">
            <span class="glyphicon glyphicon-remove"></span>
            {{ Session::get('failed') }}
        </div>
    @endif
@endsection

@section('style')
    html, body, .container-table {
    height: 100%;
    }

    .container-table {
    display: table;
    }
    .vertical-center-row {
    display: table-cell;
    vertical-align: middle;
    }
@endsection

@section('content')
    <div class="container container-table">
        <div class="row vertical-center-row">
            <div class="text-center col-md-6 col-md-offset-3">
                @if($errors->count()>0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </div>
                @endif
                <form class="form-horizontal" action="{{Route('login')}}" method="post">
                    {{csrf_field()}}
                    <h2>Member Login</h2>
                    <div class="form-group" >
                        <label class="col-sm-2 control-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-addon " aria-hidden="true" id="basic-addon1">
                                <span class="glyphicon glyphicon-user"></span>
                            </span>
                            <input type="text" name="email" class="form-control" placeholder="Email" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Password </label>
                        <div class="input-group">
                            <span class="input-group-addon" aria-hidden="true" id="basic-addon1">
                                <span class="glyphicon glyphicon-lock"></span>
                            </span>
                            <input type="password" name="password" class="form-control" placeholder="Password" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-1 col-sm-10">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember_me"> Keep me logged in
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-1 col-sm-10">
                            <button type="submit" class="btn btn-default">Sign in</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection