@extends('Layout.dash_template')

@section('title')
    Add Job
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
                        <h1 class="panel-title">Add Job</h1>
                    </div>
                    <form action="{{Route('job_added')}}" method="post">
                        {{csrf_field()}}
                        <div class="panel-body">
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">Title</span>
                                <input type="text" name="title" class="form-control" placeholder="Job title" aria-describedby="basic-addon1">
                            </div>
                            <br />
                            <div class="container-fluid">
                                <textarea name="description" id="" style="width:100%;"></textarea>
                            </div>
                            <div class="input-group input-group-sm" role="group">
                                <table>
                                    <tr>
                                        <td>
                                            <div class="btn btn-default" data-toggle="modal" data-target="#picture">
                                                <span class="glyphicon glyphicon-picture"></span>
                                            </div>
                                        </td>
                                        <td>
                                            <input type="date" name="date" placeholder="date of the job">
                                        </td>
                                        <td>
                                            @if(!empty($branches))
                                                <fieldset>
                                                    <select name="branch_id" class="form-control" data-style="btn-new" id="select">
                                                        <option value="">Pick branch</option>
                                                        @foreach($branches as $branch)
                                                            <option value="{{$branch->id}}">{{$branch->location}} : {{$branch->address}}</option>
                                                        @endforeach
                                                    </select>
                                                </fieldset>
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="col-md-offset-10">
                                <button class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                        <!-- Modal -->
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
                                            <input type="text" name="image" class="form-control" placeholder="insert image URL" aria-describedby="basic-addon1">
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
            </div>
        </div>
    </div>
@endsection