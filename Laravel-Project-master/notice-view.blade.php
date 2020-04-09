@extends("admin-master")

@section("content")
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Notices View</h1>
                <h1 class="page-subhead-line"><a href="{{url('/')}}">Home</a>&#8702;
                    <a href="{{url('/notice-management')}}">New Notice</a>&#8702;
                    <a href="{{url('/notice-management/view')}}">Notice View</a> </h1>
            </div>
        </div>
        <!-- /. ROW  -->
        <div class="row">

            <div class="col-md-12">
                <!--    Context Classes  -->
                <div class="panel panel-default">

                    <div class="panel-heading">
                        View Notice
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
                                        <th>ID</th>
                                        <th>Serial<span>&#8645;</span></th>
                                        <th>Title <span>&#8645;</span></th>
                                <!--<th>Description <span>&#8645;</span></th>-->
                                        <th>Date <span>&#8645;</span></th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $serial = 1; ?>
                                    @foreach($allNotice as $value)
                                    <tr class="odd gradeX success">
                                        <td>{{$serial++}}</td>
                                        <td>{{$value->id}}</td>
                                        <td>{{$value->title}}</td>
                                <!--<td>{{strip_tags($value->description)}}</td>-->
                                        <td>{{$value->date}}</td>
                                        <td><a href="{{url('/')}}/notice-management/edit/{{$value->id}}" title="Edit"><span class="glyphicon glyphicon-edit"></span></a></td>
                                        <td><a href="{{url('/')}}/notice-management/delete/{{$value->id}} "title="Delete"><span class="glyphicon glyphicon-trash"></span></a></td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--  end  Context Classes  -->
            </div>
        </div>
        <!-- /. ROW  -->

    </div>
    <!-- /. PAGE INNER  -->
</div>
@endsection









