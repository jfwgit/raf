@extends('layouts.app')
@section('content')

<div class="wrapper">

    <nav id="sidebar">

            <div class="sidebar-header">
                <a href="{{ route('admin') }}"><h3>{{ config('app.name', 'Laravel') }}</h3></a>
            </div>

            <ul class="list-unstyled components">

                <li>
                    <a href="#schoolMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Schools</a>
                    <ul class="collapse list-unstyled" id="schoolMenu">
                        <li>
                            <a href="#">Create School</a>
                        </li>
                        <li>
                            <a href="{{ route('showSchools') }}">Schools list</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#teachersMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Teachers</a>

                    <ul class="collapse list-unstyled" id="teachersMenu">
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
                <li><a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
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
            @yield('contents')
        </div>
</div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });
    </script>
@endsection