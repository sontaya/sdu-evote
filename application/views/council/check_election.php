 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">ตรวจสอบสิทธิการเลือกตั้ง</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">หน้าแรก</a></li>
              <li class="breadcrumb-item active">ตรวจสอบสิทธิการเลือกตั้ง</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-md-4">
          <?php

          ?>
          <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                <img src="http://personnel.dusit.ac.th/eprofile/main/files/bio_data_file/<?php echo $profile->pcode;?>.jpg" class="profile-user-img img-fluid img-circle" width="90px" alt="User profile picture">
                <!--  <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url();?>assets/dist/img/user4-128x128.jpg" alt="User profile picture"> -->
                </div>

                <h3 class="profile-username text-center"><?php echo $profile->fullname ;?></h3>

                <p class="text-muted text-center"><?php //echo $profile->position_name ;?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">                    
                    <b class="text-success">รหัสบุคลากร :</b> <a class="float-right text-success"><?php echo $profile->pcode;?></a>
                  </li>
                  <li class="list-group-item">
                    <b class="text-success">การตรวจสอบสิทธิ :</b> <a class="float-right text-success">ตรวจสอบแล้ว</a>
                  </li>
                <!--  <li class="list-group-item">
                    <b>Following</b> <a class="float-right">543</a>
                  </li>
                  <li class="list-group-item">
                    <b>Friends</b> <a class="float-right">13,287</a>
                  </li> -->
                </ul>
                <button type="button" class="btn btn-block btn-outline-danger btn-flat"><i class="fas fa-check"></i> ท่านเป็นผู้มีสิทธิลงคะแนน</button>
                <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <div class="col-lg-9 col-md-8">
          <div class="card card-primary card-outline">
          <div class="card-body">
              <strong><i class="fas fa-stopwatch-20"></i> ลำดับที่ในบัญชีรายชื่อ</strong>

                <p class="text-muted">
                <?php echo $profile->n_order;?>
                </p>

                <hr>
                <strong><i class="fas fa-book mr-1"></i> ประเภทบุคลากร</strong>

                <p class="text-muted">
                <?php echo $profile->position_type ;?>
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> ตำแหน่ง</strong>

                <p class="text-muted"><?php echo $profile->position_name ;?></p>

                <hr>
                <strong><i class="fas fa-map-marker-alt mr-1"></i> สายงาน</strong>

                <p class="text-muted"><?php echo $profile->position_level ;?></p>

                <hr>
                <strong><i class="fas fa-pencil-alt mr-1"></i> วันที่เริ่มงาน</strong>

                <p class="text-muted"><?php echo $profile->start_date ;?></p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> ระยะเวลาการปฏิบัติงานจนถึงวันเลือกตั้ง</strong>

                <p class="text-muted"><?php echo $profile->work_total ;?> ปี</p>
              </div>
            </div><!-- /.card -->
          </div>
          
         
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->