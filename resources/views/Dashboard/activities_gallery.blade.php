@extends('Layout.dash_template')

@section('title')
    Gallery
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
                <form action="{{Route('manage_gallery')}}" method="post">
                    {{csrf_field()}}
                    @if(!empty($images))
                        <div class="row">
                            @foreach($images as $image)
                                <div class="col-sm-6 col-md-4">
                                    <div class="thumbnail">
                                        <img src="{{$image->image}}" class="img-responsive img-rounded" style="height:250px">
                                        <input type="checkbox" class="chk" name="check_list[]" value="{{$image->id}}">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{$images->links()}}
                    @endif
                    <div class="row">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">
                                    <span class="glyphicon glyphicon-picture"></span>
                                </span>
                                    <input type="text" name="image" class="form-control" placeholder="insert image URL" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="panel-footer">
                                <div class="btn-group">
                                    <button type="submit" name="add" value="add" class="btn btn-primary">Add</button>
                                    <button  type="submit" name="change" value="change" class="btn btn-primary">Change</button>
                                    <button  type="submit" name="delete" value="delete" class="btn btn-primary">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection