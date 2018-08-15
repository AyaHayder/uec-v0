@extends('Layout.master')

@section('title')
    Register
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
                <form class="form-horizontal" action="{{Route('register')}}" method="post">
                    {{csrf_field()}}
                    <h2>Sign up</h2>
                    <div class="form-group" >
                        <label class="col-sm-2 control-label">First Name</label>
                        <div class="input-group"><span class="input-group-addon " aria-hidden="true" id="basic-addon1">
                                <span class="glyphicon glyphicon-user"></span></span>
                            <input type="text" name="first_name" class="form-control" placeholder="First Name" aria-describedby="basic-addon1">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Last Name</label>
                        <div class="input-group">
                            <span class="input-group-addon " aria-hidden="true" id="basic-addon1">
                                <span class="glyphicon glyphicon-user"></span>
                            </span>
                            <input type="text" name="last_name" class="form-control" placeholder="Last Name" aria-describedby="basic-addon1">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-addon" aria-hidden="true" id="basic-addon1">
                                <span class="glyphicon glyphicon-envelope"></span>
                            </span>
                            <input type="email" name="email" class="form-control" placeholder="Email" aria-describedby="basic-addon1">
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
                        <label class="col-sm-2 control-label">Confirm password </label>
                        <div class="input-group">
                            <span class="input-group-addon" aria-hidden="true" id="basic-addon1">
                                <span class="glyphicon glyphicon-lock"></span>
                            </span>
                            <input type="password" name="confirm_password" class="form-control" placeholder="Password" aria-describedby="basic-addon1">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection