<!DOCTYPE html>

<html lang="en-US">
    <head>
        <?php
        $title = 'GSY Laravel';
        $current_path = Request::path();

        switch ($current_path) {
            case 'user/register':
                $title .= ' | Registration';
                break;
            case 'user/login':
                $title .= ' | Login';
                break;
            default:
                break;
        }
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

            <header id="header" role="banner">

                <nav id="main-nav" class="navbar navbar-default" role="navigation">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="<?php echo URL::to('/'); ?>">GSY Laravel</a>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="main-navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li <?php echo (Request::path() === 'user/register') ? 'class="active"' : ''; ?>>
                                    <a href="{{URL::to('/user/register')}}">Registration</a>
                                </li>
                                <li <?php echo (Request::path() === 'user/login') ? 'class="active"' : ''; ?>>
                                    <a href="{{URL::to('/user/login')}}">Login</a>
                                </li>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>

            </header>

            @yield('content')

        </div>     

        {{ HTML::script('js/libs/jquery-2.1.1.min.js') }}
        {{ HTML::script('twitter-bootstrap/js/bootstrap.js') }}
        {{ HTML::script('js/script.js') }}
    </body>
</html>