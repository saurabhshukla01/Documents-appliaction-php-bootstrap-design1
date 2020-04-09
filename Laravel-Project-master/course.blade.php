@extends("admin-master")

@section("content")
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Course New </h1>
                <h1 class="page-subhead-line"><a href="{{url('/')}}">Home</a>&#8702;
                        <a href="{{url('/course-management')}}">New Course</a>&#8702;
                        <a href="{{url('/course-management/view')}}">Course View</a> </h1>

            </div>
        </div>
        <!-- /. ROW  -->
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        
                        Course  Information
                    </div>
                    <div class="panel-body">
                        @if(Session::get('message'))
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ Session::get('message') }} 

                        </div>
                        @endif
                        <form action="{{url('/course-management')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Course Name</label>
                                <input type="text" class="form-control" name='cname' value="{{old('cname')}}" />
                                <p class="help-block">{{ ($errors->has('cname')) ? $errors->first('cname') : '' }}</p>
                            </div>

                            <div class="form-group">
                                <label>Credit Hours</label>
                                <input type="text" class="form-control" name='credit' value="{{old('credit')}}" />
                                <p class="help-block">{{ ($errors->has('credit')) ? $errors->first('credit') : '' }}</p>
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="desc" class="form-control" >{{old('desc')}}</textarea>
                                <p class="help-block">{{ ($errors->has('desc')) ? $errors->first('desc') : '' }}</p>
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