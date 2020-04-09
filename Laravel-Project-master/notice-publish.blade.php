@extends("master")

@section("content")

<div class="wrapper row4">
   <div id="container" class="clear"> 
      <!-- ####################################################################################################### -->
      <div id="homepage" class="clear">
         @foreach($publicNotice as $value)

         <h1 class="latestnews">{{$value->title}}</h1>

         <p class="latestnews">{{strip_tags($value->description)}}</p>
         @endforeach


      </div>
      <!-- ####################################################################################################### --> 
   </div>
</div>
<!-- ####################################################################################################### -->
@endsection


