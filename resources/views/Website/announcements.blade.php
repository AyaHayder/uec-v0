@extends('Layout.master')

@section('title')
    Announcements
@endsection

@section('announcements')
    active
@endsection

@section('content')
    <div class="container container-table">
        <div class="row vertical-center-row">
            <div class="text-center col">
                @if(!empty($announcements))
                    @foreach($announcements as $announcement)
                        @if(!empty($announcement->image))
                        <div class="col-md-10 col-md-offset-2">
                            <img src="{{$announcement->image}}" class="img-responsive img-rounded" alt="header photo" id="activityPhoto">
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <h1>{{$announcement->title}}</h1>
                            </div>
                        </div>
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
                    {{$announcements->links()}}
                @endif
            </div>
        </div>
    </div>
@endsection
