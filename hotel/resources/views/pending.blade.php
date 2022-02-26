<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>
    <style>
        .hero {
            background: url('../../public/a.jpg') no-repeat center / cover;
            height: 100%;
            width: 100%;
            display: table;
            position: relative;

        }
        .overlay:before {
            content: '';
            background-color: rgba(255,255,255,0.5);
            height: 100%;
            width: 100%;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 0;
        }
        .hero-content {
            display: table-cell;
            vertical-align: middle;
            padding-top: 75px;
        }

        .hero-text {
            max-width: 890px;
            width: 100%;
            margin: 0 auto;
            padding: 0 15px;
            text-align: center;
        }

        .hero-text h1 {
            position: relative;
            margin: 0;
        }

        .hero-text p {
            position: relative;
            margin: 45px 0 30px;
            font-size: 20px;
            color: #26272d;
        }

        .hero-text .btn {
            position: relative;
            background-color: transparent;
        }

        .hero-text .btn:hover {
            background-color: #26272d;
            color: #fff;
        }

    </style>
</head>
<body>
<div id="hero" class="hero overlay">
    <div class="hero-content">
        <div class="hero-text">
            <h1>Thanks {{auth()->user()->name}} for your time</h1>
            <p> We'll review your info and if we can confirm it, you'll be able to access your account </p>
        </div><!-- /.hero-text -->
    </div><!-- /.hero-content -->
</div>
</body>
</html>
