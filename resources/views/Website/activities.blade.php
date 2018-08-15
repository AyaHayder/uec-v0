@extends('Layout.master')

@section('title')
    Activities
@endsection

@section('activities')
    active
@endsection

@section('content')
    <div class="container container-table">
        <div class="row vertical-center-row">
            <div class="text-center col">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        @if(!empty($gallery))
                            @foreach($gallery as $image)
                                <div class="col-md-4">
                                    <div class="thumbnail">
                                        <img src="{{$image->image}}" class="img-responsive img-rounded" style="height:250px">
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <br />
                @if(!empty($activities))
                    @foreach($activities as $activity)
                        <div class="row">
                            <div class="col-md-10 col-md-offset-2">
                                <img src="{{$activity->header_photo}}" class="img-responsive img-rounded" alt="header photo" id="activityPhoto">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <h1>{{$activity->title}}</h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                            <p>{{$activity->contents}}</p>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <table>
                                    <tr>
                                        <td>
                                            <span class="gray">Activity date:  {{$activity->activity_date}}</span>
                                        </td>
                                        <td>
                                    <span class="gray">
                                        @if(!empty($activity->branch->id))
                                            Branch: {{$activity->branch->location}}: {{$activity->branch->address}}
                                         @else
                                            Branch: deleted branch
                                         @endif
                                    </span>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    @endforeach
                    {{$activities->links()}}
                @endif
            </div>
        </div>
    </div>
@endsection