@extends('Layout.master')

@section('title')
    Contact us
@endsection

@section('contact')
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
    <div class="container container-table">
        <div class="row vertical-center-row">
            <div class="text-center col-md-6 col-md-offset-3">
                @if(!empty($contacts))
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>
                            Contact Us on:
                        </h4>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <table style="width: 100%">
                                    <thead>
                                    <tr>
                                        <th style="text-align: center">
                                            Email
                                        </th>
                                        <th style="text-align: center">
                                            Tel
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($contacts as $contact)
                                        <tr>
                                            <td>
                                                {{$contact->email}}
                                            </td>
                                            <td>
                                                {{$contact->telephone}}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{$contacts->links()}}
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection