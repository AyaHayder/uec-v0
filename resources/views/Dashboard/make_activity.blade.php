@extends('Layout.dash_template')

@section('title')
    Make activity
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
                        <h1 class="panel-title">Create a new activity</h1>
                    </div>
                    <form action="{{Route('make_activity')}}" method="post">
                        {{csrf_field()}}
                        <div class="panel-body">
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">Title</span>
                                <input type="text" name="title" class="form-control" placeholder="Activity title" aria-describedby="basic-addon1">
                            </div>
                            <br />
                            <div class="container-fluid">
                                <textarea name="contents" id="" style="width:100%;"></textarea>
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
                                            <input type="date" name="activity_date" placeholder="date of the activity">
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
                                        <form action="" method="post">
                                            {{csrf_field()}}
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon1">
                                                    <span class="glyphicon glyphicon-plus"></span>
                                                </span>
                                                <input type="text" name="header_photo" class="form-control" placeholder="insert image URL" aria-describedby="basic-addon1">
                                            </div>
                                            <br />
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="reset" name="delete" class="btn btn-primary">Delete</button>
                                        </form>
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