@extends("admin-master")

@section("content")
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Student Information</h1>
                <h1 class="page-subhead-line">This is dummy text , you can replace it with your original text. </h1>

            </div>
        </div>
        <!-- /. ROW  -->
        <div class="row">

            <div class="col-md-12">
                <!--    Context Classes  -->
                <div class="panel panel-default">

                    <div class="panel-heading">
                        Context Classes
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
                                        <th>Name <span>&#8645;</span></th>
                                        <th>Email <span>&#8645;</span></th>
                                        <th>Contact <span>&#8645;</span></th>
                                        <th>Picture</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $serial = 1;?>
                                    @foreach($allStd as $value)
                                    <tr class="odd gradeX success">
                                         <td>{{$serial++}}</td>
                                        <td>{{$value->id}}</td>
                                        <td>{{$value->name}}</td>
                                        <td>{{$value->email}}</td>
                                        <td>{{$value->contact}}</td>
                                        <td>
                                            @if($value->picture)
                                            <img src="{{'url'('/')}}/images/student/student-{{$value->id}}.{{$value->picture}}" width="100"/>
                                            @endif
                                        </td>
                                        <td><a href="{{url('/')}}/student-management/edit/{{$value->id}}" title="Edit"><span class="glyphicon glyphicon-edit"></span></a></td>
                                        <td><a href="{{url('/')}}/student-management/delete/{{$value->id}}" title="Delete"><span class="glyphicon glyphicon-trash"></span></a></td>
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