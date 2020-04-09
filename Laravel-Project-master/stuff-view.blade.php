
@extends("admin-master")

@section("content")
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">New Notice</h1>

                <h1 class="page-subhead-line"><a href="{{url('/')}}">Home</a>&#8702;
                    <a href="{{url('/stuff-management')}}">New Stuff</a>&#8702;
                    <a href="{{url('/stuff-management/view')}}">Stuff View</a> </h1> 
            </div>
        </div>
        <!-- /. ROW  -->
        <div class="row">

            <div class="col-md-12">
                <!--    Context Classes  -->
                <div class="panel panel-default">

                    <div class="panel-heading">
                       Stuff Information
                    </div>

                    <div class="panel-body">
                        <div class="table-responsive">
                         @if(Session::get('message'))
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ Session::get('message') }}

                        </div>
                        @endif
                            <table class="table table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                       <th>#</th>
                                       <th>Name <span style="color: #FFF;">&#8645;</span></th>
                                       <th>Contact</th>
                                       <th>Email</th>
                                       <th>Password</th>
                                       <th>Department</th>
                                       <th>Designation</th>
                                       <th>Salary</th>
                                       <th>Gender</th>
                                       <th>Picture</th>
                                       <th>Edit</th>
                                       <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($allStd as $value)
                                    <tr class="odd gradeX success">
                                       <td>{{$value->id}}</td>
                                       <td>{{$value->name}}</td>
                                       <td>{{$value->contact}}</td>
                                       <td>{{$value->email}}</td>
                                       <td>{{$value->password}}</td>
                                       <td>{{$value->dname}}</td>
                                        
                                       <td>{{$value->cname}}</td>
                                       <td>{{$value->salary}}</td>
                                       <td>{{$value->gender}}</td>
                                       <td>
                                          @if($value->picture)
                                          <img src="{{url('/')}}/images/student/student-{{$value->id}}.{{$value->picture}}" width="100" />
                                          @endif
                                       </td>
                                       <td><a href="{{url('/')}}/stuff-management/edit/{{$value->id}}">Edit</a></td>
                                        <td><a href="{{url('/')}}/stuff-management/delete/{{$value->id}}">Delete</a></td>
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


