@extends("master")

@section("content")
<div class="wrapper row4">
   <div id="container" class="clear"> 
      <!-- ####################################################################################################### -->
      <div id="homepage" class="clear">
          <a href="{{url('/')}}">Home</a>&#8702;
          <a href="{{url('/department-management')}}">New Notice</a>&#8702;
          <a href="{{url('/department-management/view')}}">Notice View</a>
          <h1>New Department</h1>
         {{ Session::get('message') }}
         <form action="{{url('/department-management')}}" method="post">
            {{ csrf_field() }}
            <table cellpadding="5">
               <tr>
                  <td>Department Name:</td>
                  <td><input type="text" name='dname' value="{{old('dname')}}" /></td>
                  <td>{{ ($errors->has('dname')) ? $errors->first('dname') : '' }}</td>
               </tr>
               
               <tr>
                  <td></td>
                  <td><input type="submit" name='sub' value='save' /></td>
                  <td></td>
               </tr>
            </table>
         </form>
      </div>
      <!-- ####################################################################################################### --> 
   </div>
</div>
<!-- ####################################################################################################### -->
@endsection

