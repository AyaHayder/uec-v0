@extends('Layout.dash_template')

@section('title')
    Contact information
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
            <div class="text-center col-md-6 col-md-offset-3">
                @if($errors->count()>0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </div>
                @endif
                @if(!empty($contacts))
                    @foreach($contacts as $contact)
                        <div class="panel panel-default">
                            <form action="{{Route('manage_contact_info')}}" method="post">
                                {{csrf_field()}}
                                <div class="panel-heading">
                                    <h1 class="panel-title">Contact {{$loop->index +1}}</h1>
                                </div>
                                <div class="panel-body">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">
                                            <span class="glyphicon glyphicon-envelope"></span>
                                        </span>
                                        <input name="email" value="{{$contact->email}}" type="email" class="form-control" aria-describedby="basic-addon1">
                                    </div>
                                    <br />
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">
                                            <span class="glyphicon glyphicon-earphone"></span>
                                        </span>
                                        <input name="telephone" value="{{$contact->telephone}}" type="tel" class="form-control" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <input name="contact_id" type="hidden" value="{{$contact->id}}">
                                    <div class="col-md-offset-8">
                                        <div class="btn-group">
                                            <button name="delete" class="btn btn-primary">
                                                Delete
                                            </button>
                                            <button name="change" class="btn btn-primary">
                                                Change
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endforeach
                @endif
                <div class="row vertical-center-row">
                    <div class="text-center col-md-8 col-md-offset-2">
                        <div class="row vertical-center-row">
                            <div class="panel panel-default">
                                <form action="{{Route('create_contact')}}" method="post">
                                    {{csrf_field()}}
                                    <div class="panel-heading">
                                        <h1 class="panel-title">Add</h1>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-8 col-md-offset-2">
                                                <div class="input-group">
                                                    <span class="input-group-addon" id="basic-addon1">
                                                        <span class="glyphicon glyphicon-envelope"></span>
                                                    </span>
                                                    <input type="email" name="email" class="form-control" placeholder="Email" aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                        </div>
                                        <br />
                                        <div class="row">
                                            <div class="col-md-8 col-md-offset-2">
                                                <div class="input-group">
                                                    <span class="input-group-addon" id="basic-addon1">
                                                        <span class="glyphicon glyphicon-earphone"></span>
                                                    </span>
                                                    <input type="tel" name="telephone" class="form-control" placeholder="Telephone no." aria-describedby="basic-addon1">
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
        </div>
    </div>
@endsection