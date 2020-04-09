@extends("admin-master")

@section("content")
<<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
    $(function () {
        $("#datepicker, #datepicker1").datepicker({dateFormat: "yy-mm-dd"}).val();
    });
</script>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Salary </h1>
                <h1 class="page-subhead-line"><a href="{{url('/')}}">Home</a>&#8702;
                    <a href="{{url('/salary-management')}}">New Salary</a>&#8702;
                    <a href="{{url('/salary-management/view')}}">Salary View</a><br><br><br> </h1>

            </div>
        </div>
        <!-- /. ROW  -->
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Salary
                    </div>
                    <div class="panel-body">
                        @if(Session::get('message'))
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ Session::get('message') }} 

                        </div>
                        @endif
                        <form action="{{url('/salary-management')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label>type</label>
                                <select class="form-control" name="type" id="type">
                                    <option value="0">Choose Type</option>
                                    <option value="1">Teacher</option>
                                    <option value="2">Staff</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <span id="loaddata"></span>
                            </div>
                            <div class="form-group">
                                <label>Date:</label>
                                <input type="text" class="form-control" name='date' id="datepicker" value="{{old('date')}}" />
                                <p class="help-block">{{ ($errors->has('date')) ? $errors->first('date') : '' }}</p>
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
<script>
   $(document).ready(function() {
      $("#type").change(function() {
         var datalist = "type=" + $("#type").val();
         
         $.ajax({
            type: 'GET',
            data: datalist,
            url: "{{url('/')}}/loading/staff-teacher",
            success: function(data) {
               $("#loaddata").html(data);
            }
         });
      });
   });
</script>
@endsection