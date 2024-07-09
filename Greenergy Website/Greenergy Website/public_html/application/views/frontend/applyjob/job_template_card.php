
               
                 <?php $i=1; if($job_data) { foreach($job_data as $job) { ?> 

           
                  <div class="col-md-4 mb-10">  
                <div class="card " >
                 <!--  <img class="card-img-top" src="//placehold.it/720x350" alt="Card image cap"> -->
                  <div class="card-block">
                   <!-- <div class="col-md-6"> -->
                    <h4 class="card-title career_title pl-4 pb-3" style="color:#199C2D;font-weight: bold;padding-top: 30px;"><?= $job['title'] ?></h4>
                    <h5 class=" pl-4" style="  font-weight: 700;font-size: 1rem;">Job Location's</h5>
                    <p class="card-text pl-4 career_location" style=""><i class='fas fa-map-marker-alt i'></i><?= $job['location'] ?></p>
                    <h5 class=" pl-4" style="font-weight: 700;font-size: 1rem;">Experience Required</h5>
                    <p class="card-text pl-4" style="line-height: 1.61em;font-weight: 400;font-size: 1.2em;"><i class='fas fa-briefcase  i'></i><?= $job['experience_required'] ?></p>
                    <a href="<?= base_url('apply-job-deatils/'.$job['id']);?>" style="float: right;margin-right: 40px;font-size: 20px;padding-bottom: 30px; color:#f57e22;">Read More</a>
                  </div>
                </div>
            </div>
               <!-- </div> -->
               
                <?php } }?>
           
