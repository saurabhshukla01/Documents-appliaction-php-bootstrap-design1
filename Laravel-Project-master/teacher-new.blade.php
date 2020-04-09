@extends("admin-master")

@section("content")
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Teacher Registration</h1>
                <h1 class="page-subhead-line"><a href="{{url('/')}}">Home</a>&#8702;
                    <a href="{{url('/teacher-management')}}">Teacher Registration</a>&#8702;
                    <a href="{{url('/teacher-management/view')}}">Teacher List</a> </h1> 
                </h1>

            </div>
        </div>
        <!-- /. ROW  -->
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        New Teacher
                    </div>
                    <div class="panel-body">
                        @if(Session::get('message'))
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ Session::get('message') }}
                        </div>
                        @endif
                        <form action="{{url('/teacher-management')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Teacher Name</label>
                                <input type="text" class="form-control" name='tname' value="{{old('tname')}}" />
                                <p class="help-block">{{ ($errors->has('tname')) ? $errors->first('tname') : '' }}</p>
                            </div>
                            <div class="form-group">
                                <label>Contact</label>
                                <input type="text" class="form-control" name="tcontact" value="{{old('tcontact')}}"/>
                                <p class="help-block">{{ ($errors->has('tcontact')) ? $errors->first('tcontact') : '' }}</p>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="tmail" value="{{old('tmail')}}"/>
                                <p class="help-block">{{ ($errors->has('tmail')) ? $errors->first('tmail') : '' }}</p>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="tpass"/>
                                <p class="help-block">{{ ($errors->has('tpass')) ? $errors->first('tpass') : '' }}</p>
                            </div>
                            <div class="form-group">
                                <label>Department</label>
                                <select name="departid" class="form-control">
                                    @foreach($allDepart as $depart)
                                    <option value="{{$depart->id}}">
                                        {{$depart->name}}                             
                                    </option>
                                    @endforeach
                                </select>
                                <p class="help-block">{{ ($errors->has('departid')) ? $errors->first('departid') : '' }}</p>
                            </div>
                            <div class="form-group" >
                                <label>Designation</label>
                                <select name="dgnid" class="form-control">
                                    @foreach($allDgn as $dgn)
                                    <option value="{{$dgn->id}}">
                                        {{$dgn->name}}                             
                                    </option>
                                    @endforeach
                                </select>
                                <p class="help-block">{{ ($errors->has('dgnid')) ? $errors->first('dgnid') : '' }}</p>
                            </div>
                            <div class="form-group">
                                <label>Salary</label>
                                <input type="text" class="form-control" name="salary" value="{{old('salary')}}"/>
                                <p class="help-block">{{ ($errors->has('salary')) ? $errors->first('salary') : '' }}</p>
                            </div>
                            <div class="form-group">
                                <label>Gender</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="gender" id="optionsRadios1" value="male" checked="">Male
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="gender" id="optionsRadios2" value="female">Female
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="gender" id="optionsRadios3" value="others">Others
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Picture</label>
                                <input type="file" class="form-control" name="tpic" value="{{old('tpic')}}"/>
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