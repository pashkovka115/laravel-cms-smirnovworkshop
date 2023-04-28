<!DOCTYPE html>
<html lang="ru">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/admin/images/favicon/favicon.ico') }}">

    <!-- Libs CSS -->
    <link href="{{ asset('assets/admin/libs/bootstrap-icons/font/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/libs/dropzone/dist/dropzone.css') }}"  rel="stylesheet">
    <link href="{{ asset('assets/admin/libs/@mdi/font/css/materialdesignicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/admin/libs/prismjs/themes/prism-okaidia.min.css') }}" rel="stylesheet">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/style.css') }}">
    @yield('style_top')
    @yield('script_top')
    <title>@yield('title')</title>
</head>

<body class="bg-light">

<div id="db-wrapper">
    <!-- navbar vertical -->
    <!-- Sidebar -->
    @include('admin.parts.left_bar')
    <!-- page content -->
    <div id="page-content">
        <div class="header @@classList">
            <!-- navbar -->
            <nav class="navbar-classic navbar navbar-expand-lg">
                <a id="nav-toggle" href="#"><i
                        data-feather="menu"

                        class="nav-icon me-2 icon-xs"></i></a>
                <div class="ms-lg-3 d-none d-md-none d-lg-block">
                    <!-- Form -->
                    <form class="d-flex align-items-center">
                        <input type="search" name="search" class="form-control" placeholder="Search" />
                    </form>
                </div>
                <!--Navbar nav -->
                <ul class="navbar-nav navbar-right-wrap ms-auto d-flex nav-top-wrap">
                    <li class="dropdown stopevent">
                    @include('admin.parts.notifications_top_bar')
                    </li>
                    <li class="dropdown ms-2">
                        @include('admin.parts.link_to_profile')
                    </li>
                </ul>
            </nav>
        </div>
        <!-- Container fluid -->
        <div class="container-fluid p-6">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <!-- Page header -->
                    <div class="border-bottom pb-4 mb-4 ">
                        <h3 class="mb-0 fw-bold">@yield('page_header')</h3>
                    </div>
                </div>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="errors">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
@yield('content')

        </div>
</div>
</div>

<!-- Scripts -->
<!-- Libs JS -->
<script src="{{ asset('assets/admin/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/feather-icons/dist/feather.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/prismjs/prism.js') }}"></script>
<script src="{{ asset('assets/admin/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/dropzone/dist/min/dropzone.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/prismjs/plugins/toolbar/prism-toolbar.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/prismjs/plugins/copy-to-clipboard/prism-copy-to-clipboard.min.js') }}"></script>
<script src="{{ asset('assets/plugins/tinymce/tinymce.min.js') }}"></script>

<!-- Theme JS -->
<script src="{{ asset('assets/admin/js/theme.min.js') }}"></script>
<script>
    /*$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    });*/
    tinymce.init({
        selector: 'textarea#announce',
        language: 'ru',
        // width: 600,
        height: 300,
        plugins: [
            'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
            'searchreplace', 'wordcount', 'visualblocks', 'visualchars', 'code', 'fullscreen', 'insertdatetime',
            'media', 'table', 'emoticons', 'help'
        ],
        toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | ' +
            'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
            'forecolor backcolor emoticons | help',
        menu: {
            favs: { title: 'Мои инструменты', items: 'code visualaid | searchreplace | emoticons' }
        },
        menubar: 'favs file edit view insert format tools table help',
    });

    tinymce.init({
        selector: 'textarea#description',
        language: 'ru',
        // width: 600,
        height: 300,
        plugins: [
            'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
            'searchreplace', 'wordcount', 'visualblocks', 'visualchars', 'code', 'fullscreen', 'insertdatetime',
            'media', 'table', 'emoticons', 'help'
        ],
        toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | ' +
            'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
            'forecolor backcolor emoticons | help',
        menu: {
            favs: { title: 'Мои инструменты', items: 'code visualaid | searchreplace | emoticons' }
        },
        menubar: 'favs file edit view insert format tools table help',
    });
</script>
{{--@yield('script_buttom')--}}
@section('script_buttom')
    <script src="{{ asset('assets/admin/js/sortable-content-block.js') }}"></script>
@show
</body>

</html>
