@include('template.header')

<?php // print_r($site_requirement) ;?>

    <section class="bg-primary header-back" id="about"></section>
    
    <ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
    
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
                        <form name="calculate_form" method="POST" action="test">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter name" value="asd" name="name" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter email" value="asd@g.m" name="email" required>
                            </div>

                            <div class="form-group">
                                <label for="mobileNumber">Mobile Number</label>
                                <input type="number" class="form-control" id="mobileNumber" name="mobile_number" value="4444444444" placeholder="Enter mobile number" required>
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea class="form-control" class="form-control" id="address" name="address" placeholder="Enter your address" rows="3" required></textarea>                            
                            </div>

                            <div class="form-group">
                                <label for="state">State</label>
                                <input type="text" class="form-control" id="state" name="state" value="state" placeholder="Enter your state" required>
                            </div>

                            <div class="form-group">
                                <label for="pincode">Pin Code</label>
                                <input type="number" class="form-control" id="pincode" name="pincode" value="799250" placeholder="Enter your state" required>
                            </div>

                            <div class="form-group">
                                <label for="country">Country</label>
                                <input type="text" class="form-control" id="country" name="country" value="ind" placeholder="Enter country" required>
                            </div>

                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"/>
                            <input type="hidden" name="site_requirements" value="<?php print_r($site_requirement); ?>"/>
                            <input type="submit" class="btn btn-success" value="Submit"/>
                        </form>
                    </div>
                </div>
            </div>
    </section>
@include('template.footer')