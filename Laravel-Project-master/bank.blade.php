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
                        <form action="{{url('/bank/report')}}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Start Date</label>
                                <input required="" type="text" class="form-control" name='sdate' value="{{old('sdate')}}" />
                            </div>
                           
                            <div class="form-group">
                                <label>End Date</label>
                                <input required="" type="text" class="form-control" name='edate' value="{{old('edate')}}" />
                            </div>

                            <input type="submit" class="btn btn-success" name='sub' value=' Search ' />

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