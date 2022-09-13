   <main role="main" class="container">
    <?php
    $query = $this->db->query('SELECT * FROM sitesettings');
    $row = $query->row();
    if (isset($row))
    {
        $sdate = $row->start_time;
        $edate = $row->end_time;
    }
    if (check_on_date($sdate,$edate)){
        $go_url = base_url('login'); 
    }else{
        $go_url ='javascript:alert();';
    }

    ?>

    <div class="album py-5 ">
        <div class="container">

            <div class="row justify-content-center">
                <?php 
                foreach($events as $v){
                ?>
                <div class="col-md-4">

                    <div class="card mb-4 shadow-sm" id="event_<?php echo $v->id;?>">
                        <img src="<?php echo base_url();?>uploads/<?php echo $v->banner;?>" class="img-fluid" alt="">

                        <div class="card-body" style="background-color:<?php echo $v->ccolor;?>;">
                            <p class="card-text text-white"><?php //echo $v->event_name ;?></p>
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="btn-group">
                                  <a href="<?php echo base_url("candidate/view/".$v->id);?>" class="btn btn-lg btn-outline-light">รายชื่อผู้สมัคร</a>
                                 
                                <!--  <a href="<?php //echo base_url("vote/view/".$v->id);?>" class="btn btn-lg btn-outline-light">ลงคะแนน</a>-->
                               
                                </div>
                                <!--  <small class="text-muted">9 mins</small> -->
                            </div>
                        </div>
                    </div>

                </div>

                 <?php }?>

            </div>
<!--
            <div class="row justify-content-center">
                 <a href="<?php //echo $go_url;?>" >
                     <img src="<?php //echo base_url();?>uploads/start1.jpg" class="img-fluid" alt="เลือกตั้ง">
                 </a>
            </div> -->
        </div>
    </div>
</main>
<link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/sweetalert2/sweetalert2.min.css">
<script src="<?php echo base_url();?>assets/admin/plugins/sweetalert2/sweetalert2.all.min.js"></script>
<script>
    function alert(){
        Swal.fire('เปิดลงคะแนนเลือกตั้ง<br>วันที่ 5 กรกฎาคม พ.ศ. 2565<br>เวลา 09.00 - 15.00 น.');
    }
</script>