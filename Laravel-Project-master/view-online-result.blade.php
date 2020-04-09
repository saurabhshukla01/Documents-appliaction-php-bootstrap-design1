@extends("admin-master")

@section("content")
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                {{ Session::get('message') }}
                <h1 class="page-head-line">Online Result View </h1>

            </div>
        </div>
        <!-- /. ROW  -->
        <div class="row">
            <div class="col-md-12">
                <div >


                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="table-responsive">
                            <table class="table table-hover" id="dataTables-example">
                                    <thead>
                                        <tr style="background-color: #00CA79">
                                            <th>#</th>
                                            <th>Student ID:<span>&#8645;</span></th>
                                            <th>Student Name:<span>&#8645;</span></th>
                                            <th>Subject Id:<span>&#8645;</span></th>
                                            <th>GPA<span>&#8645;</span></th>
                                            <th>Date<span>&#8645;</span></th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php $serial = 1; ?>
                                        @foreach($result as $value)
                                        <tr class="odd gradeX success">
                                            <td>{{$serial++}}</td>
                                            <td>{{$value->id}}</td>
                                            <td>{{$value->stname}}</td>
                                            <td>{{$value->sname}}</td>
                                            <td>{{$value->gpa}}</td>
                                            <td>{{$value->date}}</td>
                                            
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



