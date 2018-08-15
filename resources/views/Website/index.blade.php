@extends('Layout.master')

@section('title')
    Home
@endsection

@section('home')
    active
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                {{--Carousel--}}
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        @if(!empty($photos))
                            @foreach($photos as $photo)
                                <li data-target="#carousel-example-generic" data-slide-to="{{$loop->index}}"></li>
                            @endforeach
                        @endif
                    </ol>
                    <!-- Wrapper for slides -->
                    @if(!empty($photos))
                        <div class="carousel-inner" role="listbox">
                            @foreach($photos as $photo)
                                @if($loop->index == 0)
                                    <div class="item active">
                                 @else
                                    <div class="item">
                                 @endif
                                 <div class="col col-md-offset-2">
                                     <img class="active img-rounded" src="{{$photo->photo_url}}" id="sliderPhoto">
                                 </div>
                                    </div>
                            @endforeach
                    @endif
                        </div>
                        <!-- Controls -->
                         <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                             <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                             <span class="sr-only">Previous</span>
                         </a>
                         <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                             <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                             <span class="sr-only">Next</span>
                         </a>
                    </div>
                </div>
            </div>
        </div>
        <br /><br />
        <div class="row">
            <div class="text-center col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>
                            Our services:
                        </h4>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-10">
                                @if(!empty($services))
                                    @foreach($services as $service)
                                        <div class="row">
                                            <div class="col col-md-offset-3">
                                                <h3>{{$service->title}}</h3>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col col-md-4">
                                                <img src="{{$service->icon}}" class="img-responsive img-rounded" alt="service icon" id="serviceIcon">
                                            </div>
                                            <div class="col col-md-8">
                                                {{$service->description}}
                                            </div>
                                        </div>
                                        <br />
                                    @endforeach
                                    {{$services->links()}}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
