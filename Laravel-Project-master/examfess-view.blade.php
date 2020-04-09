@extends("admin-master")

@section("content")
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <a href="{{url('/')}}">Home</a>&#8702;
                <a href="{{url('/examfees-management')}}">New Examfees</a>&#8702;
                 <a href="{{url('/examfees-management/view')}}">information of Examfees</a>
                <!--<a href="{{url('/examfees-management/view')}}">Examfees View</a>-->
               <!-- {{ Session::get('message') }}-->
                <h1 class="page-head-line">Examfees View </h1>

            </div>
        </div>
        <!-- /. ROW  -->
        <div class="row">
            <div class="col-md-12">
                <div >


                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="table-responsive">
                              @if(Session::get('message'))
                            <div class="alert alert-success alert-dismissable">
                               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                              {{ Session::get('message') }}

                             </div>
                              @endif
                                <table class="table table-striped  table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                        <th>#</th>
                                            <th>Year<span>&#8645;</span></th>
                                            <th>Semester<span>&#8645;</span></th>
                                            <th>Student ID<span>&#8645;</span></th>
                                            <th>Date<span>&#8645;</span></th>
                                            <th>Amount<span>&#8645;</span></th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $serial = 1; ?>
                                        @foreach($allStd as $value)
                                        <tr>
                                        	<td>{{$serial++}}</td>
                                            <td>{{$value->year}}</td>
                                            <td>{{$value->semester}}</td>
                                            <td>{{$value->sname}}</td>
                                            <td>{{$value->date}}</td>
                                            <td>{{$value->amount}}</td>
                                            <td><a href="{{url('/')}}/examfees-management/edit/{{$value->id}}"><span class="glyphicon glyphicon-edit" title="Edit"></a></td>
                                            <td><a href="{{url('/')}}/examfees-management/delete/{{$value->id}}"><span class="glyphicon glyphicon-trash" title="Delete"></a></td>
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

