@extends("master")

@section("content")
<div class="wrapper row4">
   <div id="container" class="clear"> 
      <!-- ####################################################################################################### -->
      <div id="homepage" class="clear">
          <a href="{{url('/')}}">Home</a>&#8702;
          <a href="{{url('/credit-management')}}">New Credit</a>&#8702;
          <a href="{{url('/credit-management/view')}}">Credit View</a>
          <h1>View Credit</h1>
         {{ Session::get('message') }}
         <table border='1' cellpading='5' cellspacing='1' width='100%'>
             <tr>
                 <th>Year</th>
                 <th>Department</th>
                 <th>Course</th>
                 <th>Edit</th>
                 <th>Delete</th>
             </tr>
             @foreach($allCredit as $value)
             <tr>
                <td>{{$value->year}}</td>
                <td>{{$value->dname}}</td>
                <td>{{$value->cname}}</td>
                <td><a href="{{url('/')}}/credit-management/edit/{{$value->id}}">Edit</a></td>
                <td><a href="{{url('/')}}/credit-management/delete/{{$value->id}}">Delete</a></td>
             </tr>
             @endforeach
         </table>
      </div>
      <!-- ####################################################################################################### --> 
   </div>
</div>
<!-- ####################################################################################################### -->
@endsection