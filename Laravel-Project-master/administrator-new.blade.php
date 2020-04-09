@extends("admin-master")

@section("content")
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Administrator New</h1>
                <h1 class="page-subhead-line"><a href="{{url('/')}}">Home</a>&#8702;
                    <a href="{{url('/administrator-management')}}">New Administrator</a>&#8702;
                    <a href="{{url('/administrator-management/view')}}">Administrator View</a> </h1> 
                </h1>

            </div>
        </div>
        <!-- /. ROW  -->
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        New Administrator
                    </div>
                    <div class="panel-body">
                        @if(Session::get('message'))
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ Session::get('message') }} 

                        </div>
                        @endif
                        <form action="{{url('/administrator-management')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name='name' value="{{old('name')}}" />
                                <p class="help-block">{{ ($errors->has('name')) ? $errors->first('name') : '' }}</p>
                            </div>
                            <div class="form-group">
                                <label>Email:</label>
                                <input type="text" class="form-control" name='email' value="{{old('email')}}" />
                                <p class="help-block">{{ ($errors->has('email')) ? $errors->first('email') : '' }}</p>
                            </div>
                            <div class="form-group">
                                <label>Password:</label>
                                <input type="password" class="form-control" name='pass' value="{{old('pass')}}" />
                                <p class="help-block">{{ ($errors->has('pass')) ? $errors->first('pass') : '' }}</p>
                            </div>
                            <div class="form-group">
                                <label>Type:</label>
                                <input type="text" class="form-control" name='tp' value="{{old('tp')}}" />
                                <p class="help-block">{{ ($errors->has('tp')) ? $errors->first('tp') : '' }}</p>
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