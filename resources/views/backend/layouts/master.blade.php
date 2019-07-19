<!DOCTYPE html>
<html lang="en">

<!-- begin::Head -->

<head>

    <!--begin::Base Path (base relative path for assets of this page) -->
    <base href="../">

    <!--end::Base Path -->
    <meta charset="utf-8" />
    <title>Metronic | Dashboard</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--begin::Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!--end::Fonts -->

    <!--begin::Page Vendors Styles(used by this page) -->
    <link href="/admin/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />

    <!--end::Page Vendors Styles -->

    <!--begin:: Global Mandatory Vendors -->
    <link href="/admin/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />

    <!--end:: Global Mandatory Vendors -->

    <!--begin:: Global Optional Vendors -->
    <link href="/admin/vendors/general/tether/dist/css/tether.css" rel="stylesheet" type="text/css" />
    <link href="/admin/vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css" rel="stylesheet" type="text/css" />
    <link href="/admin/vendors/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" />
    <link href="/admin/vendors/general/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" />
    <link href="/admin/vendors/general/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
    <link href="/admin/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />
    <link href="/admin/vendors/general/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
    <link href="/admin/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet" type="text/css" />
    <link href="/admin/vendors/general/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />
    <link href="/admin/vendors/general/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet" type="text/css" />
    <link href="/admin/vendors/general/nouislider/distribute/nouislider.css" rel="stylesheet" type="text/css" />
    <link href="/admin/vendors/general/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css" />
    <link href="/admin/vendors/general/summernote/dist/summernote.css" rel="stylesheet" type="text/css" />
    <link href="/admin/vendors/general/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
    <link href="/admin/vendors/general/animate.css/animate.css" rel="stylesheet" type="text/css" />
    <link href="/admin/vendors/general/toastr/build/toastr.css" rel="stylesheet" type="text/css" />
    <link href="/admin/vendors/general/morris.js/morris.css" rel="stylesheet" type="text/css" />
    <link href="/admin/vendors/general/sweetalert2/dist/sweetalert2.css" rel="stylesheet" type="text/css" />
    <link href="/admin/vendors/general/socicon/css/socicon.css" rel="stylesheet" type="text/css" />
    <link href="/admin/vendors/custom/vendors/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
    <link href="/admin/vendors/custom/vendors/flaticon/flaticon.css" rel="stylesheet" type="text/css" />
    <link href="/admin/vendors/custom/vendors/flaticon2/flaticon.css" rel="stylesheet" type="text/css" />
    <link href="/admin/vendors/general/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css" integrity="sha384-i1LQnF23gykqWXg6jxC2ZbCbUMxyw5gLZY6UiUS98LYV5unm8GWmfkIS6jqJfb4E" crossorigin="anonymous">

    <!--end:: Global Optional Vendors -->

    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="/admin/css/demo6/style.bundle.css" rel="stylesheet" type="text/css" />

    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->

    <!--end::Layout Skins -->
    <link rel="shortcut icon" href="/admin/media/logos/favicon.ico" />
</head>

<!-- end::Head -->

<!-- begin::Body -->

<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-aside--minimize kt-page--loading">
    <!-- begin:: Page -->
    <div id="app">
        <router-view></router-view>
    </div>

    <!-- begin::Global Config(global config for global JS sciprts) -->
    <script>
        var KTAppOptions = {
            "colors": {
                "state": {
                    "brand": "#22b9ff",
                    "light": "#ffffff",
                    "dark": "#282a3c",
                    "primary": "#5867dd",
                    "success": "#34bfa3",
                    "info": "#36a3f7",
                    "warning": "#ffb822",
                    "danger": "#fd3995"
                },
                "base": {
                    "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
                    "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
                }
            }
        };
    </script>

    <!-- end::Global Config -->

    <!--begin:: Global Mandatory Vendors -->
    <script src="/admin/vendors/general/jquery/dist/jquery.js" type="text/javascript"></script>
    <script src="/admin/vendors/general/popper.js/dist/umd/popper.js" type="text/javascript"></script>
    <script src="/admin/vendors/general/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/admin/vendors/general/js-cookie/src/js.cookie.js" type="text/javascript"></script>
    <script src="/admin/vendors/general/moment/min/moment.min.js" type="text/javascript"></script>
    <script src="/admin/vendors/general/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>
    <script src="/admin/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js" type="text/javascript"></script>
    <script src="/admin/vendors/general/sticky-js/dist/sticky.min.js" type="text/javascript"></script>
    <script src="/admin/vendors/general/wnumb/wNumb.js" type="text/javascript"></script>

    <!--end:: Global Mandatory Vendors -->

    <!--begin:: Global Optional Vendors -->
    <script src="/admin/vendors/general/jquery-form/dist/jquery.form.min.js" type="text/javascript"></script>
    <script src="/admin/vendors/general/block-ui/jquery.blockUI.js" type="text/javascript"></script>
    <script src="/admin/vendors/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
    <script src="/admin/vendors/custom/js/vendors/bootstrap-datepicker.init.js" type="text/javascript"></script>
    <script src="/admin/vendors/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
    <script src="/admin/vendors/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
    <script src="/admin/vendors/custom/js/vendors/bootstrap-timepicker.init.js" type="text/javascript"></script>
    <script src="/admin/vendors/general/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <script src="/admin/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
    <script src="/admin/vendors/general/bootstrap-maxlength/src/bootstrap-maxlength.js" type="text/javascript"></script>
    <script src="/admin/vendors/custom/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js" type="text/javascript"></script>
    <script src="/admin/vendors/general/bootstrap-select/dist/js/bootstrap-select.js" type="text/javascript"></script>
    <script src="/admin/vendors/general/bootstrap-switch/dist/js/bootstrap-switch.js" type="text/javascript"></script>
    <script src="/admin/vendors/custom/js/vendors/bootstrap-switch.init.js" type="text/javascript"></script>
    <script src="/admin/vendors/general/select2/dist/js/select2.full.js" type="text/javascript"></script>
    <script src="/admin/vendors/general/ion-rangeslider/js/ion.rangeSlider.js" type="text/javascript"></script>
    <script src="/admin/vendors/general/typeahead.js/dist/typeahead.bundle.js" type="text/javascript"></script>
    <script src="/admin/vendors/general/handlebars/dist/handlebars.js" type="text/javascript"></script>
    <script src="/admin/vendors/general/inputmask/dist/jquery.inputmask.bundle.js" type="text/javascript"></script>
    <script src="/admin/vendors/general/inputmask/dist/inputmask/inputmask.date.extensions.js" type="text/javascript"></script>
    <script src="/admin/vendors/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js" type="text/javascript"></script>
    <script src="/admin/vendors/general/nouislider/distribute/nouislider.js" type="text/javascript"></script>
    <script src="/admin/vendors/general/autosize/dist/autosize.js" type="text/javascript"></script>
    <script src="/admin/vendors/general/clipboard/dist/clipboard.min.js" type="text/javascript"></script>
    <script src="/admin/vendors/general/dropzone/dist/dropzone.js" type="text/javascript"></script>
    <script src="/admin/vendors/general/summernote/dist/summernote.js" type="text/javascript"></script>
    <script src="/admin/vendors/general/markdown/lib/markdown.js" type="text/javascript"></script>
    <script src="/admin/vendors/general/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
    <script src="/admin/vendors/custom/js/vendors/bootstrap-markdown.init.js" type="text/javascript"></script>
    <script src="/admin/vendors/general/bootstrap-notify/bootstrap-notify.min.js" type="text/javascript"></script>
    <script src="/admin/vendors/custom/js/vendors/bootstrap-notify.init.js" type="text/javascript"></script>
    <script src="/admin/vendors/general/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
    <script src="/admin/vendors/general/jquery-validation/dist/additional-methods.js" type="text/javascript"></script>
    <script src="/admin/vendors/custom/js/vendors/jquery-validation.init.js" type="text/javascript"></script>
    <script src="/admin/vendors/general/toastr/build/toastr.min.js" type="text/javascript"></script>
    <script src="/admin/vendors/general/raphael/raphael.js" type="text/javascript"></script>
    <script src="/admin/vendors/general/morris.js/morris.js" type="text/javascript"></script>
    <script src="/admin/vendors/general/chart.js/dist/Chart.bundle.js" type="text/javascript"></script>
    <script src="/admin/vendors/custom/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js" type="text/javascript"></script>
    <script src="/admin/vendors/custom/vendors/jquery-idletimer/idle-timer.min.js" type="text/javascript"></script>
    <script src="/admin/vendors/general/waypoints/lib/jquery.waypoints.js" type="text/javascript"></script>
    <script src="/admin/vendors/general/counterup/jquery.counterup.js" type="text/javascript"></script>
    <script src="/admin/vendors/general/es6-promise-polyfill/promise.min.js" type="text/javascript"></script>
    <script src="/admin/vendors/general/sweetalert2/dist/sweetalert2.min.js" type="text/javascript"></script>
    <script src="/admin/vendors/custom/js/vendors/sweetalert2.init.js" type="text/javascript"></script>
    <script src="/admin/vendors/general/jquery.repeater/src/lib.js" type="text/javascript"></script>
    <script src="/admin/vendors/general/jquery.repeater/src/jquery.input.js" type="text/javascript"></script>
    <script src="/admin/vendors/general/jquery.repeater/src/repeater.js" type="text/javascript"></script>
    <script src="/admin/vendors/general/dompurify/dist/purify.js" type="text/javascript"></script>
    <script src="https://unpkg.com/vue-router/dist/vue-router.js"></script>
    <script src="/js/app.js"></script>
    <!--end:: Global Optional Vendors -->

    <!--begin::Global Theme Bundle(used by all pages) -->
    <script src="/admin/js/demo6/scripts.bundle.js" type="text/javascript"></script>

    <!--end::Global Theme Bundle -->

    <!--begin::Page Vendors(used by this page) -->
    <script src="/admin/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
    <script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM" type="text/javascript"></script>
    <script src="/admin/vendors/custom/gmaps/gmaps.js" type="text/javascript"></script>

    <!--end::Page Vendors -->

    <!--begin::Page Scripts(used by this page) -->

    <!--end::Page Scripts -->
</body>

<!-- end::Body -->

</html>