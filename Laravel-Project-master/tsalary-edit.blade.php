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
            {{ Session::get('message') }}
            <h2>Teacher Salary Update</h2>
            @foreach($selte as $value)
            <form action="{{url('/tsalary-management/update')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name='id' value="{{$value->id}}" />
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
                        <td><input type="text" name='date'  id="datepicker" value="{{$value->date}}" /></td>
                        <td>{{ ($errors->has('date')) ? $errors->first('date') : '' }}</td>
                    </tr>
                    <tr>
                        <td>Amount:</td>
                        <td><input type="text" name='amount' value="{{$value->amount}}" /></td>
                        <td>{{ ($errors->has('amount')) ? $errors->first('amount') : '' }}</td>
                    </tr>
                    
                    <tr>
                        <td></td>
                        <td><input type="submit" name='sub' value='Update' /></td>
                        <td></td>
                    </tr>
                </table>
            </form>
            @endforeach
        </div>
        <!-- ####################################################################################################### --> 
    </div>
</div>
<!-- ####################################################################################################### -->
@endsection


