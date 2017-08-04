<!DOCTYPE html>
<html lang="en">
<head>
  <title>Error!</title>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="{{asset('css/colorpicker.css')}}" />
  <link rel="stylesheet" href="{{asset('css/uniform.css')}}"/>
  <link rel="stylesheet" href="{{asset('css/select2.css')}}"/>
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
  <link rel="stylesheet" href="{{asset('css/bootstrap-responsive.min.css')}}" />
  <link rel="stylesheet" href="{{asset('css/fullcalendar.css')}}" />
  <link rel="stylesheet" href="{{asset('css/matrix-style-404.css')}}" />
  <link rel="stylesheet" href="{{asset('css/datepicker.css')}}" />
  <link rel="stylesheet" href="{{asset('css/matrix-media.css')}}" />
  <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
</head>
<body>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Sample pages</a> <a href="#" class="current">Error</a> </div>

  </div>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Error 405</h5>
          </div>
          <div class="widget-content">
            <div class="error_ex">
              <h1>405</h1>
              <h3>Something is wrong here. Method not allowed!</h3>
              <p>Access to this page is forbidden</p>
              <a class="btn btn-warning btn-big"  href="{{route('dashboard')}}">Back to Home</a> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Footer-part-->
@include('template.footer')
<!--end-Footer-part-->
<script src="../../../public/js/jquery.min.js"></script>
<script src="../../../public/js/jquery.ui.custom.js"></script>
<script src="../../../public/js/bootstrap.min.js"></script>
<script src="js/maruti.js"></script>
</body>
</html>
