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
                                  
                                  <a href="<?php echo site_url();?>vote/vote21" class="btn btn-lg btn-outline-light">ลงคะแนน</a>
                               
                               
                                </div>
                                <!--  <small class="text-muted">9 mins</small> -->
                            </div>
                        </div>
                    </div>

                </div>

                    <div class="col-md-4">

                    <div class="card mb-4 shadow-sm" id="event_2">
                        <img src="<?php echo base_url();?>uploads/33.png" class="img-fluid" alt="">

                        <div class="card-body" style="background-color:#68CEF5;">
                            <p class="card-text text-white"></p>
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="btn-group">
                                  
                                  <a href="<?php echo site_url();?>vote/vote22" class="btn btn-lg btn-outline-light">ลงคะแนน</a>
                              
                               
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
<link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/sweetalert2/sweetalert2.min.css">
<script src="<?php echo base_url();?>assets/admin/plugins/sweetalert2/sweetalert2.all.min.js"></script>
<script>
    function alert(){
        Swal.fire('เปิดลงคะแนนคัดเลือก<br>วันที่ 14 มีนาคม พ.ศ. 2565<br>เวลา 09.00 - 15.00 น.');
    }
</script>