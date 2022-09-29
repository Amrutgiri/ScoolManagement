<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Student Info | Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('admin/images/favicon.ico')}}">

       

        <!-- Plugins css -->
        <link href="{{asset('admin/libs/jquery-nice-select/nice-select.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin/libs/switchery/switchery.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin/libs/multiselect/multi-select.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin/libs/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin/libs/summernote/summernote-bs4.css')}}" rel="stylesheet" type="text/css" />

        {{-- DAtatables --}}
            <link href="{{asset('admin/libs/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
			<link href="{{asset('admin/libs/datatables/responsive.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
			<link href="{{asset('admin/libs/datatables/buttons.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
			<link href="{{asset('admin/libs/datatables/select.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
        <!-- App css -->
        <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('admin/css/app.min.css')}}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{asset('admin/css/custom.css')}}" type="text/css"/>
        <link href="{{asset('admin/css/jquery.dataTables.min.css')}}" type="text/css"/>

        <link rel="stylesheet" href="{{asset('admin/css/toastr.min.css')}}">

        <link rel="stylesheet" href="{{asset('admin/css/select2.min.css')}}" rel="stylesheet">
        <!-- Plugin css -->
        <link href="{{asset('admin/libs/fullcalendar/fullcalendar.min.css')}}" rel="stylesheet" type="text/css" />
        
       

    </head>

    <body>

        @include('admin.layouts.inc.header')
        @include('admin.layouts.inc.sidebar')

         <!-- Begin page -->
         <div id="wrapper">
            <div class="content-page">
                <div class="content">
        @yield('content')

        @include('admin.layouts.inc.footer')
            </div>
                </div>
         </div>

    
    
    <!-- Vendor js -->
    <script src="{{asset('admin/js/vendor.min.js')}}"></script>

    <!-- Plugins js-->
    <script src="{{asset('admin/libs/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{asset('admin/libs/jquery-knob/jquery.knob.min.js')}}"></script>
    <script src="{{asset('admin/libs/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('admin/libs/flot-charts/jquery.flot.js')}}"></script>
    <script src="{{asset('admin/libs/flot-charts/jquery.flot.time.js')}}"></script>
    <script src="{{asset('admin/libs/flot-charts/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{asset('admin/libs/flot-charts/jquery.flot.selection.js')}}"></script>
    <script src="{{asset('admin/libs/flot-charts/jquery.flot.crosshair.js')}}"></script>
    
    <script src="{{asset('admin/libs/jquery-nice-select/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('admin/libs/switchery/switchery.min.js')}}"></script>
    <script src="{{asset('admin/libs/multiselect/jquery.multi-select.js')}}"></script>
    <script src="{{asset('admin/libs/select2/select2.min.js')}}"></script>
    <script src="{{asset('admin/libs/jquery-mockjax/jquery.mockjax.min.js')}}"></script>
    <script src="{{asset('admin/libs/autocomplete/jquery.autocomplete.min.js')}}"></script>
    <script src="{{asset('admin/libs/bootstrap-select/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('admin/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js')}}"></script>
    <script src="{{asset('admin/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>

    {{-- Calender --}}
    <script src="{{asset('admin/libs/moment/moment.min.js')}}"></script>
    <script src="{{asset('admin/libs/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{asset('admin/libs/fullcalendar/fullcalendar.min.js')}}"></script>
    
    <!-- Dashboar 1 init js-->
    <script src="{{asset('admin/js/pages/dashboard-1.init.js')}}"></script>
    
    <!-- third party js -->
    <script src="{{asset('admin/libs/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/libs/datatables/dataTables.bootstrap4.js')}}"></script>
    <script src="{{asset('admin/libs/datatables/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admin/libs/datatables/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/libs/datatables/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('admin/libs/datatables/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/libs/datatables/buttons.html5.min.js')}}"></script>
    <script src="{{asset('admin/libs/datatables/buttons.flash.min.js')}}"></script>
    <script src="{{asset('admin/libs/datatables/buttons.print.min.js')}}"></script>
    <script src="{{asset('admin/libs/datatables/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('admin/libs/datatables/dataTables.select.min.js')}}"></script>
    <script src="{{asset('admin/libs/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('admin/libs/pdfmake/vfs_fonts.js')}}"></script>
    <!-- third party js ends -->

    <!-- Datatables init -->
    <script src="{{asset('admin/js/pages/datatables.init.js')}}"></script>
    <!-- App js-->
    <script src="{{asset('admin/js/app.min.js')}}"></script>
   {{-- dataTables --}}
    
    
    <!-- Summernote js -->
    <script src="{{asset('admin/libs/summernote/summernote-bs4.min.js')}}"></script>
    <!-- plugin js -->
    <script src="{{asset('admin/js/toastr.min.js')}}"></script>
    <!-- Tippy js-->
    <script src="{{asset('admin/libs/tippy-js/tippy.all.min.js')}}"></script>

    <script src="{{asset('admin/js/select2.min.js')}}"></script>
    <!-- Calendar init -->
    <script src="{{asset('admin/js/pages/calendar.init.js')}}"></script>
    <!-- Init js -->
    <script src="{{asset('admin/js/pages/form-summernote.init.js')}}"></script>

    <script src="{{asset('admin/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admin/js/additional-methods.min.js')}}"></script>


       
    
</body>
</html>

@yield('scripts')

<script>
    
</script>