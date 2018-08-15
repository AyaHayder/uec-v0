@extends('Layout.dash_template')

@section('title')
    Make Admin
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

@section('contents')
    <div class="container container-table">
        <div class="row vertical-center-row">
            <div class="text-center col-md-8 col-md-offset-2">
                @if($errors->count()>0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title"> Manage Users:</h1>
                    </div>
                    <div class="panel-body">
                        @if(!empty($users))
                            <form action="{{Route('manage_user')}}" method="post">
                                {{csrf_field()}}
                                <br />
                                <div class="col-md-4 col-md-offset-1">
                                    <select name="select_users" class="form-control">
                                        <option value="">Pick user</option>
                                        @foreach($users as $user)
                                            @if(!($user == Auth::user()))
                                                <option value="{{$user->id}}">{{$user->full_name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <div class="btn-group">
                                       @if(!($user == Auth::user()))
                                            <button type="submit" name="remove_admin" class="btn btn-primary">
                                                Remove Admin
                                            </button>
                                            <button type="submit" name="make_admin" class="btn btn-primary">
                                                Make Admin
                                            </button>
                                            <button type="submit" name="delete" class="btn btn-primary">
                                                Delete
                                            </button>
                                       @endif
                                    </div>
                                </div>
                            </form>
                        @else
                            <h3>There are no users yet!</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row vertical-center-row">
            <div class="text-center col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title">Users</h1>
                    </div>
                    <div class="panel-body">
                        @if(!empty($users))
                            <table style="width: 100%;" class="table table-responsive table-hover">
                                <thead>
                                <tr>
                                    <th style="text-align: center">Full Name</th>
                                    <th style="text-align: center">Email</th>
                                    <th style="text-align: center">Registration Date</th>
                                </tr>
                                </thead>
                                @foreach($users as $user)
                                    <tbody>
                                    <tr>
                                        <td>{{$user->full_name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->created_at}}</td>
                                    </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        @endif
                    </div>
                    <div class="panel-footer">
                        {{$users->links()}}
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection




