<!DOCTYPE html>

<html lang="en-US">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>GSY Laravel</title>
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

                <nav class="navbar navbar-default" role="navigation">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="<?php echo URL::to('/'); ?>">GSY Laravel</a>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li><a href="<?php echo URL::to('/user/register'); ?>">Registration</a></li>
                                <li><a href="<?php echo URL::to('/user/login'); ?>">Login</a></li>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>

            </header>

            @yield('content')

        </div>     

        {{ HTML::script('js/libs/jquery-2.1.1.min.js') }}
        {{ HTML::script('twitter-bootstrap/js/bootstrap.js') }}
    </body>
</html>