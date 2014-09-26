<!DOCTYPE html>

<html lang="en-US">
    <head>
        <?php
        $current_path = Request::path();

        switch ($current_path) {
            case 'user/register':
                $title = 'Register | ';
                break;
            case 'user/login':
                $title = 'Login | ';
                break;
            default:
                $title = '';
                break;
        }

        $title .= 'GSY Laravel';
        ?>

        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{$title}}</title>
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="author" content="Georgi Yankov" />
        <meta name="robots" content="index, follow" />

        {{ HTML::style('twitter-bootstrap/css/bootstrap.css') }}
        {{ HTML::style('twitter-bootstrap/css/bootstrap-theme.css') }}  
        {{ HTML::style('css/style.css') }}
    </head>    
    <body>
        <div id="main-wrapper">

            @include('header')

            <div id="middle">
                @yield('content')
            </div>

        </div>     

        {{ HTML::script('js/libs/jquery-2.1.1.min.js') }}
        {{ HTML::script('twitter-bootstrap/js/bootstrap.js') }}
        {{ HTML::script('js/script.js') }}
    </body>
</html>