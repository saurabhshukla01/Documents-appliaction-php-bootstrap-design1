@extends("admin-master")

@section("content")
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Subject View </h1>
                <h1 class="page-subhead-line"><a href="{{url('/')}}">Home</a>&#8702;
                    <a href="{{url('/subject-management')}}">New Subject</a>&#8702;
                    <a href="{{url('/subject-management/view')}}">Subject View</a> </h1>

            </div>
        </div>
        <!-- /. ROW  -->
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Subject Details
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
                                    <tr style="background-color: #55acee">
                                    	<th>#</th>
                                        <th>Subject Name<span>&#8645;</span></th>
                                        <th>Department<span>&#8645;</span></th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php $serial = 1; ?>
                                    @foreach($allcou as $value)
                                    <tr class="odd gradeX success">
                                    <td>{{$serial++}}</td>
                                        <td>{{$value->name}}</td>
                                        <td>{{$value->cname}}</td>
                                        <td><a href="{{url('/')}}/subject-management/edit/{{$value->id}}"><span class="glyphicon glyphicon-edit" title="Edit"></span></a></td>
                                        <td><a href="{{url('/')}}/subject-management/delete/{{$value->id}}"><span class="glyphicon glyphicon-trash" title="Delete"></span></a></td>
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