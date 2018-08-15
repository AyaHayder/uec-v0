@extends('Layout.master')

@section('title')
    About
@endsection

@section('about')
    active
@endsection

@section('style')
    html, body, .container-table {
    height: 100%;
    }

    .container-table {
    display: table;
    }
    .vertical-center-row {
    display: table-cell;
    vertical-align: middle;
    }
@endsection

@section('content')
    <div class="jumbotron">
            <h1 style="margin:3%">Universal Education Center(UEC)</h1>
            @if(!empty($about))
                <h4 style="margin:3%">
                    {{$about->description}}
                </h4>
            @endif
    </div>
@endsection