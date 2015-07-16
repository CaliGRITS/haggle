<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Welcome | {{ APP_NAME }}</title>

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
                        <a class="page-scroll" href="#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#calculate">Calculate</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                    @if (session('is_logged_in'))
                        <li><a class="page-scroll" href="show/clients">Clients</a></li>
                        <li><a class="page-scroll" href="logout">Logout</a></li>                            
                    @else
                         <li><a class="page-scroll" href="login">Login</a> </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>


    <section class="bg-primary" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">We've got what you need!</h2>
                    <hr class="light">
                    <p class="text-faded">Huggle helps you to "Get Noticed". Whatever you envisage, we'll develop it for you. If you are searching for a company that can understand your needs, boost your sales and take your business to a new high, then Huggle is the company to reckon with. We believe that the sky is the limit and our team makes sure that you reach there.</p>
                    <a href="#calculate" class="btn btn-primary btn-xl page-scroll">Get Started</a>
                </div>
            </div>
        </div>
    </section>
    <section id="calculate">
        <form name="calculate_form" method="POST" action="submit/contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 text-center">
                        <h2 class="section-heading wow bounceIn">Instant Price Calculator</h2>
                        <hr class="primary">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-info wow bounceIn" id="existing">
                                <div class="panel-heading feature-heading-font">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#existing_collapse">{{ $existing['heading'] }}</a>
                                    </h4>
                                </div>
                                <div id="existing_collapse" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <p><strong> {{ $existing['title'] }} </strong></p>
                                        <div class="row col-lg-12">
                                            @foreach ($existing['options'] as $option)
                                                <input type="radio" onChange="viewTotal(this);" class="sum-all" name="is_new_site" value="{{ $option['value'] }}" <?php if( $option['value'] == "existing_no"){echo "checked"; } ?>/> {{ $option['description'] }}<br/>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br/><br/>
                            <div class="panel panel-info wow bounceIn" id="main-features">
                                <div class="panel-heading feature-heading-font">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#main_features_collapse">{{ $main_features['heading'] }}</a>
                                    </h4>
                                </div>
                                <div id="main_features_collapse" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <strong>{{ $main_features['title'] }}</strong><br/><br/>
                                        <div class="row col-lg-12">
                                            @foreach ($main_features['options'] as $option)
                                                <input type="checkbox" class="sum-all" onChange="viewTotal(this);" id="{{ $option['value'] }}" name="main_website_features[]" value="{{ $option['value'] }}"/><i><strong> {{ $option['title'] }} </strong> <p> {{ $option['description'] }}</p></i>
                                                @if ($option['value'] == 'ecommerce')
                                                    <div id="ecommerce-features">
                                                        <div class="row">
                                                            <div class="col-lg-11 pull-right">
                                                                <div class="panel panel-default">
                                                                    <div class="panel-body">
                                                                        <p><strong> {{ $ecommerce_payment['title'] }} </strong></p>
                                                                        @foreach ($ecommerce_payment['options'] as $key => $option)
                                                                            <input type="checkbox" id="{{ $key }}" class="sum-all uncheck-ecommerce-cart" onChange="viewTotal(this);" name="ecommerce_payment[]" value="{{ $option['value'] }}"/> {{ $option['description'] }}<br/>
                                                                        @endforeach
                                                                    </div>                                                           
                                                                    <div class="panel-body">
                                                                        <p><strong> {{ $ecommerce_products_upload['title'] }} </strong></p>
                                                                        @foreach ($ecommerce_products_upload['options'] as $option)
                                                                            <input type="radio" onChange="viewTotal(this);" class="sum-all unselect-ecommerce-products" name="ecommerce_products_upload" value="{{ $option['value'] }}"/> {{ $option['description'] }}<br/>
                                                                        @endforeach
                                                                    </div>
                                                                    <div class="panel-body">
                                                                        <p><strong> {{ $ecommerce_products_quantity['title'] }} </strong></p>
                                                                        @foreach ($ecommerce_products_quantity['options'] as $option)
                                                                            <input type="radio" onChange="viewTotal(this);" class="sum-all unselect-ecommerce-quantity" name="ecommerce_products_quantity" value="{{ $option['value'] }}"/> {{ $option['description'] }}<br/>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br/>
                                                    </div>
                                                @endif

                                                @if ($option['value'] == 'portfolio')
                                                    <div id="portfolio-features">
                                                        <div class="row">
                                                            <div class="col-lg-11 pull-right">
                                                                <div class="panel panel-default">
                                                                    <div class="panel-body">
                                                                        <p><strong> {{ $portfolio_features['title'] }} </strong></p>
                                                                        @foreach ($portfolio_features['options'] as $option)
                                                                            <input type="radio" class="sum-all unselect-portfolio-features" onChange="viewTotal(this);" name="portfolio_features" value="{{ $option['value'] }}"/> {{ $option['description'] }}<br/>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br/>
                                                    </div>
                                                @endif

                                                @if ($option['value'] == 'blog')
                                                    <div id="blog-features">
                                                        <div class="row">
                                                            <div class="col-lg-11 pull-right">
                                                                <div class="panel panel-default">
                                                                    <div class="panel-body">
                                                                        <p><strong> {{ $blog_features['title'] }} </strong></p>
                                                                        @foreach ($blog_features['options'] as $option)
                                                                            <input type="checkbox" class="sum-all unselect-blog-features" onChange="viewTotal(this);" name="blog_features[]" value="{{ $option['value'] }}"/> {{ $option['description'] }}<br/>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br/>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>                            
                                    </div>
                                </div>
                            </div>
                            <br/><br/>
                            <div class="wow bounceIn">
                                <div class="panel panel-info" id="size">
                                    <div class="panel-heading feature-heading-font">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" href="#size_collapse">{{ $size['heading'] }}</a>
                                        </h4>
                                    </div>
                                    <div id="size_collapse" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <p><strong> {{ $size['title'] }} </strong></p>
                                            <div class="row col-lg-12">
                                                @foreach ($size['options'] as $option)
                                                    <input type="radio" class="sum-all" onChange="viewTotal(this);" name="size" value="{{ $option['value'] }}"/> {{ $option['description'] }}<br/>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br/><br/>
                                <div class="panel panel-info" id="public-site-features">
                                    <div class="panel-heading feature-heading-font">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" href="#public_site_collapse">{{ $public_site_features['heading'] }}</a>
                                        </h4>
                                    </div>
                                    <div id="public_site_collapse" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <p><strong> {{ $public_site_features['title'] }} </strong></p>
                                            <div class="row col-lg-12">
                                                @foreach ($public_site_features['options'] as $option)
                                                    <input type="checkbox" class="sum-all" onChange="viewTotal(this);" name="public_site_features[]" value="{{ $option['value'] }}"/> {{ $option['description'] }}<br/>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br/><br/>
                            <div class="wow bounceIn">
                                <div class="panel panel-info wow bounceIn" id="graphics">                            
                                    <div class="panel-heading feature-heading-font">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" href="#graphics_collapse">{{ $graphics_features['heading'] }}</a>
                                        </h4>
                                    </div>
                                    <div id="graphics_collapse" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <p><strong> {{ $graphics_features['title'] }} </strong></p>
                                            <div class="row col-lg-12">
                                                @foreach ($graphics_features['options'] as $option)
                                                    <input type="radio" class="sum-all" onChange="viewTotal(this);" name="graphics_features" value="{{ $option['value'] }}"/> {{ $option['description'] }}<br/>
                                                @endforeach
                                            </div>
                                        </div>                                
                                        <div class="panel-body">
                                            <p><strong> {{ $logo_details['title'] }} </strong></p>
                                            <div class="row col-lg-12">
                                                @foreach ($logo_details['options'] as $option)
                                                    <input type="checkbox" class="sum-all" onChange="viewTotal(this);" name="is_logo_required[]" value="{{ $option['value'] }}"/> {{ $option['description'] }}<br/>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br/><br/>
                                <div class="panel panel-info" id="site-content">
                                    <div class="panel-heading feature-heading-font">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" href="#site_content_collapse">{{ $site_content['heading'] }}</a>
                                        </h4>
                                    </div>
                                    <div id="site_content_collapse" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <p><strong> {{ $site_content['title'] }} </strong></p>
                                            <div class="row col-lg-12">
                                                @foreach ($site_content['options'] as $option)
                                                    <input type="radio" class="sum-all" onChange="viewTotal(this);" name="site_content" value="{{ $option['value'] }}"/> {{ $option['description'] }}<br/>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br/><br/>
                            <div class="panel panel-info wow bounceIn" id="timeframe">
                                <div class="panel-heading feature-heading-font">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#time_frame_collapse">{{ $time_frame['heading'] }}</a>
                                    </h4>
                                </div>
                                <div id="time_frame_collapse" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <p><strong> {{ $time_frame['title'] }} </strong></p>
                                        <div class="row col-lg-12">
                                            @foreach ($time_frame['options'] as $option)
                                                <input type="radio" class="sum-all" onChange="viewTotal(this);" name="time_frame" value="{{ $option['value'] }}"/> {{ $option['description'] }}<br/>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container col-lg-2" id="theFixed" style="position:fixed; top:530; margin-left: 1100px;">
                <div class="panel panel-default">
                    <div class="panel-heading feature-heading-font">
                        <h4 class="panel-title">
                            <span>Total Amount</span>
                        </h4>
                    </div>
                    <div class="panel-body">
                        <span id="total-amount"></span>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"/>
                        <input type="submit" class="btn btn-success btn-lg" name="query_submit_btn" value="Submit"/>
                    </div>
                </div>
            </div>
        </form>
    </section>
    
@include('template.footer')