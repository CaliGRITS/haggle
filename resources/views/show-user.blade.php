<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Details of {{ $client_details[0]->name }} | {{ APP_NAME }}</title>

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
                <a class="navbar-brand page-scroll" href="#page-top">Start Bootstrap</a>
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


    <section class="bg-primary header-back" id="about"></section>
    
    
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="section-heading wow bounceIn">Requirements of {{ $client_details[0]->name }}</h3>
                </div>
            </div>
        </div>
        <br/>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <dl class="dl-horizontal">
                        <dt><strong>Name : </strong></dt>
                        <dd>{{ $client_details[0]->name }}</dd>
                        
                        <dt><strong>Email : </strong></dt>
                        <dd>{{ $client_details[0]->email }}</dd>
                        
                        <dt><strong>Mobile Number : </strong></dt>
                        <dd>{{ $client_details[0]->profile->mobile_number }}</dd>
                        
                        <dt><strong>Address : </strong></dt>
                        <dd>
                            {{ $client_details[0]->profile->address }} ,
                            {{ $client_details[0]->profile->state }} ,
                            {{ $client_details[0]->profile->country }}                        
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
        <br/>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="section-heading wow bounceIn">Project Details </h3>
                </div>
            </div>
        </div>
        <br/>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @if (isset($client_details[0]->requirement->total))
                    <p>
                        <span><strong><u>Total Amount</u></strong><span><br/>
                        <span> Rs. {{ $client_details[0]->requirement->total }} Only (Approx.)</span>
                    </p>
                    
                    @endif 
                    @if (isset($client_details[0]->requirement->is_new_site))
                    <p>
                        <span><strong><u>Is this for an existing site?</u></strong><span><br/>
                        <span> - {{ $client_details[0]->requirement->is_new_site }}</span>
                    </p>
                    @endif                    
                    <?php
                        if (count(json_decode($client_details[0]->requirement->main_features)) > 0)
                        {
                            echo "<span><strong><u>Main Website Features</u></strong><span><br/>";
                            $main_features = json_decode($client_details[0]->requirement->main_features);

                            foreach ( $main_features as $value )
                            {
                                echo "<span><b> - " . ucfirst($value) . "</b></span>";
                                echo "<ul>";
                                if ($value === 'ecommerce')
                                {
                                    echo "<i> Payment Options </i>";
                                    $ecommerce_payment_options = json_decode($client_details[0]->requirement->ecommerce_payment_options);
                                    foreach ( $ecommerce_payment_options as $payment )
                                    {
                                        echo "<li><span>" . $payment . "</li></span>";
                                    }
                                    echo "<br/><li><i> Initially, do you want us to upload the products for you? </i></li>";
                                    echo "<span>" . $client_details[0]->requirement->ecommerce_products_upload . "</span><br/>";
                                    echo "<br/><li><i> How many products are you looking to sell? </i></li>";
                                    echo "<span>" . $client_details[0]->requirement->ecommerce_products_quantity . "</span>";
                                }
                                if ($value === 'portfolio')
                                {
                                    echo "<br/><li><i> How photos/images/portfolio items do you initially want on the website? </i></li>";
                                    echo "<span>" . $client_details[0]->requirement->portfolio_features . "</span>";
                                }

                                if ($value === 'blog')
                                {
                                    echo "<br/><li><i> Please select this option if member registration or user managemment is required </i></li>";
                                    $blog_options = json_decode($client_details[0]->requirement->blog_options);
                                    echo "<span>" . $blog_options[0] . "</span>";
                                }

                                echo "</ul>";
                            }    
                        }
                        if ($client_details[0]->requirement->size !== "")
                        {
                            echo "<br/><span><strong><u>Size</u></strong><span>";
                            echo "<br/><i> - What is the size / approximate number of pages of the website? </i>";
                            echo "<br/><span><ul></li>" . $client_details[0]->requirement->size . " Pages</li></ul></span>";
                        }

                        if (count(json_decode($client_details[0]->requirement->public_site_options)) > 0)
                        {
                            echo "<br/><span><strong><u>Public Website Features</u></strong><span>";
                            echo "<br/><i> - Social media options </i>";
                            $public_site_options = json_decode($client_details[0]->requirement->public_site_options);
                            echo "<ul>";
                            foreach ($public_site_options as $public_site_options) {
                                echo "<span><li>" . $public_site_options . "</li></span>";
                            }
                            echo "</ul>";
                        }

                        if ($client_details[0]->requirement->graphics_features  !== "")
                        {
                            echo "<br/><span><strong><u>Graphics</u></strong><span>";
                            echo "<br/><i> - Will you be supplying graphics? </i>";
                            echo "<br/><span><ul></li>" . $client_details[0]->requirement->graphics_features . "</li></ul></span>";
                        }

                        if ($client_details[0]->requirement->is_logo_required  !== "")
                        {
                            echo "<br/><span><strong><u>Logo</u></strong><span>";
                            echo "<br/><span> - " . $client_details[0]->requirement->is_logo_required . "</span><br/>";
                        }

                        if ($client_details[0]->requirement->site_content  !== "")
                        {
                            echo "<br/><span><strong><u>Site Content</u></strong><span>";
                            echo "<br/><i> - Do you need us to write the content for your website? </i>";
                            echo "<br/><span><ul></li>" . $client_details[0]->requirement->site_content . "</li></ul></span>";
                            echo "</ul>";
                        }

                        if ($client_details[0]->requirement->time_frame  !== "")
                        {
                            echo "<br/><span><strong><u>Timeframe</u></strong><span>";
                            echo "<br/><i> - What is your ideal completion timeframe? </i>";
                            echo "<br/><span><ul></li>" . $client_details[0]->requirement->time_frame . "</li></ul></span>";
                            echo "</ul>";
                        }
                    ?>
                    <br/>
                    <a href="clients" class="btn btn-primary">Back to List</a>
                </div>
            </div>
        </div>
        <br/>
    </section>
    
@include('template.footer')

