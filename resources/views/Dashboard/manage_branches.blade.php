@extends('Layout.dash_template')

@section('title')
    Manage Branches
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
                @if(!empty($branches))
                    @foreach($branches as $branch)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h1 class="panel-title">Branch {{$loop->index +1}}</h1>
                            </div>
                            <form action="{{Route('branch_update')}}" method="post">
                                {{csrf_field()}}
                                <div class="panel-body">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">Location</span>
                                        <input name="location" value="{{$branch->location}}" type="text" class="form-control" aria-describedby="basic-addon1">
                                    </div>
                                    <br />
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">Address</span>
                                        <input name="address" value="{{$branch->address}}" type="text" class="form-control" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <input name="branch_id" type="hidden" value="{{$branch->id}}">
                                    <h5>
                                        Added by: {{$branch->user->full_name}}
                                    </h5>
                                    <div class="col-md-offset-8">
                                        <div class="btn-group">
                                            <a href="/admin/dashboard/branch/delete/{{$branch->id}}" class="btn btn-primary">
                                                Delete
                                            </a>
                                            <button type="submit" class="btn btn-primary">
                                                change
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endforeach
                    {{$branches->links()}}
                @endif
            </div>
        </div>
        <br/>
        <div class="row vertical-center-row">
            <div class="text-center col-md-8 col-md-offset-2">
                <div class="row vertical-center-row">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1 class="panel-title">Add Branch</h1>
                        </div>
                        <form action="{{Route('create_branch')}}" method="post">
                            {{csrf_field()}}
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">
                                            <span class="glyphicon glyphicon-globe"></span>
                                        </span>
                                            <input type="text" name="location" class="form-control" placeholder="Location Name" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">
                                            <span class="glyphicon glyphicon-map-marker"></span>
                                        </span>
                                            <input type="text" name="address" class="form-control" placeholder="Address" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <div class="col-md-offset-10">
                                    <button class="btn btn-primary">
                                        Submit
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