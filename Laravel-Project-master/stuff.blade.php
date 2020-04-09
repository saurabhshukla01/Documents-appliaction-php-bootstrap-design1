@extends("admin-master")

@section("content")
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">New Notice</h1>

                <h1 class="page-subhead-line"><a href="{{url('/')}}">Home</a>&#8702;
                    <a href="{{url('/stuff-management')}}">New Stuff</a>&#8702;
                    <a href="{{url('/stuff-management/view')}}">Stuff View</a> </h1> 
            </div>
        </div>
        <!-- /. ROW  -->
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                       New Stuff
                    </div>
                    <div class="panel-body">
                        @if(Session::get('message'))
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{ Session::get('message') }} 
                            
                        </div>
                        @endif
                        <form action="{{url('/stuff-management')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name='name' value="{{old('name')}}" />
                                <p class="help-block">{{ ($errors->has('name')) ? $errors->first('name') : '' }}</p>
                            </div>
                            <div class="form-group">
                                <label>Contact:</label>
                                <input type="text" class="form-control" name='cont' value="{{old('cont')}}" />
                                <p class="help-block">{{ ($errors->has('cont')) ? $errors->first('cont') : '' }}</p>
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
                                <label>Department</label>
                                <select class="form-control" name="did">

                                    @foreach($allDpart as $dpart)
                                    <option value="{{$dpart->id}}">{{$dpart->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                             <div class="form-group">
                                <label>Designation</label>
                                <select class="form-control" name="des">

                                   @foreach($allpart as $dpart)
                                    <option value="{{$dpart->id}}">{{$dpart->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Salary</label>
                                <input type="text" class="form-control" name='salary' value="{{old('salary')}}" />
                                <p class="help-block">{{ ($errors->has('salary')) ? $errors->first('salary') : '' }}</p>
                           </div> 
                            <div class="form-group">
                                <label>Gender</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="gen" id="optionsRadios1" value="m" checked="">Male
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="gen" id="optionsRadios2" value="f">Female
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="gen" id="optionsRadios3" value="c">Others
                                    </label>
                                </div>
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

















