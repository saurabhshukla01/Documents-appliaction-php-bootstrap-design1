@extends("admin-master")

@section("content")
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Administrator View</h1>
                <h1 class="page-subhead-line"><a href="{{url('/')}}">Home</a>&#8702;
                    <a href="{{url('/administrator-management')}}">New Administrator</a>&#8702;
                    <a href="{{url('/administrator-management/view')}}">Administrator View</a>  </h1>

            </div>
        </div>
        <!-- /. ROW  -->
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        View Administrator
                    </div>
                    <div class="panel-body">
                        @if(Session::get('message'))
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ Session::get('message') }} 

                        </div>
                        @endif
                        <div class="table-responsive">
                            <table  class="table table-striped  table-hover" id="dataTables-example" border="1" width="100%" cellpadding="5">
                                <thead>
                                    <tr>
                                        <th> Name</th>
                                        <th>Email</th>
                                        <th>Type</th>
                                        <th>Picture</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($allAtd as $value)
                                    <tr class="odd gradeX success">
                                        <td>{{$value->name}}</td>
                                        <td>{{$value->email}}</td>
                                        <td>{{$value->type}}</td>
                                        <td>
                                            @if($value->picture)
                                            <img src="{{'url'('/')}}/images/administrator/administrator-{{$value->id}}.{{$value->picture}}" width="100"/>
                                            @endif
                                        </td>

                                        <td><a href="{{url('/')}}/administrator-management/edit/{{$value->id}}">Edit</a></td>
                                        <td><a href="{{url('/')}}/administrator-management/delete/{{$value->id}}">Delete</a></td>
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
<!-- ####################################################################################################### -->
@endsection


