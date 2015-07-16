<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login | {{ APP_NAME }}</title>

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
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="home#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="home#calculate">Calculate</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                    @if (session('is_logged_in'))
                        <li><a class="page-scroll" href="show/clients">Clients</a></li>
                        <li><a class="page-scroll" href="logout">Logout</a></li>                            
                    @else
                         <li><a class="page-scroll" href="#login">Login</a> </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <section class="bg-primary header-back" id="login"></section>
    
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <form name="calculate_form" method="POST" action="auth/login">
                        {!! csrf_field() !!}
                        <div class="col-lg-7 col-lg-offset-5">
                            <h2 class="section-heading wow bounceIn">Member Login</h2><br/>                            
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter email" value="{{ old('email') }}" name="email" required>
                            </div>                            
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" value="asd@123" placeholder="Enter password" required>
                            </div>
                            <span style="color:red;" class="wow bounceIn"><?php if($errors->first('email')){echo $errors->first('email') . "<br/><br/>";} ?></span>
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"/>
                            <input type="submit" class="btn btn-success" value="Login"/>
                        </div> 
                    </form>

            </div>
            </div>
        </div>
    </section>
    
@include('template.footer')

