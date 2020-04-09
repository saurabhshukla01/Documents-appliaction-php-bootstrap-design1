@extends("admin-master")

@section("content")
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <a href="{{url('/')}}">Home</a>&#8702;
                <a href="{{url('/semesterfees-management')}}">Semester Fees</a>&#8702;
                <a href="{{url('/semesterfees-management/view')}}">Semester Fees View</a>
                <!--<a href="{{url('/examfees-management/view')}}">Examfees View</a>-->
                {{ Session::get('message') }}
                <h1 class="page-head-line">Semester Fees View </h1>
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
                                            <th>Year<span>&#8645;</span></th>
                                            <th>Semester<span>&#8645;</span></th>
                                            <th>Studentid<span>&#8645;</span></th>
                                            <th>Date<span>&#8645;</span></th>
                                            <th>Amount<span>&#8645;</span></th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php $serial = 1; ?>
                                        @foreach($allSeme as $value)
                                        <tr class="odd gradeX success">
                                             <td>{{$serial++}}</td>
                                            <td>{{$value->year}}</td>
                                            <td>{{$value->semester}}</td>
                                            <td>{{$value->sname}}</td>
                                            <td>{{$value->date}}</td>
                                            <td>{{$value->amount}}</td>
                                            <td><a href="{{url('/')}}/semesterfees-management/edit/{{$value->id}}" title="Edit" ><span class="glyphicon glyphicon-edit" ></span></a></td>
                                            <td><a href="{{url('/')}}/semesterfees-management/delete/{{$value->id}}" title="Delate"><span class="glyphicon glyphicon-trash"></span></a></td>
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

