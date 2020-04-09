@extends("admin-master")

@section("content")
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                {{ Session::get('message') }}
                <h1 class="page-head-line">Daily Attendendce Report </h1>

            </div>
        </div>
        <!-- /. ROW  -->
        <div class="row">
            <div class="col-md-12">
                <div >


                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Student Name:</th>
                                            <th>Teacher Name:</th>
                                            <th>Year</th>
                                            <th>Semester</th>
                                             <th>Date</th>
                                              <th>Status</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($allatten as $value)
                                        <tr>
                                            <td>{{$value->tname}}</td>
                                            <td>{{$value->stname}}</td>
                                            <td>{{$value->year}}</td>
                                            <td>{{$value->semester}}</td>
                                            <td>{{$value->date}}</td>
                                            <td>{{$value->status}}</td>
                                            
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <!-- /. PAGE INNER  -->
</div>
@endsection



