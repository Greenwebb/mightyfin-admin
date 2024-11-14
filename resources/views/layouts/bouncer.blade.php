<!DOCTYPE html>
<html lang="en">
@php
    $route = request()->route()->getName();
@endphp
<head>
    <base href="" />
    <title>MFS | Staff Only</title>
    <meta charset="utf-8" />
    <meta name="description"
        content="The most advanced Bootstrap 5 Admin Theme with 40 unique prebuilt layouts on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel versions. Grab your copy now and get life-time updates for free." />
    <meta name="keywords"
        content="metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title"
        content="Metronic - Bootstrap Admin Template, HTML, VueJS, React, Angular. Laravel, Asp.Net Core, Ruby on Rails, Spring Boot, Blazor, Django, Express.js, Node.js, Flask Admin Dashboard Theme & Template" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="Keenthemes | Metronic" />
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="{{ asset('public/web/images/01-ft-logo.png') }}" />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!--end::Fonts-->
    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="{{ asset('public/mfs/admin/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/mfs/admin/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{ asset('public/mfs/admin/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/mfs/admin/assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    <script>
    // Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }
    </script>
    <script src="https://jsuites.net/v4/jsuites.js"></script>
    <link rel="stylesheet" href="https://jsuites.net/v4/jsuites.css" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <link rel="stylesheet" href="{{ asset('public/mfs/admin/assets/css/wizard.min.css')}}">
    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
    {{-- Custom --}}
    <style>
        .sm-btn{
            margin-top: 2%;
            width: 20%;
            height: 20%;
            font-size: 10px;
        }
    </style>
    @livewireStyles
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="aside-enabled">
	{{ $slot }}
    @stack('modals')
    @livewireScripts
    <script>
    var hostUrl = "assets/";
    </script>
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="{{ asset('public/mfs/admin/assets/plugins/global/plugins.bundle.js')}}"></script>
    <script src="{{ asset('public/mfs/admin/assets/js/scripts.bundle.js')}}"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Vendors Javascript(used for this page only)-->
    <script src="{{ asset('public/mfs/admin/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/map.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
    <script src="{{ asset('public/mfs/admin/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{ asset('public/mfs/admin/assets/js/widgets.bundle.js')}}"></script>
    <script src="{{ asset('public/mfs/admin/assets/js/custom/widgets.js')}}"></script>
    <script src="{{ asset('public/mfs/admin/assets/js/custom/apps/chat/chat.js')}}"></script>
    <script src="{{ asset('public/mfs/admin/assets/js/custom/utilities/modals/users-search.js')}}"></script>
    <!--end::Custom Javascript-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <script>
        document.addEventListener('livewire:load', function () {
            Livewire.on('closeModal', () => {
                // Use JavaScript to close the modal
                $('#kt_modal_review_warning').modal('hide');
            });
        });
    </script> --}}
    <!--end::Javascript-->
</body>
<!--end::Body-->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    document.addEventListener('livewire:load', function () {
        flatpickr("#release_date_picker", {
            dateFormat: "Y-m-d",
            // Other configuration options if needed
        });
    });
</script>


</html>
