@extends("admin-master")

@section("content")
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Daily Attendence Callsheet</h1>
                <h1 class="page-subhead-line"></h1>

            </div>
        </div>
        <!-- /. ROW  -->
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Attendenc Call chart
                    </div>
                    <div class="panel-body">
                        @if(Session::get('message'))
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ Session::get('message') }} 

                        </div>
                        @endif
                        <form action="{{url('/daily-attendence')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Choose Year</label>
                                <select name="year" id="year" class="form-control">
                                    <option value="1">1st Year</option>
                                    <option value="2">2nd Year</option>
                                    <option value="3">3rd Year</option>
                                    <option value="4">4th Year</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Choose Semester</label>
                                <select name="semester" id="sem" class="form-control">
                                    <option value="1">1st Semester</option>
                                    <option value="2">2nd Semester</option>
                                    <option value="3">3rd Semester</option>
                                </select>
                                <span id="loaddata" style="font-size: 25px; color: #F00; cursor: pointer;">&#8811;</span>
                            </div>

                            <div class="form-group">
                                <label>Choose Teacher:</label>
                                <select name="teacherid" id="teacher" class="form-control"></select>
                            </div>
                            <div class="form-group">
                                <label>Choose Course:</label>
                                <select name="courseid" id="course" class="form-control"></select>
                            </div>

                            <div class="form-group">
                                <span id="allStd"></span>
                            </div>
                            
                            <input type="submit" class="btn btn-success" name='sub' value='save' />
                            
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!--/.ROW-->
        <script>
            $(document).ready(function () {
                $("#loaddata").click(function () {
                    var datalist = "year=" + $("#year").val() + "&sem=" + $("#sem").val();
                    $.ajax({
                        type: 'GET',
                        data: datalist,
                        url: "{{url('/')}}/attendence/teacher",
                        success: function (data) {
                            $("#teacher").html(data);
                        }
                    });
                });

                $("#teacher").change(function () {
                    var datalist = "teacherid=" + $(this).val() + "&year=" + $("#year").val() + "&sem=" + $("#sem").val();
                    $.ajax({
                        type: 'GET',
                        data: datalist,
                        url: "{{url('/')}}/attendence/course",
                        success: function (data) {
                            $("#course").html(data);
                        }
                    });
                });

                $("#course").change(function () {
                    var datalist = "courseid=" + $(this).val() + "&teacherid=" + $("#teacher").val() + "&year=" + $("#year").val() + "&sem=" + $("#sem").val();

                    //alert(datalist);
                    $.ajax({
                        type: 'GET',
                        data: datalist,
                        url: "{{url('/')}}/attendence/student",
                        success: function (data) {
                            $("#allStd").html(data);
                        }
                    });
                });
            });
        </script>

    </div>
    <!-- /. PAGE INNER  -->
</div>
@endsection