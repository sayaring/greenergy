<?php
 $contentIdListFooter = [1];
  $contectData= $this->common->footerContentWhereInDetails($contentIdListFooter);
?>
<!-- Page Title -->
    <section class="page-title" style="background-image: url(<?php echo base_url(); ?>assets/web/assets/images/background/bg-26.jpg);">
        <div class="auto-container">
            <div class="content-box">
                <div class="content-wrapper">
                    <div class="title">
                        <h1>Contact</h1>
                    </div>
                    <ul class="bread-crumb style-two">
                        <li><a href="<?php echo base_url('/'); ?>">Home </a></li>
                        <li class="active">Contact</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--====== Page Banner Ends ======-->

<!--====== Contact Start ======-->
       <!-- Contact Form section -->
    <section class="contact-form-section style-four">
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-8">
                    <!--<div class="office-address">
                        <div class="icon-box">
                            <div class="icon"><i class="flaticon-geolocation"></i></div>
                            <h4>Greenergy Solution, Kolkata</h4>
                            <div class="text">Contact: +918250998977, Email: admin@greenergysolution.net.in</div>
                        </div>
                          <div class="icon-box">
                            <div class="icon"><i class="flaticon-geolocation"></i></div>
                            <h4>Greenergy Solution Siliguri</h4>
                             <div class="text">Contact: +918250998978, Email: admin@greenergysolution.net.in</div>
                        </div>
                          <div class="icon-box">
                            <div class="icon"><i class="flaticon-geolocation"></i></div>
                            <h4>Greenergy Solution Guwahati</h4>
                             <div class="text">Contact:  +919365976133, Email: admin@greenergysolution.net.in</div>
                        </div>
                        <div class="text">Of you have any product or service related query please feel free to contact us, thank you!</div>
                    </div>-->
                    <div class="contact-info mb-30">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="icon-box">
                                    <div class="icon"><i class="flaticon-call"></i></div>
                                    <h4>Kolkata</h4>
                                    <div class="text"><a href="tel:+918250998977">+91-8250998977</a></div>
                                    <div class="text"><a href="mailto:admin@greenergy.net.in">admin@greenergy.net.in</a></div>
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="icon-box">
                                    <div class="icon"><i class="flaticon-call"></i></div>
                                    <h4>Siliguri</h4>
                                    <div class="text"><a href="tel:+91-8250998978">+91-8250998978</a></div>
                                    <div class="text"><a href="mailto:admin@greenergy.net.in">admin@greenergy.net.in</a></div>
                                </div>
                            </div>
                        </div>     
                             <div class="row">
                            <div class="col-md-6">
                                <div class="icon-box">
                                    <div class="icon"><i class="flaticon-call"></i></div>
                                    <h4>Guwahati</h4>
                                    <div class="text"><a href="tel:+91-9365976133">+91-9365976133</a></div>
                                    <div class="text"><a href="mailto:admin@greenergy.net.in">admin@greenergy.net.in</a></div>
                                </div>
                            </div>
                             <div class="col-md-6"></div>
                        </div> 
                    </div>
                    <div class="wrapper-box">
                        <div class="sec-title">
                            <div class="sub-title">Send Message</div>
                            <h2>Got a Query?</h2>
                            <div class="text">For any kind of feedback, suggestions and query please feel free to submit.</div>
                        </div>
                        <!--Contact Form-->
                        <div class="contact-form">
                             <div id="statusMessage"></div>
                            <form method="post" action="#" id="contact-form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input id="name" type="text" name="form_name" value="" placeholder="Your Name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input id="email" type="text" name="email" value="" placeholder="Your Email" required>
                                        </div>                        
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input id="contact" type="text" name="form_phone" value="" placeholder="Enter Your PHone" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="service">Service</label>
                                            <select id="section" class="selectpicker" name="form_subject">
                                                <option value="Product Inquiry">Product Inquiry</option>
                                                <option value="Technical Support">Technical Support</option>
                                            </select>
                                        </div>                        
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="message">Message</label>
                                            <textarea id="message" name="form_message" placeholder="Enter Your Massage"></textarea>
                                            <div class="form-btn">
                                               
                                                <button id="submit" class="theme-btn btn-style-one" type="button"><span><i class="flaticon-up-arrow"></i>Send Now</span></button>
                                            </div>
                                        </div>                        
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--End Contact Form-->
                    </div>
                </div>
                <div class="col-lg-4">
                    <!--<div class="feature-block-two">
                        <div class="inner-box">
                            <div class="icon"><img src="<?php echo base_url(); ?>assets/web/assets/images/icons/icon-6.png" alt=""></div>
                            <h4>Looking for <br> a job apply now</h4>
                            <div class="text">Ready to get join with professionals</div>
                            <div class="link-btn"><a href="#" class="theme-btn style-three"><span>Job Opening</span></a></div>
                        </div>
                    </div>-->
                    <div class="feature-block-two style-two">
                        <div class="inner-box">
                            <div class="icon"><img src="<?php echo base_url(); ?>assets/web/assets/images/icons/icon-7.png" alt=""></div>
                            <h4>Subscribe Our <br> Newsletter</h4>
                            <div class="text">Subscribe us & get updates in inbox</div>
                            <div class="link-btn"><a href="mailto:admin@greenergysolution.net.in" class="theme-btn style-three"><span>Join Us</span></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="map-section">
        <div class="contact-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3686.6632027866176!2d88.3964551!3d22.4792873!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a02710966ac8bdf%3A0x3c10e8b806b4fa08!2sGreenergy%20Solution%20Pvt%20Ltd!5e0!3m2!1sen!2sin!4v1698817705855!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
       <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d58969.786728195344!2d88.32958464171483!3d22.518748513762976!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a0277650fa031e3%3A0x661c983db2e86ad0!2sGreenergy%20Solution%20Pvt.%20Ltd.!5e0!3m2!1sen!2sin!4v1650463703133!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>-->
        </div>
    </section>

    <!-- CTA section -->
    <section class="cta-section">
        <div class="auto-container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <h2>Do You Have Product Related Query?</h2>
                </div>
                <div class="col-lg-5">
                    <div class="link-btn">
                        <a href="#" class="theme-btn"><span>Talk to Us</span></a>
                        <a href="tel:8250998973" class="theme-btn style-three"><span><i class="flaticon-phone-call"></i> +91-8250998973</span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- <section class="contact-area">
        <div class="container">
            <div class="row">
                <?php echo !empty($contectData[16]->description) ? $contectData[16]->description :'';?>
              
            </div>
            <div class="contact-form">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="contact-title text-center">
                            <h3 class="title">Leave a message here</h3>
                            <p>If you have any query please fill and submit the form.</p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div id="statusMessage"></div>
                        <div class="contact-form-wrapper">
                            <form id="contact-form" >
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="single-form">
                                            <input type="text" id="name" name="name" placeholder="Name *">
                                            <input type="hidden" id="section"  name="form_address" value="Contact">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-form">
                                            <input type="email" id="email" name="email" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-form">
                                            <input type="text" id="contact" name="phone" placeholder="Phone *">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="single-form">
                                            <input type="text" id="subject" name="subject" placeholder="Subject">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="single-form">
                                            <textarea id="message" name="message" placeholder="Write here..."></textarea>
                                        </div>
                                    </div>
                                    <p class="form-message"></p>
                                    <div class="col-md-12">
                                        <div class="single-form text-center">
                                            <button type="button" id="submit" class="main-btn">Submit now</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
 -->
   