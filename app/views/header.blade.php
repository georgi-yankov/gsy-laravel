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
                <a class="navbar-brand" href="{{ action('GamesController@index') }}">Games Collection</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="main-navbar-collapse">

                @if(Auth::guest())

                <ul class="nav navbar-nav">
                    <li @if(Request::path() === 'user/register') class="active" @endif>
                         <a href="{{ action('UserController@register') }}">Registration</a>
                    </li>
                    <li @if(Request::path() === 'user/login') class="active" @endif>
                         <a href="{{ action('UserController@login') }}">Login</a>
                    </li>
                </ul>

                @else

                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{Auth::user()->username}} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Edit</a></li>
                            <li><a href="/user/logout">Logout</a></li>
                        </ul>
                    </li>
                </ul>

                @endif
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

</header>