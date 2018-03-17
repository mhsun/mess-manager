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
                                <th data-field="name" data-sortable="true">Assigned Member</th>
                                <th data-field="date" data-sortable="true">From</th>
                                <th data-field="leave_date" data-sortable="true">Till</th>
                                <th data-field="action" data-sortable="true">Action</th>
                            </tr>
                            </thead>
                            @for($i = 0; $i < count($bazarDetails); $i++)
                                <tr>
                                    <td>{{ $memberDetails[$i][0]->name }}</td>
                                    <td>{{ $bazarDetails[$i]->date_from }}</td>
                                    <td>{{ $bazarDetails[$i]->date_to }}</td>
                                    <td>
                                        <a href="{{ url('member/bill-list/'.$bazarDetails[$i]->id) }}" class="btn btn-success btn-xs" title="Monthly Bill"><i class="fa fa-clipboard-list"></i></a>
                                        <a href="{{ url('member/edit/'.$bazarDetails[$i]->id) }}" class="btn btn-warning btn-xs" title="Edit Member"><i class="fa fa-edit"></i></a>
                                        <a href="{{ url('member/delete/'.$bazarDetails[$i]->id) }}"class="btn btn-danger btn-xs" title="Delete Member"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endfor
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/.row-->
@endsection