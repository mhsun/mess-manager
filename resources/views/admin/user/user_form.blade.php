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
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input class="form-control" placeholder="Please enter phone here">
                            </div>
                            <div class="form-group">
                                <label>Join Date</label>
                                <input class="form-control" placeholder="Please follow the format(year-month-day)">
                            </div>
                            <div class="form-group">
                                <label>User Type</label>
                                <select class="form-control">
                                    <option>--Select a type--</option>
                                    <option>Mess Member</option>
                                    <option>Sub Admin</option>
                                </select>
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