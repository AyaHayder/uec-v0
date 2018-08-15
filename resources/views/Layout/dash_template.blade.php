@extends('Layout.master')

@section('head')
    <link href="{{url('/sidebar/css/simple-sidebar.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('/css/main.css')}}">
@endsection

@section('content')
<div id="wrapper">
    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <a href="{{url('/')}}">
                    Universal Education Center
                </a>
            </li>
            @if(Auth::user())
            <li>
                <table style="width: 100%">
                    <tr>
                        <td>
                            <img src="{{Auth::user()->avatar}}" alt="avatar" class="img-responsive img-circle" id="profileIcon">
                        </td>
                        <td>
                            <a href="{{url('/profile')}}" id="dashboardProfileLink">
                                <span style="font-size:large">{{Auth::user()->full_name}}</span></a>
                        </td>
                    </tr>
                </table>
            </li>
            @endif
            <li>
                <a href="#home"  data-toggle="collapse" aria-expanded="false" aria-controls="home">
                   <span class="glyphicon glyphicon-home"></span>  Home
                </a>
                <div class="collapse" id="home">
                    <div class="well">
                        <ul class="nav nav-stacked">
                            <li>
                                <a href="#sliderModal" data-toggle="modal"><span class="glyphicon glyphicon-picture"></span>  Slider photos</a>
                            </li>
                            <li>
                                <a href="{{Route('contact_info')}}"><span class="glyphicon glyphicon-earphone"></span>  Contact information</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <li>
                <a href="#about" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="about">
                   <span class="glyphicon glyphicon-leaf"></span>  About
                </a>
                <div class="collapse" id="about">
                    <div class="well">
                        <ul class="nav nav-stacked">
                            <li>
                                <a href="#aboutModal" data-toggle="modal"><span class="glyphicon glyphicon-edit"></span>  Change About</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <li>
                <a href="#activities" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="activities">
                    <span class="glyphicon glyphicon-list-alt"></span>  Activities
                </a>
                <div class="collapse" id="activities">
                    <div class="well">
                        <ul class="nav nav-stacked">
                            <li>
                                <a href="{{Route('add_activity')}}"><span class="glyphicon glyphicon-plus"></span>  Make new activity</a>
                            </li>
                            <li>
                                <a href="{{Route('manage_activities')}}"><span class="glyphicon glyphicon-wrench"></span>  Manage Activities</a>
                            </li>
                            <li>
                                <a href="{{Route('get_gallery')}}"><span class="glyphicon glyphicon-th-large"></span>  Gallery</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <li>
                <a href="#announcements" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="announcements">
                   <span class="glyphicon glyphicon-bullhorn"></span>  Announcements
                </a>
                <div class="collapse" id="announcements">
                    <div class="well">
                        <ul class="nav nav-stacked">
                            <li>
                                <a href="{{Route('make_announcement')}}"><span class="glyphicon glyphicon-plus"></span>  Make a new</a>
                            </li>
                            <li>
                                <a href="{{Route('manage_announcement')}}"><span class="glyphicon glyphicon-wrench"></span>  Manage existing</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <li>
                <a href="#services" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="services">
                   <span class="glyphicon glyphicon-phone-alt"></span> Services
                </a>
                <div class="collapse" id="services">
                    <div class="well">
                        <ul class="nav nav-stacked">
                            <li>
                                <a href="{{Route('add_service')}}"><span class="glyphicon glyphicon-plus"></span>  Add Service</a>
                            </li>
                            <li>
                                <a href="{{Route('manage_services')}}"><span class="glyphicon glyphicon-wrench"></span>  Manage services</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <li>
                <a href="#partners" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="partners">
                    <span class="glyphicon glyphicon-user"></span>  Partners
                </a>
                <div class="collapse" id="partners">
                    <div class="well">
                        <ul class="nav nav-stacked">
                            <li>
                                <a href="{{Route('manage_partners')}}"><span class="glyphicon glyphicon-wrench"></span>  Manage partners</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <li>
                <a href="#jobs" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="jobs">
                   <span class="glyphicon glyphicon-briefcase"></span> Jobs
                </a>
                <div class="collapse" id="jobs">
                    <div class="well">
                        <ul class="nav nav-stacked">
                            <li>
                                <a href="{{Route('add_job')}}"><span class=" glyphicon glyphicon-plus"></span>Add job</a>
                            </li>
                            <li>
                                <a href="{{Route('manage_job')}}"><span class="glyphicon glyphicon-wrench"></span>  Manage jobs</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <li>
                <a href="#branches" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="branches">
                    <span class="glyphicon glyphicon-grain"></span>  Branches
                </a>
                <div class="collapse" id="branches">
                    <div class="well">
                        <ul class="nav nav-stacked">
                            <li>
                                <a href="{{Route('manage_branches')}}">Manage branches</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
            <li>
                <a href="{{Route('manage_users')}}"><span class="glyphicon glyphicon-user"></span>  Manage Users</a>
            </li>
        </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
            @yield('message')
            <div class="row">
                <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle"><span class="glyphicon glyphicon-dashboard"></span></a>
            </div>
            <div class="row">
                @yield('contents')
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
</div>
<!-- /#wrapper -->

<!-- Bootstrap core JavaScript for sidebar-slider -->
<script src="{{url('/sidebar/jquery/jquery.min.js')}}"></script>
<script src="{{url('/sidebar/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Menu Toggle Script for sidebar-slider -->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>
<!-- Modals -->

<!--1. Change slider photos modal-->
<div class="modal fade" id="sliderModal" tabindex="-1" role="dialog" aria-labelledby="sliderModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="sliderModalLabel">Slider photos</h4>
            </div>
            <form action="{{Route('manage_slider')}}" method="post">
                {{csrf_field()}}
                <div class="modal-body">
                    @if(!empty($photos))
                     <div class="row">
                         @foreach($photos as $photo)
                             <div class="col-xs-6 col-md-3">
                                 <label for="{{$loop->index}}">
                                     <div class="col-2 thumbnail">
                                         <img src="{{$photo->photo_url}}" alt="photo" style="height: 125px">
                                     </div>
                                     <input type="checkbox" class="chk" name="check_list[]" value="{{$photo->id}}">
                                 </label>
                             </div>
                         @endforeach
                     </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">
                                    <span class="glyphicon glyphicon-plus"></span>
                                </span>
                                    <input type="text" name="photo_url" class="form-control" placeholder="insert image URL" aria-describedby="basic-addon1">
                            </div>
                            <br />
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button name="add" value="add" class="btn btn-primary" >Add</button>
                            <button name="change" value="change" class="btn btn-primary">Change</button>
                            <button name="delete" value="delete" class="btn btn-primary">Delete</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Change About modal -->
<div class="modal fade" id="aboutModal" tabindex="-1" role="dialog" aria-labelledby="aboutModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="aboutModalLabel">Change About</h4>
            </div>
            <form action="{{Route('change_about')}}" method="post">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="container-fluid">
                        @if(!empty($about))
                            <textarea name="description" style="width:100%">
                                {{$about->description}}
                            </textarea>
                        @else
                            <textarea name="description" style="width:100%">
                                Enter text . . .
                            </textarea>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    @if(!empty($about))
                        <button type="submit" name="change" value="change" class="btn btn-primary">Change</button>
                    @else
                        <button type="submit" name="add" value="add" class="btn btn-primary">Add</button>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
{{--</body>--}}

{{--</html>--}}