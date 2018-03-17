@extends('admin.master')
@section('title')
    Add Member
@endsection
@section('main_content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Add Monthly Bill</div>
                    @if (Session::get('message'))
                        <p class="text-center" style="color: green;">{{ Session::get('message')}}</p>
                    @endif
                    @if (Session::get('error'))
                        <p class="text-center" style="color: red;">{{ Session::get('error') }}</p>
                    @endif
                    <div class="panel-body">
                        <div class="col-md-offset-3 col-md-6">
                            {!! Form::open() !!}
                            <div class="form-group">
                                <label>Month</label>
                                <select class="form-control" name="month">
                                    <option value="">--Select a type--</option>
                                    <option value="{{ "January,".date('Y') }} " {{ "January" == date('F') ? "selected" : "" }}>{{ "January" }}</option>
                                    <option value="{{ "February,".date('Y') }}" {{ "February" == date('F')? "selected" : "" }}>{{ "February" }}</option>
                                    <option value="{{  "March,".date('Y') }}" {{ "March" == date('F') ? "selected" : "" }}>{{ "March" }}</option>
                                    <option value="{{  "April,".date('Y') }}" {{ "April" == date('F') ? "selected" : "" }}>{{ "April" }}</option>
                                    <option value="{{  "May,".date('Y') }}" {{ "May" == date('F') ? "selected" : "" }}>{{ "May" }}</option>
                                    <option value="{{  "June,".date('Y') }}" {{ "June" == date('F') ? "selected" : "" }}>{{ "June" }}</option>
                                    <option value="{{  "July,".date('Y') }}" {{ "July" == date('F') ? "selected" : "" }}>{{ "July" }}</option>
                                    <option value="{{  "August,".date('Y') }}" {{ "August" == date('F') ? "selected" : "" }}>{{ "August" }}</option>
                                    <option value="{{  "September,".date('Y') }}" {{ "September" == date('F') ? "selected" : "" }}>{{ "September" }}</option>
                                    <option value="{{  "October,".date('Y') }}" {{ "October" == date('F') ? "selected" : "" }}>{{ "October" }}</option>
                                    <option value="{{  "November,".date('Y') }}" {{ "November" == date('F') ? "selected" : "" }}>{{ "November" }}</option>
                                    <option value="{{  "December,".date('Y') }}" {{ "December" == date('F') ? "selected" : "" }}>{{ "December" }}</option>
                                </select>
                                <span style="color: red;">{{ $errors->first('month') }}</span>
                            </div>
                            <div class="form-group">
                                <label>House Rent</label>
                                <input class="form-control" placeholder="Please enter house rent here" name="house_rent" value="{{ old('house_rent') }}">
                                <span style="color: red;">{{ $errors->first('house_rent') }}</span>
                            </div>
                            <div class="form-group">
                                <label>Utility Bill</label>
                                <input class="form-control" placeholder="Please enter utility bill here" name="utility_bill" value="{{ old('utility_bill') }}">
                                <span style="color: red;">{{ $errors->first('utility_bill') }}</span>
                            </div>
                            <div class="form-group">
                                <label>Food Bill</label>
                                <input class="form-control" placeholder="Please enter food bill here" name="food_bill" value="{{ old('food_bill') }}">
                                <span style="color: red;">{{ $errors->first('food_bill') }}</span>
                            </div>
                            <div class="form-group">
                                <label>Due Amount</label>
                                <input class="form-control" placeholder="Please enter due amount" name="due_amount" value="{{ old('due_amount') }}">
                                <span style="color: red;">{{ $errors->first('due_amount') }}</span>
                            </div>
                            <div class="form-group">
                                <label>Member</label>
                                <select class="form-control" name="user_id">
                                    <option value="">--Select a member--</option>
                                    @foreach($memberList as $member)
                                        <option value="{{ $member->id }}" {{ old('user_id') == $member->id ? "selected" : "" }}>{{ $member->name. "( ".$member->phone." )" }}</option>
                                    @endforeach
                                </select>
                                <span style="color: red;">{{ $errors->first('user_id') }}</span>
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary pull-right" type="submit" value="Add Member">
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->

        </div><!--/.main-->
@endsection