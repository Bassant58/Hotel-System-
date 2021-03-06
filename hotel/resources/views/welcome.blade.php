<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="/docs/5.1/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24"
                class="d-inline-block align-text-top">
            HOTEL
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('admin.login.blade')}}">Admin :: Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('manager.login.blade')}}">Manager :: Login </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('receptionist.login.blade')}}"> Receptionist :: Login </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">Guest :: Login</a>
                </li>
            </ul>
            <div class="nav-item">
                <a class="nav-link" href="{{route('register')}}">Guest :: RegisterNow </a>
            </div>

        </div>
    </div>
</nav>

</body>

</html>
