@extends("admin-master")

@section("content")
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Administrator Edit</h1>
                <h1 class="page-subhead-line">This is dummy text , you can replace it with your original text. </h1>

            </div>
        </div>
        <!-- /. ROW  -->
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        New Administrator
                    </div>
                    <div class="panel-body">
                        @if(Session::get('message'))
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{ Session::get('message') }} 
                            
                        </div>
                        @endif
                         @foreach($alAd as $value)
                        <form action="{{url('/administrator-management/update')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" class="form-control" name='id' value="{{$value->id}}"  />
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name='name' value="{{$value->name}}"  />
                                <p class="help-block">{{ ($errors->has('name')) ? $errors->first('name') : '' }}</p>
                            </div>
                            <div class="form-group">
                                <label>Email:</label>
                                <input type="text" class="form-control" name='email' value="{{$value->email}}" />
                                <p class="help-block">{{ ($errors->has('email')) ? $errors->first('email') : '' }}</p>
                            </div>
                            <div class="form-group">
                                <label>Password:</label>
                                <input type="password" class="form-control" name='pass' value="{{$value->password}}" />
                                <p class="help-block">{{ ($errors->has('pass')) ? $errors->first('pass') : '' }}</p>
                            </div>
                            <div class="form-group">
                                <label>Type:</label>
                                <input type="text" class="form-control" name='tp' value="{{$value->type}}" />
                                <p class="help-block">{{ ($errors->has('tp')) ? $errors->first('tp') : '' }}</p>
                            </div>
                           
                            <div class="form-group">
                                <label>Picture:</label>
                                <input type="file" name='pic' class="form-control" value="{{$value->picture}}" />
                                <p class="help-block">{{ ($errors->has('pic')) ? $errors->first('pic') : '' }}</p>
                            </div>



                            <input type="submit" class="btn btn-success" name='sub' value=' Update ' />

                        </form>
                         @endforeach
                    </div>
                </div>
            </div>

        </div>
        <!--/.ROW-->


    </div>
    <!-- /. PAGE INNER  -->
</div>
@endsection