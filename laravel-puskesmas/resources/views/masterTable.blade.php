<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
    <title> @yield('title') </title>
    <style>
        .nav-link {
            display: inline-block;
            /* padding: 10px; */
            padding-left: 5px;
            padding-right: 5px;
        }

        .table tr td {
            border: #5bc0de solid 1px;
        }

        .table tr th {
            border: #5bc0de solid 1px;
        }
    </style>
</head>

<body>
    <div class="container-fluid" style="height: 657px; background-color:#000000;">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <nav class="navbar">
                    <div class="navbar-header" style="margin-left: 142px;">
                        <a class="navbar-item nav-link" href="/puskesmas/home" style="color: white">Home</a>
                        <a class="navbar-item nav-link" href="/puskesmas/dokter" style="color: white">Dokter</a>
                        <a class="navbar-item nav-link" href="/puskesmas/poliklinik" style="color: white">Poliklinik</a>
                        <a class="navbar-item nav-link" href="/puskesmas/transaksi" style="color: white">Transaksi</a>
                        <a class="navbar-item nav-link" href="/home" style="color: white">Logout</a>
                    </div>
                </nav>
            </div>
            <div class="col-3"></div>
        </div><br>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="navbar-nav">
                    <h2 style="text-align: center; color: white;"> @yield('page_name') </h2>
                </div>
            </div>
            <div class="col-2"></div>
        </div>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <hr class="line">
                <style>
                    hr.line {
                        border: 0.5px solid #5bc0de;
                    }
                </style>
                <table class="table table-bordered" style="color: white;">
                    @yield('content')
                </table>
                @yield('extra')
            </div>
            <div class="col-2"></div>
        </div>
    </div>
</body>

</html>