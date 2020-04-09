@extends("master")

@section("content")

<div class="wrapper row4">
   <div id="container" class="clear"> 
      <!-- ####################################################################################################### -->
      

      <div id="homepage" class="clear">
         {{ Session::get('message') }}
         <form action="{{url('/batch-management')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <table cellpadding="5">
               <tr>
                  <td>Name:</td>
                  <td><input type="text" name='name' value="{{old('name')}}" /></td>
                  <td>{{ ($errors->has('name')) ? $errors->first('name') : '' }}</td>
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