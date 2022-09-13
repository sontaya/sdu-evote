
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SDU eVote | Success</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/adminlte.min.css">
  <style>
    #confirm {
        text-align: center;
        padding: 30px 15px;
    }
    .main {
    padding: 20px 25px 10px 25px;
}
.add_bottom_15{
    padding-bottom:15px;
}
  </style>
</head>
<body class="hold-transition login-page" style="background-image: url(<?php echo base_url('uploads/bg3.jpg'); ?>);background-position: bottom;">
<div class="login-box">
  <div class="login-logo">
    <!-- <img src="<?php echo base_url();?>uploads/1.png" height="100px" alt="logo"> -->
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body ">
    
          
        <div class="main">
        <div id="confirm">
            <div class="icon icon--order-success svg add_bottom_15">
				<svg xmlns="http://www.w3.org/2000/svg" width="72" height="72">
					<g fill="none" stroke="#8EC343" stroke-width="2">
						<circle cx="36" cy="36" r="35" style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;"></circle>
						<path d="M17.417,37.778l9.93,9.909l25.444-25.393" style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
					</g>
				</svg>
			</div>
			<h4>ขอบคุณที่ท่านได้มีส่วนร่วมในการออกเสียงเลือกตั้ง</h4>
        </div>
        </div>
        <div class="row">
          <div class="col-12">
            <a href="<?php echo base_url();?>" class="btn btn-primary btn-block">กลับสู่หน้าหลัก</a>
          </div>
          <!-- /.col -->
        </div>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url();?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/dist/js/adminlte.min.js"></script>
</body>
</html>
