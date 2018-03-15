@extends('admin.master')
@section('title')
    Add Member
@endsection
@section('main_content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Form Elements</div>
                    {{ Session::get('message') ? Session::get('message') : "" }}
                    <div class="panel-body">
                        <div class="col-md-offset-3 col-md-6">
                            {!! Form::open() !!}
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" placeholder="Please enter name here" name="name" value="{{ old('name') }}">
                                <span style="color: red;">{{ $errors->first('name') }}</span>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" placeholder="Please enter email here" name="email" value="{{ old('email') }}">
                                <span style="color: red;">{{ $errors->first('email') }}</span>
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input class="form-control" placeholder="Please enter phone here" name="phone" value="{{ old('phone') }}">
                                <span style="color: red;">{{ $errors->first('phone') }}</span>
                            </div>
                            <div class="form-group">
                                <label>Join Date</label>
                                <input class="form-control" placeholder="Please follow the format(dd-mm-YYYY)" name="join_date" value="{{ old('join_date') }}">
                                <span style="color: red;">{{ $errors->first('join_date') }}</span>
                            </div>
                            <div class="form-group">
                                <label>User Type</label>
                                <select class="form-control" name="user_type">
                                    <option value="">--Select a type--</option>
                                    <option value="1" {{ old('user_type') == 1 ? "selected" : "" }}>Mess Member</option>
                                    <option value="2" {{ old('user_type') == 2 ? "selected" : "" }}>Sub Admin</option>
                                </select>
                                <span style="color: red;">{{ $errors->first('user_type') }}</span>
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary pull-right" type="submit" value="Add Member">
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.col-->
        </div><!-- /.row -->

    </div><!--/.main-->
@endsection