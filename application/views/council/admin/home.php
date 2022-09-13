 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">ข้อมูลผู้สมัคร</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">ข้อมูลผู้สมัคร</li>
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
          <div class="col-lg-12">
              <div class="card">
              <div class="card-body">
               <h5 class="card-title">รายชื่อผู้สมัคร</h5>

                <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                     <th valign="center" class="text-center">ลำดับ</th>
                      <th valign="center" class="text-center">หมายเลข</th>
                      <th >รูปผู้สมัคร</th>
                      <th >ชื่อ - นามสกุล</th>
                      <th class="text-center">หน่วยงาน</th>
                      <th class="text-center">จัดการ</th>
                    </tr>
                  </thead>
                  <tbody>
                     <?php 
                     $i=1;
                     foreach ($candidates as $key => $r){ ?>
                      <tr>
                      <td style="vertical-align:middle;text-align:center;"><?php echo $i;?></td>
                        <td style="vertical-align:middle;text-align:center;"><div class="cnumber"><?php echo $r->c_number;?></div></td>
                        <td>
                          <img src="http://personnel.dusit.ac.th/eprofile/main/files/bio_data_file/<?php echo $r->pid;?>.jpg" class="img-fluid" width="90px">
                        </td>
                        <td><?php echo $r->candidate_name;?></td>
                        <td></td>
                        <td style="vertical-align:middle;text-align:center;">
                         <a class="btn btn-primary btn-sm" href="#">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a>
                          <a class="btn btn-info btn-sm" href="#">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="#">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                        </td>
                      </tr>
                <?php $i++; } ?>
                  </tbody>
                </table>
                </div>
              
              </div>
            </div>

            

           
          </div>
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->