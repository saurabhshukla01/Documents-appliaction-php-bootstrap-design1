
@extends("admin-master")

@section("content")
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
    $(function () {
        $("#datepicker").datepicker({dateFormat: "yy-mm-dd"}).val();
    });
</script>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Add Gallery</h1>

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
                        New Gallery
                    </div>
                    <div class="panel-body">
                        @if(Session::get('message'))
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{ Session::get('message') }} 
                            
                        </div>
                        @endif
                        <form action="{{url('/gallery-management')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name='title' value="{{old('title')}}" />
                                <p class="help-block">{{ ($errors->has('title')) ? $errors->first('title') : '' }}</p>
                            </div>
                            <div class="form-group">
                                <label>Date</label>
                                <input type="datetime" class="form-control" id="datepicker" name='date' value="{{old('date')}}" />
                                <p class="help-block">{{ ($errors->has('date')) ? $errors->first('date') : '' }}</p>
                            </div>
                            <div class="form-group">
                                <label>Picture:</label>
                                <input type="file" class="form-control" name='pic' value="{{old('pic')}}" />
                                <p class="help-block">{{ ($errors->has('pic')) ? $errors->first('pic') : '' }}</p>
                            </div>


                          

                            <input type="submit" class="btn btn-success" name='sub' value=' Save ' />

                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!--/.ROW-->


    </div>
    <!-- /. PAGE INNER  -->
</div>
@endsection










