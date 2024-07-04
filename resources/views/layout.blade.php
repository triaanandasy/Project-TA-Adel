<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modernize Free</title>
    <link rel="shortcut icon" type="image/png" href="/templates/images/logos/favicon.png" />
    <link rel="stylesheet" href="/templates/css/styles.min.css" />

    {{-- modal --}}
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        .sidebar {
            list-style-type: none;
            padding: 0;
        }

        .sidebar-item {
            position: relative;
            padding: 5px;
            margin: 5px 0;
            transition: background-color 0.3s, border-radius 0.3s;
        }

        .sidebar-item:hover {
            /* background-color: #e26464 !important;
            border-radius: 50px; */
        }

        .sidebar-link:hover{
            background-color: #e26464 !important;
            border-radius: 50px;
            text-decoration: none;
        }

        .sidebar-item:hover .sidebar-link,
        .sidebar-item:hover .sidebar-link span,
        .sidebar-item:hover .sidebar-link i {
            color: black;
        }


    </style>
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        @include('templates.sidebar')
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            @include('templates.navbar')
            <!--  Header End -->
            <div class="container-fluid">
                <!--  Row 1 -->
                @yield('content')
            </div>
        </div>
    </div>
    <script src="/templates/libs/jquery/dist/jquery.min.js"></script>
    <script src="/templates/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/templates/js/sidebarmenu.js"></script>
    <script src="/templates/js/app.min.js"></script>
    <script src="/templates/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="/templates/libs/simplebar/dist/simplebar.js"></script>
    <script src="/templates/js/dashboard.js"></script>
</body>

</html>
