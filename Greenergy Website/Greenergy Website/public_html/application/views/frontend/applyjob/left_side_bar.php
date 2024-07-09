<style>
    .margin-left-20{
        margin-left: 20px !important;       
    }
    .fa-circle{
        font-size: 8px !important;
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
</style>
 <ul class="nav flex-column flex-nowrap overflow-hidden">               
                <li class="nav-item">
                    <a class="nav-link collapsed text-truncate" href="#submenu1" data-toggle="collapse" data-target="#submenu1"><i class="fa fa-chevron-down"></i> <span class=" d-sm-inline">Career</span></a>
                    <div class="collapse collapse show" id="submenu1" aria-expanded="false">
                        <ul class="flex-column pl-2 nav">
                            <li class="nav-item "><a class="nav-link py-0 margin-left-20 <?= (! isset($is_footer_js))?'active':'' ?>" href="<?= base_url('career') ?>"> <i class="fa fa-circle"></i>&nbsp; &nbsp; <span>Job Seeker’s Alert</span></a></li>
                             <li class="nav-item"><a class="nav-link py-0 margin-left-20 <?= (isset($is_footer_js)&& $is_footer_js==1)?'active':'' ?>" href="<?= base_url('apply-job') ?>"> <i class="fa fa-circle"></i>&nbsp; &nbsp;  <span>Apply Job</span></a></li>
                            
                        </ul>
                    </div>
                </li>
               
            </ul>