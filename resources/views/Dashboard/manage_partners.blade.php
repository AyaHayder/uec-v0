@extends('Layout.dash_template')

@section('title')
    Manage Partners
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
                @if(!empty($partners))
                    @foreach($partners as $partner)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h1 class="panel-title">Partner {{$loop->index +1}}</h1>
                            </div>
                            <form action="{{Route('update_partner')}}" method="post">
                                {{csrf_field()}}
                                <div class="panel-body">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">Name</span>
                                        <input name="name" value="{{$partner->name}}" type="text" class="form-control" aria-describedby="basic-addon1">
                                    </div>
                                    <br />
                                    <div class="thumbnail" style="width: 200px">
                                        <img src="{{$partner->logo}}"  class="img-responsive img-rounded" id="partnerLogo">
                                    </div>
                                    <div class="row">
                                        <div class="input-group input-group-sm" role="group">
                                            <div class="col-md-8 col-md-offset-2">
                                                <div class="btn btn-default" data-toggle="modal" data-target="#picture">
                                                    <span class="glyphicon glyphicon-picture"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <input name="partner_id" type="hidden" value="{{$partner->id}}">
                                    @if(!empty($partner->user))
                                        <h5>
                                            Added by: {{$partner->user->full_name}}
                                        </h5>
                                    @else
                                        <h5>
                                            Added by: deleted user
                                        </h5>
                                    @endif
                                    <div class="col-md-offset-8">
                                        <div class="btn-group">
                                            <a href="/admin/dashboard/partner/delete/{{$partner->id}}" class="btn btn-primary">
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
                                                    <input type="text" name="logo" value="{{$partner->logo}}" class="form-control" placeholder="insert image URL" aria-describedby="basic-addon1">
                                                </div>
                                                <br />
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endforeach
                    {{$partners->links()}}
                @endif
            </div>
        </div>
        <br/>
        <div class="row vertical-center-row">
            <div class="text-center col-md-8 col-md-offset-2">
                <div class="row vertical-center-row">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h1 class="panel-title">Add Partner</h1>
                        </div>
                        <form action="{{Route('create_partner')}}" method="post">
                            {{csrf_field()}}
                            <div class="panel-body">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">
                                        <span class="glyphicon glyphicon-user"></span>
                                    </span>
                                    <input name="name" type="text" placeholder="Partner name" class="form-control" aria-describedby="basic-addon1">
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">
                                            <span class="glyphicon glyphicon-picture"></span>
                                        </span>
                                            <input type="text" name="logo" class="form-control" placeholder="insert logo URL" aria-describedby="basic-addon1">
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