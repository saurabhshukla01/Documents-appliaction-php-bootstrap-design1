@extends("admin-master")

@section("content")
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Subject Update</h1>
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
                        Subject Recovery
                    </div>
                    <div class="panel-body">
                        @if(Session::get('message'))
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ Session::get('message') }} 

                        </div>
                        @endif
                        @foreach($slecou as $value)
                        <form action="{{url('/subject-management/update')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name='id' value="{{$value->id}}" />
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name='name' value="{{$value->name}}" />
                                <p class="help-block">{{ ($errors->has('name')) ? $errors->first('name') : '' }}</p>
                            </div>



                            <div class="form-group">
                                <label>Course ID</label>
                                <select class="form-control" name="cid">

                                    @foreach($allcour as $cour)
                                    <option value="{{$cour->id}}">{{$cour->name}}</option>
                                    @endforeach
                                </select>
                            </div>




                            <input type="submit" class="btn btn-success" name='sub' value=' Update ' />

                        </form>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
        <!--/.ROW-->


    </div>
    <!-- /. PAGE INNER  -->
</div>
@endsection