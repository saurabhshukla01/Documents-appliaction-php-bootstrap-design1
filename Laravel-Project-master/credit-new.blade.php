@extends("master")

@section("content")
<!-- Date Picker Start -->
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
   $(function() {
      $("#datepicker").datepicker({dateFormat: "yy-mm-dd"}).val();
   });
</script>
<!-- Date Picker End -->
<div class="wrapper row4">
   <div id="container" class="clear"> 
      <!-- ####################################################################################################### -->
      <div id="homepage" class="clear">
          <a href="{{url('/')}}">Home</a>&#8702;
          <a href="{{url('/credit-management')}}">New Credit</a>&#8702;
          <a href="{{url('/credit-management/view')}}">Credit View</a>
          <h1>New Credit</h1>
          
         {{ Session::get('message') }}
         <form action="{{url('/credit-management')}}" method="post">
            {{ csrf_field() }}
            <table cellpadding="5">
               <tr>
                  <td>Year:</td>
                  <td><input type="text" name='year' id="datepicker" value="{{old('year')}}" /></td>
                  <td>{{ ($errors->has('year')) ? $errors->first('year') : '' }}</td>
               </tr>
               <tr>
                  <td>Department:</td>
                  <td>
                      <select name="departid">
                          @foreach($allDepart as $depart)
                          <option value="{{$depart->id}}">{{$depart->name}}</option>
                          @endforeach
                      </select>
                  </td>
                  <td></td>
               </tr>
               
               <tr>
                  <td>Course:</td>
                  <td>
                      <select name="coursid">
                          @foreach($allCourse as $course)
                          <option value="{{$course->id}}">{{$course->name}}</option>
                          @endforeach
                      </select>
                  </td>
                  <td></td>
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