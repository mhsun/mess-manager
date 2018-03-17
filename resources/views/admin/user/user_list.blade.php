@extends('admin.master')
@section('title')
    Manage Member
@endsection
@section('main_content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Member's List</div>
                <div class="panel-body">
                    @if (Session::get('message'))
                        <p class="text-center" style="color: green;">{{ Session::get('message')}}</p>
                    @endif
                    @if (Session::get('error'))
                        <p class="text-center" style="color: red;">{{ Session::get('error') }}</p>
                    @endif
                    <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                        <thead>
                        <tr>
                            <th data-field="name" data-sortable="true">Name</th>
                            <th data-field="phone" data-sortable="true">Phone</th>
                            <th data-field="email"  data-sortable="true">Email</th>
                            <th data-field="date" data-sortable="true">Join Date</th>
                            <th data-field="leave_date" data-sortable="true">Leave Date</th>
                            <th data-field="action" data-sortable="true">Action</th>
                        </tr>
                        </thead>
                        @foreach($member_list as $member)
                        <tr>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->phone }}</td>
                            <td>{{ $member->email }}</td>
                            <td>{{ $member->join_date }}</td>
                            <td>{{ $member->leave_date != null ? $member->leave_date : "Present" }}</td>
                            <td>
                                <a href="{{ url('member/show-bill/'.$member->id) }}" class="btn btn-success btn-xs" title="Monthly Bill"><i class="fa fa-clipboard-list"></i></a>
                                <a href="{{ url('member/edit/'.$member->id) }}" class="btn btn-warning btn-xs" title="Edit Member"><i class="fa fa-edit"></i></a>
                                @if ($member->leave_date == null)
                                <a href="{{ url('member/make-leave/'.$member->id) }}" class="btn btn-info btn-xs" title="Make Member Leave"><i class="fa fa-arrow-circle-right"></i></a>
                                @endif
                                <a href="{{ url('member/delete/'.$member->id) }}"class="btn btn-danger btn-xs" title="Delete Member"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div><!--/.row-->
@endsection