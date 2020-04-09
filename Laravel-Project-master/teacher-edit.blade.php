@extends("admin-master")

@section("content")
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Teacher Information</h1>
                <h1 class="page-subhead-line">This is dummy text , you can replace it with your original text. </h1>

            </div>
        </div>
        <!-- /. ROW  -->
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Teacher Edit
                    </div>
                    <div class="panel-body">
                        @if(Session::get('message'))
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ Session::get('message') }} 

                        </div>
                        @endif
                        @foreach($selTeach as $value)
                        <form action="{{url('/teacher-management/update')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name='id' value="{{$value->id}}" />
                                <div class="form-group">
                                    <label>Teacher Name</label>
                                    <input type="text" class="form-control" name='tname' value="{{$value->name}}" />
                                    <p class="help-block">{{($errors->has('tname'))? $errors->first('tname') : ''}}</p>
                                </div>
                                <div class="form-group">
                                    <label>Contact</label>
                                    <input type="text" class="form-control" name="contact" value="{{$value->contact}}"/>
                                    <p class="help-block">{{($errors->has('tcontact'))? $errors->first('tcontact') : ''}}</p>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" value="{{$value->email}}"/>
                                    <p class="help-block">{{($errors->has('tmail'))? $errors->first('tmail') : ''}}</p>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="pass" value="{{$value->password}}"/>
                                    <p class="help-block">{{($errors->has('tpass'))? $errors->first('tpass') : ''}}</p>
                                </div>
                                <div class="form-group">
                                    <label>Department</label>
                                    <select name="departid" class="form-control">
                                        @foreach($allDepart as $depart)
                                        @if($depart->id == $value->departmentid)
                                        <option value="{{$depart->id}}" selected>{{$depart->name}}</option>
                                        @else
                                        <option value="{{$depart->id}}">{{$depart->name}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Department</label>
                                    <select name="dgnid" class="form-control">
                                        @foreach($allDgn as $dgn)
                                        @if($dgn->id == $value->designationid)
                                        <option value="{{$dgn->id}}" selected>{{$dgn->name}}</option>
                                        @else
                                        <option value="{{$dgn->id}}">{{$dgn->name}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Salary</label>
                                    <input type="text" class="form-control" name="salary" value="{{$value->salary}}"/>
                                    <p class="help-block">{{($errors->has('salary')) ? $errors->first('salary') : '' }}</p>
                                </div>
                                <div class="form-group">
                                    <label>Gender</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="gender" @if($value->gender=='male') checked @endif value="male"/>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="gender" @if($value->gender=='female') checked @endif value="femal"/>
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="gender" @if($value->gender=='other') checked @endif value="other"/>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Picture</label>
                                    <input type="file" name="pic" value="{{old('tpic')}}"/>
                                </div>
                                
                                <input type="submit" name="sub" value="Update" />                
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