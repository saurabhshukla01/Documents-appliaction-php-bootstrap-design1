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
<!-- Date Picker End -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Examfees</h1>
                <h1 class="page-subhead-line">Update student examfees information </h1>

            </div>
        </div>
        <!-- /. ROW  -->
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Examfees Update
                    </div>
                    <div class="panel-body">
                        @if(Session::get('message'))
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ Session::get('message') }} 
                        </div>
                        @endif
                        @foreach($selStd as $value)
                        <form  action="{{url('/examfees-management/update')}}" method="post" role="form">
                            {{ csrf_field() }}
                            <input type="hidden" name='id' value="{{$value->id}}" />
                            
                            <div class="form-group">
                                <label>Year:</label>
                                
                                 <select class="form-control" name="year">
                                    <option value="1st">1st year</option>
                                    <option value="2nd">2nd year</option>
                                    <option value="3rd">3rd year</option>
                                    <option value="4th">4th year</option>
                                </select>
                                <p class="help-block">{{ ($errors->has('year')) ? $errors->first('year') : '' }}</p>
                            </div>

                            <div class="form-group">
                                <label>Semester:</label>
                                <select class="form-control" name="semes">
                                    <option value="1st">Semester-1</option>
                                    <option value="2nd">Semester-2</option>
                                    <option value="3rd">Semester-3</option>
                                </select>
                                <p class="help-block">{{ ($errors->has('sem')) ? $errors->first('sem') : '' }}</p>
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
                                <input type="text" name="date" id="datepicker" class="form-control" value="{{$value->date}}" />
                                <p class="help-block">{{ ($errors->has('date')) ? $errors->first('date') : '' }}</p>
                            </div>

                            <div class="form-group">
                                <label>Amount</label>
                                <input type="text" name='amount' class="form-control" value="{{$value->amount}}"/>
                                <p class="help-block">{{ ($errors->has('amount')) ? $errors->first('amount') : '' }}</p>
                            </div>                            

                            <input type="submit" class="btn btn-success" name='sub' value='Update' />

                        </form>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
        <!--/.ROW-->


    </div>
    <!-- /. PAGE INNER  -->
</div>
@endsection


