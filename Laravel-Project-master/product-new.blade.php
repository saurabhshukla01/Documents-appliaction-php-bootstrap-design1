@extends("master")

@section("content")
<div class="wrapper row4">
   <div id="container" class="clear"> 
      <!-- ####################################################################################################### -->
      <div id="homepage" class="clear">
         {{ Session::get('message') }}
         <form action="{{url('/product-management')}}" method="post">
            {{ csrf_field() }}
            <table cellpadding="5">
               <tr>
                  <td>Title:</td>
                  <td><input type="text" name='title' value="{{old('title')}}" /></td>
                  <td>{{ ($errors->has('title')) ? $errors->first('title') : '' }}</td>
               </tr>
               <tr>
                  <td>Description:</td>
                  <td><textarea name='descr'>{{old('descr')}}</textarea></td>
                  <td>{{ ($errors->has('descr')) ? $errors->first('descr') : '' }}</td>
               </tr>
               <tr>
                  <td>Price:</td>
                  <td><input type="text" name='price' value="{{old('price')}}" /></td>
                  <td>{{ ($errors->has('price')) ? $errors->first('price') : '' }}</td>
               </tr>
               <tr>
                  <td>Vat:</td>
                  <td><input type="text" name='vat' value="{{old('vat')}}"/></td>
                  <td>{{ ($errors->has('vat')) ? $errors->first('vat') : '' }}</td>
               </tr>
               <tr>
                  <td>Discount:</td>
                  <td><input type="text" name='discount' value="{{old('discount')}}" /></td>
                  <td></td>
               </tr>
               <tr>
                  <td>Choose Category:</td>
                  <td>
                     <select name='catid'>
                        @foreach($allCat as $cat)
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
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