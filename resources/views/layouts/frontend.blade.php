<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ Storage::url('public/logo/'.$setting->logo) }}" type="image/x-icon"/>
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

    <nav class="navbar navbar-expand-md navbar-dark bg-dark text-white" style="background-color: #171d26!important;">
        <a href="/" class="navbar-brand font-weight-bold"><i class="fa fa-shopping-bag"></i> SK STORE</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar5">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbar5">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-list-ul"></i> CATEGORIES
                    </a>
                    <div class="dropdown-menu border-0 shadow-sm dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        @foreach ($global_categories as $category)
                            <a class="dropdown-item" href="#"><img src="{{ Storage::url('public/categories/'.$category->image) }}" class="rounded" style="width: 20px"> {{ $category->name }}</a>
                        @endforeach
                    </div>
                </li>
            </ul>
            <form class="mx-2 my-auto d-inline" style="width: 69%">
                <div class="input-group">
                    <input type="text" class="form-control border border-right-0" placeholder="Search...">
                    <span class="input-group-append">
                        <button class="btn text-dark border border-left-0" style="background-color: white" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item">
                    <button class="btn btn-md btn-outline-dark btn-block" style="color: #fff;background-color: #343a40;border-color: #343a40;"><i class="fa fa-user-circle"></i> LOGIN / REGISTER</button>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid mb-5">

        @yield('content')

    </div>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>