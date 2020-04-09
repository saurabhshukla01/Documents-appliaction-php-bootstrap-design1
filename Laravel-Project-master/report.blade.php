@extends("master")

@section("content")

<div class="wrapper row4">
   <div id="container" class="clear"> 
      <!-- ####################################################################################################### -->
      <div id="homepage" class="clear">
         {{ Session::get('message') }}
         <form action="{{url('/exam-report')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <table cellpadding="5">
               <tr>
                  <td>Choose Year:</td>
                  <td>
                     <select name="year" id="year">
                        <option value="1">1st Year</option>
                        <option value="2">2nd Year</option>
                        <option value="3">3rd Year</option>
                        <option value="4">4th Year</option>
                     </select>
                  </td>
               </tr>
               <tr>
                  <td>Choose Semester:</td>
                  <td>
                     <select name="semester" id="sem">
                        <option value="1">1st Semester</option>
                        <option value="2">2nd Semester</option>
                        <option value="3">3rd Semester</option>
                     </select>
                     <span id="loaddata" style="font-size: 25px; color: #F00; cursor: pointer;">&#8811;</span>
                  </td>
               </tr>
               <tr>
                  <td>Choose Student:</td>
                  <td>
                     <select name="studentid" id="student"></select>
                  </td>
               </tr>
               <tr>
                  <td>Choose Course:</td>
                  <td>
                     <select name="courseid" id="course"></select>
                  </td>
               </tr>
               
               <tr>
                  <td colspan="2">
                     <span id="allStd"></span>
                  </td>
               </tr>
            </table>
         </form>
      </div>
      <script>
      $(document).ready(function(){
         $("#loaddata").click(function(){
            var datalist = "year=" + $("#year").val() + "&sem=" + $("#sem").val();
            $.ajax({
                  type: 'GET',
                  data: datalist,
                  url: "{{url('/')}}/exam-report/student",
                  success: function(data) {
                     $("#student").html(data);
                  }
               });
         });
         
         $("#student").change(function(){
            var datalist = "studentid=" + $(this).val() + "&year=" + $("#year").val() + "&sem=" + $("#sem").val();
            $.ajax({
                  type: 'GET',
                  data: datalist,
                  url: "{{url('/')}}/exam-report/course",
                  success: function(data) {
                     $("#course").html(data);
                  }
               });
         });
         
         $("#course").change(function(){
            var datalist = "courseid=" + $(this).val() + "&studentid=" + $("#student").val() + "&year=" + $("#year").val() + "&sem=" + $("#sem").val();
            
            //alert(datalist);
            $.ajax({
                  type: 'GET',
                  data: datalist,
                  url: "{{url('/')}}/exam-report/result",
                  success: function(data) {
                     $("#allStd").html(data);
                  }
               });
         });
      });
      </script>
      <!-- ####################################################################################################### --> 
   </div>
</div>
<!-- ####################################################################################################### -->
@endsection