<?php
$query = $this->db->query("SELECT * FROM sitesettings");
$row = $query->row();

if (isset($row))
{
    $st_date = $row->start_time;
    $en_date = $row->end_time;
}
    $today = date("Y-m-d H:i:s");
    $today_dt = new DateTime($today);
    $start_dt = new DateTime($st_date);
    $expire_dt = new DateTime($en_date);
    if ($start_dt <= $today_dt && $today_dt <= $expire_dt) { 
    }else{
         redirect('login/signout','refresh');
    }

?>
<main role="main" class="container">

    <div class="album py-5 ">
        <div class="container">

            <div class="row justify-content-center">
               <div class="col-md-4">

                    <div class="card mb-4 shadow-sm" id="event_1">
                        <img src="<?php echo base_url();?>uploads/11.png" class="img-fluid" alt="">

                        <div class="card-body" style="background-color:#B39F62;">
                            <p class="card-text text-white"></p>
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="btn-group">
                                  
                                  <a href="<?php echo site_url();?>vote/vote11" class="btn btn-lg btn-outline-light">ลงคะแนน</a>
                               
                               
                                </div>
                                <!--  <small class="text-muted">9 mins</small> -->
                            </div>
                        </div>
                    </div>

                </div>

                    <div class="col-md-4">

                    <div class="card mb-4 shadow-sm" id="event_2">
                        <img src="<?php echo base_url();?>uploads/22.png" class="img-fluid" alt="">

                        <div class="card-body" style="background-color:#F873BA;">
                            <p class="card-text text-white"></p>
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="btn-group">
                                  
                                  <a href="<?php echo site_url();?>vote/vote12" class="btn btn-lg btn-outline-light">ลงคะแนน</a>
                              
                               
                                </div>
                                <!--  <small class="text-muted">9 mins</small> -->
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>
</main>
