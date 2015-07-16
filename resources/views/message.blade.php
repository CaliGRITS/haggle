<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ APP_NAME }}.com</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" type="text/css">

    <!-- Custom Fonts -->    
    <link rel="stylesheet" href="{{ URL::asset('font-awesome/css/font-awesome.min.css') }}" type="text/css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/animate.min.css') }}" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/creative.css') }}" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body id="page-top">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand page-scroll" href="#page-top">{{ APP_NAME }}</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                
                        @if (isset($submission_successfull) || isset($submission_unsuccessfull))
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a href="../home#about">About</a>
                                </li>
                                <li>
                                    <a href="../home#calculate">Calculate</a>
                                </li>
                                <li>
                                    <a href="#contact">Contact</a>
                                </li>
                                <li>
                                    @if (session('is_logged_in'))
                                        <a class="page-scroll" href="../logout">Logout</a>
                                    @else
                                        <a class="page-scroll" href="../login">Login</a>
                                    @endif
                                </li>
                            </ul>
                        @else
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a href="home#about">About</a>
                                </li>
                                <li>
                                    <a href="home#calculate">Calculate</a>
                                </li>
                                <li>
                                    <a href="#contact">Contact</a>
                                </li>
                                <li>
                                    @if (session('is_logged_in'))
                                        <a class="page-scroll" href="logout">Logout</a>
                                    @else
                                        <a class="page-scroll" href="login">Login</a>
                                    @endif
                                </li>
                            </ul>
                        @endif
            </div>
        </div>
    </nav>


    <section class="bg-primary header-back" id="about"></section>
    
    
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h3 class="section-heading wow bounceIn">
                        @if (isset($submission_successfull))
                            {{ $submission_successfull }}
                        @elseif (isset($submission_unsuccessfull))
                            {{ $submission_unsuccessfull }}
                        @elseif (isset($login_message))
                            {{ $login_message }}
                        @endif
                    </h3>
                    <hr class="primary">
                </div>
            </div>
        </div>
    </section>
    
@include('template.footer')

