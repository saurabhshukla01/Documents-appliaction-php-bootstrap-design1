@extends("master")

@section("content")
<!-- Date Picker Start -->
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>
   $(function() {
      $("#datepicker, #datepicker1").datepicker({dateFormat: "yy-mm-dd"}).val();
   });
</script>
<!-- Date Picker End -->
<div class="wrapper row4">
   <div id="container" class="clear"> 
      <!-- ####################################################################################################### -->
      <div id="homepage" class="clear">
          <a href="{{url('/')}}">Home</a>&#8702;
            <a href="{{url('/tsalary-management')}}">New salary</a>&#8702;
            <a href="{{url('/tsalary-management/view')}}">salary View</a>
            <h1>Add New salary</h1>
         {{ Session::get('message') }}
         <h2>salary</h2>
         <form action="{{url('/tsalary-management')}}" method="post">
            {{ csrf_field() }}
            <table cellpadding="5">
               <tr>
                  <td>Teacher ID:</td>
                  <td>
                     <select name='teid'>
                        @foreach($allte as $te)
                        <option value="{{$te->id}}">{{$te->name}}</option>
                        @endforeach
                     </select>
                  </td>
                  <td></td>
               </tr>
               <tr>
                  <td>Date:</td>
                  <td><input type="text" name="date" id="datepicker" value="{{old('date')}}" /></td>
                  <td>{{ ($errors->has('date')) ? $errors->first('date') : '' }}</td>
               </tr>
               <tr>
                  <td>Amount:</td>
                  <td><input type="text" name='amount' value="{{old('amount')}}"/></td>
                  <td>{{ ($errors->has('amount')) ? $errors->first('amount') : '' }}</td>
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
