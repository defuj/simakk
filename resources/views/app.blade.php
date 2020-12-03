<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <!--begin::Head-->
    <head>
        <meta charset="utf-8"/>
        <title>SIMAKK - SIstem Manajemen Kuesioner Kampus</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

        <!--begin::Fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>        
        <!--end::Fonts-->   

        <!--begin::Global Theme Styles(used by all pages)-->
        <link href="{{ asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!--end::Global Theme Styles-->

        <!--begin::Layout Themes(used by all pages)-->

        <!--end::Layout Themes-->

        <link rel="shortcut icon" href="{{ asset('media/STMIK.png') }}"/>
    </head>
    <!--end::Head-->

    <body id="kt_body app" class="header-fixed header-mobile-fixed page-loading card-sticky-on">
        <!--begin::Main-->
        <div id="app">
            <app-component ref="app"></app-component>
        </div>
        <!--end::Main-->

        <script>
            var KTAppSettings = {
                "breakpoints": {
                    "sm": 576,
                    "md": 768,
                    "lg": 992,
                    "xl": 1200,
                    "xxl": 1200
                },
                "colors": {
                    "theme": {
                        "base": {
                            "white": "#ffffff",
                            "primary": "#6993FF",
                            "secondary": "#E5EAEE",
                            "success": "#1BC5BD",
                            "info": "#8950FC",
                            "warning": "#FFA800",
                            "danger": "#F64E60",
                            "light": "#F3F6F9",
                            "dark": "#212121"
                        },
                        "light": {
                            "white": "#ffffff",
                            "primary": "#E1E9FF",
                            "secondary": "#ECF0F3",
                            "success": "#C9F7F5",
                            "info": "#EEE5FF",
                            "warning": "#FFF4DE",
                            "danger": "#FFE2E5",
                            "light": "#F3F6F9",
                            "dark": "#D6D6E0"
                        },
                        "inverse": {
                            "white": "#ffffff",
                            "primary": "#ffffff",
                            "secondary": "#212121",
                            "success": "#ffffff",
                            "info": "#ffffff",
                            "warning": "#ffffff",
                            "danger": "#ffffff",
                            "light": "#464E5F",
                            "dark": "#ffffff"
                        }
                    },
                    "gray": {
                        "gray-100": "#F3F6F9",
                        "gray-200": "#ECF0F3",
                        "gray-300": "#E5EAEE",
                        "gray-400": "#D6D6E0",
                        "gray-500": "#B5B5C3",
                        "gray-600": "#80808F",
                        "gray-700": "#464E5F",
                        "gray-800": "#1B283F",
                        "gray-900": "#212121"
                    }
                },
                "font-family": "Poppins"
            };
        </script>


        <script src="{{ asset('js/app.js') }}"></script>
        <!--begin::Global Theme Bundle(used by all pages)-->
        <script src="{{ asset('plugins/global/plugins.bundle.js') }}"></script>
        <script src="{{ asset('plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
        <script src="{{ asset('js/scripts.bundle.js') }}"></script>
		<!--end::Global Theme Bundle-->

        <!--begin::Page Scripts(used by this page)-->
        <script src="{{ asset('js/pages/custom/todo/todo.js') }}"></script>
        <script src="{{ asset('js/pages/widgets.js') }}"></script>
        <script src="{{ asset('js/pages/crud/forms/widgets/bootstrap-switch.js') }}"></script>
        <!--end::Page Scripts-->
    </body>
</html>
