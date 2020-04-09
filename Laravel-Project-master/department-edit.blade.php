@extends("admin-master")

@section("content")
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Department New </h1>
                <h1 class="page-subhead-line"><a href="{{url('/')}}">Home</a>&#8702;
                        <a href="{{url('/department-management')}}">New Department</a>&#8702;
                        <a href="{{url('/department-management/view')}}">Department View</a> </h1>

            </div>
        </div>
        <!-- /. ROW  -->
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        
                        Department
                    </div>
                    <div class="panel-body">
                        @if(Session::get('message'))
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ Session::get('message') }} 

                        </div>
                        @endif
                         @foreach($sledep as $value)
                        <form action="{{url('/department-management/update')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name='id' value="{{$value->id}}" />
                            <div class="form-group">
                                <label>Department Name</label>
                                <input type="text" class="form-control" name='dname' value="{{$value->name}}" />
                                <p class="help-block">{{ ($errors->has('dname')) ? $errors->first('dname') : '' }}</p>
                            </div>

                            <input type="submit" class="btn btn-success" name='sub' value=' Save ' />

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