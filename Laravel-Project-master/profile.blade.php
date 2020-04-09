@extends("admin-master")

@section("content")
<div id="page-wrapper">
    <div id="page-inner">
        <!-- /. ROW  -->
        <div class="row">

            <div class="col-md-12">
                <!--    Context Classes  -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        @if(Session::get('message'))
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ Session::get('message') }} 

                        </div>
                        @endif
                        <h3><i class="fa fa-user"> </i> About</h3>
                    </div>
                    <div class="col-sm-6 row hover">
  <!-- *********************************** Student Profile******************************************************-->
                        @if(Session::get('mytype') == 's')
                        @foreach($allStudent as $value)
                        <div class="panel modal-header">
                            <div style="float: left; margin:5%;" class="img-responsive modal-content">
                                <img src="{{'url'('/')}}/images/student/student-{{$value->id}}.{{$value->picture}}" width="100"/>
                            </div>
                            <h4>{{$value->name}}</h4>
                            <p><i class="fa fa-graduation-cap"></i> Student</p>
                        </div>
                        <div class="panel modal-header">
                            <p>Fater Name: {{$value->fatherName}}</p>
                            <p>Mother Name: {{$value->motherName}}</p>
                        </div>
                    
                    <div class="col-sm-6">
                        <h1 class="page-subhead-line"><i class="fa fa-envelope"></i> {{$value->email}}</h1>
                        <h1 class="page-subhead-line"><i class="fa fa-phone"></i> {{$value->contact}}</h1>
                        <h1 class="page-subhead-line"><i class="fa fa-home"></i> {{$value->address}}</h1>
                        <h1 class="page-subhead-line"><i class="fa fa-birthday-cake"></i> {{$value->dob}}</h1>
                        <h1 class="page-subhead-line"><i class="fa fa-genderless"></i> {{$value->gender}}</h1>
                        @endforeach
                        @endif
                    </div>
  <!-- *********************************** Teacher Profile******************************************************-->
                        @if(Session::get('mytype') == 't')
                        @foreach($allTeacher as $value)
                        <div class="panel modal-header">
                            <div style="float: left; margin:5%;" class="img-responsive modal-content">
                                <img src="{{'url'('/')}}/images/teacher/teacher-{{$value->id}}.{{$value->picture}}" width="100"/>
                            </div>
                            <h4>{{$value->name}}</h4>
                            <p><i class="fa fa-book"></i> Teacher</p>
                        </div>
                        <div class="panel modal-header">
                            <p>Department Name: {{$value->departmentid}}</p>
                            <p>Designation Name: {{$value->designationid}}</p>
                        </div>
                    <div class="col-sm-6">
                        <h1 class="page-subhead-line"><i class="fa fa-envelope"></i> {{$value->email}}</h1>
                        <h1 class="page-subhead-line"><i class="fa fa-phone"></i> {{$value->contact}}</h1>
                        <h1 class="page-subhead-line"><i class="fa fa-money"></i> {{$value->salary}}</h1>
                        <h1 class="page-subhead-line"><i class="fa fa-genderless"></i> {{$value->gender}}</h1>
                        @endforeach
                        @endif
                    </div>
  <!-- *********************************** Admin Profile******************************************************-->                      
                        @if(Session::get('mytype') == 'a')
                        @foreach($allAdmin as $value)
                        <div class="panel modal-header">
                            <div style="float: left; margin:5%;" class="img-responsive modal-content">
                                <img src="{{'url'('/')}}/images/administrator/administrator-{{$value->id}}.{{$value->picture}}" width="100"/>
                            </div>
                            <h4>{{$value->name}}</h4>
                            <p><i class="fa fa-university"></i> Administrator</p>
                        </div>
                    <div class="col-sm-6">
                        <h1 class="page-subhead-line"><i class="fa fa-envelope"></i> {{$value->email}}</h1>
                        @endforeach
                        @endif
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