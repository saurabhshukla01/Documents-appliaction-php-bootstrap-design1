@extends("admin-master")

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
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">New Expense</h1>
                
                <a href="{{url('/')}}">Home</a>&#8702;
          <a href="{{url('/expense-management')}}">New Expense</a>&#8702;
          <a href="{{url('/expense-management/view')}}">Expense View</a> 
            </div>
        </div>
        <!-- /. ROW  -->
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        New Expense
                    </div>
                    <div class="panel-body">
                        @if(Session::get('message'))
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{ Session::get('message') }} 
                            
                        </div>
                        @endif
                        <form action="{{url('/expense-management')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name='name' value="{{old('name')}}" />
                                <p class="help-block">{{ ($errors->has('name')) ? $errors->first('name') : '' }}</p>
                            </div>
                            
                            <div class="form-group">
                                <label>Description:</label>
                                <textarea name='descr' class="form-control" >{{old('descr')}}</textarea>
                                <p class="help-block">{{ ($errors->has('descr')) ? $errors->first('descr') : '' }}</p>
                            </div>
                            
                            <div class="form-group">
                                <label>Amount:</label>
                                <input type="text" name='amount' class="form-control" value="{{old('amount')}}" />
                                <p class="help-block">{{ ($errors->has('amount')) ? $errors->first('amount') : '' }}</p>
                            </div>
                            
                            <div class="form-group">
                                <label>Date:</label>
                                <input type="text" name='date' id="datepicker" class="form-control" value="{{old('date')}}" />
                                <p class="help-block">{{ ($errors->has('date')) ? $errors->first('date') : '' }}</p>
                            </div>
                            
                            <input type="submit" class="btn btn-success" name='sub' value=' Save ' />

                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!--/.ROW-->


    </div>
    <!-- /. PAGE INNER  -->
</div>

<script type="text/javascript" src="https://tinymce.cachefly.net/4.1/tinymce.min.js"></script>
    <script type="text/javascript">
   
    tinymce.init({
        selector: "textarea",
        theme: "modern",
        setup: function (editor) {
			editor.on('change', function () {
				editor.save();
			});
		},
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
        toolbar2: "print preview media | forecolor backcolor emoticons",
        image_advtab: true,
        templates: [
            {title: 'Test template 1', content: 'Test 1'},
            {title: 'Test template 2', content: 'Test 2'}
        ],
        image_title: true,
      convert_urls: false,
content_css : "css/content.css"
    });
    </script>

@endsection
