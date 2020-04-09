
@extends("admin-master")

@section("content")
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">View Gallery</h1>

                <h1 class="page-subhead-line"><a href="{{url('/')}}">Home</a>&#8702;
                    <a href="{{url('/gallery-management')}}">New Galery</a>&#8702;
                    <a href="{{url('/gallery-management/view')}}">Galery View</a> </h1> 
            </div>
        </div>
        <!-- /. ROW  -->
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Gallery
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
                                 <th>Title <span style="color: #FFF;">&#8645;</span></th>
                                 <th>Date</th>
                                 <th>Picture</th>
                                 <th>Edit</th>
                                 <th>Delete</th>
                            </tr>
                          </thead>
                           <tbody>
                            @foreach($allStd as $value)
                            <tr class="odd gradeX success">
                               <td>{{$value->title}}</td>
                               <td>{{$value->date}}</td>
                               <td>
                                  @if($value->picture != "")
                                  <img src="{{url('/')}}/images/student/student-{{$value->id}}.{{$value->picture}}" width="100" />
                                  @endif
                               </td>
                               <td><a href="{{url('/')}}/gallery-management/edit/{{$value->id}}">Edit</a></td>
                                <td><a href="{{url('/')}}/gallery-management/delete/{{$value->id}}">Delete</a></td>
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







