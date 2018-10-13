@extends('admin.admin')

@section('filter-bar')
            {{--<div class="container">--}}
                {{--<div class="navbar-collapse collapse" id="navbar-filter">--}}
                    {{--<form class="navbar-form" role="search">--}}
                        {{--<div class="form-group">--}}
                            {{--<select name="filter_type" id="filter_type" class="form-control">--}}
                                {{--<option value="">Order Items By:</option>--}}
                                {{--<option value="date">Creation Date</option>--}}
                                {{--<option value="popularity">Popularity</option>--}}
                                {{--<option value="like_count">Total Likes</option>--}}
                                {{--<option value="comment_count">Total Comments</option>--}}
                            {{--</select>--}}
                        {{--</div>--}}

                        {{--<span id="filter-date">--}}
                    {{--<div class="form-group">--}}
                        {{--<select name="popularity" class="form-control">--}}
                            {{--<option value="DESC">Newest items first</option>--}}
                            {{--<option value="ASC">Oldest items first</option>--}}
                        {{--</select>--}}
                    {{--</div>--}}
                {{--</span>--}}

                        {{--<span class="hidden" id="filter-popularity">--}}
                    {{--<div class="form-group">--}}
                        {{--<select name="popularity" class="form-control">--}}
                            {{--<option value="DESC">Most popular first</option>--}}
                            {{--<option value="ASC">Least popular first</option>--}}
                        {{--</select>--}}
                    {{--</div>--}}
                {{--</span>--}}

                        {{--<span class="hidden" id="filter-like_count">--}}
                    {{--<div class="form-group">--}}
                        {{--<select name="likes" class="form-control">--}}
                            {{--<option value="DESC">Most likes first</option>--}}
                            {{--<option value="ASC">Least likes first</option>--}}
                        {{--</select>--}}
                    {{--</div>--}}
                {{--</span>--}}

                        {{--<span class="hidden" id="filter-comment_count">--}}
                    {{--<div class="form-group">--}}
                        {{--<select name="comments" class="form-control">--}}
                            {{--<option value="DESC">Most comments first</option>--}}
                            {{--<option value="ASC">Least comments first</option>--}}
                        {{--</select>--}}
                    {{--</div>--}}
                {{--</span>--}}

                        {{--<button type="submit" id="btn-filter-pending" class="btn btn-default">Update</button>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="container">--}}
                {{--<div class="row">--}}
                    {{--<div id="filter-panel" class="collapse filter-panel">--}}
                        {{--<div class="panel panel-default">--}}
                            {{--<div class="panel-body">--}}
                                {{--<form class="form-inline" role="form">--}}
                                    {{--<div class="form-group">--}}
                                        {{--<label class="filter-col" style="margin-right:0;" for="pref-perpage">Rows per page:</label>--}}
                                        {{--<select id="pref-perpage" class="form-control">--}}
                                            {{--<option value="2">2</option>--}}
                                            {{--<option value="3">3</option>--}}
                                            {{--<option value="4">4</option>--}}
                                            {{--<option value="5">5</option>--}}
                                            {{--<option value="6">6</option>--}}
                                            {{--<option value="7">7</option>--}}
                                            {{--<option value="8">8</option>--}}
                                            {{--<option value="9">9</option>--}}
                                            {{--<option selected="selected" value="10">10</option>--}}
                                            {{--<option value="15">15</option>--}}
                                            {{--<option value="20">20</option>--}}
                                            {{--<option value="30">30</option>--}}
                                            {{--<option value="40">40</option>--}}
                                            {{--<option value="50">50</option>--}}
                                            {{--<option value="100">100</option>--}}
                                            {{--<option value="200">200</option>--}}
                                            {{--<option value="300">300</option>--}}
                                            {{--<option value="400">400</option>--}}
                                            {{--<option value="500">500</option>--}}
                                            {{--<option value="1000">1000</option>--}}
                                        {{--</select>--}}
                                    {{--</div> <!-- form group [rows] -->--}}
                                    {{--<div class="form-group">--}}
                                        {{--<label class="filter-col" style="margin-right:0;" for="pref-search">Search:</label>--}}
                                        {{--<input type="text" class="form-control input-sm" id="pref-search">--}}
                                    {{--</div><!-- form group [search] -->--}}
                                    {{--<div class="form-group">--}}
                                        {{--<label class="filter-col" style="margin-right:0;" for="pref-orderby">Order by:</label>--}}
                                        {{--<select id="pref-orderby" class="form-control">--}}
                                            {{--<option>Descendent</option>--}}
                                        {{--</select>--}}
                                    {{--</div> <!-- form group [order by] -->--}}
                                    {{--<div class="form-group">--}}
                                        {{--<div class="checkbox" style="margin-left:10px; margin-right:10px;">--}}
                                            {{--<label><input type="checkbox"> Remember parameters</label>--}}
                                        {{--</div>--}}
                                        {{--<button type="submit" class="btn btn-default filter-col">--}}
                                            {{--<span class="glyphicon glyphicon-record"></span> Save Settings--}}
                                        {{--</button>--}}
                                    {{--</div>--}}
                                {{--</form>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#filter-panel">--}}
                        {{--<span class="glyphicon glyphicon-cog"></span> Advanced Search--}}
                    {{--</button>--}}
                {{--</div>--}}
            {{--</div>--}}
@endsection

@section('content')
    @if(session('flash_message'))
        <p class="success-added">{{ session('flash_message') }}</p>
    @endif
    <div class="container-fluid" style="width: 90%!important">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Nationality</th>
                <th scope="col">Certification</th>
                <th scope="col">Criminal check</th>
                <th scope="col">Des. location</th>
                <th scope="col">Cur. location</th>
                <th class="text-center" scope="col">Status</th>
                <th class="text-center" scope="col">Change status</th>
                <th class="text-center" scope="col">Information</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($teachers as $teacher)
                <tr data-identifier="{{ $teacher->id }}">
                    <td>{{ $teacher->name }}</td>
                    <td>{{ $teacher->age }}</td>
                    <td>{{ $teacher->nationality }}</td>

                    @if($teacher->certification == \App\Teacher::CERTIFICATION_TEFL)
                        <td>TEFL</td>
                    @elseif($teacher->certification == \App\Teacher::CERTIFICATION_CELTA)
                        <td>CELTA</td>
                    @else
                        <td>TOEFL</td>
                    @endif

                    <td>{{ $teacher->criminal_check == \App\Teacher::CRIMINAL_DONE ? 'Done' : 'In progress' }}</td>
                    <td>{{ $teacher->desired_location }}</td>
                    <td>{{ $teacher->current_location }}</td>
                    @if( $teacher->status == 1)
                        <td>Active</td>
                        <td class="text-center">
                            <a class="inactive-svg" href="{{ route('deactivateTeacher', ['id' => $teacher->id]) }}">
                                <img src="{{ asset('icons/cancel.svg') }}" class="inactive-svg" />
                            </a>
                        </td>
                    @else
                        <td>Inactive</td>
                        <td class="text-center">
                            <a class="active-svg" href="{{ route('activateTeacher', ['id' => $teacher->id]) }}">
                                <img src="{{ asset('icons/checked.svg') }}" class="active-svg" />
                            </a>
                        </td>
                    @endif
                    <td class="text-center">
                        <a class="more-info" href="{{ route('showTeacher', ['id' => $teacher->id]) }}">
                            <img src="{{ asset('icons/eye.svg') }}" class="glyphicon-eye-open more-info" />
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @if($pages > 1)
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">

                @if($page == 1)
                    <li class="page-item disabled">
                @else
                    <li class="page-item">
                @endif
                    <a class="page-link" href="{{route('showTeachers', ['page' => $pages - 1])}}" tabindex="-1">Previous</a>
                </li>

                @for($i = 1; $i <= $pages; $i++)
                <li class="page-item"><a class="page-link {{$page == $i ? 'active disabled' : ''}}" href="{{route('showTeachers', ['page' => $i])}}">{{$i}}</a></li>
                @endfor

                @if($page == $pages || $pages == 0)
                    <li class="page-item disabled">
                @else
                    <a class="page-link" href="{{route('showTeachers', ['page' => $pages + 1])}}">Next</a>
                @endif

            </li>
        </ul>
    @endif
    </nav>
@endsection

@section('script')
<script>
    if(($(".success-added").length)) {
        $(".success-added").delay(3000).fadeOut( "slow", function() {
            $(".success-added").remove();
        });
    }
</script>
@endsection

