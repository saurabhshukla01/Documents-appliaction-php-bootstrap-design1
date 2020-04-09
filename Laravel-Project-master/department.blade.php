@extends("admin-master")

@section("content")
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Department New </h1>
                <h1 class="page-subhead-line"><a href="{{url('/')}}">Home</a>&#8702;
                        <a href="{{url('/department-management')}}">New Department</a>&#8702;
                        <a href="{{url('/department-management/view')}}">Department View</a> </h1>

            </div>
        </div>
        <!-- /. ROW  -->
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        
                        Department
                    </div>
                    <div class="panel-body">
                        @if(Session::get('message'))
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ Session::get('message') }} 

                        </div>
                        @endif
                        <form action="{{url('/department-management')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Department Name</label>
                                <input type="text" class="form-control" name='dname' value="{{old('name')}}" />
                                <p class="help-block">{{ ($errors->has('dname')) ? $errors->first('dname') : '' }}</p>
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
        setup: function(editor) {
            editor.on('change', function() {
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