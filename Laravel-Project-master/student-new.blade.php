@extends("admin-master")

@section("content")
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
    $(function () {
        $("#datepicker,#datepicker1").datepicker({dateFormat: "yy-mm-dd"}).val();
    });
</script>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Student Registration</h1>
                <h1 class="page-subhead-line">This is dummy text , you can replace it with your original text. </h1>

            </div>
        </div>
        <!-- /. ROW  -->
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        New Student
                    </div>
                    <div class="panel-body">
                        @if(Session::get('message'))
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ Session::get('message') }} 

                        </div>
                        @endif
                        <form action="{{url('/student-management')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name='name' value="{{old('name')}}" />
                                <p class="help-block">{{ ($errors->has('name')) ? $errors->first('name') : '' }}</p>
                            </div>
                            <div class="form-group">
                                <label>Father Name:</label>
                                <input type="text" class="form-control" name='fname' value="{{old('fname')}}" />
                                <p class="help-block">{{ ($errors->has('fname')) ? $errors->first('fname') : '' }}</p>
                            </div>
                            <div class="form-group">
                                <label>Mother Name:</label>
                                <input type="text" class="form-control" name='mname' value="{{old('mname')}}" />
                                <p class="help-block">{{ ($errors->has('mname')) ? $errors->first('mname') : '' }}</p>
                            </div>
                            <div class="form-group">
                                <label>Email:</label>
                                <input type="email" class="form-control" name='email' value="{{old('email')}}" />
                                <p class="help-block">{{ ($errors->has('email')) ? $errors->first('email') : '' }}</p>
                            </div>
                            <div class="form-group">
                                <label>Password:</label>
                                <input type="password" class="form-control" name='pass' value="{{old('pass')}}" />
                                <p class="help-block">{{ ($errors->has('pass')) ? $errors->first('pass') : '' }}</p>
                            </div>                            


                            <div class="form-group">
                                <label>Address</label>
                                <textarea name="addr" class="form-control" rows="3">{{old('addr')}}</textarea>
                                <p class="help-block">{{ ($errors->has('addr')) ? $errors->first('addr') : '' }}</p>
                            </div>

                            <div class="form-group">
                                <label>Contact:</label>
                                <input type="text" name='contact' class="form-control" value="{{old('contact')}}" />
                                <p class="help-block">{{ ($errors->has('contact')) ? $errors->first('contact') : '' }}</p>
                            </div>

                            <div class="form-group">
                                <label>Admission Fee:</label>
                                <input type="text" name='afees' class="form-control" value="{{old('afees')}}" />
                                <p class="help-block">{{ ($errors->has('afees')) ? $errors->first('afees') : '' }}</p>
                            </div>

                            <div class="form-group">
                                <label>Gender</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="gender" id="optionsRadios1" value="m" checked="">Male
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="gender" id="optionsRadios2" value="f">Female
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="gender" id="optionsRadios3" value="c">Others
                                    </label>
                                </div>
                            </div>



                            <div class="form-group">
                                <label>Date of Birth:</label>
                                <input type="text" name='dob' class="form-control" id="datepicker" value="{{old('dob')}}" />
                                <p class="help-block">{{ ($errors->has('dob')) ? $errors->first('dob') : '' }}</p>
                            </div>

                            <div class="form-group">
                                <label>Admission Date:</label>
                                <input type="text" name='date'  class="form-control" id="datepicker1"  value="{{old('date')}}" />
                                <p class="help-block">{{ ($errors->has('date')) ? $errors->first('date') : '' }}</p>
                            </div>

                            <div class="form-group">
                                <label>Department</label>
                                <select class="form-control" name="departid">

                                    @foreach($alldepart as $depart)
                                    <option value="{{$depart->id}}">{{$depart->name}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group">
                                <label>Year</label>
                                <select class="form-control" name="year">
                                    <option value="1">1st year</option>
                                    <option value="2">2nd year</option>
                                    <option value="3">3rd year</option>
                                    <option value="4">4th year</option>
                                </select>
                            </div>



                            <div class="form-group">
                                <label>Semester</label>
                                <select class="form-control" name="seme">
                                    <option value="1">Semester-1</option>
                                    <option value="2">Semester-2</option>
                                    <option value="3">Semester-3</option>
                                </select>
                            </div>


                            <div class="form-group">
                                <label>Picture:</label>
                                <input type="file" name='pic' class="form-control" value="{{old('pic')}}" />
                                <p class="help-block">{{ ($errors->has('pic')) ? $errors->first('pic') : '' }}</p>
                            </div>



                            <input type="submit" class="btn btn-success" name='sub' value=' Save ' />

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