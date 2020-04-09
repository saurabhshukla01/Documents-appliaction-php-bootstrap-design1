﻿<!DOCTYPE html>
<html xmlns="http:/www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Responsive Bootstrap Advance Admin Template</title>

        <!-- BOOTSTRAP STYLES-->
        <link href="{{url('')}}/assets/css/bootstrap.css" rel="stylesheet" />
        <!-- FONTAWESOME STYLES-->
        <link href="{{url('')}}/assets/css/font-awesome.css" rel="stylesheet" />
        <!-- GOOGLE FONTS-->
        <link href='http:/fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

    </head>
    <body style="background-color: #E2E2E2;">
        <div class="container">
            <div class="row text-center " style="padding-top:100px;">
                <div class="col-md-12">
                    <img src="{{url('')}}/assets/img/logo-invoice.png" />
                </div>
            </div>
            <div class="row ">

                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">

                    <div class="panel-body">
                        {{ Session::get('message') }}

                        <form action="{{url('/login/check')}}" method="post">
                            {{ csrf_field() }}
                            <hr />
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                <input type="text" name='email' value="" class="form-control" />
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                <input type="password" name='pass' value="{{old('pass')}}" class="form-control" />
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                <select name='type' class="form-control">
                                    <option value="1">Student</option>
                                    <option value="2">Teacher</option>
                                    <option value="3">Administrator</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="checkbox-inline">
                                    <input type="checkbox" /> Remember me
                                </label>
                                <span class="pull-right">
                                    <a href="index.html" >Forget password ? </a> 
                                </span>
                            </div>
                            <input type="submit" class="btn btn-primary " name='sub' value='Login Now' />
                            <hr />
                            Not register ? <a href="index.html" >click here </a> or go to <a href="index.html">Home</a> 
                        </form>
                    </div>

                </div>


            </div>
        </div>

    </body>
</html>