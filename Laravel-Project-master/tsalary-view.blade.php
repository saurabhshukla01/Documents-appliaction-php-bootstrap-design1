@extends("master")

@section("content")
<div class="wrapper row4">
   <div id="container" class="clear"> 
      <!-- ####################################################################################################### -->
      <div id="homepage" class="clear">
          <a href="{{url('/')}}">Home</a>&#8702;
            <a href="{{url('/tsalary-management')}}">New Teacher Salary</a>&#8702;
            <a href="{{url('/tsalary-management/view')}}">Teacher Salary View</a>
            <h1>Add New Teacher Salary</h1>
         {{ Session::get('message') }}
         <h2>Salary View</h2>
         <table border="1" width="100%" cellpadding="5">
            <tr>
               
               <th>Salary ID</th>
               <th>Date</th>
               <th>Amount</th>
               <th>Edit</th>
               <th>Delete</th>
            </tr>
            @foreach($allte as $value)
            <tr>
              
               <td>{{$value->tname}}</td>
               <td>{{$value->date}}</td>
               <td>{{$value->amount}}</td>
               <td><a href="{{url('/')}}/tsalary-management/edit/{{$value->id}}">Edit</a></td>
                <td><a href="{{url('/')}}/tsalary-management/delete/{{$value->id}}">Delete</a></td>
            </tr>
            @endforeach
         </table>
      </div>
      <!-- ####################################################################################################### --> 
   </div>
</div>
<!-- ####################################################################################################### -->
@endsection


