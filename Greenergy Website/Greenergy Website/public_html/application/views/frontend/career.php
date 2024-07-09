<?php
   $contentIdListFooter = [8,7,11];
   $contectData= $this->common->footerContentWhereInDetails($contentIdListFooter);
   // echo"<pre>";print_r($contectData);die;   
?>

<style>
.carousel {
    margin: 0px 0;
    background: #ccc;
    position: relative;
    box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
}
.carousel:after {
    content: "";
    position: absolute;
    z-index: -1;
    box-shadow: 0 0 20px rgba(0,0,0,0.8);
    height: 60px;
    bottom: 0px;
    left: 10px;
    right: 10px;
    border-radius: 100px / 20px;
}
.carousel .item {
    text-align: center;
    overflow: hidden;
    height:75px;
}
.carousel .item img {
    max-width: 100%;
    margin: 0 auto; /* Align slide image horizontally center in Bootstrap v3 */
}
.carousel .carousel-control {
    width: 50px;
    height: 50px;
    background: #000;
    margin: auto 0;
    opacity: 0.8;
}
.carousel .carousel-control:hover {
    opacity: 0.9;
}
.carousel .carousel-control i {
    font-size: 41px;
}
.carousel-caption h3, .carousel-caption p {
    color: #fff;
    display: inline-block;
    font-family: 'Oswald', sans-serif;
    text-shadow: none;
    margin-bottom: 20px;
}
.carousel-caption h3 {
/*    background: rgba(0,0,0,0.9);*/
    background:rgba(238, 125, 22, 0.4);
    padding: 12px 24px;
    font-size: 40px;    
    text-transform: uppercase;
}
.carousel-caption p {
    background:rgba(143, 201, 60, 0.4);
    padding: 10px 20px;
    font-size: 20px;
    font-weight: 300;
}
.carousel-action {
    padding: 10px 0 30px;
}
.carousel-action .btn {
    min-height: 34px;
    border-radius: 0;
    margin: 3px;
    min-width: 150px;
    text-transform: uppercase;
    font-family: 'Oswald', sans-serif;
}
.carousel-action .btn-primary {
    border-color: #000;
    background: none;
    color: #000;
}
.carousel-action .btn-primary:hover {
    background: #000;
    color: #fff;
}
.carousel-action .btn-success {
    background: #8fc93c;
    border: none;
}
.carousel-action .btn-success:hover {
    background: #87bd35;
}
.carousel-indicators li, .carousel-indicators li.active {
    width: 11px;
    height: 11px;
    border-radius: 50%;
    margin: 1px 6px;
}
.carousel-indicators li {
    background: transparent;
    border: 1px solid #fff;
}
.carousel-indicators li.active {
    background: #8fc93c;
    border-color: #8fc93c;
}
.carousel-caption {
  position: absolute;
  right: 15%;
  top: 20px;
  left: 15%;
  z-index: 10;
  padding-top: 20px;
  padding-bottom: 20px;
  color: #fff;
  text-align: center;
}
.nav-item active{

}
.nav-link  span ,.nav-link i {
    color: #000;
}
.nav-item  .active span{
    color: #ee7d16;
}
.min-vh-18{
    min-height: 18vh !important;
}
@media only screen and (max-width: 768px) {
  /* For mobile phones: */
 .carousel-caption h3{
    font-size: 10px;
    padding: 5px;
 }
 .carousel-caption p{
    font-size: 15px;
    padding: 5px;
 }
 .carousel-caption {
        top: 0px;
    }
 }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 collapse show d-md-flex pl-0 min-vh-18" id="sidebar">
           <?php $this->load->view('frontend/applyjob/left_side_bar'); ?>
        </div>
        <div class="col-md-10">
             <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Carousel indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                   <!--  <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li> -->
                </ol>   
                <!-- Wrapper for carousel items -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="<?= base_url().'assets/images/slide/slide-2.jpg' ?>" class="img-fluid" alt="Notebook">
                        <div class="carousel-caption">
                            <h3>Job Seeker's Alert</h3>
                            <p>Please read the disclaimer to know about our company's hiring policy</p>
                            <!-- <div class="carousel-action">
                                <a href="#" class="btn btn-primary">Learn More</a>
                                <a href="#" class="btn btn-success">Try Now</a>
                            </div> -->
                        </div>
                    </div>  
                   <!--  <div class="carousel-item">
                        <img src="<?= base_url().'assets/images/slide/slide-1.jpg' ?>"   class="img-fluid" alt="Tablet">
                        <div class="carousel-caption">
                            <h3>Amazing Digital Experience</h3>                         
                            <p>Nullam hendrerit justo non leo aliquet imperdiet. Etiam sagittis lectus condime dapibus.</p>
                            <div class="carousel-action">
                                <a href="#" class="btn btn-primary">Learn More</a>
                                <a href="#" class="btn btn-success">Try Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="<?= base_url().'assets/images/slide/slide-1.jpg' ?>"   class="img-fluid" alt="Workstation">
                        <div class="carousel-caption">
                            <h3>Live Monitoring Tools</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu pellentesque sem tempor.</p>
                            <div class="carousel-action">
                                <a href="#" class="btn btn-primary">Learn More</a>
                                <a href="#" class="btn btn-success">Try Now</a>
                            </div>
                        </div>
                    </div>   -->
                </div>
                <!-- Carousel controls -->
                <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
              
            <div class="about-section-five">
                <div class="row">                                        
                    <div class="col-lg-12">                      
                        <!--<div class="image"><img src="<?php echo $image; ?>" alt=""></div>-->
                        <div class="text" style="text-align:justify">
                           <h2><?php echo !empty($contectData[11]->title) ? $contectData[11]->title: ''; ?></h2><br>
                           <?php echo !empty($contectData[11]->description) ? $contectData[11]->description :'';?>
                           <p>For contact details at Greenergy , </p>
                           <!--<p><h4>Triasha Das </h4>-->
                                <div class="text"><a href="mailto:triasha.das@greenergy.net.in">triasha.das@greenergy.net.in</a></div></p>
                        </div>
                    </div>   
                </div>
            </div>


        </div>
    </div>
</div>
<!--====== Blog Details Ends ======-->
<!--====== Newsletter Start ======-->   
<?php $this->load->view('frontend/includes/newsletter.php'); ?>
