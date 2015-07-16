<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Client's List | {{ APP_NAME }}</title>

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
                        <a class="page-scroll" href="../home#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="../home#calculate">Calculate</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                    @if (session('is_logged_in'))
                        <li><a class="page-scroll" href="#clients">Clients</a></li>
                        <li><a class="page-scroll" href="../logout">Logout</a></li>
                    @else
                         <li><a class="page-scroll" href="../login">Login</a> </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>


    <section class="bg-primary header-back" id="clients"></section>
    
    @if (count($all_details) <= 0)
        <br/><br/><br/><br/>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading wow bounceIn">Sorry client list is empty</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
    @else
        <section id="services">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading wow bounceIn">Client's List</h2>
                        <hr class="primary">
                    </div>
                </div>
            </div>
            <br/>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table">
                            <thead>
                                <tr>
                                  <th class="text-center">Sl. No.</th>
                                  <th class="text-center">Name</th>
                                  <th class="text-center">Email</th>
                                  <th class="text-center">Phone Number</th>
                                  <th class="text-center">Details</th>
                                </tr>
                            </thead>                        
                            <tbody>
                                @foreach ($all_details as $key => $value)                                
                                    <tr>
                                        <td class="text-center">{{ $key+1 }}</td>
                                        <td class="text-center">{{ $value->name }}</td>
                                        <td class="text-center">{{ $value->email }}</td>
                                        <td class="text-center">{{ $value->profile->mobile_number }}</td>
                                        <td class="text-center"><a href="{{ $value->id }}" style="text-decoration: none" class="glyphicon glyphicon-list-alt" ></a></td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    @endif
@include('template.footer')

