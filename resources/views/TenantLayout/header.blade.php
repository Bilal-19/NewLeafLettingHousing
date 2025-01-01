<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Leaf Letting Housing</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/TenantStyle.css') }}">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">


</head>

<body>
    <div class="container-fluid">
        <div class="row bg-offwhite">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Navbar</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link nav-link-state mx-2 {{ request()->routeIs('Home') ? 'active' : '' }}" aria-current="page"
                                    href="{{ route('Home') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-link-state mx-2" href="#">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-link-state mx-2" href="#">CSR Initiatives</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-link-state mx-2" href="#">Landlords</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-link-state mx-2" href="#">FAQs</a>
                            </li>
                        </ul>
                        <button class="btn-style">Contact Us</button>
                    </div>
                </div>
            </nav>
        </div>
    </div>
