 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
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
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">จำนวนผู้สมัคร</span>
                <span class="info-box-number">
                  <?php echo $applicant_total;?>
                  
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">จำนวนผู้มีสิทธิ 1</span>
                <span class="info-box-number"><?php echo $election_total1;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">จำนวนผู้มีสิทธิ 2</span>
                <span class="info-box-number"><?php echo $election_total2;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">จำนวนผู้ใช้สิทธิ</span>
                <span class="info-box-number"><?php echo $allvote;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
      <!--s    <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">จำนวนผู้ที่ยังไม่ใช้สิทธิ</span>
                <span class="info-box-number"><?php echo $unvote;?></span>
              </div>
             
            </div>
           
          </div>-->
          <!-- /.col -->
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                   <h3 class="card-title">รายชื่อผู้สมัคร กรรมการบริหารงานบุคคลจากผู้แทนคณาจารย์ประจำ</h3>
                   
                </div>
              <div class="card-body">             
            <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                     <th valign="center" class="text-center"></th>
                      <th valign="center" class="text-center">หมายเลข</th>                      
                      <th >ชื่อ - นามสกุล</th>
                     <!-- <th class="text-center">หน่วยงาน</th> -->
                     
                    </tr>
                  </thead>
                  <tbody>
                     <?php 
                     $i=1;
                     foreach ($candidate1 as $key => $r){ ?>
                      <tr>
                      
                      <td></td>
                        <td style="vertical-align:middle;text-align:center;"><div class="cnumber"><?php echo $r->c_number;?></div></td>
                        
                        <td>
                          <img src="<?php echo base_url('uploads/candidate/'.$r->picture);?>" width="80"  class=" my-n1" alt=""> <?php echo $r->fullname;?></td>
                       <!-- <td><?php //echo $r->department;?></td> -->
                        
                      </tr>
                <?php $i++; } ?>
                  </tbody>
                </table>
                </div>
                </div>
                </div>
          </div>
          <div class="col-md-6">
          <div class="card">
                <div class="card-header">
                   <h3 class="card-title">รายชื่อผู้สมัคร กรรมการบริหารงานบุคคลจากผู้แทนผู้ปฏิบัติงานในมหาวิทยาลัยสายสนับสนุน</h3>
                   
                </div>
              <div class="card-body">             
            <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                     <th valign="center" class="text-center"></th>
                      <th valign="center" class="text-center">หมายเลข</th>                      
                      <th >ชื่อ - นามสกุล</th>
                     <!-- <th class="text-center">หน่วยงาน</th> -->
                     
                    </tr>
                  </thead>
                  <tbody>
                     <?php 
                     $i=1;
                     foreach ($candidate2 as $key => $r2){ ?>
                      <tr>
                      
                      <td></td>
                        <td style="vertical-align:middle;text-align:center;"><div class="cnumber"><?php echo $r2->c_number;?></div></td>
                        
                        <td>
                          <img src="<?php echo base_url('uploads/candidate/'.$r2->picture);?>" width="80"  class=" my-n1" alt=""> <?php echo $r2->fullname;?></td>
                       <!-- <td><?php //echo $r->department;?></td> -->
                        
                      </tr>
                <?php $i++; } ?>
                  </tbody>
                </table>
                </div>
                </div>
                </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->