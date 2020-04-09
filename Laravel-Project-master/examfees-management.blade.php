@extends("admin-master")

@section("content")
<!-- Date Picker Start -->
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
    $(function () {
        $("#datepicker").datepicker({dateFormat: "yy-mm-dd"}).val();
    });
</script>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                 <a href="{{url('/')}}">Home</a>&#8702;
                 <a href="{{url('/examfees-management')}}">New Examfees</a>&#8702;
                 <a href="{{url('/examfees-management/view')}}">information of Examfees</a>
                <h1 class="page-head-line">Examfees</h1>
                <h1 class="page-subhead-line">Student examfees information </h1>

            </div>
        </div>
        <!-- /. ROW  -->
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        New Examfees
                    </div>
                    <div class="panel-body">
                        @if(Session::get('message'))
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ Session::get('message') }} 
                        </div>
                        @endif
                        <form  action="{{url('/examfees-management')}}" method="post" role="form">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Year</label>
                                <select class="form-control" name="year">
                                    <option value="1st">1st year</option>
                                    <option value="2nd">2nd year</option>
                                    <option value="3rd">3rd year</option>
                                    <option value="4th">4th year</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Semester</label>
                                <select class="form-control" name="seme">
                                    <option value="1st">Semester-1</option>
                                    <option value="2nd">Semester-2</option>
                                    <option value="3rd">Semester-3</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Student Name</label>
                                <select class="form-control" name="stid">
                                    @foreach($allStd as $std)
                                    <option value="{{$std->id}}">{{$std->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Date</label>
                                <input type="text" name="date" id="datepicker" class="form-control" value="{{old('date')}}" />
                                <p class="help-block">{{ ($errors->has('date')) ? $errors->first('date') : '' }}</p>
                            </div>

                            <div class="form-group">
                                <label>Amount</label>
                                <input type="text" name='amount' class="form-control" value="{{old('amount')}}"/>
                                <p class="help-block">{{ ($errors->has('amount')) ? $errors->first('amount') : '' }}</p>
                            </div>                            

                            <input type="submit" class="btn btn-success" name='sub' value='Save' />

                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!--/.ROW-->


    </div>
    <!-- /. PAGE INNER  -->
</div>
@endsection