@extends('admin.master')
@section('title')
    Assign Member
@endsection
@section('main_content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Form Elements</div>
                    <span class="text-center" style="text-align: center; color: green;">{{ Session::get('message') ? Session::get('message') : "" }}</span>
                    <span class="text-center" style="text-align: center; color: red;">{{ Session::get('error') ? Session::get('error') : "" }}</span>
                    <div class="panel-body">
                        <div class="col-md-offset-3 col-md-6">
                            {!! Form::open() !!}
                            <div class="form-group">
                                <label>Member</label>
                                <select class="form-control" name="member_id">
                                    <option value="">--Select a member--</option>
                                    @foreach($memberList as $member)
                                        <option value="{{ $member->id }}" {{ old('member_id') == $member->id ? "selected" : "" }}>{{ $member->name }}</option>
                                    @endforeach
                                </select>
                                <span style="color: red;">{{ $errors->first('member_id') }}</span>
                            </div>
                            <div class="form-group">
                                <label>From</label>
                                <input class="form-control" placeholder="Please follow the format(YYYY-mm-dd)" name="date_from" value="{{ old('date_from') }}">
                                <span style="color: red;">{{ $errors->first('date_from') }}</span>
                            </div>
                            <div class="form-group">
                                <label>Till</label>
                                <input class="form-control" placeholder="Please follow the format(YYYY-mm-dd)" name="date_to" value="{{ old('date_to') }}">
                                <span style="color: red;">{{ $errors->first('date_to') }}</span>
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary pull-right" type="submit" value="Assign Member">
                            </div>
                            </form>
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->
        </div><!--/.main-->
@endsection