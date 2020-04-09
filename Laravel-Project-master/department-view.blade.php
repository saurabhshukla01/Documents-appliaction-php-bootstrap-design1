@extends("admin-master")

@section("content")
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Department view</h1>
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
                        Department Information
                    </div>
                    <div class="panel-body">
                        @if(Session::get('message'))
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ Session::get('message') }}

                        </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    
                                     <th>#</th>
                                    <th>Department Name<span>&#8645;</span></th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $serial = 1; ?>
                                @foreach($alldep as $value)
                                <tr class="odd gradeX success">
                                    <td>{{$serial++}}</td>
                                    <td>{{$value->name}}</td>
                                    <td><a href="{{url('/')}}/department-management/edit/{{$value->id}}" title="Edit"><span class="glyphicon glyphicon-edit" ></span></a></td>
                                    <td><a href="{{url('/')}}/department-management/delete/{{$value->id}}" title="Delete"><span class="glyphicon glyphicon-trash"></span></a></td>
                                
                                </tr>
                                @endforeach
                                </tbody>
                            </table> 
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--/.ROW-->


    </div>
    <!-- /. PAGE INNER  -->
</div>
@endsection