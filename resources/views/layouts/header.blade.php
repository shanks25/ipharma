<!DOCTYPE html>
<html lang="en">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>iPharma Limited | {{ $title or '' }}</title>

    <link href="{{URL::asset('assets/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

    <link href="{{URL::asset('assets/datatable/dataTables.bootstrap.min.css')}}" rel="stylesheet">


    <link href="{{URL::asset('assets/toastr/toastr.min.css')}}" rel="stylesheet">

    <link href="{{URL::asset('assets/select2/css/select2.min.css')}}" rel="stylesheet">

    <link href="{{URL::asset('assets/icheck/minimal.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet">


    <link href="{{URL::asset('css/summernote.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/dropzone.min.css')}}" rel="stylesheet">

    <link href="{{URL::asset('css/presentation-style.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/jquery.domenu-0.99.77.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('assets/jQuery-Smart-Wizard-master/styles/smart_wizard.css') }}">


    <!-- Custom Theme Style -->
    <link href="{{URL::asset('css/gentelella.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/style.css')}}" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
                <a href="{{ url('admin') }}" class="site_title" style="font-size: 18px;"><i class="fa fa-paw"></i> <span>Ipharma Limited</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
                <div class="profile_info" style="width: 100%;">
                <span>Welcome,</span>
                <h2>{{ Auth::user()->name }}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

			@include('layouts.sidebar')

          </div>
        </div>

@include('layouts.topbar')
