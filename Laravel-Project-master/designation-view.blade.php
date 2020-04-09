@extends("admin-master")

@section("content")

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Designation View</h1>

                <h1 class="page-subhead-line"><a href="{{url('/')}}">Home</a>&#8702;
                    <a href="{{url('/designation-management')}}">New designation</a>&#8702;
                    <a href="{{url('/designation-management/view')}}">designation View</a> </h1> 
            </div>
        </div>
        <!-- /. ROW  -->
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Designation View 
                    </div>
                    <div class="panel-body">

                        @if(Session::get('message'))
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ Session::get('message') }} 

                        </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-hover" id="dataTables-example" style="background-color: #c3e3b5">
                                <thead> 
                            <tr>
                                 <th>#</th>
                                <th>Name</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                                </thead>
                                <tbody
                                     <?php $serial = 1; ?>
                            @foreach($allstd as $value)
                            
                            <tr>
                                <td>{{$serial++}}</td>
                                <td>{{$value->name}}</td>
                                <td><a href="{{url('/')}}/designation-management/edit/{{$value->id}}" title="Edit"><span class="glyphicon glyphicon-edit" ></span></a></td>
                                <td><a href="{{url('/')}}/designation-management/delete/{{$value->id}}"title="Delete"><span class="glyphicon glyphicon-trash"></span></a></td>
                            </tr>
                            @endforeach
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!--/.ROW-->


    </div>
    <!-- /. PAGE INNER  -->
</div>


@endsection


