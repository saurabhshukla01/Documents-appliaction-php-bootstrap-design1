@extends("admin-master")

@section("content")
<!-- Date Picker Start -->
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" type="text/javascript"></script>
<script type="text/javascript" src="https://tinymce.cachefly.net/4.1/tinymce.min.js"></script>


<script>
    $(function () {
        $("#datepicker").datepicker({dateFormat: "yy-mm-dd"}).val();
    });
</script>
<div id="page-wrapper">
    <div id="page-inner">

        <!-- /. ROW  -->
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-info">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Semester Fees</h1>

                        <h1 class="page-subhead-line"><a href="{{url('/')}}">Home</a>&#8702;
                            <a href="{{url('/semesterfees-management')}}">Semester Fees</a>&#8702;
                            <a href="{{url('/semesterfees-management/view')}}">Semester Fees View</a> </h1> 
                    </div>
                    <div class="panel-body">
                        @if(Session::get('message'))
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ Session::get('message') }} 
                        </div>
                        @endif
                        <form  action="{{url('/semesterfees-management')}}" method="post" role="form">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Year:</label>
                                <select class="form-control" name="year">
                                    <option value="1st year">1st year</option>
                                    <option value="2nd year">2nd year</option>
                                    <option value="3rd year">3rd year</option>
                                    <option value="4th year">4th year</option>
                                </select>
                                <p class="help-block">{{ ($errors->has('year')) ? $errors->first('year') : '' }}</p>
                            </div>

                            <div class="form-group">
                                <label>Semester:</label>
                                <select class="form-control" name="semester">
                                    <option value="0">Choose Semester</option>
                                    <option value="1st">Semester-1</option>
                                    <option value="2nd">Semester-2</option>
                                    <option value="3rd">Semester-3</option>
                                </select>
                                <p class="help-block">{{ ($errors->has('semester')) ? $errors->first('semester') : '' }}</p>
                            </div>

                            <div class="form-group">
                                <label>Student ID:</label>
                                <select class="form-control" name="stdid">
                                    @foreach($allstude as $stude)
                                    <option value="{{$stude->id}}">{{$stude->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Date:</label>
                                <input type="text" name='date' id="datepicker" class="form-control" value="{{old('date')}}" />
                                <p class="help-block">{{ ($errors->has('date')) ? $errors->first('date') : '' }}</p>
                            </div>

                            <div class="form-group">
                                <label>Amount</label>
                                <input type="text" name='amount' class="form-control" value="{{old('amount')}}"/>
                                <p class="help-block">{{ ($errors->has('amount')) ? $errors->first('amount') : '' }}</p>
                            </div>                            

                            <input type="submit" class="btn btn-success" name='sub' value='Save' />

                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!--/.ROW-->


    </div>
    <!-- /. PAGE INNER  -->
</div>
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
        content_css: ""
    });
</script>
@endsection