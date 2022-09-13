<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ผลการเลือกตั้ง</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/dist/css/adminlte.min.css">
  <style>
      #tbl_score1, #tbl_score2 {
         display: flex;
        justify-content: center;
     }

     #desktop {
        align-self: center;
      }
    </style>
</head>
<body class="hold-transition login-page">

<div class="container">
        <div class="row pt-2">
          <div class="col-md-12">
              <div class="card text-center">
                <div class="card-header">
                   <h3 class="card-title text-success">ผลคะแนนการเลือกตั้ง</h3>                   
                </div>
              <div class="card-body p-0">
            
                <div class="row">
                  <div class="col-md-6">
                     <div class="table-responsive " id="tbl_score1">
                <table class="table table-bordered" id="desktop" style="width:100%">
                  <thead>
                    <tr><th colspan="4" style="background:#eb4034;color:#ffffff;">ผลคะแนนผู้สมัครเข้ารับการคัดเลือกกันเองเป็นกรรมการบริหารงานบุคคลจากผู้แทนคณาจารย์ประจำ</th></tr>
                    <tr>                      
                     <th valign="center" class="text-center">หมายเลข</th>
                      <th valign="center" class="text-center">ชื่อ - สกุล</th>
                      <th valign="center" class="text-center">คะแนนรวม</th>  
                      <th valign="center" class="text-center">ลำดับที่ได้</th>                    
                    </tr>
                  </thead>
                  <tbody>
                    <?php                    
                     foreach ($result1s as $key => $r){ ?>
                      <tr>
                        <td align="right" style="vertical-align:middle;text-align:center;"><strong><?php echo $r->c_number;?></strong></td>
                       <td><img src="<?php echo base_url();?>uploads/candidate/<?php echo $r->pid;?>.jpg" width="64" height="64" class="my-n1" alt=""><br><?php echo $r->fullname;?></td>
                       <td style="vertical-align:middle;text-align:center;"><?php echo $r->total;?></td>
                       <td style="vertical-align:middle;text-align:center;"><?php echo $r->num_row;?></td>
                     </tr>
                   <?php }?>
                  </tbody>
                </table>
                </div>
                  </div>
                  <div class="col-md-6">
                     <div class="table-responsive " id="tbl_score2">
                <table class="table table-bordered" id="desktop" style="width:100%">
                  <thead>
                    <tr><th colspan="4" style="background:#348feb;color:#ffffff;">ผลคะแนนผู้สมัครเข้ารับการคัดเลือกกันเองเป็นกรรมการบริหารงานบุคคลจากผู้แทนผู้ปฏิบัติงานในมหาวิทยาลัยสายสนับสนุน</th></tr>
                    <tr>                      
                     <th valign="center" class="text-center">หมายเลข</th>
                      <th valign="center" class="text-center">ชื่อ - สกุล</th>
                      <th valign="center" class="text-center">คะแนนรวม</th>  
                      <th valign="center" class="text-center">ลำดับที่ได้</th>                    
                    </tr>
                  </thead>
                  <tbody>
                     <?php                    
                     foreach ($result2s as $key => $r2){ ?>
                      <tr>
                        <td align="right" style="vertical-align:middle;text-align:center;"><strong><?php echo $r2->c_number;?></strong></td>
                       <td><img src="<?php echo base_url();?>uploads/candidate/<?php echo $r2->pid;?>.jpg" width="64" height="64" class="my-n1" alt=""><br><?php echo $r2->fullname;?></td>
                       <td style="vertical-align:middle;text-align:center;"><?php echo $r2->total;?></td>
                       <td style="vertical-align:middle;text-align:center;"><?php echo $r2->num_row;?></td>
                     </tr>
                   <?php }?>
                  </tbody>
                </table>
                </div>
                  </div>
                </div>
               
               
             
              </div>
            </div>

          </div>
          
        </div>
 
      </div>


<script src="<?php echo base_url();?>assets/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/admin/dist/js/adminlte.min.js"></script>
</body>
</html>