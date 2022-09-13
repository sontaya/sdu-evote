
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SDU eVote | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/dist/css/adminlte.min.css">
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
<body class="hold-transition login-page ">
<div class="login-box">
  <div class="login-logo"> 
 
    <!--<a href="<?php echo base_url();?>"><b>SDU</b> eVote</a> -->
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
     <div class="text-center">
     <img src="<?php echo base_url();?>uploads/1.png" height="80px" alt="logo"> 
    
      </div>
       <p class="login-box-msg"></p>
      <form action="<?php echo base_url()?>admin/login/auth" method="post"> <!-- signin ==auth= -->
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

     
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url();?>assets/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url();?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url();?>assets/admin/plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/admin/dist/js/adminlte.min.js"></script>
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
