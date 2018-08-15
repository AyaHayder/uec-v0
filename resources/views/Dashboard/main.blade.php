@extends('Layout.dash_template')

@section('title')
Dashboard
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
        {{--Activities--}}
        <div class="row vertical-center-row">
            <div class="text-center col-md-10 col-md-offset-1">
                @if($errors->count()>0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title">Activities</h1>
                    </div>
                    <div class="panel-body">
                        @if(!empty($activities))
                            <table style="width: 100%;" class="table table-responsive table-hover">
                                <thead>
                                <tr>
                                    <th style="text-align: center">Title</th>
                                    <th style="text-align: center">Creation Date</th>
                                    <th style="text-align: center">Created By</th>
                                </tr>
                                </thead>
                                @foreach($activities as $activity)
                                    <tbody>
                                    <tr>
                                        <td>{{$activity->title}}</td>
                                        <td>{{$activity->created_at}}</td>
                                        @if(!empty($activity->user))
                                            <td>{{$activity->user->full_name}}</td>
                                        @else
                                            <td>Deleted user</td>
                                        @endif
                                    </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        {{--end of activities--}}

        {{--Announcements--}}
        <div class="row vertical-center-row">
            <div class="text-center col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title">Announcements</h1>
                    </div>
                    <div class="panel-body">
                        @if(!empty($announcements))
                            <table style="width: 100%;" class="table table-responsive table-hover">
                                <thead>
                                <tr>
                                    <th style="text-align: center">Title</th>
                                    <th style="text-align: center">Creation Date</th>
                                    <th style="text-align: center">Created By</th>
                                </tr>
                                </thead>
                                @foreach($announcements as $announcement)
                                    <tbody>
                                    <tr>
                                        <td>{{$announcement->title}}</td>
                                        <td>{{$announcement->created_at}}</td>
                                        @if(!empty($announcement->user))
                                            <td>{{$announcement->user->full_name}}</td>
                                        @else
                                            <td>Deleted user</td>
                                        @endif
                                    </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        {{--end of announcements--}}

        {{--Services--}}
        <div class="row vertical-center-row">
            <div class="text-center col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title">Services</h1>
                    </div>
                    <div class="panel-body">
                        @if(!empty($services))
                        <table style="width: 100%;" class="table table-responsive table-hover">
                            <thead>
                            <tr>
                                <th style="text-align: center">Title</th>
                                <th style="text-align: center">Creation Date</th>
                                <th style="text-align: center">Created By</th>
                            </tr>
                            </thead>
                            @foreach($services as $service)
                                <tbody>
                                <tr>
                                    <td>{{$service->title}}</td>
                                    <td>{{$service->created_at}}</td>
                                    @if(!empty($service->user))
                                        <td>{{$service->user->full_name}}</td>
                                    @else
                                        <td>Deleted user</td>
                                    @endif
                                </tr>
                                </tbody>
                            @endforeach
                        </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        {{--end of services--}}

        {{--Jobs--}}
        <div class="row vertical-center-row">
            <div class="text-center col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title">Jobs</h1>
                    </div>
                    <div class="panel-body">
                        @if(!empty($jobs))
                            <table style="width: 100%;" class="table table-responsive table-hover">
                                <thead>
                                <tr>
                                    <th style="text-align: center">Title</th>
                                    <th style="text-align: center">Creation Date</th>
                                    <th style="text-align: center">Created By</th>
                                </tr>
                                </thead>
                                @foreach($jobs as $job)
                                    <tbody>
                                    <tr>
                                        <td>{{$job->title}}</td>
                                        <td>{{$job->created_at}}</td>
                                        @if(!empty($job->user))
                                            <td>{{$job->user->full_name}}</td>
                                        @else
                                            <td>Deleted user</td>
                                        @endif
                                    </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        {{--end of Jobs--}}

        {{--partners--}}
        <div class="row vertical-center-row">
            <div class="text-center col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title">Partners</h1>
                    </div>
                    <div class="panel-body">
                        @if(!empty($partners))
                            <table style="width: 100%;" class="table table-responsive table-hover">
                                <thead>
                                <tr>
                                    <th style="text-align: center">name</th>
                                    <th style="text-align: center">Creation Date</th>
                                    <th style="text-align: center">Created By</th>
                                </tr>
                                </thead>
                                @foreach($partners as $partner)
                                    <tbody>
                                    <tr>
                                        <td>{{$partner->name}}</td>
                                        <td>{{$partner->created_at}}</td>
                                        @if(!empty($partner->user))
                                            <td>{{$partner->user->full_name}}</td>
                                        @else
                                            <td>Deleted user</td>
                                        @endif
                                    </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        {{--end of partners--}}

        {{--branches--}}
        <div class="row vertical-center-row">
            <div class="text-center col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title">Branches</h1>
                    </div>
                    <div class="panel-body">
                        @if(!empty($branches))
                            <table style="width: 100%;" class="table table-responsive table-hover">
                                <thead>
                                <tr>
                                    <th style="text-align: center">Location</th>
                                    <th style="text-align: center">Address</th>
                                    <th style="text-align: center">Creation Date</th>
                                    <th style="text-align: center">Created By</th>
                                </tr>
                                </thead>
                                @foreach($branches as $branch)
                                    <tbody>
                                    <tr>
                                        <td>{{$branch->location}}</td>
                                        <td>{{$branch->address}}</td>
                                        <td>{{$branch->created_at}}</td>
                                        @if(!empty($branch->user))
                                            <td>{{$branch->user->full_name}}</td>
                                        @else
                                            <td>Deleted user</td>
                                        @endif
                                    </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        {{--end of branches--}}

        {{--contact info--}}
        <div class="row vertical-center-row">
            <div class="text-center col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title">Contact Information</h1>
                    </div>
                    <div class="panel-body">
                        @if(!empty($contacts))
                            <table style="width: 100%;" class="table table-responsive table-hover">
                                <thead>
                                <tr>
                                    <th style="text-align: center">Email</th>
                                    <th style="text-align: center">Telephone</th>
                                    <th style="text-align: center">Creation Date</th>
                                </tr>
                                </thead>
                                @foreach($contacts as $contact)
                                    <tbody>
                                    <tr>
                                        <td>{{$contact->email}}</td>
                                        <td>{{$contact->telephone}}</td>
                                        <td>{{$contact->created_at}}</td>
                                    </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        {{--end of contact info--}}

        {{--users--}}
        <div class="row vertical-center-row">
            <div class="text-center col-md-10 col-md-offset-1">
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
        {{--end of users--}}
    </div>

@endsection
