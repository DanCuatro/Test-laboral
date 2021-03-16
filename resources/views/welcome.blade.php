<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            * {
            margin: 0;
            }
            html, body {
            height: 100%;
            }
            .wrapper {
            min-height: calc(100% - 4rem);
            }
            .footer {
            height: 4rem;
            background-color: #ffffff
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('registrar') }}">Registro</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <br><br><br><br><br><br><br><br>
                <div class="title m-b-md">
                    Test Laboral
                </div>

                <div class="links">
                   ITSX
                </div>
                <br><br><br><br><br><br><br><br><br>
                <div>
                    <footer class="footer">
                        <img src="{{ asset('images/logo.png') }}" width="100%" height="100%">
                    </footer>
                </div>
                
            </div>
        </div>
    </body>
</html>
