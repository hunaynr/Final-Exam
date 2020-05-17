<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
    <title> @yield('title') </title>
</head>

<body>
    <div class="container-fluid text-white" style="height: 657px; background-color:#000000;">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <br><br>
                <div class="text-center">
                    <h2> @yield('page_name') </h2>
                </div>
                <br>
            </div>
            <div class="col-3"></div>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <div class="card border-info" style="background-color:#000000;">
                    <div class="card-header text-center border-info">
                        <h3> @yield('card_title') </h3>
                    </div>
                    <div class="card-body">
                        @yield('content')
                    </div>
                </div>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
</body>

</html>