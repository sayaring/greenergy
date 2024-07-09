<!--====== Page Banner Start ======-->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/web/assets/css/lightslider.min.css">
<section class="page-banner">
        <div class="page-banner-bg bg_cover" style="background-image: url(<?php echo base_url(); ?>assets/web/assets/images/page-banner.jpg);">
            <div class="container">
                <div class="banner-content text-center">
                    <h2 class="title">Enrol Now</h2>
                </div>
            </div>
        </div>
    </section>
    <!--====== Top Course Start ======-->
    
    <!--====== Login Start ======-->

    <section class="login-register">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="login-register-content">
                        <h4 class="title"><?php echo !empty($collagesTitle) ? $collagesTitle :'Enrol in a Course Now'; ?> </h4>
                        <div id="statusMessage"></div>
                        <div class="login-register-form">
                             <form id="booking-form" >
                                <div class="single-form">
                                    <label>Full Name *</label>
                                    <input type="text" name="name" placeholder="Enter Full Name" id="name" required>
                                    <?php echo form_error('name'); ?>
                                </div>
                                <div class="single-form">
                                    <label>Phone Number *</label>
                                    <input type="text"  name="phone" placeholder="Enter Your Phone Number" id="contact" required>
                                     <?php echo form_error('phone'); ?>
                                </div>
                                <div class="single-form">
                                    <label>Email address</label>
                                    <input type="email" name="email" placeholder="Enter Your Email address" id="email" required>
                                    <?php echo form_error('email'); ?>
                                </div>
                                <div class="single-form">
                                    <label>Residential Address</label>
                                    <input type="text" name="address" placeholder="Enter Your Residential Address" id="address" required>
                                    <?php echo form_error('address'); ?>
                                </div>
                                <div class="single-form">
                                    <label>Why do you want to learn the language </label>
                                    <input type="text" name="courseName" placeholder="Enter Why do you want to learn the language" id="courseName" value="" required>
                                    <?php echo form_error('courseName'); ?>
                                </div>
                                <div class="single-form">
                                   
                                <!--<label>Select preferred mode of class</label>
                                <div class="checkbox">
                                        <input type="checkbox" value="Online" name="online" id="online">
                                        <label for="online"><span></span>Online</label>
                                    </div> 
                                    <div class="checkbox">
                                        <input type="checkbox" value="Classroom" name="classroom" id="classroom">
                                        <label for="classroom"><span></span>Classroom</label>
                                    </div> 
                               
                                     
                                </div>-->
                                <div class="single-form">
                                    <button class="main-btn btn-block" type="button" id="booksubmit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </section>
    <br/><br/>
