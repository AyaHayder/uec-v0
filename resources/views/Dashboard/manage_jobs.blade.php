@extends('Layout.dash_template')

@section('title')
    Manage Jobs
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
                @if(!empty($jobs))
                    @foreach($jobs as $job)
                        <div class="panel panel-default">
                            <form action="{{Route('update_job')}}" method="post">
                                {{csrf_field()}}
                                <div class="panel-heading">
                                    <h1 class="panel-title">Job {{$loop->index +1}}</h1>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1">Title</span>
                                                <input type="text" name="title" value="{{$job->title}}" class="form-control" placeholder="Activity title" aria-describedby="basic-addon1">
                                            </div>
                                            <br />
                                            <div class="container-fluid">
                                                <textarea name="description" rows="17" style="width:100%;">
                                                    {{$job->description}}
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="thumbnail">
                                                <img src="{{$job->image}}" class="img-responsive" style="height:410px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-group input-group-sm" role="group">
                                            <table>
                                                <tr>
                                                    <td>
                                                        <div class="btn btn-default" data-toggle="modal" data-target="#picture">
                                                            <span class="glyphicon glyphicon-picture"></span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <input type="date" name="date" value="{{$job->date}}" placeholder="date of the activity">
                                                    </td>
                                                    <td>
                                                        <fieldset>
                                                            <select name="branch_id" class="form-control" data-style="btn-new" id="select">
                                                                @if(!empty($job->branch->id))
                                                                    <option value="{{$job->branch->id}}">{{$job->branch->location}} : {{$job->branch->address}}</option>
                                                                    @foreach($branches as $branch)
                                                                        @if(!($job->branch->address === $branch->address) &&($job->branch->location === $branch->location))
                                                                            <option value="{{$branch->id}}">{{$branch->location}} : {{$branch->address}}</option>
                                                                        @endif
                                                                    @endforeach
                                                                @else
                                                                    <option value="">Deleted branch</option>
                                                                    @foreach($branches as $branch)
                                                                        <option value="{{$branch->id}}">{{$branch->location}} : {{$branch->address}}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </fieldset>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <input name="job_id" type="hidden" value="{{$job->id}}">
                                    @if(!empty($job->user->id))
                                    <h5>
                                        Added by: {{$job->user->full_name}}
                                    </h5>
                                    @else
                                        <h5>
                                            Added by: Deleted user
                                        </h5>
                                    @endif
                                    <div class="col-md-offset-8">
                                        <div class="btn-group">
                                            <a href="/admin/dashboard/job/delete/{{$job->id}}" class="btn btn-primary">
                                                Delete
                                            </a>
                                            <button type="submit" class="btn btn-primary">
                                                change
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="picture" tabindex="-1" role="dialog" aria-labelledby="picture">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="picture">Add picture</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="input-group">
                                                    <span class="input-group-addon" id="basic-addon1">
                                                        <span class="glyphicon glyphicon-plus"></span>
                                                    </span>
                                                    <input type="text" name="image" value="{{$job->image}}" class="form-control" placeholder="insert image URL" aria-describedby="basic-addon1">
                                                </div>
                                                <br />
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="reset" name="delete" class="btn btn-primary">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endforeach
                    {{$jobs->links()}}
                @endif
            </div>
        </div>
    </div>
@endsection