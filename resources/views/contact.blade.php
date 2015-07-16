<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Contact | {{ APP_NAME }}</title>

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
                        <a href="../home#about">About</a>
                    </li>
                    <li>
                        <a href="../home#calculate">Calculate</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                    <li>
                        @if (session('is_logged_in'))
                            <a class="page-scroll" href="../logout">Logout</a>
                        @else
                            <a class="page-scroll" href="../login">Login</a>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<?php // print_r($site_requirement) ;?>

    <section class="bg-primary header-back" id="about"></section>

    @if($errors->any())
    @foreach($errors->getMessages() as $this_error)
        <p style="color: red;">{{$this_error[0]}}</p>
        @endforeach
    @endif 
    
    <section id="services">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading wow bounceIn">Send Query</h2>
                        <hr class="primary">
                    </div>
                </div>
            </div>
        
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <form name="calculate_form" method="POST" action="details">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter name" value="<?php if (isset($name)){echo $name;} ?>" name="name" required>
                                <div style="color:red" class="wow bounceIn"><?php if (isset($error) && isset($error['name'])){ echo ($error['name']);} ?></div>
                            </div>

                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter email" value="<?php if (isset($email)){echo $email;} ?>" name="email" required>
                                <div style="color:red" class="wow bounceIn"><?php if (isset($error) && isset($error['email'])){ echo ($error['email']);} ?></div>
                            </div>

                            <div class="form-group">
                                <label for="mobileNumber">Mobile Number</label>
                                <input type="number" class="form-control" id="mobileNumber" name="mobile_number" value="<?php if (isset($mobile_number)){echo $mobile_number;} ?>" placeholder="Enter mobile number" required>
                                <div style="color:red" class="wow bounceIn"><?php if (isset($error) && isset($error['mobile_number'])){ echo ($error['mobile_number']);} ?></div>
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea class="form-control" name="address" class="form-control" id="address" placeholder="Enter your address" rows="3" required><?php if (isset($address)){echo $address;} ?></textarea>                            
                                <div style="color:red" class="wow bounceIn"><?php if (isset($error) && isset($error['address'])){ echo ($error['address']);} ?></div>
                            </div>

                            <div class="form-group">
                                <label for="state">State</label>
                                <input type="text" class="form-control" id="state" name="state" value="<?php if (isset($state)){echo $state;} ?>" placeholder="Enter your state" required>
                                <div style="color:red" class="wow bounceIn"><?php if (isset($error) && isset($error['state'])){ echo ($error['state']);} ?></div>
                            </div>

                            <div class="form-group">
                                <label for="pincode">Pin Code</label>
                                <input type="number" class="form-control" id="pincode" name="pincode" value="<?php if (isset($pincode)){echo $pincode;} ?>" placeholder="Enter your state" required>
                                <div style="color:red" class="wow bounceIn"><?php if (isset($error) && isset($error['pincode'])){ echo ($error['pincode']);} ?></div>
                            </div>

                            <div class="form-group">
                                <label for="country">Country</label>
                                <input type="text" class="form-control" id="country" name="country" value="<?php if (isset($country)){echo $country;} ?>" placeholder="Enter country" required>
                                <div style="color:red" class="wow bounceIn"><?php if (isset($error) && isset($error['country'])){ echo ($error['country']);} ?></div>
                            </div>

                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"/>
                            <input type="submit" class="btn btn-success" value="Submit"/>
                        </form>
                    </div>
                </div>
            </div>
    </section>
@include('template.footer')