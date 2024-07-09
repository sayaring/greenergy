<?php 
    $contentIdListFooter = [14,6,15];
    $contectData= $this->common->footerContentWhereInDetails($contentIdListFooter);
    $categoryDetails = $this->common->categoryDetails();
    $gallaryImages = $this->common->gallaryImages();   
?>
 <!--====== Footer Start ======-->

<footer class="main-footer">
        <div class="upper-box">
            <div class="auto-container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="widget about-widget">
                            <div class="logo"><a href="<?php echo base_url('/'); ?>"><img src="<?php echo base_url('uploads/logo/'.IMAGE); ?>" alt=""></a></div>
                            <ul class="social-links">
                                 <li><a href="https://www.linkedin.com/company/greenergysolution/"><span class="fab fa-linkedin-in"></span></a></li>
                            <li><a href="<?php echo FACEBOOKLINK; ?>"><span class="fab fa-facebook-square"></span></a></li>
                            <li><a href="https://api.whatsapp.com/send?phone=918250998977&text=Hi%20I%20contacted%20you%20through%20your%20website!%20Please%20call%20back%20as%20convenient,%20thanks!"><span class="fab fa-whatsapp"></span></a></li>
                            <li><a href="<?php echo YOUTUBELINK; ?>"><span class="fab fa-youtube"></span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="widget links-widget">
                            <h4 class="widget_title">Useful Links</h4>
                            <div class="widget-content">
                                <div class="row">
                                    <div class="col-md-6">
                                        <ul class="list">
                                            <li><a href="<?php echo base_url('/'); ?>">Home</a></li>
                                            <li><a href="<?php echo base_url('about-us'); ?>">About Us</a></li>
                                            <!-- <li><a href="#">Products</a></li> -->
                                            <li><a href="<?php echo base_url('projects'); ?>">Projects</a></li>
<!--                                             <li><a href="#">Industries</a></li> -->
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <ul class="list">
                                           <!--  <li><a href="#">Career</a></li> -->
                                            <li><a href="<?php echo base_url('blogs'); ?>">Blog</a></li>
                                            <!-- <li><a href="#">News</a></li>
                                            <li><a href="#">Feedback</a></li> -->
                                             <li><a href="<?php echo base_url('career'); ?>">Career</a></li>
                                            <li><a href="<?php echo base_url('contact'); ?>">Contact</a></li>
                                        </ul>
                                    </div>
                                </div>                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="contact-widget widget">
                            <h4 class="widget_title">Our Offices</h4>
                            <ul>
                                <li><i class="flaticon-location-pointer"></i>17 Royd Street, 4th Floor, Kolkata – 700016, Contact: +918250998977</li>
                                
                                <li><i class="flaticon-location-pointer"></i>PCM Bus Terminus, Block 'C’, Sevoke Road, Siliguri - 734001, Contact: +918250998978</li>
                                
                                <li><i class="flaticon-location-pointer"></i>Padumbari, N.H-37, PO & PS Jalukbari Guwahati-7810145, Contact: +919365976133</l>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        
                        
                            <div class="contact-widget widget">
                            <h4 class="widget_title">Get In Touch</h4>
                            <ul>
                                <li><i class="flaticon-envelope"></i> <a href="mailto:admin@greenergysolution.net.in">admin@greenergy.net.in</a> <br>  Online Support & Quote  </li>
                            </ul>
                        </div>
                        
                       <!-- <div class="instagram-widget widget">
                            <h4 class="widget_title">Our Gallery</h4>
                            <div class="wrapper-box">
                                <?php  
                        if(!empty($gallaryImages)) {

                            foreach ($gallaryImages as  $gallaryImage) {
                            $image = base_url('uploads/no-image.png');
                            $imageBig = base_url('uploads/no-image.png');
                              $imagePath= !empty($gallaryImage->image) ? $gallaryImage->image: '';
                              if(!empty($imagePath)){
                                if (file_exists(FCPATH.'uploads/products/thumbnail/'.$imagePath)) {
                                  $image = base_url('uploads/products/thumbnail/'.$imagePath);
                                  $imageBig = base_url('uploads/products/thumbnail/'.$imagePath);
                                }
                              }
                             
                        ?> 
                                <div class="image">
                                    <img  style=" width: 84px; height: 84px; " src="<?php echo  $image; ?>" alt="">
                                    <div class="overlay-link"><a href="<?php echo  $imageBig; ?>" class="lightbox-image" data-fancybox="gallery"><span class="flaticon-zoom"></span></a></div>
                                </div>
                        <?php
                            }
                          }  
                        ?>        
                                
                            </div>
                        </div>
                        
                        -->
                        
                    </div>
                </div>
            </div> 
        </div>               
    </footer>
    <!--End Main Footer-->
    <div class="footer-bottom">
        <div class="auto-container">
            <div class="wrapper-box">
                <div class="row m-0 align-items-center justify-content-between">
                    <div class="copyright-text">Copyright © <?php echo date('Y'); ?>. Greenergy Solution Pvt. Ltd. | Powered By: <a href="https://www.anttech.in/"> Anttech.</a></div>
                    <ul class="menu">
                        <li><a href="#">Terms & Conditions</a></li>
                        <li><a href="#">Privacy Policy </a></li>
                       <!--  <li><a href="#">Sitemap</a></li> -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>   
    <!--====== Footer Ends ======-->
 <div class="scroll-to-top scroll-to-target" data-target="html"><span class="flaticon-arrow-1"></span></div>

<script src="<?php echo base_url(); ?>assets/web/assets/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/web/assets/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/web/assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/web/assets/js/bootstrap-select.min.js"></script>
<script src="<?php echo base_url(); ?>assets/web/assets/js/jquery.fancybox.js"></script>
<script src="<?php echo base_url(); ?>assets/web/assets/js/isotope.js"></script>
<script src="<?php echo base_url(); ?>assets/web/assets/js/owl.js"></script>
<script src="<?php echo base_url(); ?>assets/web/assets/js/appear.js"></script>
<script src="<?php echo base_url(); ?>assets/web/assets/js/wow.js"></script>
<script src="<?php echo base_url(); ?>assets/web/assets/js/scrollbar.js"></script>
<script src="<?php echo base_url(); ?>assets/web/assets/js/TweenMax.min.js"></script>
<script src="<?php echo base_url(); ?>assets/web/assets/js/swiper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/web/assets/js/jquery.polyglot.language.switcher.js"></script>
<script src="<?php echo base_url(); ?>assets/web/assets/js/jquery.ajaxchimp.min.js"></script>
<script src="<?php echo base_url(); ?>assets/web/assets/js/parallax-scroll.js"></script>
<script src="<?php echo base_url(); ?>assets/web/assets/js/knob.js"></script>

<script src="<?php echo base_url(); ?>assets/web/assets/js/script.js"></script>
    <script>
        $(window).load(function() {
        $('#slider').nivoSlider();
    });
        $(document).ready(function() {

        function isEmail(email) {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
     }
        
        $(document).on("click","#submit",function() {
            $('#statusMessage').html('');
            var name=$('#name').val();
            var email=$('#email').val();
            var validEmail=isEmail(email);
            var contact=$('#contact').val();
           // var subject = $('#subject').val();
            var message=$('#message').val();
            var section=$('#section').val();
            var address = $('#address').val();
            if(name=='' ||  contact=='' ){        
            $('#statusMessage').html('<div class="isa_error"> <i class="fa fa-times-circle"></i>All fields required,</span> try again!</p> </div>');          
            }  else{
             $.ajax({
                  type: 'POST',
                  url: "<?php echo base_url('post-query');?>",
                  data: {name:name,email:email,phone:contact,address:address,section:section,message:message},
                  success: function(data) {                    
                    console.log(data);
                        if(data.status==200){
                            $('#name').val('');
                            $('#email').val('');
                            $('#contact').val('');
                            $('#about').val('');
                            $('#message').val('');
                            $('#address').val('');
                            $('#statusMessage').html('<div class="isa_success"> <i class="fa fa-check"></i>' + data.message + '</div>');                            
                        }else{
                            $('#statusMessage').html('<div class="isa_error"> <i class="fa fa-times-circle"></i>' + data.message + '</div>');
                        }
                  }
            });
            
            }
        });
        $(document).on("click","#newslettersubmit",function() {
            $('#statusMessage').html('');
            var email=$('#email').val();
            var validEmail=isEmail(email);
            var section=$('#section').val();
            if(email==''){        
            $('#statusMessage').html('<div class="isa_error"> <i class="fa fa-times-circle"></i>All fields required,</span> try again!</p> </div>');          
            } else if(validEmail==false){                        
             $('#statusMessage').html('<div class="isa_error"> <i class="fa fa-times-circle"></i>Invalid Email Id!</p> </div>');
            } else{
             $.ajax({
                  type: 'POST',
                  url: "<?php echo base_url('post-newsletter');?>",
                  data: {email:email,section:section},
                  success: function(data) {                    
                    console.log(data);
                        if(data.status==200){                            
                            $('#email').val('');
                            $('#statusMessage').html('<div class="isa_success"> <i class="fa fa-check"></i>' + data.message + '</div>');                            
                        }else{
                            $('#statusMessage').html('<div class="isa_error"> <i class="fa fa-times-circle"></i>' + data.message + '</div>');
                        }
                  }
            });
            
            }
        });
          $(document).on("click","#booksubmit",function() {
            
            $('#statusMessage').html('');
            var name=$('#name').val();
            var email=$('#email').val();
            var validEmail=isEmail(email);
            var contact=$('#contact').val();
            var address = $('#address').val();
            var course = $('#courseName').val();
            //var college = $('#college').val();
            var online ='';
            var classroom = '';
            if ($('#online').is(":checked"))
            {
              online = $('#online').val();
            }
            if ($('#classroom').is(":checked"))
            {
              classroom = $('#classroom').val();
            }
            //console.log(online,classroom);
            //console.log('Hi',{name:name,email:email,phone:contact,address:address,course:course});
            //email=='' || contact=='' || address=='' || course ==''
            /*else if(validEmail==false){                        
             $('#statusMessage').html('<div class="isa_error"> <i class="fa fa-times-circle"></i>Invalid Email Id!</p> </div>');
            }*/
            if(name=='' || contact==''){        
            $('#statusMessage').html('<div class="isa_error"> <i class="fa fa-times-circle"></i>All fields required,</span> try again!</p> </div>');          
            }  else{
                $("#booksubmit").hide();
             $.ajax({
                  type: 'POST',
                  url: "<?php echo base_url('post-booking');?>",
                  data: {name:name,email:email,phone:contact,address:address,course:course,online:'',classroom:''},
                  success: function(data) { 
                  $("#booksubmit").show();
                        if(data.status==200){
                            $('#name').val('');
                            $('#email').val('');
                            $('#contact').val('');
                            $('#address').val('');
                            $('#courseName').val('');
                            $('#cpract').val('');
                            $('#statusMessage').html('<div class="isa_success"> <i class="fa fa-check"></i>' + data.message + '</div>');                            
                        }else{
                            $('#statusMessage').html('<div class="isa_error"> <i class="fa fa-times-circle"></i>' + data.message + '</div>');
                        }
                  }
            });
            
            }
        });
       $(document).on("click",".collegelist",function() {
          var subcategorylist = new Array();
          $('.collegelist:checked').each(function() {
             subcategorylist.push($(this).val());
          });          
          
          $.ajax({
                  type: 'POST',
                  url: "<?php echo base_url('collage-list');?>",
                  data: {subcategorylist:subcategorylist},
                  success: function(data) { 
                        $('#collegeappend').html('');
                        $('#collegeappend').html(data);
                  }
            });
      });
     });
    </script>
</body>
</html>
<!--
=====================================================
    Footer
=====================================================
--> 

