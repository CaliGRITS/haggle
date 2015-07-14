<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Welcome | Huggle</title>

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

<!--    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Start Bootstrap</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">Services</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#something">Something</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>-->
    

    <section class="bg-primary" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">We've got what you need!</h2>
                    <hr class="light">
                    <p class="text-faded">Huggle helps you to "Get Noticed". Whatever you envisage, we'll develop it for you. If you are searching for a company that can understand your needs, boost your sales and take your business to a new high, then Huggle is the company to reckon with. We believe that the sky is the limit and our team makes sure that you reach there.</p>
                    <a href="#services" class="btn btn-primary btn-xl page-scroll">Get Started</a>
                </div>
            </div>
        </div>
    </section>
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading wow bounceIn">Instant Price Calculator</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="main-container-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-info" id="existing">
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
                                            <input type="radio" name="is_new_site" value="{{ $option['value'] }}"/> {{ $option['description'] }}<br/>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br/>
                        <div class="panel panel-info" id="main-features">
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
                                            <input type="checkbox" id="{{ $option['value'] }}" name="main_website_features[]" value="{{ $option['value'] }}"/><i><strong> {{ $option['title'] }} </strong> <p> {{ $option['description'] }}</p></i>
                                            @if ($option['value'] == 'ecommerce')
                                                <div id="ecommerce-features">
                                                    <div class="row">
                                                        <div class="col-lg-11 pull-right">
                                                            <div class="panel panel-default">
                                                                <div class="panel-body">
                                                                    <p><strong> {{ $ecommerce_payment['title'] }} </strong></p>
                                                                    @foreach ($ecommerce_payment['options'] as $option)
                                                                        <input type="checkbox" name="ecommerce_payment[]" value="{{ $option['value'] }}"/> {{ $option['description'] }}<br/>
                                                                    @endforeach
                                                                </div>                                                           
                                                                <div class="panel-body">
                                                                    <p><strong> {{ $ecommerce_products_upload['title'] }} </strong></p>
                                                                    @foreach ($ecommerce_products_upload['options'] as $option)
                                                                        <input type="radio" name="ecommerce_products_upload" value="{{ $option['value'] }}"/> {{ $option['description'] }}<br/>
                                                                    @endforeach
                                                                </div>
                                                                <div class="panel-body">
                                                                    <p><strong> {{ $ecommerce_products_quantity['title'] }} </strong></p>
                                                                    @foreach ($ecommerce_products_quantity['options'] as $option)
                                                                        <input type="radio" name="ecommerce_products_quantity" value="{{ $option['value'] }}"/> {{ $option['description'] }}<br/>
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
                                                                        <input type="radio" name="portfolio_features" value="{{ $option['value'] }}"/> {{ $option['description'] }}<br/>
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
                                                                        <input type="checkbox" name="blog_features[]" value="{{ $option['value'] }}"/> {{ $option['description'] }}<br/>
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
                        <br/>
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
                                            <input type="radio" name="size" value="{{ $option['value'] }}"/> {{ $option['description'] }}<br/>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br/>
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
                                            <input type="checkbox" name="public_site_features[]" value="{{ $option['value'] }}"/> {{ $option['description'] }}<br/>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br/>
                        <div class="panel panel-info" id="graphics">
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
                                            <input type="radio" name="graphics_features" value="{{ $option['value'] }}"/> {{ $option['description'] }}<br/>
                                        @endforeach
                                    </div>
                                </div>                                
                                <div class="panel-body">
                                    <p><strong> {{ $logo_details['title'] }} </strong></p>
                                    <div class="row col-lg-12">
                                        @foreach ($logo_details['options'] as $option)
                                            <input type="checkbox" name="is_logo_required[]" value="{{ $option['value'] }}"/> {{ $option['description'] }}<br/>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br/>
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
                                            <input type="radio" name="site_content" value="{{ $option['value'] }}"/> {{ $option['description'] }}<br/>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br/>
                        <div class="panel panel-info" id="timeframe">
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
                                            <input type="radio" name="site_content" value="{{ $option['value'] }}"/> {{ $option['description'] }}<br/>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br/>
                    </div>
                </div>    
       
                
                <script>
    body {
	padding-top:50px;
}

#masthead {
	min-height:270px;
	background-color:#000044;
  	color:#aaaacc;
}

#masthead h1 {
	font-size: 55px;
	line-height: 1;
}

#masthead .well {
	margin-top:13%;
	background-color:#111155;
  	border-color:#000033;
}

.icon-bar {
	background-color:#fff;
}

@media screen and (min-width: 768px) {
	#masthead h1 {
		font-size: 100px;
	}
}

.navbar-bright {
	background-color:#111155;
    color:#fff;
}
  
.navbar-bright a, #masthead a, #masthead .lead {
  	color:#aaaacc;
}

.navbar-bright li > a:hover {
    background-color:#000033;
}

.affix-top,.affix{
	position: static;
}

@media (min-width: 979px) {
  #sidebar.affix-top {
    position: static;
  	margin-top:30px;
  	width:228px;
  }
  
  #sidebar.affix {
    position: fixed;
    top:70px;
    width:228px;
  }
}

#sidebar li.active {
  	border:0 #eee solid;
  	border-right-width:4px;
}

#mainCol h2 {
	padding-top: 55px;
    margin-top: -55px;
}
    </script>
<!--        <div class="col-sm-2 col-sm-offset-1 blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">
              <div class="" id="leftCol">
                <ul class="nav nav-stacked" id="sidebar">
                    <li><a href="#sec0">Section 0</a></li>
                    <li><a href="#sec1">Section 1</a></li>
                    <li><a href="#sec2">Section 2</a></li>
                    <li><a href="#sec3">Section 3</a></li>
                    <li><a href="#sec4">Section 4</a></li>
                </ul>
            </div>              
          </div>
        </div> /.blog-sidebar -->


                
                
                
            </div>
        </div>
    </div>
        <div id="theFixed" style="position:fixed;top:530;background-color:red;margin-left: 1100px; width: 10%;">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis scelerisque odio sed risus grav
        </div>
<!--    <div class="main-container-right">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis scelerisque odio sed risus gravida, ut feugiat nisl varius.</p>
            
    </div>-->
    </section>

    <section id="something">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">At Your Service</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-diamond wow bounceIn text-primary"></i>
                        <h3>Sturdy Templates</h3>
                        <p class="text-muted">Our templates are updated regularly so they don't break.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-paper-plane wow bounceIn text-primary" data-wow-delay=".1s"></i>
                        <h3>Ready to Ship</h3>
                        <p class="text-muted">You can use this theme as is, or you can make changes!</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-newspaper-o wow bounceIn text-primary" data-wow-delay=".2s"></i>
                        <h3>Up to Date</h3>
                        <p class="text-muted">We update dependencies to keep things fresh.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-heart wow bounceIn text-primary" data-wow-delay=".3s"></i>
                        <h3>Made with Love</h3>
                        <p class="text-muted">You have to make your websites with love these days!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <aside class="bg-dark">
        <div class="container text-center">
            <div class="call-to-action">
                <h2>Free Download at Start Bootstrap!</h2>
                <a href="#" class="btn btn-default btn-xl wow tada">Download Now!</a>
            </div>
        </div>
    </aside>

    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Let's Get In Touch!</h2>
                    <hr class="primary">
                    <p>Ready to start your next project with us? That's great! Give us a call or send us an email and we will get back to you as soon as possible!</p>
                </div>
                <div class="col-lg-4 col-lg-offset-2 text-center">
                    <i class="fa fa-phone fa-3x wow bounceIn"></i>
                    <p>123-456-6789</p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fa fa-envelope-o fa-3x wow bounceIn" data-wow-delay=".1s"></i>
                    <p><a href="mailto:your-email@your-domain.com">feedback@startbootstrap.com</a></p>
                </div>
            </div>
        </div>
    </section>

    <!-- jQuery -->
    <script src="{{ URL::asset('') }}js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ URL::asset('') }}js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="{{ URL::asset('js/jquery.easing.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.fittext.js') }}"></script>
    <script src="{{ URL::asset('js/wow.min.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ URL::asset('js/creative.js') }}"></script>

</body>

</html>
