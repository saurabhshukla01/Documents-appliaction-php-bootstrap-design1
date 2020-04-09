@extends("admin-master")

@section("content")
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Salary </h1>
                <h1 class="page-subhead-line">This is dummy text , you can replace it with your original text. </h1>

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
                       <table class="table table-hover" id="dataTables-example">
            <tr>
               
               <th>Employee Name <span>&#8645;</span> </th>
               <th>Date <span>&#8645;</span></th>
               <th>Amount <span>&#8645;</span></th>
               <th>Edit <span>&#8645;</span></th>
               <th>Delete <span>&#8645;</span></th>
            </tr>
            @foreach($allStff as $value)
            <tr>
              
               <td>{{$value->stname}}</td>
               <td>{{$value->date}}</td>
               <td>{{$value->amount}}</td>
               <td><a href="{{url('/')}}/salary-management/edit/{{$value->id}}">Edit</a></td>
                <td><a href="{{url('/')}}/salary-management/delete/{{$value->id}}">Delete</a></td>
            </tr>
            @endforeach
         </table>
                    </div>
                </div>
            </div>

        </div>
        <!--/.ROW-->


    </div>
    <!-- /. PAGE INNER  -->
</div>
@endsection