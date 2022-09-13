
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SDU eVote | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/adminlte.min.css">
  <style>
   
    .login-head {
      margin-top: 0;
      margin-bottom: 20px;
      padding-bottom: 20px;
      border-bottom: 1px solid #ddd;
      text-align: center;
  }
  .form-control {
    display: block;
    width: 100%;
    padding: 0.375rem 0.75rem;
    font-size: 0.875rem;
    line-height: 1.5;
    color: #495057;
    background-color: #FFF;
    background-clip: padding-box;
    border: 2px solid #ced4da;
    border-radius: 4px;
    -webkit-transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
    transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
    -o-transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
}
  </style>
</head>
<body class="hold-transition login-page " style="background-image: url(<?php echo base_url('uploads/bg01.jpg'); ?>);background-position: bottom;">
<div class="login-box">
  <div class="login-logo"> 
 
    <!--<a href="<?php echo base_url();?>"><b>SDU</b> eVote</a> -->
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
     <div class="text-center">
    <!-- <img src="<?php echo base_url();?>uploads/1.png" height="40px" alt="logo"> -->
   
      </div>
       <p class="login-box-msg" style="border:3px; border-style:solid; border-color:#f1f5f9;">การเลือกตั้งกรรมการสภามหาวิทยาลัย <br>จากพนักงานมหาวิทยาลัยสายสนับสนุน มหาวิทยาลัยสวนดุสิต<br> ในวันที่ 25 มกราคม 2564 <br>ระหว่างเวลา 09.00 - 15.00 น.</p>
      <form action="<?php echo base_url()?>login/signin" method="post">
      <label for="username" class="control-label">ชื่อผู้ใช้งาน</label>
        <div class="input-group mb-3">        
          <input name="username" type="text" class="form-control"   autocomplete="off" placeholder="Username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <label for="password">รหัสผ่าน</label>
        <div class="input-group mb-3">        
          <input name="password" type="password" class="form-control"  autocomplete="off" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
             <!-- <label for="remember">
                Remember Me
              </label> -->
            </div>
          </div>
          <!-- /.col -->
          <div class="col-8">
            <button type="submit" class="btn btn-primary btn-block">เข้าสู่ระบบ</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <p>- หรือ -</p>
        <a href="<?php echo site_url('election_check');?>" class="btn btn-block btn-success">
          <i class="fas fa-check"></i> ตรวจสอบผู้มีสิทธิเลือกตั้ง
        </a>
       <!-- <a href="#" class="btn btn-block btn-danger">
         <?php //echo $myip;?>
        </a>--> 
      </div> 
      <!-- /.social-auth-links -->
<!--
      <p class="mb-1">
        <a href="#">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="#" class="text-center">Register a new membership</a>
      </p> -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url();?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/dist/js/adminlte.min.js"></script>
<script type="text/javascript">
  toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-top-center",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }
<?php       
        if($this->session->flashdata('error_message')) { ?>
        toastr.error("<?php echo $this->session->flashdata('error_message'); ?>");
          <?php  }  ?>
</script>
</body>
</html>
