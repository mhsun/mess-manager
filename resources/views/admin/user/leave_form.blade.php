@extends('admin.master')
@section('title')
    Leave Member
@endsection
@section('main_content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Form Elements</div>
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
                                <label>Name</label>
                                <input class="form-control" placeholder="Please enter name here" name="name" value="{{ $memberInfo->name }}">
                                <span style="color: red;">{{ $errors->first('name') }}</span>
                            </div>
                            <div class="form-group">
                                <label>Join Date</label>
                                <input class="form-control" placeholder="Please follow the format(dd-mm-YYYY)" name="leave_date" value="{{ date('Y-m-d') }}">
                                <span style="color: red;">{{ $errors->first('leave_date') }}</span>
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary pull-right" type="submit" value="Leave Member">
                            </div>
                            </form>
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->

        </div><!--/.main-->
@endsection