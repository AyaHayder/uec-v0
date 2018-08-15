@extends('Layout.master')

@section('title')
    {{$user->full_name}}
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

@section('content')

    {{--<h1 class="text-center">Profile: {{$user->full_name}}</h1>--}}
    <div class="container container-table">
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
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="thumbnail" style=" height:130px;width: 130px;">
                                    <img src="{{$user->avatar}}" class="align-center img-responsive img-rounded" id="profilePic" alt="avatar">
                                    <div class="caption">
                                        <button class="btn btn-default btn-xs dropdown-toggle" id="button" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="glyphicon glyphicon-camera"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="#changePic" data-toggle="modal">Change picture</a>
                                            </li>
                                            <li>
                                                <a href="#viewPic" data-toggle="modal">View picture</a>
                                            </li>
                                            <li>
                                                <a href="{{Route('delete_profile_pic')}}">Delete picture</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h1 style="color: black">
                                    {{$user->full_name}}
                                </h1>
                                <a href="#changeName" id="edit" data-toggle="modal">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <h4>
                                    <a href="#changeEmail" id="edit" data-toggle="modal">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    &nbsp;Email: {{$user->email}}
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                @if(!empty($user->activity))
                   <div class="panel panel-default">
                       <div class="panel-heading">
                           <h4>
                               {{$user->first_name}}'s Activities:
                           </h4>
                       </div>
                       <div class="panel-body">
                           <div class="row">
                               <div class="col-md-8 col-md-offset-2">
                                   <table style="width: 100%;">
                                       <thead>
                                       <tr>
                                           <th style="text-align: center">Title</th>
                                           <th style="text-align: center">Creation Date</th>
                                       </tr>
                                       </thead>
                                       @foreach($user->activity as $activity)
                                           <tbody>
                                            <tr>
                                               <td>{{$activity->title}}</td>
                                               <td>{{$activity->created_at}}</td>
                                            </tr>
                                           </tbody>
                                       @endforeach
                                   </table>
                               </div>
                           </div>
                       </div>
                   </div>
                @endif
                @if(!empty($user->announcement))
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>
                                {{$user->first_name}}'s Announcements:
                            </h4>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <table style="width: 100%;">
                                        <thead>
                                        <tr>
                                            <th style="text-align: center">Title</th>
                                            <th style="text-align: center">Creation Date</th>
                                        </tr>
                                        </thead>
                                        @foreach($user->announcement as $announcement)
                                            <tbody>
                                            <tr>
                                                <td>{{$announcement->title}}</td>
                                                <td>{{$announcement->created_at}}</td>
                                            </tr>
                                            </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if(!empty($user->service))
                    <div class="panel panel-default">
                         <div class="panel-heading">
                             <h4>
                                 {{$user->first_name}}'s Services:
                             </h4>
                         </div>
                         <div class="panel-body">
                             <div class="row">
                                 <div class="col-md-8 col-md-offset-2">
                                     <table style="width: 100%;">
                                         <thead>
                                            <tr>
                                                <th style="text-align: center">Title</th>
                                                <th style="text-align: center">Creation Date</th>
                                            </tr>
                                         </thead>
                                         @foreach($user->service as $service)
                                             <tbody>
                                             <tr>
                                                 <td>{{$service->title}}</td>
                                                 <td>{{$service->created_at}}</td>
                                             </tr>
                                             </tbody>
                                         @endforeach
                                     </table>
                                 </div>
                             </div>
                         </div>
                    </div>
                @endif
                @if(!empty($user->branch))
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>
                                Branches that are added by {{$user->first_name}}:
                            </h4>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <table style="width: 100%;">
                                        <thead>
                                        <tr>
                                            <th style="text-align: center">Branch</th>
                                            <th style="text-align: center">Creation Date</th>
                                        </tr>
                                        </thead>
                                        @foreach($user->branch as $branch)
                                            <tbody>
                                            <tr>
                                                <td>{{$branch->location}}: {{$branch->address}}</td>
                                                <td>{{$branch->created_at}}</td>
                                            </tr>
                                            </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if(!empty($user->job))
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>
                                Jobs that are added by {{$user->first_name}}:
                            </h4>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <table style="width: 100%;">
                                        <thead>
                                        <tr>
                                            <th style="text-align: center">Job</th>
                                            <th style="text-align: center">Creation Date</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($user->job as $job)
                                            <tr>
                                                <td>{{$job->title}}</td>
                                                <td>{{$job->created_at}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if(!empty($user->partner))
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>
                                Partners that are added by {{$user->first_name}}:
                            </h4>
                        </div>
                        <div class="panel-body">
                            <br />
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <table style="width: 100%;">
                                        <thead>
                                        <tr>
                                            <th style="text-align: center">Partner</th>
                                            <th style="text-align: center">Creation Date</th>
                                        </tr>
                                        </thead>
                                        @foreach($user->partner as $partner)
                                            <tbody>
                                            <tr>
                                                <td>{{$partner->name}}</td>
                                                <td>{{$partner->created_at}}</td>
                                            </tr>
                                            </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>



    <!--View Picture Modal -->
    <div class="modal fade" id="viewPic" tabindex="-1" role="dialog" aria-labelledby="viewPicLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="viewPicLabel">Profile Picture</h4>
                </div>
                <div class="modal-body">
                    <div class="thumbnail">
                        <img src="{{$user->avatar}}" class="align-center img-responsive img-rounded" alt="avatar">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Change Picture Modal -->
    <div class="modal fade" id="changePic" tabindex="-1" role="dialog" aria-labelledby="changePicLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="changePicLabel">Profile Picture</h4>
                </div>
                <div class="modal-body">
                    <form action="{{Route('change_profile_pic')}}" method="post">
                        {{csrf_field()}}
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">
                                <span class="glyphicon glyphicon-plus"></span>
                            </span>
                            <input type="text" name="avatar" class="form-control" placeholder="insert image URL" aria-describedby="basic-addon1">
                        </div>
                        <br />
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Change</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Change Username Modal -->
    <div class="modal fade" id="changeName" tabindex="-1" role="dialog" aria-labelledby="changeNameLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="changeNameLabel">Change Username</h4>
                </div>
                <div class="modal-body">
                    <form action="{{Route('change_username')}}" method="post">
                        {{csrf_field()}}
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">
                                <span class="glyphicon glyphicon-user"></span>
                            </span>
                            <input type="text" name="first_name" value="{{$user->first_name}}" class="form-control" placeholder="First Name" aria-describedby="basic-addon1">
                        </div>
                        <br />
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">
                                <span class="glyphicon glyphicon-user"></span>
                            </span>
                            <input type="text" name="last_name" value="{{$user->last_name}}" class="form-control" placeholder="Last Name" aria-describedby="basic-addon1">
                        </div>
                        <br />
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Change</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Change Email Modal -->
    <div class="modal fade" id="changeEmail" tabindex="-1" role="dialog" aria-labelledby="changeEmailLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="changeEmailLabel">Change Username</h4>
                </div>
                <div class="modal-body">
                    <form action="{{Route('change_email')}}" method="post">
                        {{csrf_field()}}
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">
                                <span class="glyphicon glyphicon-envelope"></span>
                            </span>
                            <input type="text" name="email" value="{{$user->email}}" class="form-control" placeholder="Email" aria-describedby="basic-addon1">
                        </div>
                        <br />
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Change</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

