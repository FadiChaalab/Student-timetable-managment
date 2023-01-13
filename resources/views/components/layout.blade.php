<!doctype html>
<html lang="x">

<head>
    <meta charset="utf-8" />
    <title>Ecole Polytechnique Sousse – école architecture, ingénierie et préparatoire</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if(Route::currentRouteName() == 'home')
    <link href="{{asset('libs/chartist/chartist.min.css')}}" rel="stylesheet">
    @endif
    @if(Route::currentRouteName() == 'calendar')
    <link href="{{asset('libs/fullcalendar/fullcalendar.min.css')}}" rel="stylesheet" type="text/css" />
    @endif
    @if(Route::currentRouteName() == 'add_product')
    <link href="{{asset('libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css" />
    @endif
    <!-- Bootstrap Css -->
    <link href="{{asset('css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body data-sidebar="dark">

    <main>
        @if (Session()->has('success'))
        <div class="alert alert-success flash">
            {{ Session::get('success') }}
        </div>
        @endif
        @if (Session()->has('error'))
        <div class="alert alert-danger flash">
            {{ Session::get('error') }}
        </div>
        @endif
        @if (Session()->has('message'))
        <div class="alert alert-danger flash">
            {{ Session::get('message') }}
        </div>
        @endif
        @if ($errors = Session::get('errors'))
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger flash">
            <strong>{{ $error }}</strong>
        </div>
        @endforeach
        @endif
        {{$slot}}
    </main>

    <!-- JAVASCRIPT -->
    <div class="rightbar-overlay"></div>

    <script src="{{asset('libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('libs/metismenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('libs/node-waves/waves.min.js')}}"></script>

    @if(Route::currentRouteName() == 'admin.home')
    <script src="{{asset('libs/peity/jquery.peity.min.js')}}"></script>
    <script src="{{asset('libs/chartist/chartist.min.js')}}"></script>
    <script src="{{asset('libs/chartist-plugin-tooltips/chartist-plugin-tooltip.min.js')}}"></script>
    <script src="{{asset('js/pages/dashboard.init.js')}}"></script>
    @endif
    <script src="{{asset('libs/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('libs/jquery-ui/jquery-ui.min.js')}}"></script>
    @if(Route::currentRouteName() == 'admin.contact.compose' || Route::currentRouteName() == 'student.contact.compose' || Route::currentRouteName() == 'teacher.contact.compose')
    <script src="{{asset('libs/summernote/summernote-bs4.min.js')}}"></script>
    <script src="{{asset('js/pages/email-summernote.init.js')}}"></script>
    @endif

    <script src="{{asset('js/app.min.js')}}"></script>

</body>

</html>