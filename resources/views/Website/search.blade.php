@extends('Layout.master')

@section('title')
    Search
@endsection

@section('content')
    <div class="container container-table">
        <div class="row vertical-center-row">
            <div class="text-center col">
                @if(!empty($activities))
                    @foreach($activities as $activity)
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <h1>{{$activity->title}}</h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-2">
                                <img src="{{$activity->header_photo}}" class="img-responsive img-rounded" alt="header photo" id="activityPhoto">
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
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                {{$activities->links()}}
                            </div>
                        </div>
                @endif
                @if(!empty($announcements))
                    @foreach($announcements as $announcement)
                         <div class="row">
                             <div class="col-md-8 col-md-offset-2">
                                 <h1>{{$announcement->title}}</h1>
                             </div>
                         </div>
                         @if(!empty($announcement->image))
                                <div class="col-md-10 col-md-offset-2">
                                    <img src="{{$announcement->image}}" class="img-responsive img-rounded" alt="header photo" id="activityPhoto">
                                </div>
                         @endif
                         <div class="row">
                             <div class="col-md-8 col-md-offset-2">
                                 <p>{{$announcement->contents}}</p>
                             </div>
                         </div>
                         <br />
                         <div class="row">
                             <div class="col-md-8 col-md-offset-2">
                                 <table>
                                     <tr>
                                         <td>
                                             <span class="gray">Announcement date:  {{$announcement->announcement_date}}</span>
                                         </td>
                                         <td>
                                             <span class="gray">
                                            @if(!empty($announcement->branch->id))
                                                Branch: {{$announcement->branch->location}}: {{$announcement->branch->address}}
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
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                {{$announcements->links()}}
                            </div>
                        </div>
                @endif
                @if(!empty($services))
                    @foreach($services as $service)
                        <div class="row">
                            <h3>{{$service->title}}</h3>
                        </div>
                        <div class="row">
                            <div class="col col-md-2 col-md-offset-1">
                                <img src="{{$service->icon}}" class="img-responsive img-rounded" alt="service icon" id="serviceIcon">
                            </div>
                            <div class="col-md-8">
                                <p>{{$service->description}}</p>
                            </div>
                        </div>
                    @endforeach
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                {{$services->links()}}
                            </div>
                        </div>
                @endif
            </div>
        </div>
    </div>
@endsection