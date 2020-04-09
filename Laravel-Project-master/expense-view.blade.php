@extends("admin-master")

@section("content")
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Expense View</h1><a href="{{url('/')}}">Home</a>&#8702;
          <a href="{{url('/expense-management')}}">New Expense</a>&#8702;
          <a href="{{url('/expense-management/view')}}">Expense View</a>
            </div>
        </div>
        <!-- /. ROW  -->
        <div class="row">

            <div class="col-md-12">
                <!--    Context Classes  -->
                <div class="panel panel-default">

                    <div class="panel-heading">
                        View Expense
                    </div>

                    <div class="panel-body">
                        @if(Session::get('message'))
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{ Session::get('message') }} 
                            
                        </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                    <th>#</th>
                                        <th>Name <span>&#8645;</span></th>
                                           <th>Description <span>&#8645;</span></th>
                                           <th>Amount <span>&#8645;</span></th>
                                           <th>Date <span>&#8645;</span></th>
                                           <th>Edit</th>
                                           <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $serial = 1; ?>
                                    @foreach($allExp as $value)
                                    <tr class="odd gradeX success">
                                        
                                    <td>{{$serial++}}</td>
                                        <td>{{$value->name}}</td>
               <td>{{strip_tags($value->description)}}</td>
               <td>{{$value->amount}}</td>
               <td>{{$value->date}}</td>
               <td><a href="{{url('/')}}/expense-management/edit/{{$value->id}}"title="Edit"><span class="glyphicon glyphicon-edit" ></span></a></td>
                <td><a href="{{url('/')}}/expense-management/delete/{{$value->id}}"title="Delete"><span class="glyphicon glyphicon-trash"></span></a></td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--  end  Context Classes  -->
            </div>
        </div>
        <!-- /. ROW  -->

    </div>
    <!-- /. PAGE INNER  -->
</div>
@endsection






