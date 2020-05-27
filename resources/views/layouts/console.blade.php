<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard - SK Store</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <livewire:styles />
    <livewire:scripts />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ mix('js/app.js') }}"></script>
    <style>
        body {
            font-family: 'Quicksand', sans-serif;
        }
    </style>
</head>

<body style="background-color: #e2e8f0;">

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark" style="background-color: #252f3f!important">
        <a class="navbar-brand font-weight-bold" href="{{ route('console.dashboard.index') }}"><i class="fa fa-shopping-basket"></i> SK STORE</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto text-uppercase">
                <li class="nav-item {{ setActive('console/dashboard') }}">
                    <a class="nav-link" href="{{ route('console.dashboard.index') }}"><i class="fa fa-chart-line"></i> Analytic</a>
                </li>
                <li class="nav-item dropdown {{ setActive('console/tags') }}">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"><i class="fa fa-shopping-bag"></i> Products</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="{{ route('console.tags.index') }}">Tags</a>
                        <a class="dropdown-item" href="#">Category</a>
                        <a class="dropdown-item" href="#">Data Products</a>
                        <a class="dropdown-item" href="#">Voucher</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"><i class="fa fa-shopping-cart"></i> Orders</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="#">Data Orders</a>
                        <a class="dropdown-item" href="#">Payment Confirmation</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-clone"></i> Pages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-image"></i> Galeri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-laptop"></i> Sliders</a>
                </li>
                <li class="nav-item {{ setActive('console/users') }}">
                    <a class="nav-link" href="{{ route('console.users.index') }}"><i class="fa fa-users"></i> Users</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right" style="margin-right: 0px">
                <li class="dropdown">
                    <a class="dropdown-toggle  text-white"
                        style="padding-top: 13px;line-height: 30px;padding-bottom:9px;text-decoration: none;"
                        data-toggle="dropdown" href="#"><i class="fa fa-user-circle"></i> {{ auth()->user()->name }} <span
                            class="caret"></span></a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href=""><i class="fa fa-chart-line"></i> Analytic</a>
                        <a class="dropdown-item" href=""><i class="fa fa-cog"></i> Settings</a>
                        <div class="dropdown-divider"></div>
                        <livewire:console.logout />
                    </div>
                    </livewire:console.logout>
            </ul>
        </div>
    </nav>

    <div class="jumbotron rounded-0" style="background-color: #a0aec0;padding-bottom:8rem">
        <div class="container">
        </div>
    </div>

    <div class="container" style="margin-top: -90px">
        
        @yield('content')
            
    </div>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>