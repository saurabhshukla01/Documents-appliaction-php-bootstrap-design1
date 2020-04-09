@extends("admin-master")

@section("content")
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line"> Change Password </h1>
                <h1 class="page-subhead-line"><a href="{{url('/')}}">Home</a>&#8702;
                    <a href="{{url('/profile-management/profile/{id}')}}">profile</a>&#8702;
                    <a href="{{url('/profile-management/view')}}">profile View</a> &#8702;
                    <a href="{{url('/change-password')}}">Chang Password</a> </h1>
            </div>
        </div>
        <!-- /. ROW  -->
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Change Password
                    </div>
                    <div class="panel-body">
                        @if(Session::get('message'))
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ Session::get('message') }} 

                        </div>
                        @endif
                        <form action="{{url('/change-password')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Current Password:</label>
                                <input type="password" class="form-control" name='pass' />
                                <p class="help-block">{{ ($errors->has('pass')) ? $errors->first('pass') : '' }}</p>
                            </div>
                            <div class="form-group">
                                <label>New Password:</label>
                                <input type="password" class="form-control" name='pass1' />
                                <p class="help-block">{{ ($errors->has('pass1')) ? $errors->first('pass1') : '' }}</p>
                            </div>
                            <div class="form-group">
                                <label>Retype Password:</label>
                                <input type="password" class="form-control" name='pass2' />
                                <p class="help-block">{{ ($errors->has('pass2')) ? $errors->first('pass2') : '' }}</p>
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