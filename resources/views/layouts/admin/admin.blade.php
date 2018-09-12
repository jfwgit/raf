@extends('layouts.app')
@section('content')

    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>{{ config('app.name', 'Laravel') }}</h3>
            </div>

            <ul class="list-unstyled components">

                <li class="active">
                    <a href="#schoolSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Schools</a>
                    <ul class="collapse list-unstyled" id="schoolSubmenu">
                        <li>
                            <a href="#">Create School</a>
                        </li>
                        <li>
                            <a href="{{ route('showSchools') }}">Schools list</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Teachers</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">Create Teacher</a>
                        </li>
                        <li>
                            <a href="#">Teachers list</a>
                        </li>
                    </ul>
                </li>

            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="{{route('logout')}}" class="download">Logout</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content Holder -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    {{--<div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
                        {{--<ul class="nav navbar-nav ml-auto">--}}
                            {{--<li class="nav-item active">--}}
                                {{--<a class="nav-link" href="#">Page</a>--}}
                            {{--</li>--}}
                            {{--<li class="nav-item">--}}
                                {{--<a class="nav-link" href="#">Page</a>--}}
                            {{--</li>--}}
                            {{--<li class="nav-item">--}}
                                {{--<a class="nav-link" href="#">Page</a>--}}
                            {{--</li>--}}
                            {{--<li class="nav-item">--}}
                                {{--<a class="nav-link" href="#">Page</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                </div>
            </nav>

            <h3>Lorem Ipsum Dolor</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <div class="line"></div>

        </div>
    </div>
@endsection